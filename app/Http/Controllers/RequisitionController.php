<?php

namespace App\Http\Controllers;

use App\Asset;
use App\Category;
use App\Requisition;
use App\RequisitionStatus;
use Auth;
use Illuminate\Http\Request;
use Str;

class RequisitionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $requisitions = Requisition::all();
        return view('requisitions.index')->with('requisitions', $requisitions);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $assets = Asset::where('category_id', '1')->where('asset_status_id', '1')->get();

        return view('requisitions.create')->with(['categories' => $categories, 'assets' => $assets]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'requested_date' => 'required|string|max:30',
            'notes' => 'required|string',
            'assets' => 'required',
            'requested_date' => 'required',
        ]);

        $user_id = Auth::user()->id;
        $code = "REQ-" . strtoupper(Str::random(6));

        $requisition = new Requisition($validatedData);
        $requisition->code = $code;
        $requisition->user_id = $user_id;
        $requisition->save();

        $assetModels = [];
        foreach ($request->assets as $asset) {
            $assetModels[] = Asset::find($asset);
        }
        $requisition->assets()->saveMany($assetModels);

        return redirect()->route('requisitions.index')->with('success', 'Request has been sent for verification and approval.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Requisition  $requisition
     * @return \Illuminate\Http\Response
     */
    public function show(Requisition $requisition)
    {
        return view('requisitions.partials.content.modalcontent')->with(['requisition' => $requisition, 'requisition_statuses' => RequisitionStatus::all()])->render();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Requisition  $requisition
     * @return \Illuminate\Http\Response
     */
    public function edit(Requisition $requisition)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Requisition  $requisition
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Requisition $requisition)
    {
        $validatedData = $request->validate([
            'requisition_status_id' => 'required|numeric',
        ]);

        $requisition->requisition_status_id = $request->requisition_status_id;

        $requisition->update($validatedData);

        return response()->json(['status' => $requisition->status->name, 'status_id' => $requisition->requisition_status_id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Requisition  $requisition
     * @return \Illuminate\Http\Response
     */
    public function destroy(Requisition $requisition)
    {
        //
    }
}
