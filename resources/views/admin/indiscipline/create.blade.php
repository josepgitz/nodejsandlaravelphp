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
  Cases Record
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
      <form action="{{ route('Indiscipline.store') }}" method="POST" class="pull-center" style="border:1px solid blue" >
            @csrf




            <div class="row">
        <div class=" col-sm-3 ">
            <div class="form-group">
                <strong>Admission Number:</strong>
                <input type="text" name="admission_number" class="form-control"  placeholder="Admission Number">
            </div>
            
        </div>
        <div class=" col-sm-3 ">
            <div class="form-group">
                <strong>Case Status:</strong>
                <input type="text" name="case_status" class="form-control" placeholder="Case Status">
            </div>
            
        </div>
        <div class=" col-sm-3 ">
            <div class="form-group">
                <strong>Complexity:</strong>
                <input type="text" name="complexity" class="form-control" placeholder="Complexity">
            </div>
            
        </div>
        <div class=" col-sm-3 ">
            <div class="form-group">
                <strong>Case Statement:</strong>
                <input type="textArea" name="case_statement" class="form-control" placeholder="Case Statement">
            
            </div>
        </div>   
        </div>
        </div>
    </div>
    <div class="pull-right">
    <button type="submit" class="btn btn-sm btn-warning">Submit</button>
    <a class="btn btn-sm btn-success" href="{{route('Indiscipline.index')}}"> Back</a>
    </div>
      </form>
      <script src="{{ asset('js/app.js') }}" type="text/js"></script>
  </div>
</div>
@endsection
