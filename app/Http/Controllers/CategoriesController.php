<?php

namespace App\Http\Controllers;

use App\Categories;
use Illuminate\Http\Request;
use Illuminate\View\View;
use PDF;

class CategoriesController extends Controller
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
        $categories = Categories::latest()->paginate(5);
  
        return view('admin.categories.catlist',compact('categories'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'catname' => 'required',
            'catcode' => 'required',
            'catdescription' => 'required',
            'catstatus' => 'required',
        ]);
        Categories::create($request->all());
        return redirect()->route('categories.index')
                        ->with('success','Categories created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function show(Categories $categories)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

         $category = Categories::find($id);
       // $categories = Categories::find('id',$categories->id);
        return view('admin.categories.edit',compact('category'));
   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Categories $categories)
    {
        $request->validate([
            'catname' => 'required',
            'catcode' => 'required',
            'catdescription' => 'required',
            'catstatus' => 'required',
        ]);
        $categories->catname = $request['catname'];
        $categories->catcode = $request['catcode'];
        $categories->catdescription = $request['catdescription'];
        $categories->catstatus = $request['catstatus'];
       if($categories->save()){
        return redirect()->route('categories.index')
        ->with('success','Categories updated successfully');
       }else{
       
       } 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Categories::find($id);
        if($category->delete()){
            return redirect()->route('categories.index')
        ->with('success','Categories deleted successfully.');
        }
       
    }

    public function downloadPDF($id){
        $category = Categories::all();
  
        $pdf = PDF::loadView('pdf', compact('category'));
        return $pdf->download('categories.pdf');
  
      }
}
