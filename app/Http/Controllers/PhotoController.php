<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use App\Models\Major;
use App\Models\Photo;
use App\Models\Termin;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    public function __Construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin,designer');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $photos = Photo::all();
        $termins = Termin::all();
        $majors = Major::all();

        // fungsi filter data
        $filter = $request->get('nim');
        $termin_id = $request->get('termin_id');
        $major_id = $request->get('major');

        // if ($filter) {
        if ($termin_id) {
            $photos = Photo::where('termin_id', $termin_id)->get();
        } elseif ($major_id) {
            $photos = Photo::where('major', $major_id)->get();
        } else {
            $photos = Photo::where('nim', 'LIKE', "%$filter%")->get();
        }
        // }

        return view("backoffice.photos.index", compact('photos', 'termins', 'majors'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $photo = Photo::find($id);

        $faculty = Faculty::where("faculty_id", $photo->faculty)->first();
        $major = Major::where("major_id", $photo->major)->first();

        return view("backoffice.photos.show", compact('photo', 'faculty', 'major'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $photo = Photo::find($id);

        $photo->update([
            "status" => $request->status
        ]);

        session()->flash('success', 'Status Cetak Pas Foto Berhasil diupdate');

        return redirect()->route('photos.show', [$photo->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $photo = Photo::find($id);

        if ($photo->file && file_exists(public_path("uploads/pasfoto/" . $photo->file))) {
            unlink(public_path("uploads/pasfoto/" . $photo->file));
        }
        $photo->delete();

        session()->flash('success', 'Pas Foto berhasil dihapus');

        return redirect()->route("photos.index");
    }
}
