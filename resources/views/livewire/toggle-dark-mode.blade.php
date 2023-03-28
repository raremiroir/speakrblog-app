<x-button flat md>
    <div class="flex items-center gap-x-2" x-data="{
        dark: @entangle('dark'),
        browserDarkMode() {
            return window.matchMedia('(prefers-color-scheme: dark)').matches
        },
        enable() {
            this.dark = true
            window.localStorage.setItem('dark', true)
            document.documentElement.classList.add('dark')
        },
        disable() {
            this.dark = false
            window.localStorage.setItem('dark', false)
            document.documentElement.classList.remove('dark')
        },
        syncDarkMode() {
            this.dark ? this.enable() : this.disable()
        }
     }"
     x-init="function() {
        this.syncDarkMode()
        $watch('dark', dark => this.syncDarkMode())
     }">
        <div class="cursor-pointer" x-on:click="disable">
            <i class="fas fa-sun"></i>
        </div>
        
        <x-toggle x-model="dark" id="dark-mode-toggle.{{ $this->id }}" />
            
        <div class="cursor-pointer" x-on:click="enable">
            <i class="fas fa-moon"></i>
        </div>
     </div>
</x-button>