@extends('layouts.admin')

@section('pageTitle', 'Crea un nuovo post')

@section('pageContent')

    <div class="container">
        <div class="row mt-5">
            <div class="col-9">
                <h1 class="text-white">Crea un nuovo post</h1>
            </div>
            <div class="col-3">
                <a href="{{ route('admin.posts.index') }}" class="btn btn-success float-right">Torna alla lista</a>
            </div>
        <form action="{{ route('admin.posts.store') }}" method="POST">
            @csrf
            <div class="form-group  text-white">

                <label for="title">Inserisci il titolo: </label>
                <input type="text" name="title" id="title" class="form-control mb-3" value="{{ old('title') }}" >
                @error('title')
                    <div class="alert alert-danger mt-3" role="alert">
                        {{ $message }}
                    </div>
                @enderror

                <label for="image">Inserisci il link dell'immagine: </label>
                <input type="url" name="image" id="image" class="form-control mb-3" value="{{ old('image') }}" >
                @error('image')
                    <div class="alert alert-danger mt-3" role="alert">
                        {{ $message }}
                    </div>
                @enderror

                <label for="content">Inserisci il contenuto: </label>
                <textarea name="content" id="content" cols="30" rows="10" class="form-control mb-3">{{ old('content') }}</textarea>
                @error('content')
                    <div class="alert alert-danger mt-3" role="alert">
                        {{ $message }}
                    </div>
                @enderror

            </div>
            <button type="submit" class="btn btn-success mt-3">Crea</button>
        </form>
    </div>

@endsection
