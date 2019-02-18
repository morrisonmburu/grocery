<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brand;
use Session;
use Image;
use Storage;

class brandsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct()
    {
        $this->middleware('auth');
    }

    public function getAdmin(){
        return view('admin.index');
    }

    public function index()
    {
        
        $brands = Brand::orderBy('id', 'desc')->paginate(10);


        return view('admin.brands.index')->withBrands($brands);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('admin.brands.create');
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
            'brand' => 'required|max:255',
            'brand_icon' => 'sometimes|image',
        ));

        //store database
        $brand = new Brand;

        $brand->brand = $request->brand;

        if ($request->hasFile('brand_icon')) {
            $image = $request->file('brand_icon');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('icons/' . $filename);
            Image::make($image)->resize(800, 400)->save($location);

            $brand->icon = $filename;
        }

        $brand->save();

        session::flash('success', 'The brand was successfully saved!');

        //redirect
        return redirect()->route('brands.show', $brand->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $brand = Brand::find($id);
        return view('admin.brands.show')->withBrand($brand);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brand = Brand::find($id);

        return view('admin.brands.edit')->withBrand($brand);
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
        $brand = Brand::find($id);

          $this->validate($request, array(
            'brand' => 'required|max:255',
            'brand_icon' => 'sometimes|image',
        ));

        $brand->brand = $request->input('brand');

         if ($request->hasFile('brand_icon')) {
            // add new image
            $image = $request->file('brand_icon');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('icons/' . $filename);
            Image::make($image)->resize(800, 400)->save($location);

            $oldFilename = $brand->icon;
            //update the database
            $brand->icon = $filename;

            //delete the old image
            Storage::delete($oldFilename);
        }

        $brand->save();

        session::flash('success', 'The brand was successfully saved!');

        //redirect
        return redirect()->route('brands.show', $brand->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brand = Brand::find($id);

        $brand->delete();

        Session::flash('success', 'The brand was successfully deleted.');

        return redirect()->route('brands.index');
    }
}
