<div class="hidden md:block md:flex-1 md:w-60 bg-white">
    <div class="flex-1 {{ (request()->segment(1) === 'dashboard') ? 'bg-green-200' : '' }} hover:bg-green-200 w-full p-2">
        <a href="/dashboard" class="inline-block w-full h-full text-gray-800">Dashboard</a>
    </div>
    <div class="flex-1 {{ (request()->segment(1) === 'categories') ? 'bg-green-200' : '' }} hover:bg-green-200 w-full p-2">
        <a href="/categories" class="inline-block w-full h-full text-gray-800">Categories</a>
    </div>
</div>