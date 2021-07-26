<?php

namespace App\Http\Controllers\Api;

use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\StockResource;
use App\Http\Resources\StockCollection;

class SubCategoryStocksController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\SubCategory $subCategory
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, SubCategory $subCategory)
    {
        $this->authorize('view', $subCategory);

        $search = $request->get('search', '');

        $stocks = $subCategory
            ->stocks()
            ->search($search)
            ->latest()
            ->paginate();

        return new StockCollection($stocks);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\SubCategory $subCategory
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, SubCategory $subCategory)
    {
        $this->authorize('create', Stock::class);

        $validated = $request->validate([
            'quantity' => ['required', 'numeric'],
            'date' => ['required', 'date'],
            'total_stock' => ['required', 'numeric'],
        ]);

        $stock = $subCategory->stocks()->create($validated);

        return new StockResource($stock);
    }
}
