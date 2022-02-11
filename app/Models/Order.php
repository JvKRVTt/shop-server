<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Filters\Filterable;

class Order extends Model
{
    use HasFactory, Filterable;

    protected $guarded = ['id'];

    public function positions()
    {
        return $this->hasMany(Position::class);
    }

    public function user()
    {
        return $this->belongsTo(Client::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
