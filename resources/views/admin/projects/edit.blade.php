@extends('layouts.app')

@section('title', "Modifica $project->title")

@section('content-class', 'container my-5')
@section('content')

    @include('includes.projects.form')

@endsection
