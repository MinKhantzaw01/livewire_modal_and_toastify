<div>
    <x-select wire:model.live="paginate" class="text-xs mt-8">
        <option value="5">5</option>
        <option value="10">10</option>
        <option value="25">25</option>
        <option value="50">50</option>
        <option value="100">100</option>
    </x-select>
    <table class="w-full mt-2">
        <thead>
            <tr>
                <th class="p-2 whitespace-nowrap border border-spacing-1">#</th>
                <th class="p-2 whitespace-nowrap border border-spacing-1">Action</th>
                <th @click="$wire.sortField('id')" class="p-2 whitespace-nowrap border border-spacing-1 cursor-pointer">
                    <x-sort :$sortDirection :$sortBy :field="'id'" /> ID
                </th>
                <th @click="$wire.sortField('name')"
                    class="p-2 whitespace-nowrap border border-spacing-1 cursor-pointer">
                    <x-sort :$sortDirection :$sortBy :field="'name'" />Name
                </th>
                <th @click="$wire.sortField('email')"
                    class="p-2 whitespace-nowrap border border-spacing-1 cursor-pointer">
                    <x-sort :$sortDirection :$sortBy :field="'email'" />Email
                </th>
                <th @click="$wire.sortField('address')"
                    class="p-2 whitespace-nowrap border border-spacing-1 cursor-pointer">
                    <x-sort :$sortDirection :$sortBy :field="'address'" />Address
                </th>
            </tr>
            <tr>
                <td class="p-2 border border-spacing-1"></td>
                <td class="p-2 border border-spacing-1"></td>
                <td class="p-2 border border-spacing-1"><x-input wire:model.live="form.id" type="search"
                        class="w-full text-sm" /></td>
                <td class="p-2 border border-spacing-1"><x-input wire:model.live="form.name" type="search"
                        class="w-full text-sm" /></td>
                <td class="p-2 border border-spacing-1"><x-input wire:model.live="form.email" type="search"
                        class="w-full text-sm" /></td>
                <td class="p-2 border border-spacing-1"><x-input wire:model.live="form.address" type="search"
                        class="w-full text-sm" /></td>
            </tr>
        </thead>
        <tbody>
            @isset($data)
                @foreach ($data as $customer)
                    <tr>
                        <td class="p-2 border border-spacing-1 text-center">{{ $loop->iteration }}</td>
                        <td class="p-2 border border-spacing-1">
                            <x-button class="mr-3"
                                @click="$dispatch('dispatch-customer-table-edit',{ id: '{{ $customer->id }}'
                            })"
                                type="button">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit"
                                    width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" />
                                    <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" />
                                    <path d="M16 5l3 3" />
                                </svg>
                            </x-button>
                            <x-button
                                @click="$dispatch('dispatch-customer-table-delete',{ id: '{{ $customer->id }}', name: '{{ $customer->name }}' })">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash-x"
                                    width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M4 7h16" />
                                    <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                    <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                    <path d="M10 12l4 4m0 -4l-4 4" />
                                </svg>
                            </x-button>
                        </td>
                        <td class="p-2 border border-spacing-1 text-center">{{ $customer->id }}</td>
                        <td class="p-2 border border-spacing-1 text-center">{{ $customer->name }}</td>
                        <td class="p-2 border border-spacing-1 text-center">{{ $customer->email }}</td>
                        <td class="p-2 border border-spacing-1 text-center">{{ $customer->address }}</td>
                    </tr>
                @endforeach
            @endisset
        </tbody>
    </table>
    <div class="mt-3">{{ $data->onEachSide(1)->links() }}</div>
</div>
