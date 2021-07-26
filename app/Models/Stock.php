<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Stock extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'quantity',
        'date',
        'total_stock',
        'sub_category_id',
    ];

    protected $searchableFields = ['*'];

    protected $casts = [
        'date' => 'datetime',
    ];

    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class);
    }
}
