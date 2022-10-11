<div class="h-full w-full bg-white p-4 rounded-md shadow-md overflow-y-auto" x-data="{ isOpenForm: false, isOpenModalDelete: false }">
    <x-button.success title="Add" x-show="! isOpenForm" x-on:click="isOpenForm = true" class=""/>
    <div x-show="isOpenForm" class="p-4 border-2 border-green-300 w-full sm:w-50 lg:w-96">
        <form wire:submit.prevent="save">
            <p>Name<span class="text-pink-500 text-xs">*</span></p>
            <input type="text" wire:model="name" class="border-2 focus:outline-none rounded-md p-2 w-full {{ $errors->has('name') ? 'border-pink-500 focus:border-pink-600' : 'focus:border-green-500' }}" />
            @error('name') <span class="text-pink-500 text-sm">{{ $message }}</span> @enderror
            <p class="mt-4">Description</p>
            <textarea class="border-2 focus:outline-none w-full p-2 {{ $errors->has('description') ? 'border-pink-500 focus:border-pink-600' : 'focus:border-green-500' }}" wire:model="description">Description</textarea>
            @error('description') <span class="text-pink-500 text-sm">{{ $message }}</span> @enderror
            <div class="flex flex-1 flex-row justify-end mt-4">
                <button class="border-2 border-green-500 text-green-600 px-7 py-2 font-bold rounded-md w-full" x-on:click="isOpenForm = false; $wire.resetAll()" type="button">Close</button>
                <x-button.success type="submit" title="Save" class="ml-2 w-full"/>
            </div>
        </form>
    </div>
    <div>
        <table class="w-full">
            <thead>
                <tr>
                    <td class="p-2">Name</td>
                    <td class="p-2">Description</td>
                    <td class="p-2">Action</td>
                </tr>
            </thead>
            <tbody>
                @if($categories->count() > 0)
                    @foreach($categories as $index => $category)
                        <tr class="{{ $index % 2 === 0 ? 'bg-green-200' : '' }}">
                            <td class="p-2">{{ $category->name }}</td>
                            <td class="p-2">{{ $category->description }}</td>
                            <td><button x-on:click="isOpenModalDelete = true; $wire.select(@js($category))" type="button">Open</button></td>
                        </tr>
                    @endforeach
                @else
                    <tr class="bg-green-200">
                        <td colspan="2" class="text-center p-2">No data available in table</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
    <x-modal.delete title="category" onDelete="$wire.test(), isOpenModalDelete = false"/>
</div>