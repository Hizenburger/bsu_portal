@extends('layouts.layout')

@section('title', '{{ Str::upper(auth()->user()->role) }} Dashboard')

@section('content')

    <div class="text-center">
        <h1 class="text-4xl font-bold mb-4">Welcome {{ auth()->user()->first_name }} to the Student Dashboard</h1>
        <p class="text-lg">Manage your courses, view grades, and access resources.</p>
    </div>

</x-layouts.layout>
