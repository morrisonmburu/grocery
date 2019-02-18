<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\category;
use App\Brand;
use Session;
use Image;
use Storage;

class categoryController extends Controller
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

    public function index()
    {
         $category = category::orderBy('id', 'desc')->paginate(10);

        return view('admin.categories.index')->withcategory($category);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Brand::orderBy('id', 'desc')->get();
       return view('admin.categories.create')->withcategory($category);
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
            'category' => 'required|max:255',
            'select' => 'required|max:255',
            'category_icon' => 'sometimes|image'
        ));

        //store database
        $category = new category;


       
        $category->category = $request->category;
        $category->parent = $request->select;

         if ($request->hasFile('category_icon')) {
            $image = $request->file('category_icon');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('icons/' . $filename);
            Image::make($image)->resize(800, 400)->save($location);

            $category->icon = $filename;
        }
        
        $category->save();

        session::flash('success', 'The category was successfully saved!');

        //redirect
        return redirect()->route('categories.show', $category->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = category::find($id);
        return view('admin.categories.show')->withcategory($category);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = category::find($id);

        return view('admin.categories.edit')->withcategory($category);
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
         $category = category::find($id);

          $this->validate($request, array(
            'category' => 'required|max:255',
            'category_icon' => 'sometimes|image'
        ));

        $category->category = $request->input('category');

        if ($request->hasFile('category_icon')) {
            // add new image
            $image = $request->file('category_icon');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('icons/' . $filename);
            Image::make($image)->resize(800, 400)->save($location);

            $oldFilename = $category->icon;
            //update the database
            $category->icon = $filename;

            //delete the old image
            Storage::delete($oldFilename);
        }

        $category->save();

        session::flash('success', 'The category was successfully saved!');

        //redirect
        return redirect()->route('categories.show', $category->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $category = category::find($id);

        $category->delete();

        Session::flash('success', 'The category was successfully deleted.');

        return redirect()->route('categories.index');
    }
}
