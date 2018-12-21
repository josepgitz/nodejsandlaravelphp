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
            <a class="btn btn-sm btn-success" href="{{route('Fees.create')}}">New Payment</a> 
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
            <th width =150px><b>Admission Number.</b></th>
            <th width =150px><b>Amount.</b></th>
            <th width =150px><b>Year.</b></th>
            <th width =150px><b>Term.</b></th>
            <th width =150px><b>Class.</b></th>
            <th width =250px><b>Actions.</b></th>
            </tr>
      @foreach($FeeCollection as $FeeCollections)
           <tr>
         
            <td>{{++$i}}</td>
            <td>{{$FeeCollections->Admission_number}}</td>
            <td>{{$FeeCollections->Amount}}</td>
            <td>{{$FeeCollections->year}}</td>
            <td>{{$FeeCollections->term}}</td>
            <td>{{$FeeCollections->class}}</td>
            <td>
            <form action="{{route('Fees.destroy',$FeeCollections->id)}}" method="POST">
            <a class="btn btn-sm btn-primary" href="{{route('fee_pdf', $FeeCollections->id)}}">Receipt</a>
            <a class="btn btn-sm btn-info"href="{{route('Fees.edit',$FeeCollections->id)}}">Edit</a>
                  @csrf
                  {{method_field('DELETE') }}
                  <button type="submit" class="btn btn-sm btn-danger">Delete</button>
            </form>
            </td>
           </tr>
      @endforeach      
    </table>
</div>
{!!$FeeCollection->links()!!}
@endsection
