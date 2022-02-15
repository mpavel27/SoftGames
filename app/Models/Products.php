<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\EloquentSortable\SortableTrait;
use Spatie\EloquentSortable\Sortable;

class Products extends Model implements Sortable
{
    use HasFactory;
    use SortableTrait;

    public $fillable = ['category', 'order_column'];

    public $sortable = [
        'order_column_name' => 'order_column',
        'sort_when_creating' => false,
    ];

    protected $table = 'products';
}
