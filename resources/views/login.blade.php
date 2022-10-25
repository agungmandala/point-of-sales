<!doctype html>
<html>
  <head>
    <title>POS KU</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
  </head>
  <body>
    <div class="h-screen w-screen bg-slate-100 flex justify-center items-center">
      <div class="h-96 w-1/4 bg-white rounded-md p-4 flex justify-center items-center shadow-md flex-col space-y-5">
        <p class="mb-12 text-2xl font-bold text-green-600">Login</p>
        <form action="/login" method="POST" >
          @csrf
          <input type="text" name="username" class="input" autocomplete="off" placeholder="Username" />
          <input type="password" name="password" class="input" placeholder="Password" />
          @error('login')
            <div class="mt-2 mb-2 p-4 border border-red-500 rounded-md">
              <p class="text-red-500 text-sm">{{ $message }}</p>
            </div>
          @enderror
          <div class="flex w-full mt-12">
            <button type="submit" class="btn btn-success w-full">Login</button>
          </div>
        </form>
      </div>
    </div>
  </body>
</html>