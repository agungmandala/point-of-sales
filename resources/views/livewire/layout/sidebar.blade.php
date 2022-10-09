<div class="lg:flex-1 lg:w-60 lg:bg-white sm:hidden lg:block">
    <div class="flex-1 {{ (request()->segment(1) === 'dashboard') ? 'bg-green-200' : '' }} hover:bg-green-200 w-full p-2">
        <a href="/dashboard" class="inline-block w-full h-full">Dashboard</a>
    </div>
</div>