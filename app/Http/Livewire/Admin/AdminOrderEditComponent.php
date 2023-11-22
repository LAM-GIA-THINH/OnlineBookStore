<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Order;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use App\Mail\ShippingNotification;

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
        $this->orderItems = session('orderItems');
        $this->products = session('products');
        $this->order = session('order');
    }

    public function updateOrder()
    {
        $order = Order::find($this->order_id);
        $previousStatus = $order->order_status;

        // Update the order status
        $order->order_status = $this->order_status;
        $order->tracking = $this->tracking;
        $order->save();

        // Check if the order status is now "Đang giao hàng"
        if (in_array($this->order_status, ['2', '3', '4']) && $previousStatus !== $this->order_status) {
            // Fetch the associated user's email from the User model using the relationship
            $userEmail = $order->user->email;
        
            // Send the shipping email
            Mail::to($userEmail)->send(new ShippingNotification($order));
        }        
        session()->flash('message', 'Đã cập nhật đơn hàng thành công!');
    }


    public function render()
    {
        
        return view('livewire.admin.admin-order-edit-component' ,['order' => $this->order,'orderItems' => $this->orderItems, 'products'=>$this->products]);
    }
}
