@extends('layouts.app')

@section('title', "Modifica $technology->label")

@section('content-class', 'container my-5')
@section('content')

    @include('includes.technologies.form')

@endsection
