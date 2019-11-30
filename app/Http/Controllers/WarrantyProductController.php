<?php

namespace App\Http\Controllers;

use App\Category;
use App\WarrantyProduct;
use Illuminate\Http\Request;

class WarrantyProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::latest()->get();
        $warrantyProducts = WarrantyProduct::with('product')->latest()->paginate();

//        dd($warrantyProducts);

        return view('admin', compact('categories', 'warrantyProducts'));
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\WarrantyProduct  $warrantyProduct
     * @return \Illuminate\Http\Response
     */
    public function show(WarrantyProduct $warrantyProduct)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\WarrantyProduct  $warrantyProduct
     * @return \Illuminate\Http\Response
     */
    public function edit(WarrantyProduct $warrantyProduct)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\WarrantyProduct  $warrantyProduct
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WarrantyProduct $warrantyProduct)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\WarrantyProduct  $warrantyProduct
     * @return \Illuminate\Http\Response
     */
    public function destroy(WarrantyProduct $warrantyProduct)
    {
        //
    }
}
