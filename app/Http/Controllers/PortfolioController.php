<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PortfolioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin,designer');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $portfolios = Portfolio::all();

        return view('backoffice.portfolios.index', compact('portfolios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backoffice.portfolios.create');
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
            "name" => "required",
            "thumbnail" => "required|image",
        ]);

        // buat slug portfolio
        $slug = \Str::slug($request->name);

        // upload thumbnail portfolio
        $thumbName = $slug . '.' . $request->thumbnail->extension();
        $request->thumbnail->move(public_path('uploads/portfolios/'), $thumbName);

        Portfolio::create([
            "user_id" => Auth::user()->id,
            "name" => $request->name,
            "slug" => $slug,
            "thumbnail" => $thumbName,
            "description" => $request->description
        ]);

        session()->flash('success', 'Portfolio berhasil ditambahkan');

        return redirect()->route('portfolios.index');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $portfolio = Portfolio::find($id);

        return view('backoffice.portfolios.edit', compact('portfolio'));
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
        $portfolio = Portfolio::find($id);

        $this->validate($request, [
            "name" => "required",
        ]);

        $slug = \Str::slug($request->name);

        $thumbName = $portfolio->thumbnail;
        if ($request->thumbnail) {
            if ($portfolio->thumbnail && file_exists(public_path('uploads/portfolios/' . $portfolio->thumbnail))) {
                unlink(public_path('uploads/portfolios/' . $portfolio->thumbnail));
            }
            $thumbName = $slug . '.' . $request->thumbnail->extension();
            $request->thumbnail->move(public_path('uploads/portfolios'), $thumbName);
        }

        $portfolio->update([
            "user_id" => Auth::user()->id,
            "name" => $request->name,
            "slug" => $slug,
            "thumbnail" => $thumbName,
            "description" => $request->description,
        ]);

        session()->flash('success', 'Portfolio berhasil diupdate');

        return redirect()->route('portfolios.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $portfolio = Portfolio::find($id);
        if ($portfolio->thumbnail && file_exists(public_path('uploads/portfolios/' . $portfolio->thumbnail))) {
            unlink(public_path('uploads/portfolios/' . $portfolio->thumbnail));
        }

        $portfolio->delete();

        session()->flash('success', ' Portfolio berhasil dihapus dari sistem');

        return redirect()->route("portfolios.index");
    }
}
