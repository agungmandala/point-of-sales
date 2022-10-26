<div class="h-full w-full bg-white p-4 rounded-md shadow-md overflow-y-auto" x-data="{ isOpenModal: false, isOpenModalDelete: false }">
    <button class="btn btn-success" x-on:click="isOpenModal = true">Add</button>
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
    <x-modal.delete title="category" close="$wire.resetAll(), isOpenModalDelete = false" onDelete="$wire.delete(), isOpenModalDelete = false"/>
    <x-modal.modal x-show="isOpenModal">
        <div class="flex flex-1 pt-4 px-6">
            <p class="font-bold text-black">
                {{ ($category_id === '') ? 'Add New Category' : 'Edit Category' }}
            </p>
            <button
                @click="isOpenModal = false, $wire.resetAll()"
                type="button"
                class="top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg p-1.5 ml-auto inline-flex justify-center items-center h-8 w-8">
                <i class="fa-solid fa-xmark text-xl text-center"></i>
            </button>
        </div>
        <div class="p-6 pt-2">
            <form>
                <p class="text-sm font-normal block">Name<span class="text-pink-500 text-xs">*</span></p>
                <input type="text" wire:model="name" placeholder="Category name" class="input {{ $errors->has('name') ? 'border-pink-500 focus:border-pink-600' : 'focus:border-green-500' }}" />
                @error('name') <span class="text-pink-500 text-sm">{{ $message }}</span> @enderror
                <p class="text-sm font-normal block">Description</p>
                <textarea
                    class="input {{ $errors->has('description') ? 'border-pink-500 focus:border-pink-600' : 'focus:border-green-500' }}"
                    wire:model="description"
                    placeholder="Description"
                >
                </textarea>
                @error('description') <span class="text-pink-500 text-sm">{{ $message }}</span> @enderror
                <div class="flex flex-1 flex-row justify-end mt-4">
                    <button class="btn-default" x-on:click="isOpenModal = false, $wire.resetAll()" type="button">Close</button>
                    @if($category_id === '')
                        <button type="button" @click="isOpenModal = false, $wire.save()" class="btn btn-success ml-2">
                            Save
                        </button>
                    @else
                        <button type="button" @click="isOpenModal = false, $wire.edit()" class="btn btn-warning ml-2">
                            Edit
                        </button>
                    @endif
                </div>
            </form>
        </div>
    </x-modal.modal>
</div>