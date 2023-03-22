@php
    // Random placeholder text for the textarea
    $placeholders = [
        'The speaker\'s words were like a river, flowing endlessly and never to wither.', 
        'The speaker held their audience in thrall, 
        weaving a tale that enthralled them all.', 
        'The floor is yours.', 
        'Start speaking your mind!', 
        'Speak your truth.', 
        'Unleash your inner chatterbox.', 
        'Speaking of speaking, 
        how about sharing your latest brainwave with us?', 
        'The keyboard is your stage, the text area your mic.', 
        'Warning: speaking your mind may cause increased clarity and a sense of relief.', 
        'What\'s the point of having a mouth if you don\'t use it? Type away and speak your truth!', 
        'We can\'t read your mind. Start speaking already!', 
        'Speak into existence!', 
        'Silence may be golden, 
        but your words are pure platinum.', 
        'There\'s a time to listen and a time to speak. This is definitely the latter.', 
        'Put your keyboard where your mouth is!', 
        'What do you call a talkative keyboard?', 
        'Speak of the devil and he shall appear.'
    ];
    // Get a random placeholder
    $random_key = array_rand($placeholders);
@endphp

{{-- View --}}
<x-app-layout>
    {{-- Header --}}
    <x-slot name="header">
        <x-header>
            Speak Anything!
        </x-header>
    </x-slot>

    {{-- Content --}}
    <div class="max-w-5xl mx-auto p-4 sm:p-6 lg:p-8">
        @if (!Auth::check())
            <div class="bg-gray-100 dark:bg-gray-800 p-4 rounded-md">
                You are not allowed to create posts. Please log in or create an account.
            </div>
        @else
            {{-- Add Tag Form --}}

            {{-- Add Post Form --}}
            <form method="POST" action="{{ route('posts.store') }}" class="z-0 isolate">
                @csrf

                {{-- Select Tag --}}
                <div class="">
                    @include('components.multi-select', 
                    [
                        'name' => 'tags',
                        'id' => 'tags',
                        'label' => 'Select Tags',
                        'placeholder' => 'Select Tags...',
                        'options' => App\Models\Tag::getTagsAsArray(),
                        'required' => true,
                        'disabled' => false,
                    ])
                </div>

                {{-- Title --}}
                <div class="mb-4">
                    <x-input label="Title" type="text" name="title" id="title" placeholder='An appealing title'
                        required autofocus />
                </div>

                <div class="mb-4">
                    <x-textarea label="Post Content" type="text" name="body" id="body"
                        placeholder="{{ $placeholders[$random_key] }}" required autofocus rows="10">
                        {{ old('body') }}
                    </x-textarea>
                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-btn type="submit" color="success" size="lg">
                        Speak!
                    </x-btn>
                </div>
            </form>
        @endif
    </div>
</x-app-layout>


<script>
    const tagSelect = document.getElementById('tags');
    const newTagInput = document.getElementById('new-tag');
    const addTagButton = document.getElementById('add-tag-btn');

    newTagInput.addEventListener('keydown', event => {
        if (event.key === 'Enter') {
            event.preventDefault();
            addTag();
        }
    });
    addTagButton.addEventListener('click', addTag);


    const addTag = () => {
        const tagName = newTagInput.value.trim();

        if (tagName !== '') {
            const newOption = document.createElement('option');
            newOption.value = '';
            newOption.textContent = newTag;
            tagSelect.appendChild(newOption);
            tagsSelect.value = '';
            tagsSelect.focus();
            newTagInput.value = '';
        }
    }
</script>
