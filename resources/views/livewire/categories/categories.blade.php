<div class="h-full w-full bg-white p-4 rounded-md shadow-md overflow-y-auto" x-data="{ isOpenModal: false, isOpenModalDelete: false }">
    <x-button.success title="Add" x-on:click="isOpenModal = true" class=""/>
    <div>
        <table class="w-full">
            <thead>
                <tr>
                    <td class="p-2">Name</td>
                    <td class="p-2">Description</td>
                    <td class="p-2 text-center">Action</td>
                </tr>
            </thead>
            <tbody>
                @if($categories->count() > 0)
                    @foreach($categories as $index => $category)
                        <tr class="{{ $index % 2 === 0 ? 'bg-green-200' : '' }}">
                            <td class="p-2">{{ $category->name }}</td>
                            <td class="p-2">{{ $category->description }}</td>
                            <td>
                                <div class="flex flex-1 justify-center items-center">
                                    <button
                                        x-on:click="isOpenModalDelete = true; $wire.select(@js($category))"
                                        type="button"
                                        class="w-8 h-8 bg-red-500 hover:bg-red-600 rounded-md shadow-md flex justify-center items-center"
                                    >
                                        <i class="fa-solid fa-trash-can text-white"></i>
                                    </button>
                                    <button
                                        x-on:click="$wire.select(@js($category)), isOpenModal = true"
                                        type="button"
                                        class="w-8 h-8 bg-yellow-500 hover:bg-yellow-600 rounded-md shadow-md flex justify-center items-center ml-4"
                                    >
                                        <i class="fa-solid fa-pen-to-square text-white"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr class="bg-green-200">
                        <td colspan="3" class="text-center p-2">No data available in table</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
    <x-modal.delete title="category" close="$wire.resetAll(), isOpenModaldelete = false" onDelete="$wire.delete(), isOpenModalDelete = false"/>
    <x-modal.modal x-show="isOpenModal" close="isOpenModal = false, $wire.resetAll()" title="{{ ($category_id === '') ? 'Add new category' : 'Edit category' }}">
        <div wire:loading.class.remove="hidden" class="hidden flex flex-1 justify-center items-center">
            <p>Loading data...</p>
        </div>
        <form wire:loading.class="hidden">
            <p class="text-sm font-normal block">Name<span class="text-pink-500 text-xs">*</span></p>
            <input type="text" wire:model="name" class="border-2 focus:outline-none rounded-md p-2 w-full {{ $errors->has('name') ? 'border-pink-500 focus:border-pink-600' : 'focus:border-green-500' }}" />
            @error('name') <span class="text-pink-500 text-sm">{{ $message }}</span> @enderror
            <p class="text-sm font-normal block mt-4">Description</p>
            <textarea class="border-2 focus:outline-none w-full p-2 {{ $errors->has('description') ? 'border-pink-500 focus:border-pink-600' : 'focus:border-green-500' }}" wire:model="description">Description</textarea>
            @error('description') <span class="text-pink-500 text-sm">{{ $message }}</span> @enderror
            <div class="flex flex-1 flex-row justify-end mt-4">
                <button class="border-2 border-green-500 text-green-600 px-7 py-2 font-bold rounded-md w-full" x-on:click="isOpenModal = false, $wire.resetAll()" type="button">Close</button>
                @if($category_id === '')
                    <button type="button" @click="isOpenModal = false, $wire.save()" class="border-2 shadow-md border-green-500 bg-green-400 hover:bg-green-500 text-white px-7 py-2 font-bold rounded-md ml-2 w-full">
                        Save
                    </button>
                @else
                    <button type="button" @click="isOpenModal = false, $wire.edit()" class="border-2 shadow-md border-yellow-500 bg-yellow-400 hover:bg-yellow-500 text-white px-7 py-2 font-bold rounded-md ml-2 w-full">
                        Edit
                    </button>
                @endif
            </div>
        </form>
    </x-modal.modal>
</div>