<div>

    <x-dialog-modal wire:model.live="modalCustomerDelete">
        <x-slot name="title">
            Form Delete Customer
        </x-slot>

        <x-slot name="content">
            <p>Are you sure Delete ID: {{ $id }} and Name: {{ $name }}?</p>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button @click="$wire.set('modalCustomerDelete',false)" wire:loading.attr="disabled">
                Cancel
            </x-secondary-button>

            <x-button @click="$wire.del()" class="ms-3" wire:loading.attr="disabled">
                Delete
            </x-button>
        </x-slot>
    </x-dialog-modal>
</div>
