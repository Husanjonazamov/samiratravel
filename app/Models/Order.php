<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    const STATUS_NEW = 'new';
    const STATUS_PAID = 'paid';
    const STATUS_CANCELED = 'canceled';

    protected $fillable = [
        'name',
        'phone',
        'tour_id',
        'count',
        'total_price',
        'payment_method',
        'status'
    ];

    protected $casts = [
        'count' => 'integer',
        'total_price' => 'float'
    ];

    public function tour()
    {
        return $this->belongsTo(Tour::class);
    }
}
