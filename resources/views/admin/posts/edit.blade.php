@extends('layouts.admin')

@section('pageTitle', 'Modifica il post')

@section('pageContent')

    <div class="container">
        @if (session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
        @endif
        <form action="{{ route('admin.posts.update', $post->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group mt-3 text-white">

                <label for="title">Inserisci il titolo: </label>
                <input type="text" name="title" id="title" class="form-control" value="{{ $post->title }}" >
                @error('title')
                    <div class="alert alert-danger mt-3" role="alert">
                        {{ $message }}
                    </div>
                @enderror

                <label for="image">Inserisci il link dell'immagine: </label>
                <input type="url" name="image" id="image" class="form-control" value="{{ $post->image }}" >
                @error('image')
                    <div class="alert alert-danger mt-3" role="alert">
                        {{ $message }}
                    </div>
                @enderror

                <label for="content">Inserisci il contenuto: </label>
                <textarea name="content" id="content" cols="30" rows="10" class="form-control">{{ $post->content }}</textarea>
                @error('content')
                    <div class="alert alert-danger mt-3" role="alert">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <input type="submit" value="Salva modifica" class="btn btn-success mt-3">
        </form>
    </div>

@endsection
