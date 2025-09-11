<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Order;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $notifications = $user->unreadNotifications;
        $messages = Contact::latest()->take(5)->get();

        $orders = Order::with(['items.product'])->latest()->take(5)->get();

        return view('dashboard.index', compact(
            'messages',
            'orders',
            'notifications'
        ));
    }
}
