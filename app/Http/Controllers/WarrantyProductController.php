<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\WarrantyProduct;
use Carbon\Carbon;
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

        $this->validate($request, [
            'product_id' => 'required',
            'alphabetic_code' => 'required|max:7|min:7|unique:warranty_products|regex:/(^[A-Za-z]+$)+/',
        ],
        [
            'product_id.required' => 'Product field required',
            'alphabetic_code.required' => 'Unique code field required',
        ]);
        $product = Product::findOrFail($request->product_id);

        $warrantyProduct =  WarrantyProduct::create([
            'product_id' => $request->product_id,
//            'user_id' => auth()->user()->id,
            'user_id' => 1, // hard code this for test purpose
            'alphabetic_code' => $request->alphabetic_code,
            'warranty_start_date' => now(),
            'warranty_end_date' => Carbon::createFromFormat('Y-m-d H:i:s', now())->addMonth($product->product_warranty),
        ]);

        return $warrantyProduct;
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
