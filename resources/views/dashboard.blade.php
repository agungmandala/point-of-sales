<!doctype html>
<html>
  <head>
    <title>Laravel Tailwindcss</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
  </head>
  <body>
    <div class="h-screen w-screen bg-slate-100 flex justify-center items-center">
      <div class="h-96 w-1/4 bg-white rounded-md p-4 flex justify-center items-center shadow-md flex-col">
        <p class="mb-12 text-2xl font-bold text-green-600">Welcome, {{ session('name') }}</p>
      </div>
    </div>
  </body>
</html>