@extends('layouts.dashboard')

@section('title', 'Categories')

@section('content')
<div class="container">
   <div class="d-flex justify-content-end align-items-center mb-3">
       {{-- <h1>Categories</h1> --}}
     <a href="{{route("categories.create")}}" class="btn btn-success"> Add </a>
   </div>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      {{-- <th scope="col">Last</th> --}}
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody class="table-group-divider">
    @php
       $i = 1;
    @endphp  

      @foreach ($categories as $category)
      <tr>
        <th scope="row">{{$i++}}</th>
        <td>{{$category->name}}</td>
        <td>
          <a href="{{route("categories.edit" , $category->id)}}" class="btn btn-info">Edit</a>
          <form style="display: inline-block" action="{{route("categories.destroy" , $category->id)}}" method="post">
              @csrf
              @method("DELETE")
              <button class="btn btn-danger">Delete</button>
          </form>
        </td>
      </tr>
        
    @endforeach
  </tbody>
</table>
<div class="d-flex justify-content-between align-items-center">
    {{ $categories->links() }}
</div>
</div>
@endsection