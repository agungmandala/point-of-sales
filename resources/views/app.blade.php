<!doctype html>
<html>
  <head>
    <title>POS-KU</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @livewireStyles
    @vite('resources/css/app.css')
    <style>
      [x-cloak] { display: none !important; }
    </style>
  </head>
  <body>
    <div class="flex h-screen w-screen bg-slate-100" x-cloak x-data="{ isOpenSidebar: false }">
      <div class="flex flex-col">
        <div class="w-60 h-14 p-2 justify-center items-center bg-white hidden sm:flex">
          <p class="font-bold text-green-600">POS-KU</p>
        </div>
        <livewire:layout.sidebar/>
        <livewire:layout.sidebar-mobile/>
      </div>
      <div class="flex flex-1 flex-col">
        <livewire:layout.topbar/>
        <div class="flex flex-1 p-4 overflow-y-auto">
          {{ $slot }}
        </div>
      </div>
    </div>
    @livewireScripts
    @vite('resources/js/app.js')
  </body>
</html>