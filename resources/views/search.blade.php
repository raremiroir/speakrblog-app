<p class="text-xl font-medium text-gray-600 dark:text-gray-400">
   Search Results for "<span class="font-semibold text-success-d2 dark:text-success-l2">{{ $search }}</span>"
</p>

<div class="py-12 w-full">
   <span class="text-lg text-gray-700 dark:text-gray-300 font-medium">Posts</span>
   <ul class="w-full">
      @if ($posts->count() > 0)
         @foreach ($posts as $post)
            @include('posts.card', ['post' => $post])
         @endforeach
      @else
         <li class="text-gray-400 dark:text-gray-500">No posts found</li>
      @endif
   </ul>

   <span class="text-lg text-gray-700 dark:text-gray-300 font-medium">Users</span>
   <ul>
      @if ($users->count() > 0)
         @foreach ($users as $user)
            <x-user-card :user="$user" />
         @endforeach
      @else
         <li class="text-gray-400 dark:text-gray-500">No users found</li>
      @endif
   </ul>
</div>
