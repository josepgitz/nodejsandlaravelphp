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
  New Student
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
      <form action="{{ route('store_students') }}" method="POST" class="pull-center" style="border:1px solid blue" >
            @csrf
            <div class="row">
        <div class=" col-sm-3 ">
            <div class="form-group">
                <strong>First Name:</strong>
                <input type="text" name="fname" class="form-control"  placeholder="fname">
            </div>
            
        </div>
        <div class=" col-sm-3 ">
            <div class="form-group">
                <strong>Second Name:</strong>
                <input type="text" name="sname" class="form-control" placeholder="sname">
            </div>
            
        </div>
        <div class=" col-sm-3 ">
            <div class="form-group">
                <strong>Last Name:</strong>
                <input type="text" name="lname" class="form-control" placeholder="lname">
            </div>
            
        </div>
        <div class=" col-sm-3 ">
            <div class="form-group">
                <strong>Admission Year:</strong>
                <input type="date" id="start" name="start_year" class="form-control" value="2018-07-22" min="2018-01-01" max="2018-12-31">
            
            </div>
        </div>
        <div class=" col-sm-3 ">
            <div class="form-group">
                <strong>Gender:</strong>
                <input type="text" name="gender" class="form-control"  list="genderList">
                <datalist id="genderList">
                    <option value="Male">
                    <option value="Female">
                </datalist>
            </div>
            
        </div>
        <div class=" col-sm-3 ">
            <div class="form-group">
                <strong>Nationality:</strong>
                <input type="text" name="country" class="form-control" placeholder="country">
            </div>
            
        </div>
        <div class=" col-sm-3 ">
            <div class="form-group">
                <strong>County:</strong>
                <input type="text" name="county" class="form-control" placeholder="county">
            </div>
            
        </div>
        <div class=" col-sm-3 ">
            <div class="form-group">
                <strong>Admission level:</strong>
                <input type="text" name="admission_level" class="form-control" placeholder="admission_level">
            </div>
        </div>
        <div class=" col-sm-3 ">
            <div class="form-group">
                <strong>KCSE Score:</strong>
                <input type="text" name="kcpe_marks" class="form-control"  placeholder="kcpe_marks">
            </div>
            
        </div>
        <div class=" col-sm-3 ">
            <div class="form-group">
                <strong>Parent Name:</strong>
                <input type="text" name="parent_name" class="form-control" placeholder="parent_name">
            </div>
            
        </div>
        <div class=" col-sm-3 ">
            <div class="form-group">
                <strong>Parent Mobile:</strong>
                <input type="text" name="parent_mobile" class="form-control" placeholder="parent_mobile">
            </div>
            
        </div>
        <div class=" col-sm-3 ">
            <div class="form-group">
                <strong>Parent Email:</strong>
                <input type="text" name="parent_email" class="form-control" placeholder="parent_email">
            </div>
        </div>

        <div class=" col-sm-3 ">
            <div class="form-group">
                <strong>Date Of Birth:</strong>
                <input type="date"  name="date_of_birth" class="form-control" value="2018-07-22" min="2018-01-01" max="2018-12-31">
            
            </div>
            
        </div>
        <div class=" col-sm-3 ">
            <div class="form-group">
                <strong>Birth Cert No:</strong>
                <input type="date" id="start" name="Birth_cert_no" class="form-control" value="2018-07-22" min="2018-01-01" max="2018-12-31">
            </div>
        </div>
        <div class=" col-sm-3 ">
            <div class="form-group">
                <strong>Disability:</strong>
                <input type="checkbox" name="disabled" value="1" checked="checked" />
            </div>
            
        </div>
        <div class="pull-right">
               
        </div>
    
        </div>
    </div>
    <div class="pull-right">
    <button type="submit" class="btn btn-sm btn-warning">Submit</button>
    <a class="btn btn-sm btn-success" href="{{route('list_student')}}"> Back</a>
    </div>
      </form>
      <script src="{{ asset('js/app.js') }}" type="text/js"></script>
  </div>
</div>
@endsection
