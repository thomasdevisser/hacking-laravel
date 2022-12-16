<x-layout>
  <h2>Create a new post</h2>
  <form action="/create-post" method="POST">
    @csrf
    <div class="form-group">
      <label for="post-title">Post Title</label>
      <input value="{{old('title')}}" type="text" name="title" id="post-title" placeholder="Post title" autocomplete="off">
      @error('title')
        <small>{{ $message }}</small>
      @enderror
    </div>

    <div class="form-group">
      <label for="post-body">Post Body</label>
      <textarea name="body" id="post-body" placeholder="What's on your mind..." rows="6" cols="30">{{old('body')}}</textarea>
      @error('body')
        <small>{{ $message }}</small>
      @enderror
    </div>

    <button>Save Post</button>
  </form>
</x-layout>