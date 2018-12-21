@extends('layouts.admin')
@section('content')
<style>
div.row{
padding-top: 20px;
  padding-right: 30px;
  padding-left: 80px;
}
</style>
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit Fees</h2>
        </div>
    </div>
</div>
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('Fees.update', $FeeCollection->id) }}" method="POST" class="pull-center" style="border:1px solid blue" >
        @csrf
        @method('PUT')
        <div class="row">
        <div class=" col-sm-3 ">
            <div class="form-group">
                <strong>Admission Number:</strong>
                <input type="text" name="Admission_number" class="form-control"  placeholder="Admission_number" value="{{$FeeCollection->Admission_number }}">
            </div>
            
        </div>
        <div class=" col-sm-3 ">
            <div class="form-group">
                <strong>Amount:</strong>
                <input type="text" name="Amount" class="form-control" placeholder="Amount" value="{{$FeeCollection->Amount }}">
            </div>
            
        </div>
        <div class=" col-sm-3 ">
            <div class="form-group">
                <strong>Year:</strong>
                <input type="text" name="year" class="form-control" placeholder="Year" value="{{$FeeCollection->year }}">
            </div>
            
        </div>
        <div class=" col-sm-3 ">
            <div class="form-group">
                <strong>Term:</strong>
                <input type="text"  name="term" class="form-control" placeholder="Term" value="{{$FeeCollection->term }}">
            
            </div>
        </div>
       
        <div class=" col-sm-3 ">
            <div class="form-group">
                <strong>Class:</strong>
                <input type="text" name="class" class="form-control" placeholder="class" value="{{$FeeCollection->class }}">
            </div>
            
        </div>
        </div>
        <div class="pull-right"><button type="submit" class="btn btn-sm btn-warning">Submit</button>
                <a class="btn btn-sm btn-success" href="{{route('categories.index')}}"> Back</a></div>
        
    </div>
  
</form>

@endsection
