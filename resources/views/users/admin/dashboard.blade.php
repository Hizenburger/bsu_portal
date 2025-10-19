@extends('layouts.layout')

@section('title', Str::ucfirst(auth()->user()->role) . ' Dashboard')

@section('content')

    <div class="flex justify-center">
        @include('announcements.index')
    </div>

@endsection
