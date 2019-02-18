<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\category;
use App\Brand;
use Cart;
use Session;
use Storage;

class pagesController extends Controller
{
    public function getIndex(){
    	return view('pages.index');
    }

     public function cancel(){
      return view('pages.cancel');
    }
     public function return(){
      return view('pages.return');
    }

      public function getProduct(){



      $brand = Brand::all();
      $product = Product::all();

      $cartscontent = Cart::instance('shopping')->content();

      // dd($brand->category);
    	return view('shop.shop')->withbrand($brand)->withproduct($product)->withcartscontent($cartscontent);
    }


    // public function add(Request $request, $id){
          
    //       $products = Product::find($id);
    //       // $idget = $id;
    //       // dd($products);

    //       $title = $products->title;
    //       $quantity = 1;
    //       $price = $products->list_price;

    //       Cart::add($id, $title, $quantity, $price);

    //       session::flash('success', 'The category was successfully saved!');

    //       // return view('shop.shop');
    // }

    public function get_categories(Request $request, $id){

              $brand = Brand::all();
              $product = Product::where('brand', '=', $id)->get();

              $cartscontent = Cart::instance('shopping')->content();

            return view('shop.categories')->withbrand($brand)->withproduct($product)->withcartscontent($cartscontent);
    }

    public function viewCart(Request $request, $id){
        $brand = Brand::all();
       $products = Product::find($id);
       $cartscontent = Cart::instance('shopping')->content();

      return view('shop.product_detail')->withproducts($products)->withbrand($brand)->withcartscontent($cartscontent);
    }

    public function getProducts(){

    	$brand = Brand::orderBy('id', 'desc')->get();
      	$product = Product::orderBy('id', 'desc')->paginate(10);
        $cartscontent = Cart::instance('shopping')->content();

    	return view('shop.products-front')->withbrand($brand)->withproduct($product)->withcartscontent($cartscontent);
    }
}


  

