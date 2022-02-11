<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Filters\Filterable;

class Category extends Model
{
    use HasFactory, Filterable;

    public $timestamps = false;
    protected $guarded = ['id'];

    public function subcategories()
    {
        return $this->hasMany(Subcategory::class);
    }

    public function products()
    {
        return $this->morphToMany(Product::class, 'productable');
    }
}
