@extends('layouts.app')

@section('content')
    <div class="container py-4">


        <div class="header-page mb-5">
            <div class=" d-flex justify-content-between align-items-center">
                <h1>{{ $post->title }}</h1>
                <!-- bottone -->
            </div>
            <a href="{{ route('admin.posts.index') }}">Torna alla lista dei post</a>
        </div>


        <p>
            {{ $post->content }}
        </p>




    </div>
@endsection
