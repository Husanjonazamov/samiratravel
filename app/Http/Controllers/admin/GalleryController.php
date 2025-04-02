<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\GalleryRequest;
use App\Models\Gallery;
use App\Models\Media;
use App\Services\Media\MediaService;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index()
    {
        $items = Gallery::latest()->paginate(20);
        return view('admin.gallery.index', compact('items'));
    }

    public function create()
    {
        return view('admin.gallery.create');
    }
    
    public function edit($id)
    {
        $item = Gallery::findOrFail($id);
        return view('admin.gallery.edit', compact('item'));
    }

    public function destroy($id)
    {
        $item = Gallery::findOrFail($id);
        $item->delete();
        return redirect()->route('admin.gallery.index');
    }

    public function store(MediaService $service, GalleryRequest $request)
    {
        $data = $request->validated();
        $gallery = Gallery::create($data);
        $service->create(['media' => $data['image']], 'gallery', $gallery->id, Media::TYPE_IMAGE);
        return redirect()->route('admin.gallery.index');
    }

    public function update(MediaService $service, GalleryRequest $request,$id)
    {
        $data = $request->validated();
        $galleryID = Gallery::findOrFail($id)->id;
        $service->update(['media' => $data['image']], 'gallery', $galleryID, Media::TYPE_IMAGE, $galleryID);
        return redirect()->route('admin.gallery.index');
    }
}
