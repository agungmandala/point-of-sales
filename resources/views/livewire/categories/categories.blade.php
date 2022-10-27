<div class="h-full w-full bg-white p-4 rounded-md shadow-md overflow-y-auto" x-data="{ isOpenModal: @entangle('showModal'), isOpenModalDelete: @entangle('showModalDelete') }">
    <button class="btn btn-success" x-on:click="isOpenModal = true">Add</button>
    <div>
        <table class="w-full">
            <thead>
                <tr>
                    <td class="p-2 font-bold text-gray-700">Name</td>
                    <td class="p-2 font-bold text-gray-700">Description</td>
                    <td class="p-2 text-center font-bold text-gray-700">Action</td>
                </tr>
            </thead>
            <tbody>
                @if($categories->count() > 0)
                    @foreach($categories as $index => $category)
                        <tr class="{{ $index % 2 === 0 ? 'bg-green-200' : '' }}">
                            <td class="p-2 text-gray-800">{{ $category->name }}</td>
                            <td class="p-2 text-gray-800">{{ $category->description }}</td>
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
    {{-- Modal delete category start --}}
    <x-modal x-show="isOpenModalDelete">
        <button
            @click="$wire.resetAll()"
            type="button"
            class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg p-1.5 ml-auto inline-flex justify-center items-center h-8 w-8"
        >
            <i class="fa-solid fa-xmark text-xl text-center"></i>
        </button>
        <div class="p-6 text-center">
            <div class="mx-auto mb-4 w-14 h-14">
                <i class="fa-solid fa-triangle-exclamation text-red-500 text-6xl"></i>
            </div>
            <h3 class="mb-5 text-lg font-normal text-gray-500">Are you sure you want to delete this category?</h3>
            <button @click="$wire.delete()" type="button" class="btn btn-danger mr-2">
                Yes, I'm sure
            </button>
            <button @click="$wire.resetAll()" type="button" class="btn-default">No, cancel</button>
        </div>
    </x-modal>
    {{-- Modal delete category end --}}
    {{-- Modal category start --}}
    <x-modal x-show="isOpenModal">
        <div class="flex flex-1 pt-4 px-6">
            <p class="font-bold text-gray-700">
                {{ ($category_id === '') ? 'Add New Category' : 'Edit Category' }}
            </p>
            <button
                @click="$wire.resetAll()"
                type="button"
                class="top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg p-1.5 ml-auto inline-flex justify-center items-center h-8 w-8">
                <i class="fa-solid fa-xmark text-xl text-center"></i>
            </button>
        </div>
        <div class="p-6 pt-2">
            <form>
                <div class="mb-4">
                    <p class="text-sm block text-gray-800">Name<span class="text-pink-500 text-xs">*</span></p>
                    <input type="text" wire:model="name" placeholder="Category name" class="input {{ $errors->has('name') ? 'border-pink-500 focus:border-pink-600' : 'focus:border-green-500' }}" />
                    @error('name') <span class="text-pink-500 text-sm">{{ $message }}</span> @enderror
                </div>
                <div>
                    <p class="text-sm block text-gray-800">Description</p>
                    <textarea
                        class="input {{ $errors->has('description') ? 'border-pink-500 focus:border-pink-600' : 'focus:border-green-500' }}"
                        wire:model="description"
                        placeholder="Description"
                    >
                    </textarea>
                    @error('description') <span class="text-pink-500 text-sm">{{ $message }}</span> @enderror
                </div>
                <div class="flex flex-1 flex-row justify-end mt-4">
                    <button class="btn-default" x-on:click="$wire.resetAll()" type="button">Close</button>
                    @if($category_id === '')
                        <button type="button" @click="$wire.save()" class="btn btn-success ml-2">
                            Save
                        </button>
                    @else
                        <button type="button" @click="$wire.edit()" class="btn btn-warning ml-2">
                            Edit
                        </button>
                    @endif
                </div>
            </form>
        </div>
    </x-modal>
    {{-- Modal category end --}}
</div>