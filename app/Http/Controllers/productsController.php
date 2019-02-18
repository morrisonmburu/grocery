<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Brand;
use App\category;
use Session;
use Image;
use Storage;

class productsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index()
    {
        $product = Product::orderBy('id', 'desc')->paginate(10);

        return view('admin.products.index')->withProduct($product);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function fetch(Request $request)
    {
        $select = $request->get('select');
        $value = $request->get('value');
        $dependent = $request->get('dependent');
        $data = category::where('parent', '=',$value)->get();

        $output = '<option value=""></option>';
        foreach ($data as $row) {
            $output .= '<option value="'.$row->category.'">'.$row->category.'</option>';
        }
        echo $output;
    }

    public function create()
    {
        // $category = category::orderBy('id', 'desc')->where('parent', '=', 0)->get();
        // $child = category::orderBy('id', 'desc')->where('parent', '=', 1)->get();
        $brands = Brand::orderBy('id', 'desc')->get();
       return view('admin.products.create')->withBrands($brands);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         //validate data
        $this->validate($request, array(
            'title' => 'required|max:255',
            'quantity' => 'required|max:10',
            'brand' => 'required|max:100',
            'price' => 'required|max:10',
            'offer' => 'required|max:10',
            'parent' => 'required|max:50',
            'list_price' => 'required|max:10',
            'description' => 'required|max:255',
            'featured_image' => 'sometimes|image'
        ));

        $product = new Product;

        $product->title = $request->title;
        $product->price = $request->price;
        $product->list_price = $request->list_price;
        $product->categories = $request->parent;
        $product->description = $request->description;
        $product->featured = 0;
        $product->sizes = $request->quantity;
        $product->brand = $request->brand;
        $product->offer = $request->offer;
        $product->deleted = 0;

        //save image
            
        if ($request->hasFile('featured_image')) {
            $image = $request->file('featured_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $filename);
            Image::make($image)->resize(800, 400)->save($location);

            $product->image = $filename;
        }

        $product->save();

        session::flash('success', 'The category was successfully saved!');

        //redirect
        return redirect()->route('products.show', $product->id);

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
        
        return view('admin.products.show')->withProduct($product);
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
        $brand = $product->brand;
        $brands = Brand::find($brand);

        $brands2 = Brand::orderBy('id', 'desc')->get();

        return view('admin.products.edit')->withProduct($product)->withbrands($brands)->withbrands2($brands2);
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

         $this->validate($request, array(
            'title' => 'required|max:255',
            'quantity' => 'required|max:10',
            'brand' => 'required|max:100',
            'price' => 'required|max:10',
            'offer' => 'required|max:10',
            'parent' => 'required|max:50',
            'list_price' => 'required|max:10',
            'description' => 'required|max:255',
            'featured_image' => 'sometimes|image'
        ));

        $product->title = $request->input('title');
        $product->price = $request->input('price');
        $product->list_price = $request->input('list_price');
        $product->categories = $request->input('parent');
        $product->description = $request->input('description');
        $product->featured = 0;
        $product->sizes = $request->input('quantity');
        $product->brand = $request->input('brand');
        $product->offer = $request->input('offer');
        $product->deleted = 0;

         if ($request->hasFile('featured_image')) {
            // add new image
            $image = $request->file('featured_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $filename);
            Image::make($image)->resize(800, 400)->save($location);

            $oldFilename = $product->image;
            //update the database
            $product->image = $filename;

            //delete the old image
            Storage::delete($oldFilename);
        }

        $product->save();

        session::flash('success', 'The category was successfully saved!');

        //redirect
        return redirect()->route('products.show', $product->id);
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
         Storage::delete($product->image);

        $product->delete();

        Session::flash('success', 'The product was successfully deleted.');

        return redirect()->route('products.index');
    }
}
