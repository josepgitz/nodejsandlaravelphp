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
            <h2>New Student</h2>
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

<form action="{{ route('Indiscipline.update', $indiscipline->id) }}" method="POST" class="pull-center" style="border:1px solid blue" >
        @csrf
        @method('PUT')
     <div class="row">
     <div class=" col-sm-3 ">
            <div class="form-group">
                <strong>Admission Number:</strong>
                <input type="text" name="admission_number" class="form-control" value="{{$indiscipline->admission_number }}" placeholder="Admission Number">
            </div>
            
        </div>
        <div class=" col-sm-3 ">
            <div class="form-group">
                <strong>Case Status:</strong>
                <input type="text" name="case_status" class="form-control" value="{{$indiscipline->case_status }}" placeholder="Case Status">
            </div>
            
        </div>
        <div class=" col-sm-3 ">
            <div class="form-group">
                <strong>Complexity:</strong>
                <input type="text" name="complexity" class="form-control" value="{{$indiscipline->complexity }}" placeholder="Complexity">
            </div>
            
        </div>
        <div class=" col-sm-3 ">
            <div class="form-group">
                <strong>Case Statement:</strong>
                <input type="textArea" name="case_statement" class="form-control" value="{{$indiscipline->case_statement }}" placeholder="Case Statement">
            
            </div>
        </div>   
        <div class="pull-right">
                <button type="submit" class="btn btn-sm btn-warning">Submit</button>
                <a class="btn btn-sm btn-success" href="{{route('Indiscipline.index')}}"> Back</a>
        </div>
    
        </div>
    </div>
   
</form>

@endsection
