<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Filters\Filterable;

class Ad extends Model
{
    use HasFactory, Filterable;

    protected $guarded = ['id'];
}
