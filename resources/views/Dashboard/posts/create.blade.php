@extends("layouts.dashboard")


@section("content")
{{-- <div class="container"> --}}
    <!-- Registration 13 - Bootstrap Brain Component -->
<section class="bg-light py-3 py-md-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-5 col-xxl-4">
        <div class="card border border-light-subtle rounded-3 shadow-sm">
          <div class="card-body p-3 p-md-4 p-xl-5">
            {{-- <div class="text-center mb-3">
              <a href="#!">
                <img src="./assets/img/bsb-logo.svg" alt="BootstrapBrain Logo" width="175" height="57">
              </a>
            </div> --}}
            <h2 class="fs-6 fw-normal text-center text-secondary mb-4">Add Post</h2>
            <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                {{-- @method('PUT') --}}
              <div class="row gy-2 overflow-hidden">
                <div class="col-12">
                  <div class="form-floating mb-3">
                      <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" name="name" id="title" placeholder="Title" required value="{{ old('name') }}">
                  </div>
                  @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>  
                      
                  @enderror
                </div>
             
                <div class="col-12">
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="body" id="body" placeholder="Body" required>
                    <label for="body" class="form-label">Body</label>
                  </div>
                </div>

                   <div class="col-12">
                  <div class="form-floating mb-3">
                    <input type="file" class="form-control" name="image" id="image" placeholder="Image" >
                    <label for="image" class="form-label">Image</label>
                  </div>
                    @error('image')
                        <div class="alert alert-danger">{{ $message }}</div>    
                    @enderror
                </div>
                <div class="col-12">
                  <div class="d-grid my-3">
                    <button class="btn btn-primary btn-lg" type="submit">Add</button>
                  </div>
                </div>
                <div class="col-12">
                  <p class="m-0 text-secondary text-center">Already have an account? <a href="#!" class="link-primary text-decoration-none">Sign in</a></p>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>