<div class="flex h-14 bg-white items-center p-2 sm:justify-between lg:justify-end">
  <button x-on:click="isOpenSidebar = ! isOpenSidebar" class="lg:hidden">open</button>
  <div class="flex flex-row w-80 justify-end items-center">
    <p class="mr-2 text-gray-800">Hello, {{ session('name') }}</p>
    <a class="btn btn-outlined-success" href="/logout">Logout</a>
  </div>
</div>