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
            <a class="btn btn-sm btn-success" href="{{url('categories/create') }}">Add Category</a> 
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
            <th width =150px><b>Name.</b></th>
            <th width =150px><b>Code.</b></th>
            <th width =150px><b>Description.</b></th>
            <th width =150px><b>Catstatus.</b></th>
            <th width =250px><b>Actions.</b></th>
            </tr>

      @foreach($categories as $category)
           <tr>
            <td>{{++$i}}</td>
            <td>{{$category->catname}}</td>
            <td>{{$category->catcode}}</td>
            <td>{{$category->catdescription}}</td>
            <td>{{$category->catstatus}}</td>
          
            <td>

            <form action="{{route('destroy_categories',$category->id)}}" method="POST">
            <a class="btn btn-sm btn-primary" href="{{action('CategoriesController@downloadPDF', $category->id)}}">Download</a>
            <a class="btn btn-sm btn-info"href="{{route('edit_categories',$category->id)}}">Edit</a>
                  @csrf
                  {{method_field('DELETE') }}
                  <button type="submit" class="btn btn-sm btn-danger">Delete</button>
            </form>
            </td>
           </tr>
      @endforeach      
    </table>
</div>
{!! $categories->links() !!}
@endsection
