<x-profile :sharedProfileData="$sharedProfileData">
  <div class="follow-group">
    @foreach($following as $followed)
    <div class="follower">
      <a href="/profile/{{ $followed->userFollowed->username }}">
        <img src="{{ $followed->userFollowed->avatar }}" alt="Profile Image">
        <p>{{ $followed->userFollowed->username }}</p>
      </a>
    </div>
    @endforeach
  </div>
</x-profile>