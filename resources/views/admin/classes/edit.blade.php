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

<form action="{{ route('Class.update', $classDefinition->id) }}" method="POST" class="pull-center" style="border:1px solid blue" >
        @csrf
        @method('PUT')
        <div class="row">
        <div class=" col-sm-3 ">
            <div class="form-group">
                <strong>Class:</strong>
                <input type="text" name="Class" value="{{$classDefinition->Class}}" class="form-control"  list="ClassList">
                <datalist id="ClassList">
                    <option value="Form 1">
                    <option value="Form 2">
                    <option value="Form 3">
                    <option value="Form 4">
                </datalist>
            </div>
            
        </div>
      

        <div class=" col-sm-3 ">
            <div class="form-group">
                <strong>Stream:</strong>
                <input type="text" name="stream" value="{{$classDefinition->stream}}" class="form-control"  list="StreamList">
                <datalist id="StreamList">
                    <option value="South">
                    <option value="West">
                    <option value="North">
                    <option value="East">
                    <option value="Others">
                </datalist>
            </div>
            
        </div>
        <div class=" col-sm-3 ">
            <div class="form-group">
                <strong>Year:</strong>
                <input type="date"  name="year" class="form-control" value="{{$classDefinition->year}}" min="2018-01-01" max="2018-12-31">
            </div>
            
        </div>
        </div>
        <div class="pull-right"><button type="submit" class="btn btn-sm btn-warning">Submit</button>
                <a class="btn btn-sm btn-success" href="{{route('Class.index')}}"> Back</a></div>
        
    </div>
  
</form>

@endsection
