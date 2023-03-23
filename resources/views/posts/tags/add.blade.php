<form 
   action="{{ route('posts.tags.store') }}" method="POST" 
   class="bg-gray-700/10 my-4 p-2 w-fit mx-auto rounded-xl flex flex-col gap-4 ">
   @csrf
   <div class="flex flex-row gap-4 w-fit">
      <div class="flex flex-col gap-2 items-start w-fit">
         <x-input 
            label="Add a Tag" 
            name="name" id="name" 
            aria-autocomplete="none" 
            required placeholder="New Tag"
            class="w-80"
         />
      </div>
      <div class="flex flex-col gap-2 items-start w-fit relative">
         {{-- <x-color-input /> --}}
         <div class="relative h-full whitespace-nowrap">
            <x-color-picker
               label="Pick a Color"
               placeholder="Pick a Color" required
               name="color" id="color"
               :colors="[
                  [ 'name' => 'Green',      'value' => '#318748' ],
                  [ 'name' => 'Blue',       'value' => '#336699' ],
                  [ 'name' => 'Red',        'value' => '#BF0603' ],
                  [ 'name' => 'Yellow',     'value' => '#FFA900' ],

                  [ 'name' => 'Aquamarine', 'value' => '#6BFFB8' ],
                  [ 'name' => 'Orange',     'value' => '#D16014' ],
                  [ 'name' => 'Pink',       'value' => '#E086D3' ],
                  [ 'name' => 'Cyan',       'value' => '#80FFEC' ],
               ]"
            />
         </div>
      </div>
   </div>
   <x-btn type="submit" size="sm" id="add-tag-btn" class="whitespace-nowrap" color="primary">Add new tag</x-btn>
</form>