<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\License;

class License extends Model
{
    protected $fillable = ['product_id', 'user_id', 'license_key'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function licenses()
    {
        return $this->hasMany(License::class);
    }
    }