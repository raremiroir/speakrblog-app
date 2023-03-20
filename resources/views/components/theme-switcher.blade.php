<button 
   title="Switch theme"
   id="switch-theme-btn" 
   class="
    bg-gray-200 dark:bg-gray-700 
    hover:bg-gray-300 dark:hover:bg-gray-600
    text-gray-800 dark:text-gray-300
      hover:text-gray-900 dark:hover:text-gray-200
      hover:shadow-md dark:hover:shadow-none
      active:translate-y-1 active:shadow-none
      h-10 w-10 rounded-xl
      transtion-all duration-200 ease-out
      "
   aria-label="Switch Theme">
   <div id="switch-btn-inner" class="-rotate-12">
      @if (session('theme') == 'dark')
         <i class="fas fa-sun"></i>
      @else
         <i class="fas fa-moon"></i>
      @endif
   </div>
</button>


<script>
   const switchThemeBtn = document.querySelector('#switch-theme-btn');	
   const innerDiv = document.querySelector('#switch-btn-inner');

   switchThemeBtn.addEventListener('click', () => {
      document.querySelector('html').classList.toggle('dark');
      if (document.querySelector('html').classList.contains('dark')) {
         innerDiv.innerHTML = '<i class="fas fa-sun"></i>';
      } else {
         innerDiv.innerHTML = '<i class="fas fa-moon"></i>';
      }
   });
</script>