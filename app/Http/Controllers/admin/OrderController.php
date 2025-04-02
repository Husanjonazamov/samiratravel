<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index()
    {
        $items = Order::latest()->paginate(20);
        return view('admin.order.index', compact('items'));
    }

    public function show($id)
    {
        $item = Order::findorfail($id);
        return view('admin.order.show', compact('item'));
    }

    public function confirmPay($id, $pay)
    {
        $item = Order::findOrFail($id);
        if ($pay == 'confirm') {
            $item->update([
                'status' => Order::STATUS_PAID
            ]);
        } elseif ($pay == 'canceled') {
            $item->update([
                'status' => Order::STATUS_CANCELED
            ]);
        } else {
            return redirect()->back();
        }
        return redirect()->route('admin.order.index');
    }

    public function destroy($id)
    {
        $item = Order::findOrFail($id);
        $item->delete();
        return redirect()->route('admin.order.index');
    }
}
