<?php

namespace App\Http\Controllers;

use App\indiscipline;
use Illuminate\Http\Request;

class IndisciplineController extends Controller
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
        $indiscipline = indiscipline::latest()->paginate(5);

        return view('admin.indiscipline.index',compact('indiscipline'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.indiscipline.create');
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
            'admission_number' => 'required',
            'case_status' => 'required',
            'complexity' => 'required',
            'case_statement' => 'required',
        ]);
        indiscipline::create($request->all());
        return redirect()->route('Indiscipline.index')
                        ->with('success','Case created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\indiscipline  $indiscipline
     * @return \Illuminate\Http\Response
     */
    public function show(indiscipline $indiscipline)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\indiscipline  $indiscipline
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $indiscipline = indiscipline::find($id);
         return view('admin.indiscipline.edit',compact('indiscipline'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\indiscipline  $indiscipline
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $request->validate([
            'admission_number' => 'required',
            'case_status' => 'required',
            'complexity' => 'required',
            'case_statement' => 'required',
        ]);
        $indiscipline=indiscipline::find($id);
        $indiscipline->indisciplines()->associate($request->indisciplines());
        // $indiscipline->admission_number = $request['admission_number'];
        $indiscipline->case_status = $request['case_status'];
        $indiscipline->complexity = $request['complexity'];
        $indiscipline->case_statement = $request['case_statement'];
       if($indiscipline->save()){
        return redirect()->route('Indiscipline.index')
        ->with('success','Indiscipline updated successfully');
       }else{
       
       } 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\indiscipline  $indiscipline
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $indiscipline = indiscipline::find($id);
        if($indiscipline->delete()){
            return redirect()->route('Indiscipline.index')
        ->with('success','Indiscipline deleted successfully.');
        }
    }
}
