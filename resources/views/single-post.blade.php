<x-layout>
  <article>
    <header>
      <div class="title">
        <h2>{{ $post->title }}</h2>
        <div class="meta">
          <a href="/profile/{{ $post->user->username }}"><img src="" alt="Profile Image"></a>
          <p>Posted by <a href="/profile/{{ $post->user->username }}">{{ $post->user->username }}</a> on {{ $post->created_at->format('j-n-Y') }}</p>
        </div>
      </div>
      <div class="actions">
        <a href="#">Edit</a>
        <form action="#" method="POST">
          <button>Delete</button>
        </form>
      </div>
    </header>

    <main>
      <p>{!! $post->body !!}</p>
    </main>
  </article>
</x-layout>
