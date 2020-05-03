<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;

use Validator;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Product::all();
        return view('product.index', ['items' => $items]);
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
        $product = new Product;
        $form = $request->all();

        $rules = [
            'product_name' => 'required',
            'product_content' => 'required',
        ];

        $message = [
            'product_name.required' => '商品名が入力されていません',
            'product_content.required' => '商品説明が入力されていません'
        ];
        $validator = Validator::make($form, $rules, $message);

        if($validator->fails()){
            return redirect('/product')
                ->withErrors($validator)
                ->withInput();
        }else{
            unset($form['_token']);
            $product->product_name = $request->product_name;
            $product->product_content = $request->product_content;
            $product->save();
            return redirect('/product');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Product::find($id);
        return view('product.show', ['item' => $item]);
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $items = Product::find($id)->delete();
        return redirect('/product');
    }
}
