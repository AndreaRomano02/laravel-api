@extends('layouts.app')
@section('title', 'Types')

@section('content-class', 'container my-5')
@section('content')
    <header class="d-flex justify-content-end  my-5">
        <a href="{{ route('admin.types.create') }}" class="btn btn-success">Crea un tipo</a>
    </header>

    <table class="table table-dark table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Tipo</th>
                <th scope="col">Colore</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @forelse ($types as $key => $type)
                <tr>
                    {{-- * ID --}}
                    <th class="align-middle">{{ $type->id }}</th>

                    {{-- * Titolo --}}
                    <th class="align-middle">{{ $type->label }}</th>

                    {{-- * Tipo --}}
                    <th class="align-middle">
                        <span class="badge rounded-pill"
                            style="background-color:{{ $type->color }}; font-size:1rem;">{{ $type->color }}</span>
                    </th>

                    {{-- ! BUTTONS --}}
                    <td class="align-middle">
                        <div class="d-flex justify-content-end gap-2">
                            {{-- # EDIT --}}
                            <a href="{{ route('admin.types.edit', $type) }}" class="btn btn-warning"><i
                                    class="fas fa-pencil"></i></a>

                            {{-- # DELETE --}}
                            <form class="destroy-form" action="{{ route('admin.types.destroy', $type) }}" method="POST"
                                data-title="{{ $type->label }}">
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
                        <h1>NON CI SONO TIPI</h1>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection

@section('scripts')
    @vite('resources/js/destroy-form.js')
@endsection
