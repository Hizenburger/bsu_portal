 @section('content')
     <div class="w-fit mx-auto">
         <h2 class="text-2xl font-bold mb-4 justify-self-center">Announcements POSTS</h2>
         @if ($announcements->count())
             <ul class="space-y-4">
                 @foreach ($announcements as $announcement)
                     <li class="border rounded p-4">
                         <!-- User Info -->
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

                         <!-- Announcement Content -->
                         <h3 class="text-lg font-bold">{{ $announcement->title }}</h3>
                         <p>{{ $announcement->content }}</p>
                         @if ($announcement->image_url)
                             <div class="mt-2 announcement-image-container">
                                 <img src="{{ asset($announcement->image_url) }}" alt="Announcement Image"
                                     class="announcement-image cursor-pointer object-cover">
                             </div>
                         @endif

                         {{-- Like & Comment Count --}}
                         <div class="flex flex-row justify-between px-2.5 text-gray-500 text-sm">
                             <div class="like-container" data-announcement-id="{{ $announcement->id }}">
                                 <span class="like-number">{{ $announcement->likes()->count() }}</span>
                                 <span class="like-label">
                                     {{ Str::plural('like', $announcement->likes()->count()) }}
                                 </span>
                             </div>
                             <div>
                                 {{-- comments count here --}}
                             </div>
                         </div>


                         {{-- Like & Comment Actions --}}
                         <div class="flex flex-row justify-between text-gray-500 border-t mt-1">
                             {{-- LIKE BUTTON --}}
                             @auth
                                 <div class="like-btn flex justify-center items-center w-1/2 gap-2 hover:bg-gray-100 p-2 rounded-2xl cursor-pointer"
                                     data-announcement-id="{{ $announcement->id }}">
                                     @if ($announcement->isLikedBy(auth()->user()))
                                         <i class="fa-solid fa-thumbs-up text-blue"></i>
                                     @else
                                         <i class="fa-regular fa-thumbs-up"></i>
                                     @endif
                                     Like
                                 </div>
                             @else
                                 <a href="{{ route('login') }}" class="flex items-center gap-2 hover:text-blue-600">
                                     <i class="fa-regular fa-thumbs-up"></i>
                                     <span>Like</span>
                                 </a>
                             @endauth


                             {{-- COMMENT BUTTON (can be modal trigger or link) --}}
                             <div
                                 class="flex justify-center items-center w-1/2 gap-2 hover:bg-gray-100 p-2 rounded-2xl cursor-pointer">
                                 <i class="fa-regular fa-comment"></i>
                                 <span>Comment</span>
                             </div>
                         </div>


                     </li>
                 @endforeach
             </ul>

             <!-- Pagination Links -->
             <div class="mt-6 mb-6 flex justify-center">
                 {{ $announcements->onEachSide(1)->links() }}
             </div>
         @else
             <p class="text-gray-500 italic">No announcements yet</p>
         @endif
     </div>

     {{-- modal view --}}
     @include('announcements.announcement-modal-view')

 @endsection
