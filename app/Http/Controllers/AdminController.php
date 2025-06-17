<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;

class AdminController extends Controller
{
    public function index()
{
    $orders = Order::with(['user', 'orderItems.product'])->latest()->get();

    return view('dashboard', [
        'orders' => $orders,
        'totalUsers' => User::count(),
        'totalOrders' => Order::count(),
    ]);
}
}