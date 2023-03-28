<x-app-layout hasAside asideTitle="Your Info">
    <x-slot name="header">
        <x-header>
            {{ __('Profile') }}
            <x-slot name="append">
                <x-btn color="primary" size="sm" href="{{ route('users.show', $user->username) }}">
                    View Your Profile
                </x-btn>
            </x-slot>
        </x-header>
    </x-slot>

    <x-slot name="aside">
        <div class="flex flex-col gap-4">
            @include('profile.card', ['user' => $user])
            <table>
                <tr>
                    <td class="font-medium text-gray-600 dark:text-gray-400">Email:</td>
                    <td class="text-gray-600 dark:text-gray-400 font-semibold">{{ $user->email }}</td>
                </tr>
                <tr>
                    <td class="font-medium text-gray-600 dark:text-gray-400">Joined on:</td>
                    <td class="text-gray-600 dark:text-gray-400 font-semibold">{{ $user->created_at->format('d/m/Y') }}</td>
                </tr>
                </tr>
            </table>
        </div>
    </x-slot>

    <x-section>
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
    </x-section>
</x-app-layout>
