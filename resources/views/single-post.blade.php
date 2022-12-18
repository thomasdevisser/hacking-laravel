<x-layout>
  <article>
    <header>
      <div class="title">
        <h2>{{ $post->title }}</h2>
        <div class="meta">
          <a href="/profile/{{ $post->user->username }}"><img src="{{ $post->user->avatar }}" alt="Profile Image"></a>
          <p>Posted by <a href="/profile/{{ $post->user->username }}">{{ $post->user->username }}</a> on {{ $post->created_at->format('j-n-Y') }}</p>
        </div>
      </div>
      <div class="actions">
        @can('update', $post)
          <a href="/posts/{{ $post->id }}/edit">Edit</a>
        @endcan
        @can('delete', $post)
          <form action="/posts/{{ $post->id }}" method="POST">
            @method('DELETE')
            @csrf
            <button>Delete</button>
          </form> 
        @endcan
      </div>
    </header>

    <main>
      <p>{!! $post->body !!}</p>
    </main>
  </article>
</x-layout>
