<x-layouts.layout>
    @section('title', 'Admin Dashboard')

    <div class="text-center">
        <h1 class="text-4xl font-bold mb-4">Welcome {{ auth()->user()->first_name }} to the Admin Dashboard</h1>
        <p class="text-lg">Manage users, view reports, and configure settings.</p>
    </div>

    <div class="w-full">
        @include('announcements.index')
    </div>



</x-layouts.layout>
