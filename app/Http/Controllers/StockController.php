<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Http\Requests\StockStoreRequest;
use App\Http\Requests\StockUpdateRequest;

class StockController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Stock::class);

        $search = $request->get('search', '');

        $stocks = Stock::search($search)
            ->latest()
            ->paginate(5);

        return view('app.stocks.index', compact('stocks', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', Stock::class);

        $subCategories = SubCategory::pluck('name', 'id');

        return view('app.stocks.create', compact('subCategories'));
    }

    /**
     * @param \App\Http\Requests\StockStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StockStoreRequest $request)
    {
        $this->authorize('create', Stock::class);

        $validated = $request->validated();

        $stock = Stock::create($validated);

        return redirect()
            ->route('stocks.edit', $stock)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Stock $stock
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Stock $stock)
    {
        $this->authorize('view', $stock);

        return view('app.stocks.show', compact('stock'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Stock $stock
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Stock $stock)
    {
        $this->authorize('update', $stock);

        $subCategories = SubCategory::pluck('name', 'id');

        return view('app.stocks.edit', compact('stock', 'subCategories'));
    }

    /**
     * @param \App\Http\Requests\StockUpdateRequest $request
     * @param \App\Models\Stock $stock
     * @return \Illuminate\Http\Response
     */
    public function update(StockUpdateRequest $request, Stock $stock)
    {
        $this->authorize('update', $stock);

        $validated = $request->validated();

        $stock->update($validated);

        return redirect()
            ->route('stocks.edit', $stock)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Stock $stock
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Stock $stock)
    {
        $this->authorize('delete', $stock);

        $stock->delete();

        return redirect()
            ->route('stocks.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
