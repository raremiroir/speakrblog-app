<x-main-grid>
   @foreach ($posts as $post)
      @include('posts.card', ['post' => $post])
   @endforeach
</x-main-grid>