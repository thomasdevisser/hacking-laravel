<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Laravel</title>
  <link rel="stylesheet" href="/styles.css">
</head>
<body>
  <header>
    <a href="/"><h1>HackingLaravel</h1></a>
    @auth
      <a href="#">Search</a>
      <a href="#">Chat</a>
      <img src="" alt="Profile Image">
      <a href="#">Create Post</a>
      <form action="#" method="POST">
        <button>Sign Out</button>
      </form>   
    @else
      <form action="/login" method="POST">
        @csrf
        <input type="text" value="{{old('login-username')}}" name="login-username" placeholder="Username" autocomplete="off">
        <input type="password" name="login-password" placeholder="Password">
        <button>Sign In</button>
      </form>
    @endauth
  </header>

  <main>
    {{ $slot }}
  </main>

  <footer>
    <p>Copyright &copy; {{ date('Y') }}</p>
  </footer>
</body>
</html>