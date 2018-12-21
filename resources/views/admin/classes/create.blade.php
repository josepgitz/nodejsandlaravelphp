@extends('layouts.admin')
@section('content')
<style>
div.row{
padding-top: 20px;
  padding-right: 30px;
  padding-left: 80px;
}
.uper {
    margin-top: 40px;
}
</style>

<div class="card uper">
  <div class="card-header">
  Define Class
  </div>
  <div class="card-body">
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
      <form action="{{ route('Class.store') }}" method="POST" class="pull-center" style="border:1px solid blue" >
            @csrf

            <div class="row">
        <div class=" col-sm-3 ">
            <div class="form-group">
                <strong>Class:</strong>
                <input type="text" name="Class" class="form-control"  list="ClassList">
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
                <input type="text" name="stream" class="form-control"  list="StreamList">
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
                <input type="date"  name="year" class="form-control" value="2018-07-22" min="2018-01-01" max="2018-12-31">
            </div>
            
        </div>
        </div>
    </div> <div class="pull-right">
    <button type="submit" class="btn btn-sm btn-warning">Submit</button>
    <a class="btn btn-sm btn-success" href="{{route('Class.index')}}"> Back</a>
    </div>
      </form>
      <script src="{{ asset('js/app.js') }}" type="text/js"></script>
  </div>
</div>
@endsection
