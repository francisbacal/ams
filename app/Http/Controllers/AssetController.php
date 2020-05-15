<?php

namespace App\Http\Controllers;

use App\Asset;
use App\AssetStatus;
use App\Category;
use App\Stock;
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
        
        return view('assets.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('asset-create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $asset_statuses = AssetStatus::all();
        $stocks = Stock::all(); //to be refactored;
        $categories = Category::all();
        $serial = strtoupper(Str::random(9));

        return view('assets.create')->with(['asset_statuses' => $asset_statuses, 'stocks' => $stocks, 'categories' => $categories, 'serial' => $serial]);
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
            'name' => 'required|unique:assets,name|string|max:100',
            'price' => 'required|numeric',
            'serial' => 'required|string',
            'description' => 'required|string',
            'image' => 'required|image|max:2000',
            'category_id' => 'required|string',
            'asset_status_id' => 'required',
        ]);
        $code = "AMS-" . $request->serial . $date;

        $validatedData['code'] = $code;
        // dd($validatedData);

        $image_path = $request->file("image")->store('public/products');

        $asset = new Asset($validatedData);
        $asset->image = Storage::url($image_path);

        $asset->save();

        return (redirect(route('assets.index'))->with('message', "$asset->name successfully added"));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function show(Asset $asset)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function edit(Asset $asset)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function destroy(Asset $asset)
    {
        //
    }
}
