<x-layout>
  <h2>Editing a post</h2>
  <a href="/posts/{{ $post->id }}">Back to post</a>
  <form action="/posts/{{ $post->id }}/edit" method="POST">
    @method('PUT')
    @csrf
    <div class="form-group">
      <label for="post-title">Post Title</label>
      <input value="{{ old('title', $post->title) }}" type="text" name="title" id="post-title" placeholder="Post title" autocomplete="off">
      @error('title')
        <small class="error">{{ $message }}</small>
      @enderror
    </div>

    <div class="form-group">
      <label for="post-body">Post Body</label>
      <textarea name="body" id="post-body" placeholder="What's on your mind..." rows="6" cols="30">{{ old('body', $post->body) }}</textarea>
      @error('body')
        <small class="error">{{ $message }}</small>
      @enderror
    </div>

    <button>Update Post</button>
  </form>
</x-layout>