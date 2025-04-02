<?php

namespace App\Models;

use App\Casts\TranslatableJson;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Footer extends Model
{
    use HasFactory;
    protected $fillable = [
        'title', 'description', 'address',
        'phone', 'email'
    ];

    protected $casts=[
      'title'=>TranslatableJson::class,
      'description'=>TranslatableJson::class,
      'address'=>TranslatableJson::class,
    ];

}
