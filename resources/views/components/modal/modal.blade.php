<div {{ $attributes }} tabindex="-1" class="flex h-screen justify-center items-center overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 md:inset-0 h-modal md:h-full bg-gray-500/50">
    <div class="relative p-4 w-full max-w-md h-full md:h-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow">
            <div class="flex flex-1 pt-4 px-6">
                <p class="font-bold text-black">{{ $title }}</p>
                <button @click="{{ $close }}" type="button" class="top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg p-1.5 ml-auto inline-flex justify-center items-center h-8 w-8">
                    <i class="fa-solid fa-xmark text-xl text-center"></i>
                </button>
            </div>
            <div class="p-6 pt-2">
                {{ $slot }}
            </div>
        </div>
    </div>
</div> 