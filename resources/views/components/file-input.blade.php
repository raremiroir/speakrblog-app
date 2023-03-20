@props([
   'for' => '',
   'value' => '',
   ])

@php 
   $name = $for ?? 'file'; 
   $value = $value ?? 'upload file'; 
@endphp

<input 
   id="{{ $name }}" type="file"
   name="{{ $name }}" value="{{ $value }}" 
   required autocomplete="{{ $name }}"
   class=" 
      transition-all duration-200 ease-out
      form-control mt-4 rounded-lg border-2
      bg-gray-200 dark:bg-gray-900
      text-gray-900 dark:text-gray-100
      tracking-wide font-semibold dark:font-medium
      border-transparent hover:border-success dark:hover:border-success-l1
      file:bg-success/40 dark:file:bg-success/20 
      file:text-gray-900 dark:file:text-gray-100
      file:border-none file:mr-4 file:px-4 file:py-2 file:rounded-lg
      file:cursor-pointer file:font-bold file:tracking-wider
      file:hover:bg-success-l1/60 file:dark:hover:bg-success-l1/40
      file:transition
      @error('{{ $name }}') is-invalid @enderror"
>
