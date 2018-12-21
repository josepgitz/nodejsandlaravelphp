@extends('layouts.admin')
@section('content')
<style>
div.container{
padding-top: 20px;
  padding-right: 30px;
  padding-left: 80px;
}
</style>

<div class="container">
<div class="row">
<div class="col-sm-8">
        <form action="posts.index" method="GET">
            {{csrf_field()}}
            <div class="input-group">
                <input type="text" class="form-control" name="searchTerm" placeholder="Search for..." value="{{ isset($searchTerm) ? $searchTerm : '' }}">
                <span class="input-group-btn">
                    <button class="btn btn-primary" type="submit">Search</button>
                </span>
            </div>
        </form>
    </div>
  
                <div class="col-md-10">
                </div>
            <div class="col-sm-2">
            <a class="btn btn-sm btn-success" href="{{url('admin/student/create') }}">New Student</a> 
            </div>
    </div>
    @if($Message=Session::get('success'))
     <div class="alert alert-success">
       <p>{{$Message}}</P>
     </div>
    @endif
    <table class="table table-hover table-striped">
            <tr>
            <th width =50px><b>No.</b></th>
            <th width =150px><b>fname.</b></th>
            <th width =150px><b>lname.</b></th>
            <th width =150px><b>gender.</b></th>
            <th width =150px><b>country.</b></th>
            <th width =150px><b>admission_level.</b></th>
            <th width =150px><b>kcpe_marks.</b></th>
            <th width =150px><b>parent_name.</b></th>
            <th width =150px><b>parent_mobile.</b></th>
           
           
            <th width =150px><b>Birth_cert_no.</b></th>
            <th width =150px><b>disabled.</b></th>
            <th width =250px><b>Actions.</b></th>
            </tr>

      @foreach($studentReg as $studentRegs)
           <tr>
            <td>{{++$i}}</td>
            <td>{{$studentRegs->fname}}</td>
            <td>{{$studentRegs->lname}}</td>
            <td>{{$studentRegs->gender}}</td>
            <td>{{$studentRegs->country}}</td>
            <td>{{$studentRegs->admission_level}}</td>
            <td>{{$studentRegs->kcpe_marks}}</td>
            <td>{{$studentRegs->parent_name}}</td>
            <td>{{$studentRegs->parent_mobile}}</td>
            <td>{{$studentRegs->Birth_cert_no}}</td>
            <td>{{$studentRegs->disabled}}</td>
            <td>
            <form action="{{route('destroy_students',$studentRegs->id)}}" method="POST">
           
            <a class="btn btn-sm btn-info"href="{{route('edit_students',$studentRegs->id)}}">Edit</a>
                  @csrf
                  {{method_field('DELETE') }}
                  <button type="submit" class="btn btn-sm btn-danger">Delete</button>
            </form>
            </td>
           </tr>
      @endforeach      
    </table>
</div>
{!!$studentReg->links()!!}
@endsection
