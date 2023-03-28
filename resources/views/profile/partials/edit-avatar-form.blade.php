@php
    // Get temp image file path from session if it exists, otherwise get the user's avatar
    $tempImagePath = session('temp_image_filepath') ?? $user->avatar;
@endphp

<div>
   <header>
       <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
           Your Avatar
       </h2>

       <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
           Update your avatar!
       </p>
   </header>

    <div class="flex flex-col lg:flex-row gap-4 items-center">

        @include('profile.avatar', ['user' => $user, 'size' => '128'])

        @include('components.form.image', [
            'label' => 'Upload your Avatar here!',
            // 'value' => old('avatar'),
            // 'error' => $errors->get('avatar'),
        ]);
    
        <form method="POST" action="{{ route('profile.update_avatar') }}">
            @csrf
            @method('patch')

            {{-- Hidden input gets tempImagePath --}}
            <input type="hidden" name="avatar" value="{{ $tempImagePath }}">
   
            <div class="flex items-center gap-4">
                <x-button type="submit" positive>
                    Save Avatar
                </x-button>
   
                @if (session('status') === 'avatar-updated')
                    <p
                        x-data="{ show: true }"
                        x-show="show"
                        x-transition
                        x-init="setTimeout(() => show = false, 3000)"
                        class="text-success dark:text-success-l1"
                    >
                        Saved.
                    </p>
                @elseif (session('status') === 'avatar-update-failed')
                    <p
                        x-data="{ show: true }"
                        x-show="show"
                        x-transition
                        x-init="setTimeout(() => show = false, 3000)"
                        class="text-error dark:text-error-l1"
                    >
                        Failed to save avatar.
                    </p>
                @endif
            </div>
        </form>
    </div>
</div>
