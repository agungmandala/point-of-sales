<!doctype html>
<html>
  <head>
    <title>POS-KU</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @livewireStyles
    @vite('resources/css/app.css')
  </head>
  <body>
    {{ $slot }}
    @livewireScripts
  </body>
</html>