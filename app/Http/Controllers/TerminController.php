<?php

namespace App\Http\Controllers;

use App\Models\Termin;
use Illuminate\Http\Request;

class TerminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $termins = Termin::all();

        return view("backoffice.termins.index", compact('termins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("backoffice.termins.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            "name" => "required|string",
            "start" => "required",
            "end" => "required"
        ]);

        Termin::create([
            "name" => $request->name,
            "start" => $request->start,
            "end" => $request->end,
            "notes" => $request->notes
        ]);

        session()->flash("success", "Data Periode Berhasil ditambahkan");

        return redirect()->route("termins.index");
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $termin = Termin::find($id);

        return view("backoffice.termins.update", compact("termin"));
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
        $this->validate($request, [
            "name" => "required|string",
            "start" => "required",
            "end" => "required"
        ]);

        $termin = Termin::find($id);

        $termin->update([
            "name" => $request->name,
            "start" => $termin->start,
            "end" => $termin->end,
            "notes" => $termin->notes
        ]);

        session()->flash('success', 'Data Periode berhasil diupdate');

        return redirect()->route("termins.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $termin = Termin::find($id);

        $termin->delete();

        session()->flash('success', 'Data Periode Berhasil dihapus');

        return redirect()->route("termins.index");
    }
}
