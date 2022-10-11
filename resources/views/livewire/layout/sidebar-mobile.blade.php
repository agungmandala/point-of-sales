<div
  x-show="isOpenSidebar"
  x-transition:enter="transition ease-in duration-300"
  x-transition:enter-start="opacity-0 scale-90"
  x-transition:enter-end="opacity-100 scale-100"
  x-transition:leave="transition ease-out duration-300"
  x-transition:leave-start="opacity-100 scale-100"
  x-transition:leave-end="opacity-0 scale-90"
  class="flex-1 w-screen bg-white z-100"
>
  <div class="flex h-12 justify-end p-2">
    <button x-on:click="isOpenSidebar = ! isOpenSidebar">X</button>
  </div>
  <div class="flex-1 {{ (request()->segment(1) === 'dashboard') ? 'bg-green-200' : '' }} hover:bg-green-200 w-full p-2">
    <a href="/dashboard" class="inline-block w-full h-full">Dashboard</a>
  </div>
  <div class="flex-1 {{ (request()->segment(1) === 'categories') ? 'bg-green-200' : '' }} hover:bg-green-200 w-full p-2">
    <a href="/categories" class="inline-block w-full h-full">Categories</a>
  </div>
</div>