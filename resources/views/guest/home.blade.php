@extends('layouts.app')
@section('content')
    <div id="guest-home">
        <div class="container pb-5">
            <div class="row h-100">

                <div class="col-8 py-4 left">
                    <h1>Hello World</h1>
                    <p>I'm Andrea Romano and I am Junior Full Stack Web Developer.</p>

                    <h2>The last Projects</h2>

                    <ul class="last-projects p-0">
                        @forelse ($projects as $project)
                            <li class="project-title">
                                <a href="#">{{ $project->title }}
                                    <span class="project-year">{{ $project->getYearCreated() }}</span>
                                    <span class="project-year">{{ $project->type->label }}</span>
                                </a>
                            </li>
                        @empty
                            <h2>Non ci sono progetti</h2>
                        @endforelse
                    </ul>
                </div>
                <div class="col-4 right">
                </div>
            </div>
        </div>
        <img class="image-home" src="{{ Vite::asset('resources/img/andrea.jpg') }}" alt="Andrea">
    </div>
@endsection

@section('scripts')
    @vite('resources/js/guest/home.js')
@endsection
