<?php

namespace App\Http\Controllers;

use App\Asset;
use App\AssetStatus;
use App\Category;
use App\CategoryStock;
use App\User;
use Carbon\Carbon;
use Gate;
use Illuminate\Http\Request;
use Storage;
use Str;
use Symfony\Component\HttpFoundation\Response;

class AssetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('asset-view'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        // $stock = Asset::where(['category_id' => 1, 'asset_status_id' => 1])->pluck('name');
        // $allstock = Asset::where('category_id', 1)->pluck('name');
        // dd(count($allstock));

        $assets = Asset::all();
        $pageAssets = Asset::paginate(10);
        return view('assets.index')->with('assets', $pageAssets);
    }
    public function indexSort(Request $request)
    {
        abort_if(Gate::denies('asset-view'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $assets = Asset::where('asset_status_id', $request->id)->paginate(10);

        return view('assets.index')->with('assets', $assets);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('asset-create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        // $asset_statuses = AssetStatus::all();
        $categories = Category::all();
        $serial = strtoupper(Str::random(9));

        return view('assets.create')->with(['categories' => $categories, 'serial' => $serial]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        abort_if(Gate::denies('asset-create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $date = Carbon::now()->format('Ymd');

        $validatedData = $request->validate([
            'name' => 'required|string|max:100',
            'price' => 'required|numeric',
            'serial' => 'required|string',
            'description' => 'required|string',
            'image' => 'required|image|max:2000',
            'category_id' => 'required|string',
        ]);
        $code = "AMS-" . $request->serial . $date;

        $validatedData['code'] = $code;

        $image_path = $request->file("image")->store('public/assets');

        $asset = new Asset($validatedData);
        $asset->image = Storage::url($image_path);

        $asset->save();

        /*===================
        | ADD NEW STOCK
        ===================*/

        $category_stock = CategoryStock::where('category_id', $request->category_id)->get()->first();

        if ($category_stock === null) {

            $category_stock = new CategoryStock();
            $category_stock->category_id = $request->category_id;
            $category_stock->available = 1;
            $category_stock->total = 1;

        } else {

            $category_stock->available += 1;
            $category_stock->total += 1;
        }

        $category_stock->save();

        return (redirect(route('assets.index'))->with('success', "$asset->name successfully added"));

    }
    public function searchAsset(Request $request)
    {
        $search = $request->get('search');
        $assets = Asset::where('name', 'like', '%' . $search . '%')->paginate(10);
        return view('assets.index', ['assets' => $assets]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function show(Asset $asset)
    {
        abort_if(Gate::denies('asset-view'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('assets.show')->with('asset', $asset);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function edit(Asset $asset)
    {
        abort_if(Gate::denies('asset-edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $asset_statuses = AssetStatus::all();
        $categories = Category::all();

        return view('assets.edit')->with(['asset' => $asset, 'categories' => $categories, 'asset_statuses' => $asset_statuses]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Asset $asset)
    {
        abort_if(Gate::denies('asset-edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        //UPDATE ASSET ITEM

        $validatedData = $request->validate([
            'name' => 'required|string|max:100',
            'price' => 'required|numeric',
            'serial' => 'required|string',
            'description' => 'required|string',
            'category_id' => 'required|string',
            'asset_status_id' => 'required',
        ]);

        $asset->update($validatedData);

        if ($request->hasFile('image')) {

            $image_path = $request->file("image")->store('public/assets');
            $asset->image = Storage::url($image_path);
        }

        $asset->save();

        // dd($request->old_category_id == $asset->category_id);

        /*===================
        | UPDATE STOCK
        ===================*/

        // CHECK IF CATEGORY IS SAME WITH CURRENT AND UPDATE STOCKS ACCORDINGLY //

        if ($request->old_category_id == $asset->category_id) {

            app(CategoryStockController::class)->updateOldCategoryStock($request);

        } else {

            app(CategoryStockController::class)->updateNewCategoryStock($request);
        }

        return redirect()->route('assets.show', ['asset' => $asset->id])->with('success', "$asset->name is successfully edited");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function destroy(Asset $asset)
    {
        abort_if(Gate::denies('asset-destroy'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        // UPDATE STOCK
        app(CategoryStockController::class)->updateCategoryStockAfterDelete($asset);

        $asset->delete();

        return redirect()->back()->with('message', "$asset->name is succesfully deleted.");
    }

    /*-----------------------
    | SOFTDELETED
    |----------------------*/

    public function softDeleted(Request $request)
    {
        abort_if(Gate::denies('asset-edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user = $request->user();
        $assets = Asset::onlyTrashed()->get();

        return view('assets.assetsoft')->with('assets', $assets);
    }

    /*-----------------------
    | RESTORE
    |----------------------*/
    public function restore($asset)
    {

        abort_if(Gate::denies('asset-edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        Asset::withTrashed()->find($asset)->restore();
        app(CategoryStockController::class)->updateCategoryStockAfterRestore($asset);

        return back()->with('success', 'Restored successfully.');
    }

    /*-----------------------
    | RESTORE ALL
    |----------------------*/

    public function restoreAll()
    {

        abort_if(Gate::denies('asset-edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        Asset::onlyTrashed()->restore();
        return back()->with('success', 'Restored all successfully');
    }
}
