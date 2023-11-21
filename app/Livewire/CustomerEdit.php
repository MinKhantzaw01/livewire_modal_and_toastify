<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Customer;
use Livewire\Attributes\On;
use App\Livewire\Forms\CustomerForm;

class CustomerEdit extends Component
{
    public CustomerForm $form;

    public $modalCustomerEdit = false;

    #[On('dispatch-customer-table-edit')]
    public function set_customer(Customer $id)
    {
        $this->form->setCustomer($id);

        $this->modalCustomerEdit = true;
    }

    public function edit()
    {
        $this->validate();

        $update = $this->form->update();

        is_null($update)
        ? $this->dispatch('notify', title: 'success', message: 'Update Complete Successfully')
        : $this->dispatch('notify', title: 'fail', message: 'Update Fail Not Successfully');

        $this->dispatch('dispatch-customer-create-edit')->to(CustomerTable::class);
    }

    public function render()
    {
        return view('livewire.customer-edit');
    }
}
