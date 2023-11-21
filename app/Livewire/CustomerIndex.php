<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\View\View;
use Livewire\Attributes\Title;

class CustomerIndex extends Component
{
    #[Title('Customer')]
    public function render() : View
    {
        return view('livewire.customer-index');
    }
}
