<?php

namespace App\Models;

use App\Casts\TranslatableJson;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'location',
        'time',
        'price',
        'status',
        'type',
        'slider',
        'best',
        'famous',
        'position',
        'special',
        'star',
        'slider',
        'best',
        'famous',
        'slug'
    ];
    protected $casts = [
        'title' => TranslatableJson::class,
        'description' => TranslatableJson::class,
        'price' => 'float',
        'status' => 'boolean',
        'slider'=> 'boolean',
        'best'=> 'boolean',
        'famous'=> 'boolean',
    ];

    public function media()
    {
        return $this->morphMany(Media::class, 'mediable');
    }

    public function scopeActive($query)
    {
        return $query->where('status', true)->orderBy('position', 'desc');
    }

    public function scopeSlider($query)
    {
        return $query->where('slider', true);
    }

    public function scopeBest($query)
    {
        return $query->where('best', true);
    }

    public function scopeFamous($query)
    {
        return $query->where('famous', true);
    }

    public function image()
    {
        return $this->morphOne(Media::class, 'mediable')
            ->where('type', Media::TYPE_IMAGE);
    }

    public function gallery()
    {
        return $this->morphMany(Media::class, 'mediable')
            ->where('type', Media::TYPE_GALLERY);
    }

    public function getPriceSmallAttribute()
    {
        $len = strlen((string)($this->price));
        if ($len > 6)
            return (int)($this->price / 1000000) . ' ' . __('mln');
        if ($len > 3)
            return (int)($this->price / 1000) . ' ' . __('thousand');
        return $this->price;
    }
    public function getPriceFormattedAttribute()
    {
        return number_format($this->price, 0, '', ',');
    }

}
