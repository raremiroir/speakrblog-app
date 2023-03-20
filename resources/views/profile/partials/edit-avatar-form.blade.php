<section>
   <header>
       <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
           {{ __('Your Avatar') }}
       </h2>

       <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
           {{ __("Update your avatar!") }}
       </p>
   </header>

   <div class="flex gap-4 items-center">

      <img src="{{ $user->avatar }}" class="h-32 w-auto border-success p-1 border-4 rounded-full" />

      <form method="post" action="{{ route('profile.update') }}" class="space-y-6">
          @csrf
          @method('patch')
   
          <div>
              <x-input-label for="avatar" :value="__('Upload your Avatar here!')" />
              <x-file-input for="avatar" value="{{ old('avatar') }}" />
              <x-input-error class="mt-2" :messages="$errors->get('avatar')" />
          </div>
   
          <div class="flex items-center gap-4">
              <x-button type="submit" color="primary">
                  {{ __('Save') }}
              </x-button>
   
              @if (session('status') === 'profile-updated')
                  <p
                      x-data="{ show: true }"
                      x-show="show"
                      x-transition
                      x-init="setTimeout(() => show = false, 2000)"
                      class="text-sm text-gray-600 dark:text-gray-400"
                  >{{ __('Saved.') }}</p>
              @endif
          </div>
      </form>
   </div>

</section>
