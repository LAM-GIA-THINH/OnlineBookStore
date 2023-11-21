<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Order;
use \App\Models\product;
use \App\Models\Order_item;
use App\Http\Livewire\OrderDetailComponent;
use App\Http\Livewire\CheckoutComponent;
use Livewire\livewire;
use App;

class OrderController extends Controller
{
    //
    public function show(Request $request, $order_id)
    {
        $order = Order::where("id", $order_id)->first();
        if ($order) {
            $orderItems = Order_Item::where('order_id', $order->id)->get();
            $products = [];

            foreach ($orderItems as $value) {
                $products[$value->product_id] = Product::where('id', $value->product_id)->first();
            }

            session(['order' => $order]);
            session(['orderItems' => $orderItems]);
            session(['products' => $products]);

            return App::call(OrderDetailComponent::class);
        }

        return redirect(route('shop'));
    }

    public function cancel(Request $request, $order_id)
    {
        $order = Order::where('id', $order_id)->first();
        if ($order) {
            $orderItems = Order_Item::where('order_id', $order_id)->get();
            foreach ($orderItems as $value) {
                product::where('id', $value->product_id)->increment('quantity', $value->quantity);
            }
            $order->order_status = 4;
            $order->save();
            return redirect(route('order.detail.view', ['order_id' => $order_id]));
        }
        return redirect(route('shop'));
    }
}
