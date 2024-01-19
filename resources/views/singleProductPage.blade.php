<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <title>Komparas</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/fontawesome.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" />
  @vite('resources/css/app.css')
</head>

<body>
  @include('components.navbar')
  @include('components.upperproduct')
  @include('components.footer')
  <script type="module" src="{{ mix('resources/js/home.js') }}"></script>
</body>
</html>