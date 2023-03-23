@props([
    'id' => '',
    'name' => '',
    'label' => '',
    'placeholder' => '',
    'options' => [],
    'required' => false,
    'disabled' => false,
    'selectedOptions' => [],
])

@php
    $selectedOptions = $selectedOptions ? json_encode($selectedOptions) : '[]';
@endphp

<div x-data="{ open: false, selectedOptions: {{ $selectedOptions }} }" x-cloak>
    <div class="relative">
        <label for="{{ $id }}" 
            class="block text-sm font-medium leading-5 text-gray-600 dark:text-gray-400 mb-1">
            {{ $label }}
        </label>
        {{-- Trigger Box --}}
        <div class="flex items-center bg-transparent gap-2">
            {{-- Button --}}
            <div x-on:click="open = !open">
                <x-btn color="transp" size="lg" square>
                    <i class="fas fa-stream"></i>
                </x-btn>
            </div>
            {{-- Trigger --}}
            <input 
                type="text" id="{{ $id }}" name="{{ $name }}[]"
                placeholder="{{ $placeholder }}" 
                :required="{{ $required ? 'true' : 'false' }}"
                :disabled="{{ $disabled ? 'true' : 'false' }}" 
                autocomplete="off"
                x-ref="input" 
                x-on:click="open = !open"
                x-bind:placeholder="selectedOptions.length ? '' : '{{ $placeholder }}'"
                x-bind:value="selectedOptions"
                x-value="selectedOptions"
                x-model="selectedOptions.join('  -  ')"
                class="
                    block w-full 
                    py-2 pl-3 pr-10 
                    placeholder-gray-500 
                    bg-white dark:bg-gray-800 
                    border-gray-400 dark:border-gray-600
                    text-gray-900 dark:text-gray-100
                    border rounded-md shadow-sm 
                    transition duration-150 ease-in-out 
                    sm:text-sm sm:leading-5"
            />
        </div>
        {{-- Dropdown --}}
        <div 
            x-show="open"
            x-on:click="open = true"
            x-on:focus="open = true" 
            x-on:blur="open = false"
            x-transition:enter="transition ease-out duration-100 transform"
            x-transition:enter-start="opacity-0 scale-95" 
            x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-75 transform"
            x-transition:leave-start="opacity-100 scale-100" 
            x-transition:leave-end="opacity-0 scale-95"
            class="
                absolute z-10 w-full rounded-md shadow-lg 
                mt-1 p-4
                bg-white dark:bg-gray-800
                border-2 border-success/60 dark:border-success-l1/60
                flex flex-row flex-wrap gap-2" 
        >
            @foreach ($options as $value => $label)
                <label 
                    style="background-color: {{ $label }}"
                    class="
                        inline-flex items-center rounded-lg p-2
                        text-gray-200 dark:text-gray-800">
                    <input type="checkbox" value="{{ $value }}"
                        class="form-checkbox h-5 w-5 text-success rounded-md transition duration-150 ease-in-out focus:ring-success"
                        x-on:click="
                            selectedOptions.includes('{{ $value }}') 
                                ? selectedOptions = selectedOptions.filter(item => item !== '{{ $value }}') 
                                : selectedOptions = [...selectedOptions, '{{ $value }}'];
                        "
                        x-bind:checked="selectedOptions.includes('{{ $value }}');">
                    <span class="ml-2 text-sm leading-5 font-semibold dark:font-bold">{{ $value }}</span>
                </label>
            @endforeach
        </div>
    </div>
</div>
