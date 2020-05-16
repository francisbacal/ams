<?php

namespace App\Http\Controllers;

use App\CategoryStock;
use Illuminate\Http\Request;

class CategoryStockController extends Controller
{
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

    public function updateOldCategoryStock($request, $asset)
    {

        $categoryStock = CategoryStock::where('category_id', $asset->category_id)->get()->first();

        if ($asset->asset_status_id != $request->asset_status_id) {

            // add to new status
            switch ($request->asset_status_id) {

                case '1':
                    $categoryStock->available += 1;
                    break;

                case '2':
                    $categoryStock->allocated += 1;
                    break;

                case '3':
                    $categoryStock->reserved += 1;
                    break;

                case '4':
                    $categoryStock->for_diagnosis += 1;
                    break;

                case '5':
                    $categoryStock->for_repair += 1;
                    break;
            };

            // deduct from old status
            switch ($asset->asset_status_id) {

                case 1:
                    $categoryStock->available -= 1;
                    break;

                case 2:
                    $categoryStock->allocated -= 1;
                    break;

                case 3:
                    $categoryStock->reserved -= 1;
                    break;

                case 4:
                    $categoryStock->for_diagnosis -= 1;
                    break;

                case 5:
                    $categoryStock->for_repair -= 1;
                    break;
            }
        }
        $categoryStock->update();
    }
    public function updateNewCategoryStock($request, $asset)
    {
        $categoryStock = CategoryStock::where('category_id', $request->category_id)->get()->first();

        if ($categoryStock === null) {

            $categoryStock = new CategoryStock();
            $categoryStock->category_id = $request->category_id;
            $categoryStock->total += 1;

            switch ($request->asset_status_id) {

                case '1':
                    $categoryStock->available += 1;
                    break;

                case '2':
                    $categoryStock->allocated += 1;
                    break;

                case '3':
                    $categoryStock->reserved += 1;
                    break;

                case '4':
                    $categoryStock->for_diagnosis += 1;
                    break;

                case '5':
                    $categoryStock->for_repair += 1;
                    break;
            };

        } else {

            switch ($request->asset_status_id) {

                case '1':
                    $categoryStock->available += 1;
                    break;

                case '2':
                    $categoryStock->allocated += 1;
                    break;

                case '3':
                    $categoryStock->reserved += 1;
                    break;

                case '4':
                    $categoryStock->for_diagnosis += 1;
                    break;

                case '5':
                    $categoryStock->for_repair += 1;
                    break;
            };

            $categoryStock->total += 1;
        }

        $categoryStock->save();
    }
}
