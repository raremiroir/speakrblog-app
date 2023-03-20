<x-app-layout>
   <div class="containr">
      <h1>Edit Comment</h1>
      <form action="{{ route('comments.update', '$comment->id') }}" method="POST">
         
         @csrf
         @method('PUT')
         <div class="form-group">
            <label for="body">Comment</label>
            <textarea 
               name="body" id="body" 
               cols="30" rows="8" 
               class="form-control @error('body') is-invalid @enderror">
               {{ old('body', $comment->body) }}
            </textarea>
            @error('body')
               <div class="invalid-feedback">{{ $message }}</div>
            @enderror
         </div>
         <input type="hidden" name="post_id" value="{{ $post->id }}">
         <input type="submit" value="Add Comment" class="btn btn-primary">
         
      </form>
   </div>
</x-app-layout>
