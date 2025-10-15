<div>
    <h2 class="text-2xl font-bold mb-4">Announcements</h2>

    @if($announcements->count())
        <ul class="space-y-2">
            @foreach ($announcements as $announcement)
                <li class="border rounded p-3">
                    <h3 class="font-semibold">{{ $announcement->title }}</h3>
                    <p>{{ $announcement->body }}</p>
                    <small class="text-gray-500">
                        {{ $announcement->created_at->diffForHumans() }}
                    </small>
                </li>
            @endforeach
        </ul>
    @else
        <p class="text-gray-500 italic">No announcements yet</p>
    @endif
</div>
