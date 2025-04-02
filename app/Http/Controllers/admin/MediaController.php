<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MediaRequest;
use App\Models\Media;
use App\Models\Tour;
use App\Services\Media\MediaService;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

class MediaController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function create($id)
    {
        $item = Tour::findOrFail($id);
        return view('admin.media.create', compact('item'));
    }
    
    public function edit($id)
    {
        $item = Media::findOrFail($id);
        return view('admin.media.edit', compact('item'));
    }

    public function destroy($id)
    {
        $item = Media::findOrFail($id);
        $id = $item->mediable_id;
        $item->delete();
        return redirect()->route('admin.tour.show', $id);
    }

    public function store(MediaService $service, MediaRequest $request, $id)
    {
        $data = $request->validated();
        $service->create(['media' => $request->file('image')], 'tour', $id, Media::TYPE_IMAGE);
        return redirect()->route('admin.tour.show', $id);
    }

    public function update(MediaService $service, MediaRequest $request, $id)
    {   
        $tourID = Media::findOrFail($id)->mediable_id;
        $data = $request->validated();
        $service->update(['media' => $data['image']], 'tour', $tourID, Media::TYPE_IMAGE, $id);
        return redirect()->route('admin.tour.index');
    }
}