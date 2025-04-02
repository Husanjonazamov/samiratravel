<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;

use App\Models\Tour;
use Illuminate\Http\Request;

class TourController extends Controller
{
    public function index()
    {
        $items = Tour::all();
        return view('front.tours.index', compact('items'));
    }

    public function show($id)
    {
        $item = Tour::findOrFail($id);
        return view('front.tours.show', compact('item'));
    }
}
