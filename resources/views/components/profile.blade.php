@php
  extract($sharedProfileData);
@endphp
<x-layout pageTitle="{{ $username }}'s Profile">
  <div class="profile-header">
    <img src="{{ $avatar }}" alt="Profile Image">
    <h1>{{ $username }}</h1>
    @if(auth()?->user()?->username != $username)
      <form action="/{{ $isFollowing ? 'unfollow' : 'follow' }}/{{ $username }}" method="POST">
        @csrf
        <button>{{ $isFollowing ? 'Unfollow' : 'Follow' }}</button>
      </form>
    @endif
    @if(auth()?->user()?->username == $username)
      <a href="/update-profile-image">Update Profile Image</a>
    @endif
  </div>

  <div class="profile-tabs">
    <a href="/profile/{{ $username }}">Posts: {{ $postCount }}</a>
    <a href="/profile/{{ $username }}/followers">Followers: {{ $followerCount }}</a>
    <a href="/profile/{{ $username }}/following">Following: {{ $followsCount }}</a>
  </div>

  <div class="profile-content">
    {{ $slot }}
  </div>
</x-layout>