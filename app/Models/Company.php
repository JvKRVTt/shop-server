<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Filters\Filterable;

class Company extends Model
{
    use HasFactory, Filterable;

    public $timestamps = false;
    protected $guarded = ['id'];

    public function addresses()
    {
        return $this->hasMany(Address::class);
    }
}
