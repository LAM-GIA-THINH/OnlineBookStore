<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Order;

class AdminOrderEditComponent extends Component
{
    public $order_id;
    public $user_id;
    public $address;
    public $name;
    public $phone;
    public $order_status;
    public $payment_method;
    public $payment_status;
    public $sub_total;
    public $tax;
    public $shipping;
    public $amount;
    public $note;
    public $tracking;

    public function mount($order_id){
        $order = Order::find($order_id);
        $this->order_id = $order->id;
        $this->name = $order->name;
        $this->user_id = $order->user_id;
        $this->address = $order->address;
        $this->phone = $order->phone;
        $this->order_status = $order->order_status;
        $this->payment_method = $order->payment_method;
        $this->payment_status = $order->payment_status;
        $this->sub_total = number_format($order->sub_total, 0, ',', ',') . ' VND';
        $this->tax = number_format($order->tax, 0, ',', ',') . ' VND';
        $this->shipping = number_format($order->shipping, 0, ',', ',') . ' VND';
        $this->amount = number_format($order->amount, 0, ',', ',') . ' VND';
        $this->note = $order->note;
        $this->tracking = $order->tracking;
    }

    public function updateOrder()
    {
            $order = Order::find($this->order_id);
            $order->order_status = $this->order_status;
            $order->tracking = $this->tracking;
            $order->save();
    
            session()->flash('message', 'Đã cập nhật đơn hàng thành công!');
    }


    public function render()
    {
        
        return view('livewire.admin.admin-order-edit-component');
    }
}
