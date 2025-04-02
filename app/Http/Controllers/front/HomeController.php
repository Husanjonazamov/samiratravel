<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\Page;
use App\Models\Tour;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $tours=Tour::query()
            ->active()
            ->with('image')
            ->orderBy('position', 'desc')
            ->orderBy('id', 'desc');
        $sliders= $tours->slider()->get();
        $bests=$tours->best()->get();
        $famouses=$tours->famous()->get();
        $galaries = Gallery::all();

        return view('front.index', compact('sliders', 'galaries','famouses','bests'));
    }

    public function about()
    {
        $page=Page::query()->where('slug', 'about-us')->firstOrFail();
        return view('front.pages.about',compact('page'));
    }
}
