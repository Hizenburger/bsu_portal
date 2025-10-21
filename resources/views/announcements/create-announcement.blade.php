<div id="createAnnouncementModal" class="fixed inset-0 bg-black/70 items-center justify-center flex hidden z-50">

    <div class="relative max-w-lg w-full p-6 bg-white rounded-2xl">

        <!-- Close Button -->
        <button id="closeCreateAnnouncementBtn"
            class="absolute top-2 right-2 bg-white text-black rounded-full p-2 shadow hover:bg-gray-200 cursor-pointer">
            ✕
        </button>

        <h2 class="text-2xl font-bold mb-4">Create Announcement</h2>

        <form action="{{ route('announcements.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label for="title" class="block text-gray-700 font-semibold mb-2">Title</label>
                <input type="text" id="title" name="title" required
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2">
            </div>

            <div class="mb-4">
                <label for="content" class="block text-gray-700 font-semibold mb-2">Content</label>
                <textarea id="content" name="content" rows="4" required
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2"></textarea>
            </div>

            <div class="mb-4">
                <label for="image_url" class="block text-gray-700 font-semibold mb-2">Image (optional)</label>
                <input type="file" id="image_url" name="image_url" alt="Login"
                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2"/>
            </div>

            <div class="flex justify-end">
                <button type="submit"
                    class="bg-bsu-green text-white font-semibold px-6 py-2 rounded-lg hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500">
                    Post Announcement
                </button>
            </div>
        </form>
    </div>

</div>
