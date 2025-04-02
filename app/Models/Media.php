<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;

class Media extends Model
{
    use HasFactory;


    const TYPE_AVATAR = 'avatar';
    const TYPE_VIDEO = 'video';
    const TYPE_AUDIO = 'audio';
    const TYPE_GALLERY = 'gallery';
    const TYPE_THUMBNAIL = 'thumbnail';
    const TYPE_BANNER='banner';
    const TYPE_IMAGE='image';

    protected $fillable = [
        'model',
        'size',
        'mime_type',
        'url',
        'type',
        'path',
        'mediable_id',
        'mediable_type',

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'path',
        'mediable_id',
        'mediable_type',
        'model'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'size' => 'int'
    ];

    /**
     * Get the owning mediable model.
     */
    public function mediable()
    {
        return $this->morphTo();
    }

    public function setMediableTypeAttribute($value)
    {
        $this->attributes['mediable_type'] = 'App\Models\\' . Str::of($value)->singular()->ucfirst();
        $this->attributes['model'] = $value;
    }


    public static function uploadFile(UploadedFile $file, $model,$id)
    {
        return $file->storeAs("/public/$model/".$id, time() . '_'
            . str_replace(' ', '_', $file->getClientOriginalName()));
    }
}
