<?php

namespace App\Http\Controllers;
use PDF;
use App\FeeCollection;
use Illuminate\Http\Request;

class FeeCollectionController extends Controller
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
        $FeeCollection = FeeCollection::latest()->paginate(5);
  
        return view('admin.Fees.index',compact('FeeCollection'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
      
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.Fees.create');
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
            'Admission_number' => 'required',
            'Amount' => 'required',
            'year' => 'required',
            'term' => 'required',
            'class' => 'required',
        ]);
        FeeCollection::create($request->all());
        return redirect()->route('Fees.index')
                        ->with('success','Payment saved successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FeeCollection  $feeCollection
     * @return \Illuminate\Http\Response
     */
    public function show(FeeCollection $feeCollection)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FeeCollection  $feeCollection
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $FeeCollection = FeeCollection::find($id);
        return view('admin.Fees.edit',compact('FeeCollection'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FeeCollection  $feeCollection
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'Admission_number' => 'required',
            'Amount' => 'required',
            'year' => 'required',
            'term' => 'required',
            'class' => 'required',
        ]);
        $feeCollection=FeeCollection::find($id);
        $feeCollection->Admission_number = $request['Admission_number'];
        $feeCollection->year = $request['year'];
        $feeCollection->term = $request['term'];
        $feeCollection->class = $request['class'];
       if($feeCollection->save()){
        return redirect()->route('Fees.index')
        ->with('success','Fees updated successfully');
       }else{
       
       } 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FeeCollection  $feeCollection
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $feeCollection = FeeCollection::find($id);
        if($feeCollection->delete()){
            return redirect()->route('Fees.index')
        ->with('success','Fees deleted successfully.');
        }
    }
    public function downloadPDF($id){
        $feeCollection = FeeCollection::all();
        $pdf = PDF::loadView('receipt', compact('feeCollection'));
        return $pdf->download('FeesReceipt.pdf');
  
      }
}
