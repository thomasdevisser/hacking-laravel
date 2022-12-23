<x-layout>
  <h2>Hello {{ auth()->user()->username }}, these are the posts from accounts you're following</h2>
  <section class="feed">
    @unless ($feed->isEmpty())
      @foreach ($feed as $post)
      <article class="post">
        <div class="meta">
          <a href="/profile/{{ $post->user->username }}">
            <img src="{{ $post->user->avatar }}" alt="Profile Image">
            <p class="author">{{ $post->user->username }}</p>
          </a>
        </div>
        <h3 class="post-title"><a href="/posts/{{ $post->id }}">{{ $post->title }}</a></h3>
      </article>
      @endforeach
    @else
      <p>There are no posts from users you follow. Try following more users.</p>
    @endunless
  </section>  
</x-layout>