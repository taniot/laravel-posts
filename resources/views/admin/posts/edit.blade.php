@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="header-page  pb-2 mb-4">
            <div class=" d-flex justify-content-between align-items-center">
                <h1>Aggiorna post</h1>
                <div class="d-flex gap-2">
                    <a href="{{ route('admin.posts.index') }}" class="btn btn-primary" as="button">Torna alla lista</a>
                </div>
            </div>

        </div>

        @include('shared.errors')

        <form action="{{ route('admin.posts.update', $post) }}" method="POST" enctype="multipart/form-data">
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
            <div class="mb-3">
                <label for="cover-image" class="form-label">Cover Image</label>
                <input class="form-control" type="file" id="cover-image" name="cover_image"
                    value="{{ old('cover_image') }}">


            </div>
            <button class="btn btn-primary">Aggiorna post</button>
        </form>



    </div>
@endsection
