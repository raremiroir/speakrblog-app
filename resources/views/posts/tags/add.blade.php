<form 
   action="{{ route('posts.tags.store') }}" method="POST" 
   class="bg-gray-700/10 my-4 py-2 px-4 flex flex-col gap-4 ">
   @csrf
   <div class="flex flex-row gap-4">
      <div class="flex flex-col gap-2 items-start w-full">
         <label class="font-title text-xl text-gray-600 dark:text-gray-400" for="name">Add a Tag</label>
         <x-text-input name="name" id="name" aria-autocomplete="none" required/>
      </div>
      <div class="flex flex-col gap-2 items-start w-fit relative">
         {{-- <x-color-input /> --}}
         <x-color-picker 
            name="color" id="color" 
            :options="['opacity' => true, 'format' => 'hex']"
         />
      </div>
   </div>
   <x-button type="submit" size="sm" id="add-tag-btn" class="whitespace-nowrap" color="primary">Add new tag</x-button>
</form>