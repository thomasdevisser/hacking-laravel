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
    <form action="#" method="POST">
      <input type="text" name="login-username" placeholder="Username" autocomplete="off">
      <input type="password" name="login-password" placeholder="Password">
      <button>Sign In</button>
    </form>
  </header>

  <main>
    {{ $slot }}
  </main>

  <footer>
    <p>Copyright &copy; {{ date('Y') }}</p>
  </footer>
</body>
</html>