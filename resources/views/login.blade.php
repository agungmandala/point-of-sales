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
        <p class="mb-12 text-2xl font-bold">Login</p>
        <input type="text" class="mb-4 border-2 rounded-md p-2 w-full" placeholder="Username" />
        <input type="password" class="mb-4 border-2 rounded-md p-2 w-full" placeholder="Password" />
        <button class="bg-green-400 hover:bg-green-500 p-3 rounded-md mt-8 font-bold w-40 text-white">Login</button>
      </div>
    </div>
  </body>
</html>