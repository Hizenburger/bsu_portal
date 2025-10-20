<x-layouts.layout>
    @section('title', 'Student Dashboard')

    <div class="text-center">
        <h1 class="text-4xl font-bold mb-4">Welcome {{ auth()->user()->first_name }} to the Student Dashboard</h1>
        <p class="text-lg">View your announcements and manage your profile.</p>
    </div>

    <div class="w-full">
        @include('announcements.index')
    </div>



</x-layouts.layout>
