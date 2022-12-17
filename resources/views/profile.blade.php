<x-layout>
  <div class="profile-header">
    <img src="" alt="Profile Image">
    <h1>{{ $username }}</h1>
    <form action="#" method="POST">
      <button>Follow</button>
      {{-- <button>Unfollow</button> --}}
    </form>
  </div>

  <div class="profile-tabs">
    <a href="">Posts: {{ $postCount }}</a>
    <a href="">Followers: #</a>
    <a href="">Following: #</a>
  </div>

  <div class="post-group">
    @foreach ($posts as $post)
    <div class="post">
      <a href="/posts/{{ $post->id }}"><strong>{{ $post->title }}</strong> posted on {{ $post->created_at->format('j-n-Y') }}</a>
    </div>
    @endforeach
  </div>
</x-layout>