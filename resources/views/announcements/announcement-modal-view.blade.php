<!-- Image Preview Modal -->
<div id="imageModal" class="fixed inset-0 bg-black/70 items-center justify-center flex hidden z-50">
    <div class="relative max-w-4/5 max-h-fit w-full p-4 bg-white flex-col rounded-2xl">

        <!-- Full Image -->
        <div class="flex flex-col md:flex-row gap-2">
            <div class="w-full border rounded-2xl p-2">
                {{-- poster details --}}
                <div class="flex items-center mb-3">
                    <img src="{{ $announcement->user->profile_picture
                        ? asset($announcement->user->profile_picture)
                        : asset('img/default-profile.jpg') }}"
                        alt="Profile Picture" class="w-10 h-10 rounded-full mr-3 object-cover">
                    <div>
                        <h4 class="font-semibold">
                            {{ Str::ucfirst($announcement->user->first_name) . ' ' . Str::ucfirst($announcement->user->last_name) }}
                        </h4>
                        <small class="text-gray-500">
                            {{ $announcement->created_at->diffForHumans() }}
                        </small>
                    </div>
                </div>
                <!-- Close Button -->
                <button id="closeModalBtn"
                    class="absolute top-2 right-2 bg-white text-black rounded-full p-2 shadow hover:bg-gray-200 cursor-pointer">
                    ✕
                </button>

                <h3 class="text-lg font-bold">{{ $announcement->title }}</h3>
                <p>{{ $announcement->content }}</p>
                @if ($announcement->image_url)
                    <div class="mt-2 announcement-image-container">
                        <img src="{{ asset($announcement->image_url) }}" alt="Announcement Image"
                            class="announcement-image cursor-pointer object-cover rounded-lg">
                    </div>
                @endif
            </div>
            <img id="modalImage" src="" alt="Preview"
                class="w-full h-auto max-h-[90vh] object-contain rounded-lg">


        </div>

    </div>
</div>
