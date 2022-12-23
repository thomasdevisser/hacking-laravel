<x-profile :sharedProfileData="$sharedProfileData">
  <div class="follow-group">
    @foreach($followers as $follower)
    <div class="follower">
      <a href="/profile/{{ $follower->userFollowing->username }}">
        <img src="{{ $follower->userFollowing->avatar }}" alt="Profile Image">
        <p>{{ $follower->userFollowing->username }}</p>
      </a>
    </div>
    @endforeach
  </div>
</x-profile>