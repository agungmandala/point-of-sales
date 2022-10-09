<div class="flex h-14 bg-white items-center p-2 sm:justify-between lg:justify-end">
  <button x-on:click="isOpenSidebar = ! isOpenSidebar" class="lg:hidden">open</button>
  <div class="flex flex-row w-80 justify-end items-center">
    <p class="mr-2">Hello, {{ session('name') }}</p>
    <div class="border-2 border-green-300 p-2 rounded-md flex items-center w-20">
      <a class="font-bold no-underline inline-block" href="/logout">Logout</a>
    </div>
  </div>
</div>