<x-app-layout>
   <x-slot name="header">
        <x-header>
            {{ __('Speak Anything!') }}
        </x-header>
   </x-slot>

   <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        @if (!Auth::check())
            <div class="bg-gray-100 dark:bg-gray-800 p-4 rounded-md">
                {{ __('You are not allowed to create posts. Please log in or create an account.') }}
            </div>
        @else
            {{-- <form method="POST" action="{{ route('posts.store') }}">
                @csrf
                <textarea name="message" placeholder="{{ __('What\'s on your mind?') }}"
                    class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">{{ old('body') }}</textarea>
                <x-input-error :messages="$errors->get('body')" class="mt-2" />
                <x-primary-button class="mt-4">{{ __('Speak') }}</x-primary-button>
            </form> --}}
            <form method="POST" action="{{ route('posts.store') }}">
                @csrf
        
                <div class="mb-4">
                    <x-input-label for="title" :value="__('Title')" />
        
                    <input id="title" class="form-input rounded-md shadow-sm mt-1 block w-full"  type="text"  name="title" :value="old('title')" required autofocus />
                </div>
        
                <div class="mb-4">
                    <x-input-label for="body" :value="__('Body')" />
        
                    <textarea id="body" name="body" class="form-input rounded-md shadow-sm mt-1 block w-full" rows="10" required>{{ old('body') }}</textarea>
                </div>
        
                <div class="flex items-center justify-end mt-4">
                    <x-button type="submit" color="success" size="lg">
                        {{ __('Speak!') }}
                    </x-button>
                </div>
            </form>
        @endif



    </div>
    {{-- 
   <div class="py-12">
       <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
           <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
               <div class="p-6 bg-white border-b border-gray-200">
               </div>
           </div>
       </div>
   </div> --}}
</x-app-layout>
