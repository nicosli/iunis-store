<?php

namespace App\Models;

use App\Models\Variants;
use App\Models\Providers;
use App\Models\Categories;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Products extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * Get the variants for the Product.
     */
    public function variants()
    {
        return $this->hasMany(Variants::class);
    }

    public function provider()
    {
        return $this->hasOne(Providers::class);
    }

    public function category()
    {
        return $this->belongsTo(Categories::class);
    }
}
