<!doctype html>
<html>
  <head>
    <title>POS-KU</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
  </head>
  <body>
    <div class="h-screen w-screen bg-slate-100 flex">
      <div class="flex flex-col">
        <div class="flex w-60 h-14 p-2 justify-center items-center bg-white">
          <p>POS-KU</p>
        </div>
        <x-layout.sidebar/>
      </div>
      <div class="flex-1 flex-col">
        <x-layout.topbar/>
        <div class="flex-1 p-4">
          {{ $slot }}
        </div>
      </div>
    </div>
  </body>
</html>