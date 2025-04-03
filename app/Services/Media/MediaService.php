<?php

namespace App\Services\Media;


use App\Jobs\Media\DeleteOriginalImage;
use App\Models\Media;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Str;


class MediaService
{
    public function createFile(array $attributes, $type, $modelName = 'tours',$mediable_id = null)
    {
        $uploadedFile = Media::uploadFile($attributes['media'], $modelName,$mediable_id);

        $media = Media::create([
            'model' => $modelName,
            'mediable_id' => $mediable_id,
            'mediable_type' => $modelName,
            'type' => $type,
            'size' => $attributes['media']->getSize(),
            'mime_type' => $attributes['media']->getClientMimeType(),
            'url' => config('app.url') . Str::replaceFirst('public', '/storage', $uploadedFile),
            'path' => '/' . $uploadedFile,
        ]);

        return $media;
    }
    public function create(array $attributes, $model, $mediable_id, $type)
    {
        $mediaExtensions = [
            'jpg',
            'jpeg',
            'png',
            'svg'
        ];
        $uploadedFile = Media::uploadFile($attributes['media'], $model,$mediable_id);
        $media = $mediable_id
            ? Media::where('model', $model)
                ->where('mediable_id', $mediable_id)
                ->where('type', $type)->first()
            : null;
        if(!str_contains(config('app.url'),'http'))
            $siteUrl = 'https://'.config('app.url');
        else
            $siteUrl = config('app.url');
        if($media) {

            $this->deleteFile($media);


            $media->update([
                'size' => $attributes['media']->getSize(),
                'mime_type' => $attributes['media']->getClientMimeType(),
                'url' => $siteUrl . Str::replaceFirst('public', '/storage', $uploadedFile),
                'path' => '/'.$uploadedFile,
            ]);
        } else {
            $media = Media::create([
                'model' => $model,
                'mediable_id' => $mediable_id,
                'mediable_type' => $model,
                'type' => $type,
                'size' => $attributes['media']->getSize(),
                'mime_type' => $attributes['media']->getClientMimeType(),
                'url' => $siteUrl . Str::replaceFirst('public', '/storage', $uploadedFile),
                'path' => '/' . $uploadedFile,
            ]);
        }


        return $media;
    }
    public function update(array $attributes, $model, $mediable_id, $type, $idMedia)
    {
        $mediaExtensions = [
            'jpg',
            'jpeg',
            'png',
            'svg'
        ];
        $uploadedFile = Media::uploadFile($attributes['media'], $model,$mediable_id);
        $media = $mediable_id
            ? Media::where('model', $model)
                ->where('mediable_id', $mediable_id)
                ->where('type', $type)->first()
            : null;
        if(!str_contains(config('app.url'),'http'))
            $siteUrl = 'https://'.config('app.url');
        else
            $siteUrl = config('app.url');
        if($media) {

            $this->deleteFile($media);


            $media->update([
                'size' => $attributes['media']->getSize(),
                'mime_type' => $attributes['media']->getClientMimeType(),
                'url' => $siteUrl . Str::replaceFirst('public', '/storage', $uploadedFile),
                'path' => '/'.$uploadedFile,
            ]);
        } else {
            $media = Media::findOrFail($idMedia)->update([
                'model' => $model,
                'mediable_id' => $mediable_id,
                'mediable_type' => $model,
                'type' => $type,
                'size' => $attributes['media']->getSize(),
                'mime_type' => $attributes['media']->getClientMimeType(),
                'url' => $siteUrl . Str::replaceFirst('public', '/storage', $uploadedFile),
                'path' => '/' . $uploadedFile,
            ]);
        }


        return $media;
    }



    public function delete($media)
    {
        if($media instanceof Collection) {
            foreach ($media as $medium) {
                $this->deleteFile($medium);
            }
            Media::query()->whereIn('id', $media->pluck('id'))->delete();
        }
        else {

            $this->deleteFile($media);

            $media->delete();
        }
    }

    private function deleteFile(Media $media)
    {

            DeleteOriginalImage::dispatch($media);
    }



    public function download($post)
    {
        if($post->media->isEmpty())
            return redirect()->back();
        $zipfile='download_'.time() .'.zip';
        $zip = new \ZipArchive();
        $zip->open($zipfile, \ZipArchive::CREATE | \ZipArchive::OVERWRITE);
        $path = storage_path('app');
        foreach ($post->media as $media){
            $file=$path.$media->path;
            $zip->addFile($file,basename($file));
        }
        $zip->close();
        $post->update(['downloads'=>$post->downloads+1]);
        return response()->download($zipfile)->deleteFileAfterSend(true);
    }
}
