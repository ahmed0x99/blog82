
@extends("layouts.dashboard")
@section("content")

  <div class="card">
              <div class="card-header">
                <h3 class="card-title">Users</h3>
              </div>
              <!-- /.card-header -->
              <a href="{{route("posts.create")}}" class="btn btn-success w-50 mx-auto mt-2">Add Post</a>
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th class="text-center">#</th>
                      <th class="text-center">Title</th>
                      <th class="text-center">Category</th>
                      <th class="text-center" >Action</th>
                    </tr>
                  </thead>
                  <tbody>

                    @php
                    $i = 1;    
                    @endphp
                    @forelse ($posts as $item)
                         <tr>
                      <td class="text-center">{{$i++}}</td>
                      <td class="text-center">{{$item->title}}</td>
                      <td class="text-center">{{$item->category->name}}</td>
                      <td class="text-center">
                        <form class="d-inline" action="{{route("posts.destroy" , $item->id)}}" method="post">
                            @csrf
                            @method("DELETE")
                            <button class="btn btn-sm btn-danger">Delete</button>
                        </form>
                        {{-- <a href="{{route("posts.show" , $item->id)}}">Show</a> --}}
                      </td>
                    </tr>
                    @empty
                    <tr>
                      <td colspan="4" class="text-center">No posts found</td> 
                    </tr>
                    @endforelse
                  </tbody>
                </table>
              </div>

              {{-- @forelse ($collection as $item)
                  
              @empty
                  
              @endforelse --}}
              {{-- <!-- /.card-body -->
              <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                    {{ $users->links() }}
                </ul>
              </div> --}}
            </div>
@endsection