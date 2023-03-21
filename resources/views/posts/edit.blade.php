<x-app-layout>
   <x-slot name="header">
        <x-header>
            {{ __('Edit your Speak') }}
        </x-header>
   </x-slot>

   <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        @if (!Auth::check() || !Auth::user()->username === $post->user->username)
            <div class="bg-gray-100 dark:bg-gray-800 p-4 rounded-md">
                {{ __('You are not allowed to create posts. Please log in or create an account.') }}
            </div>
        @else
            <form method="POST" action="{{ route('posts.update', $post->id) }}">
                @csrf
                @method('PUT')
        
                <div class="mb-4">
                    <x-input-label for="title" :value="__('Title')" />
                    <input id="title" class="form-input rounded-md shadow-sm mt-1 block w-full"  type="text"  name="title" value="{{old('title', $post->title)}}" required autofocus />
                </div>
        
                <div class="mb-4">
                    <x-input-label for="body" :value="__('Body')" />
                    <textarea id="body" name="body" class="form-input rounded-md shadow-sm mt-1 block w-full" rows="10" required>{{ old('body', $post->body) }}</textarea>
                </div>

               <input type="hidden" name="id" value="{{ $post->id }}">
        
                <div class="flex items-center justify-end mt-4 gap-4">
                    <a href={{ route('posts.show', $post->id) }}>
                        <x-btn color="error" size="lg" class="opacity-80">
                            {{ __('Cancel') }}
                        </x-btn>
                    </a>
                    <x-btn type="submit" color="success" size="lg">
                        {{ __('Save Speak') }}
                    </x-btn>
                </div>
            </form>
        @endif
    </div>
</x-app-layout>
