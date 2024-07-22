@extends('layouts.app')

@section('content')
    <div class="container py-4">

        <div class="header-page mb-5">
            <div class=" d-flex justify-content-between align-items-center">
                <h1>Aggiorna post</h1>
                <!-- bottone -->
            </div>
            <a href="{{ route('admin.posts.index') }}">Torna alla lista dei post</a>
        </div>

        @include('shared.errors')

        <form action="{{ route('admin.posts.update', $post) }}" method="POST">
            @method('PUT')
            @csrf
            <div class="mb-3">
                <label for="post-title" class="form-label">Titolo del post</label>
                <input type="text" class="form-control" id="post-title" name="title"
                    value="{{ old('title', $post->title) }}">
            </div>
            <div class="mb-3">
                <label for="post-content" class="form-label">Contenuto del post</label>
                <textarea class="form-control" id="post-content" rows="5" name="content">{{ old('content', $post->content) }}</textarea>
            </div>
            <button class="btn btn-primary">Aggiorna post</button>
        </form>



    </div>
@endsection
