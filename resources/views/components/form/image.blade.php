@php
   $transition = $transition ?? 'transition-all ease-in-out duration-200';

   $imagesPath = public_path('images/user/');
@endphp
<form action="{{ route('image.store') }}" method="POST" enctype="multipart/form-data" id="image-input-form">
   @csrf
   {{-- Wrap --}}
   <div class="flex justify-center">
      <div class="rounded-lg shadow-xl bg-gray-200 dark:bg-gray-700 p-2 flex flex-col gap-2">
         {{-- Input --}}
         <div class="flex items-center justify-center w-full">
            <label 
               class="
                  {{ $transition }}
                  flex flex-col py-4 cursor-pointer
                  border-4 border-dashed rounded-md 
                  border-gray-300 dark:border-gray-600
                  hover:border-gray-400 dark:hover:border-gray-600
                  hover:bg-gray-100 dark:hover:bg-gray-800" 
               for="image"
               {{-- title="No file chosen" --}}
            >
               <div class="
                  flex items-center justify-center gap-2
                  text-gray-400 group-hover:text-gray-600"
               >
                  <i class="fas fa-image fa-4x"></i>
                  <div class="pt-1 text-sm tracking-wider flex flex-col gap-1 items-start justify-center">
                        <span>{{ $label }}</span>
                        <div class="flex flex-col gap-0">
                           <span class="italic text-xs opacity-80">Allowed formats: jpg, jpeg, png, webp</span>
                           <span class="italic text-xs opacity-80">Maximum size: 2MB</span>
                        </div>
                  </div>
               </div>
               <input 
                  type="file" 
                  accept="image/png, image/jpeg, image/webp, image/jpg"
                  name="image" id="image" 
                  class="opacity-0 -mb-6 cursor-pointer" 
                  title="" 
                  onchange="submit"
               />
            </label>
         </div>
         @if ($message = Session::get('success'))
            <div class="flex flex-row gap-1 items-center justify-between">
               <div class="aspect-1 w-20 h-auto rounded-full border-2 p-1 border-success overflow-hidden">
                  <img src="{{ $imagesPath.Session::get('image') }}" class="w-full h-full object-cover" alt="">
               </div>
               <strong class="bg-success-l1/20 dark:bg-success-l2/10 text-success-d1 dark:text-success-l2 py-1 px-2 rounded-full h-fit flex items-center justify-center">
                  {{ $message }}
               </strong>
            </div>
         @elseif ($message = Session::get('error'))
            <x-errors />
         @endif
      </div>
   </div>
</form>


<script>
   $imageInputForm = document.getElementById('image-input-form');
   $imageInput = document.getElementById('image');

   // Submit the form when the input changes
   $imageInput.addEventListener('change', function() {
      $imageInputForm.submit();
   });
</script>