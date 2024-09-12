<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //-
        return Product::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        // Product::create([
        //     "name"=> $request->name,
        //     'slug'=> $request->slug,
        //     'description' => $request->descritpion,
        //     'price'=> $request->price,


        // ]);

        $request->validate([
            "name"=> "required",
            "slug"=> "required",
            "price"=> "required",
            "description"=> "required"
        ]);
        return Product::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return Product::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
        $products = Product::find($id);

        // $products->name = $request->name;
        // $products->slug = $request->slug;
        // $products->description = $request->descritpion;
        // $products->price =  $request->price;
        // $products->save();
        $products->update($request->all());
        return $products;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        // $products =  Product::find($id);
        // $products->delete();

        return Product::destroy($id);

    }

    /**
     * Remove the specified resource from storage.

    *
     * @param  str  $name
     * @return \Illuminate\Http\Response
     */
    public function search($name)
    {
        //
        // $products =  Product::find($id);
        // $products->delete();

        return Product::where('name', 'like' , '%' . $name . '%')->get();

    }
}
