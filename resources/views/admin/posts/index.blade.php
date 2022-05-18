@extends('layouts.admin')

@section('pageTitle', 'Index')

@section('pageContent')
    <div class="container">
        @if (session('deleted'))
            <div class="alert alert-warning">{{ session('deleted') }}</div>
        @endif
        <div class="row mt-5">
            <div class="col-9">
                <h1 class="text-white">Posts</h1>
            </div>
            <div class="col-3">
                <a href="{{ route('admin.posts.create') }}" class="btn btn-success float-right">Crea un nuovo post</a>
        </div>
        <div class="row">
            <div class="col">
                <table class="table table-dark table-hover border border-white">
                    <thead>
                        <tr>
                        <th class="text-center" scope="col">#</th>
                        <th class="text-center" scope="col">Title</th>
                        <th class="text-center" scope="col">Slug</th>
                        <th class="text-center" scope="col">Created At</th>
                        <th class="text-center" scope="col">Updated At</th>
                        <th class="text-center" scope="col" colspan="3">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($elements as $item)
                            <tr>
                                <th class="text-center" scope="row">{{ $item->id }}</th>
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->slug }}</td>
                                <td>{{ date('d/m/Y', strtotime($item->created_at)) }}</td>
                                <td>{{ date('d/m/Y', strtotime($item->updated_at)) }}</td>
                                <td>
                                    <a class="btn btn-primary" href="{{ route('admin.posts.show', $item->id) }}">Apri</a>
                                </td>
                                <td>
                                    <a class="btn btn-primary" href="{{ route('admin.posts.edit', $item->id) }}">Modifica</a>
                                </td>
                                <td class="text-center">
                                    <button class="btn btn-danger btn-delete" data-id="{{ $item->id }}">Cancella</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        {{-- <div class="row row-cols-4">
            @foreach ($elements as $item)
                <div class="col">
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="{{ $item->image }}" alt="{{ $item->title }}">
                        <div class="card-body">
                        <h5 class="card-title">{{ $item->title }}</h5>
                        </div>
                        <ul class="list-group list-group-flush">
                        <li class="list-group-item">Creato il: {{ date('d/m/Y', strtotime($item->created_at)) }}</li>
                        <li class="list-group-item">Ultima modifica il: {{ date('d/m/Y', strtotime($item->updated_at)) }}</li>
                        </ul>
                        <div class="card-body">
                            <a class="btn btn-primary" href="{{ route('admin.posts.show', $item->id) }}">Apri</a>
                            <a class="btn btn-primary" href="{{ route('admin.posts.edit', $item->id) }}">Modifica</a>
                            <button class="btn btn-danger btn-delete" data-id="{{ $item->id }}">Cancella</button>
                        </div>
                    </div>
                </div>
            @endforeach

        </div> --}}

        {{ $elements->links() }}

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
