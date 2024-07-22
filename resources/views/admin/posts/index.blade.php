@extends('layouts.app')

@section('content')
    <div class="container py-4">

        <div class="header-page d-flex justify-content-between align-items-center mb-5">
            <h1>Lista dei posts</h1>
            <div>
                <a href="{{ route('admin.posts.create') }}" class="btn btn-primary" as="button">Crea nuovo</a>
            </div>

        </div>

        @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif


        <table class="table">
            <thead>
                <tr>
                    <th scope="col" class="col">#</th>
                    <th scope="col" class="col-7">Title</th>
                    <th scope="col" class="col">Slug</th>
                    <th scope="col" class="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <th scope="row">{{ $post->id }}</th>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->slug }}</td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="{{ route('admin.posts.show', $post) }}" as="button" class="btn btn-info"><i
                                        class="fa-solid fa-magnifying-glass"></i></a>
                                <a href="{{ route('admin.posts.edit', $post) }}" as="button" class="btn btn-warning"><i
                                        class="fa-solid fa-pencil"></i></a>

                                <form action="{{ route('admin.posts.destroy', $post) }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-danger"><i class="fa-solid fa-bomb"></i></button>

                                </form>
                                {{-- <a href="{{ route('admin.posts.destroy', $post) }}" as="button" class="btn btn-danger"><i
                                        class="fa-solid fa-bomb"></i></a> --}}



                            </div>

                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>


    </div>
@endsection
