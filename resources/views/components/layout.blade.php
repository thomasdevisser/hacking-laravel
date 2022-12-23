<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>
    @isset($pageTitle)
      {{ $pageTitle }} | HackingLaravel
    @else
      HackingLaravel
    @endisset
  </title>
  <link rel="stylesheet" href="/styles.css">
</head>
<body>
  <header>
    <div class="site-header container">
      <a href="/"><h1 id="site-title">HackingLaravel</h1></a>
      <div class="menu">
        @auth
          <a href="#">Search</a>
          <a href="#">Chat</a>
          <a href="/profile/{{ auth()->user()->username }}"><img src="{{ auth()->user()->avatar }}" alt="Profile Image"></a>
          <a href="/create-post">Create Post</a>
          <form action="/logout" method="POST">
            @csrf
            <button>Sign Out</button>
          </form>   
        @else
          <form action="/login" method="POST">
            @csrf
            <input type="text" value="{{ old('login-username') }}" name="login-username" placeholder="Username" autocomplete="off">
            <input type="password" name="login-password" placeholder="Password">
            <button>Sign In</button>
          </form>
        @endauth
      </div>
    </div>
  </header>

  <main>
    <div class="container">
      @if (session()->has('success'))
        <span class="dismissable success">{{ session('success') }}</span>
      @endif

      @if (session()->has('error'))
        <span class="dismissable error">{{ session('error') }}</span>
      @endif

      {{ $slot }}
    </div>
  </main>

  <footer>
    <div class="container">
      <p>Copyright &copy; {{ date('Y') }}</p>
    </div>
  </footer>
</body>
</html>