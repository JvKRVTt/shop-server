<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Filters\Filterable;

class Product extends Model
{
    use HasFactory, Filterable;

    protected $guarded = ['id'];

    public function categories()
    {
        return $this->morphedByMany(Category::class, 'productable');
    }

    public function subcategories()
    {
        return $this->morphedByMany(Subcategory::class, 'productable');
    }
}
