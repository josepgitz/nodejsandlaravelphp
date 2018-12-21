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
  Fee Entry
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
      <form action="{{ route('Fees.store') }}" method="POST" class="pull-center" style="border:1px solid blue" >
            @csrf
            <div class="row">
        <div class=" col-sm-3 ">
            <div class="form-group">
                <strong>Admission Number:</strong>
                <input type="text" name="Admission_number" class="form-control"  placeholder="Admission_number">
            </div>
            
        </div>
        <div class=" col-sm-3 ">
            <div class="form-group">
                <strong>Amount:</strong>
                <input type="text" name="Amount" class="form-control" placeholder="Amount">
            </div>
            
        </div>
        <div class=" col-sm-3 ">
            <div class="form-group">
                <strong>Year:</strong>
                <input type="text" name="year" class="form-control" placeholder="Year">
            </div>
            
        </div>
        <div class=" col-sm-3 ">
            <div class="form-group">
                <strong>Term:</strong>
                <input type="text"  name="term" class="form-control" placeholder="Term">
            
            </div>
        </div>
       
        <div class=" col-sm-3 ">
            <div class="form-group">
                <strong>Class:</strong>
                <input type="text" name="class" class="form-control" placeholder="class">
            </div>
            
        </div>
        </div>
    </div>
    <div class="pull-right">
    <button type="submit" class="btn btn-sm btn-warning">Submit</button>
    <a class="btn btn-sm btn-success" href="{{route('Fees.index')}}"> Back</a>
    </div>
      </form>
      <script src="{{ asset('js/app.js') }}" type="text/js"></script>
  </div>
</div>
@endsection
