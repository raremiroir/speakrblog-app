<x-app-layout>
    <x-slot name="header">
        <x-header>
            {{ __('Profile') }}
            <x-slot name="append">
                <x-button color="primary" size="sm" href="{{ route('users.show', $user->username) }}">
                    View Your Profile
                </x-button>
            </x-slot>
        </x-header>
    </x-slot>

    <x-main-grid>

        <div class="p-4 sm:p-8 w-full bg-white dark:bg-gray-800 shadow sm:rounded-lg">
            <div class="max-w-xl">
                @include('profile.partials.update-profile-information-form')
            </div>
        </div>

        <div class="p-4 sm:p-8 w-full bg-white dark:bg-gray-800 shadow sm:rounded-lg">
            <div class="max-w-xl">
                @include('profile.partials.update-password-form')
            </div>
        </div>

        <div class="p-4 sm:p-8 w-full bg-white dark:bg-gray-800 shadow sm:rounded-lg">
            <div class="max-w-xl">
                @include('profile.partials.delete-user-form')
            </div>
        </div>
    </x-main-grid>
</x-app-layout>
