<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'name',
        'date',
        'color',
        'size',
        'quantity',
        'unit_price',
        'discount',
        'vat',
        'total',
        'image',
        'status',
        'sub_category_id',
        'store_id',
    ];

    protected $searchableFields = ['*'];

    protected $casts = [
        'date' => 'datetime',
    ];

    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class);
    }

    public function store()
    {
        return $this->belongsTo(Store::class);
    }
}
