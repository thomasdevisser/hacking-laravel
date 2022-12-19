<x-layout>
  <div class="profile-header">
    <img src="{{ $avatar }}" alt="Profile Image">
    <h1>{{ $username }}</h1>
    @if(auth()->user()->username != $username)
      <form action="/{{ $isFollowing ? 'unfollow' : 'follow' }}/{{ $username }}" method="POST">
        @csrf
        <button>{{ $isFollowing ? 'Unfollow' : 'Follow' }}</button>
      </form>
    @endif
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