<div class="flex-1 bg-white p-4 rounded-md shadow-md" x-data="{ isOpenForm: false }">
    <x-button.success x-show="! isOpenForm" x-on:click="isOpenForm = true"/>
    <div x-show="isOpenForm" class="p-4 border-2 border-green-300 w-full sm:w-50 lg:w-96  mt-4">
        <input type="text" placeholder="Name" class="mb-4 border-2 rounded-md p-2 w-full" />
        <textarea class="border-2 w-full p-2">Description</textarea>
    </div>
</div>