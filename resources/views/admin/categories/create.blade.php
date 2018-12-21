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
            <h2>Add New Category</h2>
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
   
<form action="{{ route('categories.store') }}" method="POST" class="pull-center" style="border:1px solid blue" >
    @csrf
  
     <div class="row">
        <div class=" col-sm-3 ">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" name="catname" class="form-control"  placeholder="catname">
            </div>
            
        </div>
        <div class=" col-sm-3 ">
            <div class="form-group">
                <strong>Code:</strong>
                <input type="text" name="catcode" class="form-control" placeholder="catcode">
            </div>
            
        </div>
        <div class=" col-sm-3 ">
            <div class="form-group">
                <strong>Description:</strong>
                <input type="text" name="catdescription" class="form-control" placeholder="catdescription">
            </div>
            
        </div>
        <div class=" col-sm-3 ">
            <div class="form-group">
                <strong>Status:</strong>
                <input type="text" name="catstatus" class="form-control" placeholder="catstatus">
            </div>
        </div>

        
        <div style="width:900px; margin:0 auto;">
                <button type="submit" class="btn btn-sm btn-warning">Submit</button>
                <a class="btn btn-sm btn-success" href="{{route('categories.index')}}"> Back</a>
        </div>
        </div>
    </div>
   
</form>

@endsection
