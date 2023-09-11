@extends('layouts.app')

@section('title', "Modifica $type->label")

@section('content-class', 'container my-5')
@section('content')

    @include('includes.types.form')

@endsection
