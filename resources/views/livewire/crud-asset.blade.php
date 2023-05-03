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
                    Create Asset
                </button>

                @if($isModalOpen)
                    @include('livewire.create-asset')
                @endif
                <table class="table-fixed w-full">
                    <thead>
                    <tr class="bg-gray-200">
                        <th class="px-4 py-2 w-20">No.</th>
                        <th class="px-4 py-2">Asset Name</th>
                        <th class="px-4 py-2">Serial Number</th>
                        <th class="px-4 py-2">Asset Type</th>
                        <th class="px-4 py-2">Brand/Model</th>
                        <th class="px-4 py-2">Quantity</th>
                        <th class="px-4 py-2">Date of Purchase</th>
                        <th class="px-4 py-2">Date of Delivery</th>
                        <th class="px-4 py-2">Status</th>
                        <th class="px-4 py-2">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($assets as $asset)
                        <tr>
                            <td class="border px-4 py-2">{{ $asset->id }}</td>
                            <td class="border px-4 py-2">{{ $asset->name }}</td>
                            <td class="border px-4 py-2">{{ $asset->serial_number}}</td>
                            <td class="border px-4 py-2">{{ $asset->assetType->type_name}}</td>
                            <td class="border px-4 py-2">{{ $asset->brand}}</td>
                            <td class="border px-4 py-2">{{ $asset->quantity}}</td>
                            <td class="border px-4 py-2">{{ $asset->date_purchase}}</td>
                            <td class="border px-4 py-2">{{ $asset->delivery_date}}</td>
                            <td class="border px-4 py-2">{{ $asset->asset_status}}</td>
                            <td class="border px-4 py-2">
                                <button wire:click="edit({{ $asset->id }})"
                                        class="flex px-4 py-2 rounded-md border border-transparent bg-indigo-600 text-bold text-base font-bold text-white shadow-sm cursor-pointer">Edit</button>
                                <button wire:click="delete({{ $asset->id }})"
                                        class="flex px-4 py-2 rounded-md border border-transparent bg-red-600 text-base font-bold text-white shadow-sm cursor-pointer">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
