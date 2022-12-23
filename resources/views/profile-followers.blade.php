<x-profile :sharedProfileData="$sharedProfileData">
  <div class="follow-group">
    @foreach($followers as $follower)
    <div class="follower">
      <a href="/profile/{{ $follower->userFollowing->username }}">
        <p>{{ $follower->userFollowing->username }}</p>
      </a>
    </div>
    @endforeach
  </div>
</x-profile>