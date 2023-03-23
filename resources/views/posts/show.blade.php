<x-app-layout hasAside>
    <x-slot name="header">
        <div class="flex flex-col items-start justify-between gap-4">
            {{-- Title --}}
            <x-header>
                {{ $post->title }}
            </x-header>
            {{-- Tags --}}
            @include('posts.tags.post-flex', ['post' => $post])
        </div>

        <div class="flex flex-col gap-2 items-end">
            {{-- Card Info --}}
            @include('posts.author-text', ['post' => $post, 'size' => 'lg'])
        </div>
    </x-slot>


    <x-slot name="aside">
        {{-- Leave comment --}}
        <div class="relative w-full">
            <div class="w-full bg-white shadow-lg dark:bg-black/20 rounded-lg py-2 px-4 sticky scroll">
                <h5 class="text-xl font-title text-success/40 dark:text-success-l1/40 mb-2">Leave a comment</h5>
                <form action="{{ route('posts.comments.store', $post->id) }}" method="POST" class="flex flex-col gap-2">
                    @csrf
                    <div class="form-group">
                        <x-textarea id="body" name="body" rows="16" placeholder="Type your comment here...">
                            {{ old('body') }}
                        </x-textarea>
                        @if ($errors->has('body'))
                            <div class="invalid-feedback">
                                {{ $errors->first('body') }}
                            </div>
                        @endif
                    </div>
                    <div class="flex justify-end">
                        <x-btn type="submit" color="success">Submit</x-btn>
                    </div>
                </form>
            </div>
        </div>
    </x-slot>

    {{-- Card Options --}}
    @include('posts.actions.options', ['post' => $post])

    <x-section>
        <div class="bg-white dark:bg-gray-500/20 overflow-hidden shadow-xl sm:rounded-lg">
            <div class="p-6 sm:px-20 ">
                {{-- Body --}}
                <div class="mb-4 text-black dark:text-white">{!! nl2br(e($post->body)) !!}</div>
                {{-- Footer --}}
                <hr class="opacity-40"/>
                <div class="flex justify-between mt-4">
                    {{-- Like/Unlike --}}
                    @include('posts.actions.btn-like', ['post' => $post])
                </div>
            </div>
        </div>
    </x-section>


    {{-- Comments --}}
    <x-section title="Comments">
        @if ($post->comments->count() > 0)
            <div class="w-full bg-white shadow-lg dark:bg-black/20 rounded-lg py-2 px-4 flex flex-col gap-4">
                @foreach ($post->comments as $comment)
                    @include('posts.comments.comment', compact('comment'))
                @endforeach
            </div>
        @endif
    </x-section>
</x-app-layout>
