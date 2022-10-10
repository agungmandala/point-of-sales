<div class="flex-1 bg-white p-4 rounded-md shadow-md" x-data="{ isOpenForm: false }">
    <x-button.success title="Add" x-show="! isOpenForm" x-on:click="isOpenForm = true"/>
    <div x-show="isOpenForm" class="p-4 border-2 border-green-300 w-full sm:w-50 lg:w-96">
        <form method="POST" >
            <input type="text" placeholder="Name" class="mb-4 border-2 rounded-md p-2 w-full" />
            <textarea class="border-2 w-full p-2">Description</textarea>
            <div class="flex flex-1 flex-row justify-end mt-4">
                <div class="mr-2">
                    <x-button.success title="Save"/>
                </div>
                <button class="border-4 border-red-500 bg-red-400 hover:bg-red-500 text-white px-7 py-2 font-bold rounded-md" x-on:click="isOpenForm = false" type="button">Close</button>
            </div>
        </form>
    </div>
    <div>
        <table class="w-full">
            <thead>
                <tr>
                    <td class="p-2">Name</td>
                    <td class="p-2">Description</td>
                </tr>
            </thead>
            <tbody>
                @if($categories->count() > 0)
                    @foreach($categories as $index => $category)
                        <tr class="{{ $index % 2 === 0 ? 'bg-green-200' : '' }}">
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->description }}</td>
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
</div>