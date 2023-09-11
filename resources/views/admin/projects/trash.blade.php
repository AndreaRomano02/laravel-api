@extends('layouts.app')

@section('title', 'Cestino')

@section('content-class', 'container my-5')
@section('content')
    <h1>Cestino</h1>
    <div class="d-flex justify-content-between  my-4">
        <a class="btn btn-outline-secondary" href="{{ route('admin.projects.index') }}">Torna all'elenco</a>

        {{-- # Elimina Tutti --}}
        <form action="{{ route('admin.projects.dropAll') }}" method="POST">
            @csrf
            @method('DELETE')

            <button class="btn btn-danger"><i class="fas fa-trash me-2"></i>Svuota cestino</button>
        </form>
    </div>
    <section class="row row-cols-3">
        @foreach ($projects as $project)
            <div class="card col m-2">
                <div class="card-body d-flex justify-content-between">
                    <h5 class="card-title">{{ $project->title }}</h5>
                    <div class="ms-4 d-flex gap-3 align-items-center ">
                        {{-- # SHOW --}}
                        <a href="{{ route('admin.projects.show', $project->id) }}"
                            class="btn btn-sm btn-info d-flex align-items-center"><i class="fas fa-eye me-1"></i> Vedi</a>

                        {{-- # RIPRISTINA --}}
                        <form method="POST" action="{{ route('admin.projects.restore', $project) }}">
                            @csrf
                            @method('PATCH')
                            <button class="btn btn-sm btn-success">Ripristina</button>
                        </form>

                        {{-- # Elimina --}}
                        <form action="{{ route('admin.projects.drop', $project->id) }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <button class="btn btn-sm btn-danger">Elimina</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </section>
@endsection
