@extends('layouts.admin')
@section('content')
<style>
div.row{
padding-top: 10px;
  padding-right: 30px;
  padding-left: 30px;
}
</style>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Product</h2>
            </div>
            <div class="pull-right">
            
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
  
    <form action="{{route('students.update', $category->id)}}" method="POST">
        @csrf
        @method('PUT')
   
         <div class="row">
         <div class="row">
        <div class=" col-sm-3 ">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" name="catname" class="form-control" value="{{$category->catname }}" placeholder="catname">
            </div>
            
        </div>
        <div class=" col-sm-3 ">
            <div class="form-group">
                <strong>Code:</strong>
                <input type="text" name="catcode" class="form-control" value="{{$category->catcode }}" placeholder="catcode">
            </div>
            
        </div>
        <div class=" col-sm-3 ">
            <div class="form-group">
                <strong>Description:</strong>
                <input type="text" name="catdescription" class="form-control" value="{{$category->catdescription }}" placeholder="catdescription">
            </div>
            
        </div>
        <div class=" col-sm-3 ">
            <div class="form-group">
                <strong>Status:</strong>
                <input type="text" name="catstatus" class="form-control" value="{{$category->catstatus }}" placeholder="catstatus">
            </div>
        </div>
        <div class="pull-right">
              <button type="submit" class="btn btn-sm btn-success">Submit</button>
              <a class="btn btn-sm btn-primary" href="{{ route('categories.index') }}"> Back</a>
            </div>
        </div>
   
    </form>
@endsection