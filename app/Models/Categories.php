<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Products;
use Spatie\EloquentSortable\SortableTrait;
use Spatie\EloquentSortable\Sortable;

class Categories extends Model implements Sortable
{
    use HasFactory;
    use SortableTrait;

    public $sortable = [
        'order_column_name' => 'order_column',
        'sort_when_creating' => false,
    ];

    protected $table = 'categories';

    public function products()
    {
        return $this->hasMany(Products::class, 'category');
    }
}
