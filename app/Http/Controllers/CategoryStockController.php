<?php

namespace App\Http\Controllers;

use App\Asset;
use App\Category;
use App\CategoryStock;
use Illuminate\Http\Request;

class CategoryStockController extends Controller
{
    public function updateOldCategoryStock($asset)
    {

        $categoryStock = CategoryStock::where('category_id', $asset->category_id)->get()->first();

        $this->updateCategoryStock($asset, $categoryStock);
    }

    public function updateNewCategoryStock($request)
    {
        $asset = Asset::where('category_id', $request->old_category_id)->get()->first();

        $oldCategoryStock = CategoryStock::where('category_id', $asset->category_id)->get()->first();
        $this->updateCategoryStock($asset, $oldCategoryStock);

        $newCategoryStock = CategoryStock::where('category_id', $request->category_id)->get()->first();
        if ($newCategoryStock === null) {
            $newCategoryStock = new CategoryStock();
            $newCategoryStock->category_id = $request->category_id;
        }
        $this->updateCategoryStock($request, $newCategoryStock);

    }

    public function updateCategoryStockAfterDelete($asset)
    {
        $categoryStock = CategoryStock::where('category_id', $asset->category_id)->get()->first();
        $categoryStock->total -= 1;

        switch ($asset->asset_status_id) {

            case '1':
                $categoryStock->available -= 1;
                break;

            case '2':
                $categoryStock->allocated -= 1;
                break;

            case '3':
                $categoryStock->reserved -= 1;
                break;

            case '4':
                $categoryStock->for_diagnosis -= 1;
                break;

            case '5':
                $categoryStock->for_repair -= 1;
                break;
        };
        $categoryStock->update();
    }

    public function updateCategoryStockAfterRestore($asset)
    {

        $asset_deleted = Asset::withTrashed()->find($asset);
        $categoryStock = CategoryStock::where('category_id', $asset_deleted->category_id)->first();
        $assets = Asset::where('category_id', $asset_deleted->category_id)->get();

        $categoryStock->total = count($assets);
        $categoryStock->available = 0;
        $categoryStock->allocated = 0;
        $categoryStock->reserved = 0;
        $categoryStock->for_diagnosis = 0;
        $categoryStock->for_repair = 0;

        foreach ($assets as $asset) {

            switch ($asset->asset_status_id) {
                case 1:
                    $categoryStock->available++;
                    break;

                case 2:
                    $categoryStock->allocated++;
                    break;

                case 3:
                    $categoryStock->reserved++;
                    break;

                case 4:
                    $categoryStock->for_diagnosis++;
                    break;

                case 5:
                    $categoryStock->for_repair++;
                    break;

            }
        }

        $categoryStock->update();
    }

    public function updateCategoryStock($asset, $categoryStock)
    {
        $assets = Asset::where('category_id', $asset->category_id)->get();

        $categoryStock->total = count($assets);
        $categoryStock->available = 0;
        $categoryStock->allocated = 0;
        $categoryStock->reserved = 0;
        $categoryStock->for_diagnosis = 0;
        $categoryStock->for_repair = 0;

        foreach ($assets as $asset) {

            switch ($asset->asset_status_id) {
                case 1:
                    $categoryStock->available++;
                    break;

                case 2:
                    $categoryStock->allocated++;
                    break;

                case 3:
                    $categoryStock->reserved++;
                    break;

                case 4:
                    $categoryStock->for_diagnosis++;
                    break;

                case 5:
                    $categoryStock->for_repair++;
                    break;

            }
        }
        $categoryStock->update();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CategoryStock  $categoryStock
     * @return \Illuminate\Http\Response
     */
    public function show(CategoryStock $categoryStock)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CategoryStock  $categoryStock
     * @return \Illuminate\Http\Response
     */
    public function edit(CategoryStock $categoryStock)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CategoryStock  $categoryStock
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CategoryStock $categoryStock)
    {
        //

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CategoryStock  $categoryStock
     * @return \Illuminate\Http\Response
     */
    public function destroy(CategoryStock $categoryStock)
    {
        //
    }

}
