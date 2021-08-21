<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use App\Models\Income;
use App\Models\Major;
use App\Models\Order;
use App\Models\Photo;
use App\Models\Review;
use App\Models\Termin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

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
            "whatsapp" => "required",
            "payment_slip" => "required|image|max:2048"
        ]);

        $terminData = Termin::latest()->first();

        if ($request->hasFile("file")) {
            $imgName = uniqid() . '.' .  $request->file->extension();
            $request->file->move(public_path('uploads/pasfoto/'), $imgName);
        }

        if ($request->hasFile("payment_slip")) {
            $paymentImg = uniqid() . '.' . $request->payment_slip->extension();
            $request->payment_slip->move(public_path('uploads/pasfoto_payments/'), $paymentImg);
        }

        $photo = Photo::create([
            "termin_id" => $terminData->id,
            "name" => $request->name,
            "nim" => $request->nim,
            "faculty" => $request->faculty,
            "major" => $request->major,
            "file" => $imgName,
            "whatsapp" => $request->whatsapp,
            "payment_slip" => $paymentImg
        ]);


        session()->flash('success', 'Pasfoto Kamu Berhasil di upload, silahkan lakukan pembayaran');

        return redirect()->route('cetakpasfoto.success');
    }


    public function pasFotoPaymentSuccess()
    {
        return view("frontoffice.photos.success");
    }
}
