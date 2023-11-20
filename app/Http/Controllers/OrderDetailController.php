<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Order;
use \App\Models\product;
use \App\Models\Order_item;
use App\Http\Livewire\OrderDetailComponent;
use Livewire\livewire;
use App;

class OrderDetailController extends Controller
{
    //
    public function show(Request $request)
    {
        $data = $request->all();

        $order = Order::where("id", $data["id"])->first();
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
}
