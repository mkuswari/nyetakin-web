<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();

        return view('backoffice.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('backoffice.products.create', compact('categories'));
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
            "name" => "required|max:100",
            "category_id" => "required",
            "thumbnail" => "required|image",
            "production_price" => "required|numeric",
            "selling_price" => "required|numeric",
            "weight" => "required|numeric",
            "stock" => "required|numeric",
        ]);

        // buat slug untuk produk
        $slug = \Str::slug($request->name);

        // upload thumbnail produk
        $imgName = $slug . '.' . $request->thumbnail->extension();
        $request->thumbnail->move(public_path('uploads/products/'), $imgName);

        // tangkap request form
        Product::create([
            "category_id" => $request->category_id,
            "name" => $request->name,
            "slug" => $slug,
            "thumbnail" => $imgName,
            "short_description" => $request->short_description,
            "description" => $request->description,
            "production_price" => $request->production_price,
            "selling_price" => $request->selling_price,
            "weight" => $request->weight,
            "stock" => $request->stock,
            "status" => $request->status,
        ]);

        session()->flash('success', 'Produk baru berhasil ditambahkan');

        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);

        return view('backoffice.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::all();

        return view('backoffice.products.edit', compact('product', 'categories'));
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
        $product = Product::find($id);

        $this->validate($request, [
            "name" => "required|max:100",
            "category_id" => "required",
            "production_price" => "required|numeric",
            "selling_price" => "required|numeric",
            "weight" => "required|numeric",
            "stock" => "required|numeric",
        ]);

        // buat slug
        $slug = \Str::slug($request->name);

        $imgName = $product->thumbnail;
        if ($request->thumbnail) {
            if ($product->thumbnail && file_exists(public_path('uploads/products/' . $product->thumbnail))) {
                unlink(public_path('uploads/products/' . $product->thumbnail));
            }
            $imgName = $slug . '.' . $request->thumbnail->extension();
            $request->thumbnail->move(public_path('uploads/products'), $imgName);
        }

        $product->update([
            "category_id" => $request->category_id,
            "name" => $request->name,
            "slug" => $slug,
            "thumbnail" => $imgName,
            "short_description" => $request->short_description,
            "description" => $request->description,
            "production_price" => $request->production_price,
            "selling_price" => $request->selling_price,
            "weight" => $request->weight,
            "stock" => $request->stock,
            "status" => $request->status,
        ]);

        session()->flash('success', 'Data Prodk berhasil diperbarui');

        return redirect()->route("products.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        if ($product->thumbnail && file_exists(public_path('uploads/products/' . $product->thumbnail))) {
            unlink(public_path('uploads/products/' . $product->thumbnail));
        }

        $product->delete();

        session()->flash('success', ' Data Produk berhasil dihapus dari sistem');

        return redirect()->route("products.index");
    }
}
