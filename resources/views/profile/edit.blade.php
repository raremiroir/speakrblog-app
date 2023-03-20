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
        <x-profile-option-wrap>
            @include('profile.partials.edit-avatar-form')
        </x-profile-option-wrap>

        <x-profile-option-wrap>
            @include('profile.partials.update-profile-information-form')
        </x-profile-option-wrap>

        <x-profile-option-wrap>
            @include('profile.partials.update-password-form')
        </x-profile-option-wrap>

        <x-profile-option-wrap>
            @include('profile.partials.delete-user-form')
        </x-profile-option-wrap>
    </x-main-grid>
</x-app-layout>
