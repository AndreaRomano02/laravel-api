@extends('layouts.app')

@section('title', 'Crea Progetto')

@section('content-class', 'container my-5')
@section('content')

    @include('includes.projects.form')

@endsection


@section('scripts')
    @Vite('resources/js/image-prev.js')
@endsection
