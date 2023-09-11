@extends('layouts.app')
@section('title', 'Projects')

@section('content-class', 'container my-5')
@section('content')
    <header class="d-flex justify-content-between  my-5">
        <a href="{{ route('admin.projects.trash') }}" class="btn btn-secondary">vai al cestino</a>
        <a href="{{ route('admin.projects.create') }}" class="btn btn-success">Crea un progetto</a>
    </header>

    <table class="table table-dark table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Titolo</th>
                <th scope="col">Tipo</th>
                <th scope="col">Linguaggi</th>
                <th scope="col">Descrizione</th>
                <th scope="col">Link</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @forelse ($projects as $key => $project)
                <tr>
                    {{-- * ID --}}
                    <th class="align-middle">{{ $project->id }}</th>

                    {{-- * Titolo --}}
                    <th class="align-middle">{{ $project->title }}</th>

                    {{-- * Tipo --}}
                    <th class="align-middle text-center">
                        @if ($project->type)
                            <span class="badge rounded-pill"
                                style="background-color:{{ $project->type->color }}; font-size:1rem;">{{ $project->type->label }}</span>
                        @else
                            -
                        @endif
                    </th>

                    {{-- * Linguaggio --}}
                    <th class="align-middle text-center py-5">
                        @forelse ($project->technologies as $technology)
                            <span class="badge rounded-pill me-2 mb-2"
                                style="background-color:{{ $technology->color }}; font-size:1rem;">{{ $technology->label }}</span>

                        @empty -
                        @endforelse
                    </th>

                    {{-- * Descrizione --}}
                    <td class="align-middle">{{ $project->getAbstract() }}</td>

                    {{-- * Link GitHub --}}
                    <td class="align-middle"><a href="{{ $project->url }}" target="_blank">Apri in GitHub</a></td>
                    <td class="align-middle">
                        <div class="d-flex justify-content-end gap-2">
                            {{-- # SHOW --}}
                            <a href="{{ route('admin.projects.show', $project) }}" class="btn btn-info"><i
                                    class="fas fa-eye"></i></a>

                            {{-- # EDIT --}}
                            <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-warning"><i
                                    class="fas fa-pencil"></i></a>

                            {{-- # DELETE --}}
                            <form class="destroy-form" action="{{ route('admin.projects.destroy', $project) }}"
                                method="POST" data-title="{{ $project->title }}">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger"><i class="fas fa-trash"></i></button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">
                        <h1>NON CI SONO PROGETTI</h1>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    @if ($projects->hasPages())
        {{ $projects->links() }}
    @endif
@endsection

@section('scripts')
    @vite('resources/js/destroy-form.js')
@endsection
