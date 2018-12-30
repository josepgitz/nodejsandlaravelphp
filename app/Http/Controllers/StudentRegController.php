<?php

namespace App\Http\Controllers;

use App\studentReg;
use Illuminate\Http\Request;

class StudentRegController extends Controller
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
        $studentReg = studentReg::latest()->paginate(5);
        return view('admin.student.index',compact('studentReg'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.student.create');
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
            'fname' => 'required',
            'sname' => 'required',
            'lname' => 'required',
            'start_year' => 'required',
            'gender' => 'required',
            'country' => 'required',
            'county' => 'required',
            'admission_level' => 'required',
            'kcpe_marks' => 'required',
            'parent_name' => 'required',
            'parent_mobile' => 'required',
            'parent_email' => 'required',
            'date_of_birth' => 'required',
            'Birth_cert_no' => 'required',
            'disabled' => 'required',
        
        ]);
        studentReg::create($request->all());
        return redirect()->route('list_student')
                        ->with('success','Student created successfully.');
    }

  
    public function show(studentReg $studentReg)
    {
        //
    }


    public function edit($id)
    {
        $studentReg = studentReg::find($id);
         return view('admin.student.edit',compact('studentReg'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\studentReg  $studentReg
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, studentReg $studentReg)
    {
        $request->validate([
            'fname' => 'required',
            'sname' => 'required',
            'lname' => 'required',
            'start_year' => 'required',
            'gender' => 'required',
            'country' => 'required',
            'county' => 'required',
            'admission_level' => 'required',
            'kcpe_marks' => 'required',
            'parent_name' => 'required',
            'parent_mobile' => 'required',
            'parent_email' => 'required',
            'date_of_birth' => 'required',
            'Birth_cert_no' => 'required',
            'disabled' => 'required',
        ]);
		$studentReg=studentReg::find($studentReg->Birth_cert_no);
        $studentReg->fname = $request['fname'];
        $studentReg->sname = $request['sname'];
        $studentReg->lname = $request['lname'];
        $studentReg->start_year = $request['start_year'];
        $studentReg->gender = $request['gender'];
        $studentReg->country = $request['country'];
        $studentReg->county = $request['county'];
        $studentReg->admission_level = $request['admission_level'];
        $studentReg->kcpe_marks = $request['kcpe_marks'];
        $studentReg->parent_name = $request['parent_name'];
        $studentReg->parent_mobile = $request['parent_mobile'];
        $studentReg->parent_email = $request['parent_email'];
        $studentReg->date_of_birth = $request['date_of_birth'];
        $studentReg->Birth_cert_no = $request['Birth_cert_no'];
        $studentReg->disabled = $request['disabled'];
       if($studentReg->save()){
        return redirect()->route('list_student')
        ->with('success','Student updated successfully');
       }else{
         echo 'Fatal error encountered while trying to insert data into database';
       } 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\studentReg  $studentReg
     * @return \Illuminate\Http\Response
     */
    public function randomId(){

        $id = str_random(5);
   
        $validator =Validator::make(['id'=>$id],['id'=>'unique:table,col']);
   
        if($validator->fails()){
             return $this->randomId();
        }
   
        return $id;
   }
    public function destroy($id)
    {
        $studentReg = studentReg::find($id);
        if($studentReg->delete()){
            return redirect()->route('list_student')
        ->with('success','Student deleted successfully.');
        }
    }
}
