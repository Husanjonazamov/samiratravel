<?php

namespace App\Models;

use App\Casts\TranslatableJson;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'keywords',
        'slug',
    ];
    protected $casts = [
        'title' => TranslatableJson::class,
        'description' => TranslatableJson::class,
    ];

    public function media()
    {
        return $this->morphMany(Media::class, 'mediable');
    }

    public function banner()
    {
        return $this->morphOne(Media::class, 'mediable')
            ->where('type', Media::TYPE_BANNER);
    }
}
