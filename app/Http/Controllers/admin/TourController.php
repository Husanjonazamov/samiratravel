<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TourRequest;
use App\Models\Tour;
use Illuminate\Http\Request;

class TourController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index()
    {
        $items = Tour::latest()->paginate(20);
        return view('admin.tour.index', compact('items'));
    }

    public function create()
    {
        return view('admin.tour.create');
    }

    public function show($id)
    {
        $item = Tour::findOrFail($id);
        return view('admin.tour.show', compact('item'));
    }
    
    public function edit($id)
    {
        $item = Tour::findOrFail($id);
        return view('admin.tour.edit', compact('item'));
    }

    public function destroy($id)
    {
        $item = Tour::findOrFail($id);
        $item->delete();
        return redirect()->route('admin.tour.index');
    }

    public function store(TourRequest $request)
    {
        $data = $request->validated();
        Tour::create($data);
        return redirect()->route('admin.tour.index');
    }

    public function update(TourRequest $request,$id)
    {
        $data = $request->validated();
        Tour::findOrFail($id)->update($data);
        return redirect()->route('admin.tour.show', $id);
    }
}
