@extends('layouts.admin')

@section('pageTitle', 'Index')

@section('pageContent')
    <div class="container">
        @if (session('deleted'))
            <div class="alert alert-warning">{{ session('deleted') }}</div>
        @endif

        <div class="row row-cols-4">
            <div class="col">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="{{ $post->image }}" alt="{{ $post->title }}">
                    <div class="card-body">
                    <h5 class="card-title">{{ $post->title }}</h5>
                    </div>
                    <ul class="list-group list-group-flush">
                    <li class="list-group-item">Creato il: {{ date('d/m/Y', strtotime($post->created_at)) }}</li>
                    <li class="list-group-item">Ultima modifica il: {{ date('d/m/Y', strtotime($post->updated_at)) }}</li>
                    </ul>
                    @auth
                        <div class="card-body">
                            <a class="btn btn-primary" href="{{ route('admin.posts.show', $post->id) }}">Apri</a>
                            <a class="btn btn-primary" href="{{ route('admin.posts.edit', $post->id) }}">Modifica</a>
                            <button class="btn btn-danger btn-delete" data-id="{{ $post->id }}">Cancella</button>
                        </div>
                    @endauth

                </div>
            </div>

        </div>

        <section id="confirmation-overlay" class="overlay d-none">
            <div class="popup">
                <h1>Sei sicuro di voler eliminare?</h1>
                <div class="d-flex justify-content-center">
                    <button id="btn-no" class="btn btn-primary me-3">NO</button>
                    <form method="POST" data-base="{{ route('admin.posts.destroy', 0) }}">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">SI</button>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection
