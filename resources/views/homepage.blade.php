<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ $pageTitle }}</title>
</head>
<body>
  <h1>Hi from Blade!</h1>
  <p>Copyright {{ date('Y') }}</p>

  <ul>
    @foreach($posts as $post)
      <li>{{ $post }}</li>
    @endforeach
  </ul>
</body>
</html>