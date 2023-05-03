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

                    <div class="mb-4">
                        <label for="exampleFormControlInput9"
                               class="block text-gray-700 text-sm font-bold mb-2">Choose Month:</label>
                        <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="exampleFormControlInput9" placeholder="Select Asset type" wire:model="month">
                            <option value="" selected disabled>Please select Month</option>
                            @foreach($months as $key => $value)
                                <option value="{{$key}}">{{$value}}</option>
                            @endforeach
                        </select>
                        @error('mobile') <span class="text-red-500">{{ $message }}</span>@enderror
                    </div>

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
                    </tr>
                    </thead>
                    <tbody>
                    @if(count($assets) > 0)
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
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="8">
                                <p class="text-center text-red-500">List of Assets will display here based on selected month</p>
                            </td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
