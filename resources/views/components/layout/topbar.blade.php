<div class="flex h-14 bg-white items-center p-2 justify-end">
  <p class="mr-2">Hello, {{ session('name') }}</p>
  <div class="border-2 border-green-300 p-2 rounded-md flex items-center">
    <a class="font-bold no-underline inline-block" href="/logout">Logout</a>
  </div>
</div>