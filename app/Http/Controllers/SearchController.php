<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Brand;
use App\category;
use Session;
use Image;
use Storage;
use Cart;

class SearchController extends Controller
{
    public function  search(Request $request){
    	if ($request->ajax()) {
    		$output = "";
    		$products = Product::where('title', 'LIKE', '%'.$request->search.'%')->orWhere('description', 'LIKE', '%'.$request->search.'%')->get();

		    
		    	foreach ($products as $product) {
    			$output .='<li><a href="'.route('search_products', $product->id).'">'.$product->title.'</a></li>';
    			}
    	
    	}
    	echo $output;
    }

    public function get_searches(Request $request, $id){
    	$products = Product::find($id);
    	$brand = Brand::all();

    	// dd($product);

    	$cartscontent = Cart::instance('shopping')->content();

    	return view('shop.search_product')->withbrand($brand)->withproducts($products)->withcartscontent($cartscontent);
    }
}
