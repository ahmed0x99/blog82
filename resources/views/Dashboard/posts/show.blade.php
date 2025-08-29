{{-- @dd() --}}

@extends("layouts.dashboard")

@section("content")
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Post Details</h3>
    </div>
    <div class="card-body">
      <h5 class="card-title">{{ $post->title }}</h5>
      <p class="card-text">{{ $post->body }}</p>
      <img src="{{ asset("storage/{$post->cover_image}") }}" alt="{{ $post->title }}" class="img-fluid">
    </div>
  </div>
@endsection