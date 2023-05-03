<div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
                @if (session()->has('message'))
                    <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3"
                         role="alert">
                        <div class="flex">
                            <div>
                                <p class="text-sm">{{ session('message') }}</p>
                            </div>
                        </div>
                    </div>
                @endif
                <button wire:click="create()"
                        class="mb-4 inline-flex justify-center rounded-md border border-transparent px-4 py-2 bg-red-600 text-base font-bold text-white shadow-sm hover:bg-red-700">
                    Create Asset Type
                </button>

                @if($isModalOpen)
                    @include('livewire.create-asset-type')
                @endif
                <table class="table-fixed w-full">
                    <thead>
                    <tr class="bg-gray-200">
                        <th class="px-4 py-2 w-20">No.</th>
                        <th class="px-4 py-2">Asset Type Name</th>
                        <th class="px-4 py-2">Status</th>
                        <th class="px-4 py-2">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($types as $type)
                        <tr>
                            <td class="border px-4 py-2">{{ $type->id }}</td>
                            <td class="border px-4 py-2">{{ $type->type_name }}</td>
                            <td class="border px-4 py-2">{{ $type->type_status}}</td>
                            <td class="border px-4 py-2">
                                <button wire:click="edit({{ $type->id }})"
                                        class="flex px-4 py-2 rounded-md border border-transparent bg-indigo-600 text-bold text-base font-bold text-white shadow-sm cursor-pointer">Edit</button>
                           </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
