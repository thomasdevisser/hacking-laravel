<x-layout>
  <div class="profile-header">
    <img src="/storage/profile-images/{{ $avatar }}" alt="Profile Image">
    <h1>{{ $username }}</h1>
    <form action="#" method="POST">
      <button>Follow</button>
      {{-- <button>Unfollow</button> --}}
    </form>
    @if(auth()->user()->username == $username)
      <a href="/update-profile-image">Update Profile Image</a>
    @endif
  </div>

  <div class="profile-tabs">
    <a href="">Posts: {{ $postCount }}</a>
    <a href="">Followers: #</a>
    <a href="">Following: #</a>
  </div>

  <div class="post-group">
    @foreach ($posts as $post)
    <div class="post">
      <p><a href="/posts/{{ $post->id }}"><strong>{{ $post->title }}</strong> posted on {{ $post->created_at->format('j-n-Y') }}</a></p>
    </div>
    @endforeach
  </div>
</x-layout>