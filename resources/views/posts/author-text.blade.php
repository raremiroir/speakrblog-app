<div class="order-first md:order-last text-xs text-gray-400 dark:text-gray-500 whitespace-nowrap flex items-center">
   <a 
      href="{{ route('users.show', $post->user->username) }}" 
      class="text-success-d2/50 dark:text-success-l2/50 hover:text-success-d2 dark:hover:text-success-l2 font-bold hover:underline {{ $transition }} flex gap-2 items-center"
      >
         <x-profile-avatar :user="$post->user" />
         Spoken by {{ $post->user->username }}
   </a>&nbsp;on&nbsp;<span class="font-semibold">{{ $post->created_at->format('d/m/Y') }}</span>
</div>