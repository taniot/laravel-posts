@extends('layouts.app')

@section('content')
    <div class="container">


        <div class="header-page  pb-2 mb-4">
            <div class=" d-flex justify-content-between align-items-center">
                <h1>{{ $post->title }}</h1>
                <div class="d-flex gap-2">
                    <a href="{{ route('admin.posts.index') }}" class="btn btn-primary" as="button">Torna alla lista</a>
                    <a href="{{ route('admin.posts.edit', $post) }}" class="btn btn-primary" as="button">Modifica</a>
                </div>
            </div>
        </div>

        <p>
            {{ $post->content }}
        </p>

        <hr>
        Category: {{ $post->category?->title ?: 'Categoria non definita' }}

        <hr>
        @if ($post->cover_image)
            <div>
                <img src="{{ asset('storage/' . $post->cover_image) }}">
            </div>
        @endif






    </div>
@endsection
