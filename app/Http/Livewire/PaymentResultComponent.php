<?php

namespace App\Http\Livewire;

use Livewire\Component;

class PaymentResultComponent extends Component
{
    public function mount()
    {
        $this->message = session('message');
        $this->orderId = session('order_id');
    }
    public function render()
    {
        return view('livewire.payment-result-component', ['message' => $this->message, 'order_id' => $this->orderId]);
    }
}
