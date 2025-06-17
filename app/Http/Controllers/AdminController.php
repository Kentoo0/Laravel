<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;

class AdminController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();
        $totalOrders = Order::count();
        
        // Tambahkan semua transaksi lengkap dengan relasi
        $orders = Order::with('user', 'orderItems.product')->latest()->get();

        return view('dashboard', compact('totalUsers', 'totalOrders', 'orders'));
    }
}
