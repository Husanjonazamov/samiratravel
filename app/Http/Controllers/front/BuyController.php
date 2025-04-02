<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Media;
use App\Models\Order;
use App\Models\Tour;
use App\Rules\UzbekPhone;
use App\Services\Media\MediaService;
use Illuminate\Http\Request;

class BuyController extends Controller
{
    public function show($id)
    {

        $item = Tour::findOrFail($id);
        $count=1;
        if (session('tour_id') == $id) {
            if (session()->has('count')) {
                $count = session('count') + 1;
                session(['count' => $count]);
            } else
                $count = 1;
        }
        return view('front.buy.index', compact('item','count'));
    }

    public function confirmPay(Order $id)
    {
        $order=$id;
        $payme_url = $this->generateUrl($order);
        return view('front.buy.payme', compact('order', 'payme_url'));
    }

    public function store(Request $request, Tour $id, MediaService $service)
    {
        $tour=$id;
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => ['required', new UzbekPhone()],
            'count' => 'nullable|integer|min:1',
        ]);
        session([
            'tour_id' => $tour->id,
            'count' => $request->count,
        ]);

        $order = Order::create([
            'tour_id' => $tour->id,
            'name' => $data['name'],
            'phone' => $data['phone'],
            'total_price' => $tour->price * ($data['count'] ?? 1),
            'count' => $data['count'] ?? 1,
            'status' => Order::STATUS_NEW
        ]);

        return redirect()->route('buy.confirmPay', $order->id)->with('success', __('Order completed successfully'));
    }

    public function generateUrl($order)
    {
        $payme_url = 'https://checkout.paycom.uz/';
        $merchant_id = '625581048a3ae29b70637f95';
        $order_id = $order->id;
        $amount = $order->total_price * 100;
        $payme_url .= base64_encode(
            "m=$merchant_id;ac.order_id=$order_id;a=$amount;l=" . app()->getLocale() .';'.
            "ds.items.0.title=" . $order->tour->title .';'.
            "ds.items.0.price=" . $order->tour->price .';'.
            "ds.items.0.count=" . $order->count .';'.
            "ds.items.0.code=" . $order->tour->id);
        return $payme_url;
    }
}
