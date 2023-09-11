@extends('layouts.app')
@section('title', 'Linguaggi')

@section('content-class', 'container my-5')
@section('content')
    <header class="d-flex justify-content-end  my-5">
        <a href="{{ route('admin.technologies.create') }}" class="btn btn-success">Crea un linguaggio</a>
    </header>

    <table class="table table-dark table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Linguaggio</th>
                <th scope="col">Colore</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @forelse ($technologies as $key => $technology)
                <tr>
                    {{-- * ID --}}
                    <th class="align-middle">{{ $technology->id }}</th>

                    {{-- * Titolo --}}
                    <th class="align-middle">{{ $technology->label }}</th>

                    {{-- * Linguaggio --}}
                    <th class="align-middle">
                        <span class="badge rounded-pill"
                            style="background-color:{{ $technology->color }}; font-size:1rem;">{{ $technology->color }}</span>
                    </th>

                    {{-- ! BUTTONS --}}
                    <td class="align-middle">
                        <div class="d-flex justify-content-end gap-2">
                            {{-- # EDIT --}}
                            <a href="{{ route('admin.technologies.edit', $technology) }}" class="btn btn-warning"><i
                                    class="fas fa-pencil"></i></a>

                            {{-- # DELETE --}}
                            <form class="destroy-form" action="{{ route('admin.technologies.destroy', $technology) }}"
                                method="POST" data-title="{{ $technology->label }}">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger"><i class="fas fa-trash"></i></button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">
                        <h1>NON CI SONO LINGUAGGI</h1>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection

@section('scripts')
    @vite('resources/js/destroy-form.js')
@endsection
