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
           
            <h2 class="fs-6 fw-normal text-center text-secondary mb-4">Edit Post</h2>
            <form action="{{ route('posts.update', $post->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
              <div class="row gy-2 overflow-hidden">
                <div class="col-12">
                  <div class="form-floating mb-3">
                      <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" name="title" id="title" placeholder="Title" required value="{{ old('title', $post->title) }}">
                  </div>

                  @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                  
                </div>
             
                <div class="col-12">
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="body" id="body" placeholder="Body" value="{{ old('body', $post->body) }}" required>
                    <label for="body" class="form-label">Body</label>
                  </div>
                </div>

                   <div class="col-12">
                  <div class="form-floating mb-3">
                    <input type="file" class="form-control" name="cover_image" id="image" placeholder="Image" >
                    <label for="image" class="form-label">Image</label>
                  </div>
                  <span>
    Current Image: <br>
    <img src="{{ asset("storage/{$post->cover_image}") }}" alt="{{ $post->title }}" class="img-fluid" style="max-width: 150px; max-height
                  </span>
                    @error('image')
                        <div class="alert alert-danger">{{ $message }}</div>    
                    @enderror
                </div>

                <div class="col-12">
                  <div class="form-floating mb-3">
                    <select class="form-select" name="category_id" id="category_id" aria-label="Category" required>
                      <option value="" selected disabled>Select Category</option>
                      @foreach (\App\Models\Category::all() as $category)
                        <option value="{{ $category->id }}" {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                      @endforeach
                    </select>
                    <label for="category_id" class="form-label">Category</label>

                </div>
               
               
               
               
                <div class="col-12">
                  <div class="d-grid my-3">
                    <button class="btn btn-primary btn-lg" type="submit">Edit</button>
                  </div>
                </div>
               
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>