@extends('layouts.app')

@section('title', $project->title)

@section('content-class', 'container my-5')
@section('content')
    <div class="card p-3">
        @if (true)
            <img src="{{ $project->getImagePath() }}" class="card-img-top" alt="{{ $project->title }}">
        @endif
        <div class="card-body">
            <h5 class="card-title">{{ $project->title }}</h5>
            <p class="card-text">{{ $project->description }}</p>
            <p class="card-text mt-2 text-end"><strong>Link a GitHub: </strong><a href="{{ $project->url }}"
                    target="_blank">{{ $project->url }}</a>
            </p>
            <p><strong>Tipo:</strong> {{ $project->type->label }}</p>
            <p><strong>Linguaggi:</strong>
                @forelse ($project->technologies as $technology)
                    <span class="badge rounded-pill me-2 mb-2"
                        style="background-color:{{ $technology->color }}; font-size:1rem;">{{ $technology->label }}</span>

                @empty -
                @endforelse
            </p>

            <div class="d-flex justify-content-between">
                {{-- # Torna alla Index --}}
                <a href="{{ route('admin.projects.index') }}" class="btn btn-primary">Torna alla lista dei progetti</a>


                <div class="d-flex gap-2">
                    {{-- # EDIT --}}
                    <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-warning"><i
                            class="fas fa-pencil"></i> Modifica</a>

                    {{-- # DELETE --}}
                    @if (!$project->trashed())
                        <form class="destroy-form" action="{{ route('admin.projects.destroy', $project) }}" method="POST"
                            data-title="{{ $project->title }}">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger"><i class="fas fa-trash"></i> Sposta nel cestino</button>
                        </form>
                    @else
                        <form class="destroy-form" action="{{ route('admin.projects.drop', $project->id) }}" method="POST"
                            data-title="{{ $project->title }}">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger"><i class="fas fa-trash"></i> Ellimina</button>
                        </form>
                    @endif

                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @vite('resources/js/destroy-form.js')
@endsection
