<?php

namespace App\Http\Controllers\Api;

use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Http\Resources\ProductCollection;

class SubCategoryProductsController extends Controller
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

        $products = $subCategory
            ->products()
            ->search($search)
            ->latest()
            ->paginate();

        return new ProductCollection($products);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\SubCategory $subCategory
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, SubCategory $subCategory)
    {
        $this->authorize('create', Product::class);

        $validated = $request->validate([
            'name' => ['required', 'max:255', 'string'],
            'date' => ['required', 'date'],
            'color' => ['required'],
            'size' => ['required', 'numeric'],
            'quantity' => ['required', 'numeric'],
            'unit_price' => ['required', 'numeric'],
            'discount' => ['required', 'numeric'],
            'vat' => ['required', 'numeric'],
            'total' => ['required', 'numeric'],
            'image' => ['nullable', 'image', 'max:1024'],
            'status' => ['required', 'in:active,inactive'],
            'store_id' => ['required', 'exists:stores,id'],
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('public');
        }

        $product = $subCategory->products()->create($validated);

        return new ProductResource($product);
    }
}
