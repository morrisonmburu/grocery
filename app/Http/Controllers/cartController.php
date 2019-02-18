<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\category;
use App\Brand;
use Cart;
use Session;
use Storage;

class cartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

    public function carts()
    {
        $brand = Brand::all();
        $product = Product::all();

        $cartscontent = Cart::instance('shopping')->content();
        // dd($cartscontent);

        // dd($cartscontent);
        return view('shop.carts')->withbrand($brand)->withproduct($product)->withcartscontent($cartscontent);
    }

    public function updateCart(Request $request){
        $mode = $request->get('mode');
        $rowId = $request->get('id');
        $name = $request->get('name');
        $qty = $request->get('qty');

        if ($mode == 'removeone') {
            $new = $qty-1;
            Cart::instance('shopping')->update($rowId, $new);
        }else if($mode == 'addone'){
            $add = $qty+1;
            Cart::instance('shopping')->update($rowId, $add);
        }

         // dd($rowId);

        //update quantity in products
        

       

       echo $name;


       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function add_cart(Request $request)
    {
        $id = $request->get('id');
        $title = $request->get('title');
        $quantity = $request->get('addCart');
        $list_price = $request->get('list_price');
        $image = $request->get('image');

        Cart::instance('shopping')->add($id, $title, 1, $list_price, ['image' => $image]);

         echo $title;

         // return redirect()->back();
        
    }

     public function addcart(Request $request)
    {
        $id = $request->get('id');
        $title = $request->get('title');
        $quantity = $request->get('add_cart');
        $list_price = $request->get('list_price');
        $image = $request->get('image');

        Cart::instance('shopping')->add($id, $title, $quantity, $list_price, ['image' => $image]);

        echo $title;

        // return redirect()->back();
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
        //
    }
}
