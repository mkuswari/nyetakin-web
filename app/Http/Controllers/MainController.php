<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use App\Models\Major;
use App\Models\Photo;
use App\Models\Review;
use App\Models\Termin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function addReview(Request $request)
    {

        Review::create([
            "product_id" => $request->product_id,
            "user_id" => Auth::user()->id,
            "review_contents" => $request->review_contents,
            "rating" => $request->rating,
        ]);

        session()->flash('success', 'Review berhasil dikirim');

        return redirect()->back();
    }

    public function uploadPasFoto()
    {
        $faculties = Faculty::pluck('name', 'faculty_id');

        return view('frontoffice.photos.upload', compact('faculties'));
    }

    public function getMajors($id)
    {
        $majors = Major::where('faculty_id', $id)->pluck('name', 'major_id');

        return json_encode($majors);
    }

    public function storePasFoto(Request $request)
    {
        $this->validate($request, [
            "name" => "required|string",
            "nim" => "required|string",
            "faculty" => "required",
            "major" => "required",
            "file" => "required|image|max:2048",
            "whatsapp" => "required"
        ]);

        $terminData = Termin::latest()->first();

        if ($request->hasFile("file")) {
            $imgName = $request->nim . '.' .  $request->file->extension();
            $request->file->move(public_path('uploads/pasfoto/'), $imgName);
        }

        $photo = Photo::create([
            "termin_id" => $terminData->id,
            "name" => $request->name,
            "nim" => $request->nim,
            "faculty" => $request->faculty,
            "major" => $request->major,
            "file" => $imgName,
            "whatsapp" => $request->whatsapp,
        ]);


        session()->flash('success', 'Pasfoto Kamu Berhasil di upload, silahkan lakukan pembayaran');

        return redirect()->route('cetakpasfoto.pembayaran', $photo->id);
    }

    public function pasFotoPayment($id)
    {
        $data = Photo::find($id);

        return view('frontoffice.photos.payment', compact('data'));
    }

    public function updatePasFotoStatus(Request $request, $id)
    {
        $data = Photo::find($id);

        if ($request->hasFile("payment_slip")) {
            $imgName = $request->nim . '.' . $request->file->extension();
            $request->file->move(public_path('uploads/pasfoto_payments/'), $imgName);
        }


        $data->update([
            "payment_slip" => $imgName,
            "status" => 1,
        ]);
    }

    public function pasFotoPaymentSuccess()
    {
        return view("frontoffice.photos.success");
    }
}
