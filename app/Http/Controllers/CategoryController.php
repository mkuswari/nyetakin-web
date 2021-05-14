<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware([
            'auth',
            'role:admin',
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('backoffice.categories.index', compact("categories"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backoffice.categories.create');
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
            "name" => "required|max:64",
            "image" => "required"
        ]);

        // buat slug untuk kategori
        $slug = \Str::slug($request->name);

        // upload gambar kategori
        $imgName = $slug . '.' . $request->image->extension();
        $request->image->move(public_path('uploads/categories/'), $imgName);

        Category::create([
            "name" => $request->name,
            "slug" => $slug,
            "image" => $imgName,
        ]);

        session()->flash('success', 'Kategori baru berhasil ditambahkan');

        return redirect()->route('categories.index');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);

        return view('backoffice.categories.edit', compact('category'));
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
        $category = Category::find($id);

        $this->validate($request, [
            "name" => "required|max:64",
        ]);

        // buat Slug
        $slug = \Str::slug($request->name);

        $imgName = $category->image;
        if ($request->image) {
            if ($category->image && file_exists(public_path('uploads/categories/' . $category->image))) {
                unlink(public_path('uploads/categories/' . $category->image));
            }
            $imgName = $slug . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/categories'), $imgName);
        }

        $category->update([
            "name" => $request->name,
            "slug" => $slug,
            "image" => $imgName,
        ]);

        session()->flash('success', 'Data Kategori berhasil diupdate');

        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        if ($category->image && file_exists(public_path('uploads/categories/' . $category->image))) {
            unlink(public_path('uploads/categories/' . $category->image));
        }

        $category->delete();

        session()->flash('success', ' Kategori berhasil dihapus dari sistem');

        return redirect()->route("categories.index");
    }
}
