@php
    $placeholders = [
        'The speaker\'s words were like a river, flowing endlessly and never to wither.',
        'The speaker held their audience in thrall, weaving a tale that enthralled them all.',
        'The floor is yours.',
        'Start speaking your mind!',
        'Speak your truth.',
        'Unleash your inner chatterbox.',
        'Speaking of speaking, how about sharing your latest brainwave with us?',
        'The keyboard is your stage, the text area your mic.',
        'Warning: speaking your mind may cause increased clarity and a sense of relief.',
        'What\'s the point of having a mouth if you don\'t use it? Type away and speak your truth!',
        'We can\'t read your mind. Start speaking already!',
        'Speak into existence!',
        'Silence may be golden, but your words are pure platinum.',
        'There\'s a time to listen and a time to speak. This is definitely the latter.',
        'Put your keyboard where your mouth is!',
        'What do you call a talkative keyboard?',
        'Speak of the devil and he shall appear.',
    ];

    $random_key = array_rand($placeholders);
@endphp

<x-app-layout>
   <x-slot name="header">
        <x-header>
            {{ __('Speak Anything!') }}
        </x-header>
   </x-slot>

   <div class="max-w-5xl mx-auto p-4 sm:p-6 lg:p-8">
        @if (!Auth::check())
            <div class="bg-gray-100 dark:bg-gray-800 p-4 rounded-md">
                {{ __('You are not allowed to create posts. Please log in or create an account.') }}
            </div>
        @else
            <form method="POST" action="{{ route('posts.store') }}">
                @csrf
        
                <div class="mb-4">
                    <x-input-label for="title" :value="__('Title')" />
                    <x-text-input 
                        id="title" name="title" 
                        type="text" :value="old('title')" 
                        placeholder="Title"
                        required autofocus 
                    />
                </div>
        
                <div class="mb-4">
                    <x-input-label for="body" :value="__('Body')" />
                    <x-textarea id="body" name="body" rows="10" required placeholder="{{ $placeholders[$random_key] }}">
                        {{ old('body') }}
                    </x-textarea>
                </div>
        
                <div class="flex items-center justify-end mt-4">
                    <x-button type="submit" color="success" size="lg">
                        {{ __('Speak!') }}
                    </x-button>
                </div>
            </form>
        @endif
    </div>
</x-app-layout>
