<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'description', 'price'];

    public function licenses()
    {
        return $this->hasMany(License::class);
    }

    public function availableLicenses()
    {
        return $this->hasMany(License::class)->whereNull('user_id');
    }
}