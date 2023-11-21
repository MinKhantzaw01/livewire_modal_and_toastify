<?php

namespace App\Livewire;

use Livewire\Component;
use App\Livewire\Forms\CustomerForm;

class CustomerCreate extends Component
{
    public CustomerForm $form;

    public $modalCustomerCreate = false;

    public function save()
    {
        $this->validate();

        $simpan = $this->form->store();

        is_null($simpan)
        ? $this->dispatch('notify', title: 'success', message: 'Complete Successfully')
        : $this->dispatch('notify', title: 'fail', message: 'Fail Not Successfully');

        $this->dispatch('dispatch-customer-create-save')->to(CustomerTable::class);
    }

    public function render()
    {
        return view('livewire.customer-create');
    }
}
