<?php

namespace App\Http\Livewire;

use Livewire\Component;

class PaymentResultComponent extends Component
{
    public function mount()
    {
        $this->message = session('message');
    }
    public function render()
    {
        return view('livewire.payment-result-component', ['message' => $this->message]);
    }
}   
