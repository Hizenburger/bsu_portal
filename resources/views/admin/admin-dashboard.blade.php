<x-layouts.admin-layout>
    <x-slot:title>
        Admin Dashboard
    </x-slot:title>

    <div class="text-center">
        <h1 class="text-4xl font-bold mb-4">Welcome {{ auth()->user()->first_name }} to the Admin Dashboard</h1>
        <p class="text-lg">Manage users, view reports, and configure settings.</p>
    </div>

    <div class="flex justify-center">
            @include('announcements.index')
    </div>


</x-layouts.admin-layout>
