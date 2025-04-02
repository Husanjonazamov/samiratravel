<?php

namespace App\Models;

use App\Casts\TranslatableJson;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'position',
    ];
    protected $casts = [
        'name' => TranslatableJson::class,
        'description' => TranslatableJson::class,
        'position' => 'integer',
    ];

    public function media()
    {
        return $this->morphMany(Media::class, 'mediable');
    }
    public function image()
    {
        return $this->morphOne(Media::class, 'mediable')
            ->where('type', Media::TYPE_IMAGE);
    }

    public function video()
    {
        return $this->morphOne(Media::class, 'mediable')
            ->where('type', Media::TYPE_VIDEO);
    }
    public function audio()
    {
        return $this->morphOne(Media::class, 'mediable')
            ->where('type', Media::TYPE_AUDIO);
    }

}
