<x-app-layout hasAside asideTitle="Add a Tag">
    {{-- Header --}}
    <x-slot name="header">
        <x-header>
            Edit your Speak
        </x-header>
    </x-slot>

    {{-- Aside - Add tag --}}
    <x-slot name="aside">
        @include('posts.tags.add')
        <x-section title="All Tags">
            <div class="flex flex-row flex-wrap gap-2">
                @foreach($tags as $tag)
                    @include('posts.tags.tag', [
                        'tag' => $tag, 
                        'size' => 'md'
                        ])
                @endforeach
            </div>
        </x-section>
    </x-slot>

    {{-- Content --}}
    <x-section title="Edit {{ $post->title }}">
        @if (!Auth::check() || !Auth::user()->username === $post->user->username)
            <div class="bg-gray-100 dark:bg-gray-800 p-4 rounded-md">
                You are not allowed to create posts. Please log in or create an account.
            </div>
        @else
            {{-- Edit Post Form --}}
            <form method="POST" action="{{ route('posts.update', $post->slug) }}">
                @csrf
                @method('PUT')

                {{-- Select Tag --}}
                <div class="">
                    @include('components.multi-select', 
                    [
                        'name' => 'tags',
                        'id' => 'tags',
                        'label' => 'Select Tags',
                        'placeholder' => 'Select Tags...',
                        'options' => App\Models\Tag::getTagsAsArray(),
                        'required' => false,
                        'disabled' => false,
                        'selectedOptions' => $post->tags->pluck('name')->toArray(),
                    ])
                </div>
                <hr class="border-gray-300 dark:border-gray-700 mx-auto mt-16 mb-8"/>
        
                {{-- Title --}}
                <div class="mb-4">
                    <x-input-label for="title" :value="'Title'" />
                    <input id="title" class="form-input rounded-md shadow-sm mt-1 block w-full"  type="text"  name="title" value="{{old('title', $post->title)}}" required autofocus />
                </div>
        
                <div class="mb-4">
                    <x-input-label for="body" :value="'Post Content'" />
                    <textarea id="body" name="body" class="form-input rounded-md shadow-sm mt-1 block w-full" rows="10" required>{{ old('body', $post->body) }}</textarea>
                </div>

               <input type="hidden" name="id" value="{{ $post->id }}">
        
                <div class="flex items-center justify-end mt-4 gap-4">
                    <a href={{ route('posts.show', $post->slug) }}>
                        <x-btn color="error" size="lg" class="opacity-80">
                            Cancel
                        </x-btn>
                    </a>
                    <x-btn type="submit" color="success" size="lg">
                        Save Speak
                    </x-btn>
                </div>
            </form>
        @endif
    </x-section>
</x-app-layout>
