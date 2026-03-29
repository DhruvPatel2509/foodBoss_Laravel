<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function allOrders()
    {
        $orders = Orders::with('user')->orderBy('created_at', 'desc')->get();
        return view('admin.orders', compact('orders'));
    }

    public function viewOrder($id)
    {

        $order = Orders::with(['items.product', 'user'])->find($id);
        return view('admin.orderView', compact('order'));
    }
}
