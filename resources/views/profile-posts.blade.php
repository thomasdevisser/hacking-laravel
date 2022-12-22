<x-profile :sharedProfileData="$sharedProfileData">
  <div class="post-group">
    @foreach ($posts as $post)
    <div class="post">
      <p><a href="/posts/{{ $post->id }}"><strong>{{ $post->title }}</strong> posted on {{ $post->created_at->format('j-n-Y') }}</a></p>
    </div>
    @endforeach
  </div>
</x-profile>