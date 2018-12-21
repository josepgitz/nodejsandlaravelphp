<?php

namespace App\Http\Controllers;

use App\classDefinition;
use Illuminate\Http\Request;

class ClassDefinitionController extends Controller
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
        $classDefinition = classDefinition::latest()->paginate(5);

        return view('admin.classes.index',compact('classDefinition'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
      
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.classes.create');
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
            'Class' => 'required',
            'stream' => 'required',
            'year' => 'required',
           
        ]);
        classDefinition::create($request->all());
        return redirect()->route('Class.index')
                        ->with('success','class created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\classDefinition  $classDefinition
     * @return \Illuminate\Http\Response
     */
    public function show(classDefinition $classDefinition)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\classDefinition  $classDefinition
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $classDefinition = classDefinition::find($id);
        return view('admin.classes.edit',compact('classDefinition'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\classDefinition  $classDefinition
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       
        $request->validate([
            'Class' => 'required',
            'stream' => 'required',
            'year' => 'required',
        ]);
        $classDefinition=classDefinition::find($id);
        $classDefinition->Class = $request['Class'];
        $classDefinition->stream = $request['stream'];
        $classDefinition->year = $request['year'];
       if($classDefinition->save()){
        return redirect()->route('Class.index')
        ->with('success','Class updated successfully');
       }else{
       
       } 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\classDefinition  $classDefinition
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $classDefinition = classDefinition::find($id);
        if($classDefinition->delete()){
            return redirect()->route('Class.index')
        ->with('success','Class deleted successfully.');
        }
    }
}
