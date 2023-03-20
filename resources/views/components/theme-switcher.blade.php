<x-button 
   title="Switch theme"
   id="switch-theme-btn" 
   color="default"
   size="sm" square>
   <div id="switch-btn-inner" class="-rotate-12">
      @if (session('theme') == 'dark')
         <i class="fas fa-moon"></i>
      @else
         <i class="fas fa-sun"></i>
      @endif
   </div>
</x-button>




<script>
   const switchThemeBtn = document.querySelector('#switch-theme-btn');	
   const innerDiv = document.querySelector('#switch-btn-inner');

   switchThemeBtn.addEventListener('click', () => {
      if (document.querySelector('html').classList.contains('dark')) {
         document.querySelector('html').classList.remove('dark');
         sessionStorage.setItem('theme', 'dark');
         innerDiv.innerHTML = '<i class="fas fa-moon"></i>';
      } else {
         document.querySelector('html').classList.add('dark');
         sessionStorage.setItem('theme', 'light');
         innerDiv.innerHTML = '<i class="fas fa-sun"></i>';
      }
   });
</script>