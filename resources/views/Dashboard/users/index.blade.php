
{{-- @dd() --}}

@extends("layouts.dashboard")
@section("content")

  <div class="card">
              <div class="card-header">
                <h3 class="card-title">Users</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th class="text-center">#</th>
                      <th class="text-center">Name</th>
                      <th class="text-center">Email</th>
                      <th class="text-center" >Action</th>
                    </tr>
                  </thead>
                  <tbody>

                    @php
                    $i = 1;    
                    @endphp
                    @foreach ($users as $item)
                         <tr>
                      <td class="text-center">{{$i++}}</td>
                      <td class="text-center">{{$item->name}}</td>
                      <td class="text-center">{{$item->email}}</td>
                      <td class="text-center">
                        <form class="d-inline" action="{{route("users.destroy" , $item->id)}}" method="post">
                            @csrf
                            @method("DELETE")
                            <button class="btn btn-sm btn-danger">Delete</button>
                        </form>
                        <a href="{{route("posts.index" , $item->id)}}" class="btn btn-sm btn-info">Posts</a>
                      </td>
                    </tr>
                   
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                    {{ $users->links() }}
                </ul>
              </div>
            </div>
@endsection