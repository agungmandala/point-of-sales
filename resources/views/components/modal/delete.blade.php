<div x-show="isOpenModalDelete" id="popup-modal" tabindex="-1" class="flex justify-center items-center overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 md:inset-0 h-modal md:h-full bg-gray-500/50">
    <div class="relative p-4 w-full max-w-md h-full md:h-auto">
        <div class="relative bg-white rounded-lg shadow">
            <button x-on:click="isOpenModalDelete = false" type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg p-1.5 ml-auto inline-flex justify-center items-center h-8 w-8">
                <i class="fa-solid fa-xmark text-xl text-center"></i>
            </button>
            <div class="p-6 text-center">
                <div class="mx-auto mb-4 w-14 h-14">
                    <i class="fa-solid fa-triangle-exclamation text-red-500 text-6xl"></i>
                </div>
                <h3 class="mb-5 text-lg font-normal text-gray-500">Are you sure you want to delete this {{ $title }}?</h3>
                <button @click="{{ $onDelete }}" type="button" class="btn btn-danger mr-2">
                    Yes, I'm sure
                </button>
                <button @click="{{ $close }}" type="button" class="text-white bg-gray-400 shadow-md hover:bg-gray-500 focus:outline-none rounded-md px-4 py-2 hover:text-white focus:z-10">No, cancel</button>
            </div>
        </div>
    </div>
</div>