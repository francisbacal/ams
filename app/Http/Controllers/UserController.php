<?php

namespace App\Http\Controllers;

use App\Asset;
use App\Category;
use App\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    public function allocate(Request $request)
    {
        abort_if(Gate::denies('asset-allocate'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = Category::all();
        $assets = Asset::where('category_id', '1')->whereIn('asset_status_id', array('1', '3'))->get();
        $users = User::all();

        return view('assets.allocate')->with(['categories' => $categories, 'assets' => $assets, 'users' => $users]);

    }
    public function take(Request $request)
    {
        abort_if(Gate::denies('asset-withhold'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->user_id == null) {

            $assetTake = Asset::find($request->asset_id);
            $assets = Asset::where('asset_status_id', '2')->get();

        } else {
            $user = User::find($request->user_id);
            $assets = Asset::where('user_id', $request->user_id)->get();
            $assetTake = $assets->first();
        }

        $users = User::all();

        return view('assets.withhold')->with(['assetTake' => $assetTake, 'users' => $users, 'assets' => $assets]);

    }
    public function deploy(Request $request)
    {
        abort_if(Gate::denies('asset-allocate'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $validatedData = $request->validate([
            'user_id' => 'required|numeric',
            'assets' => 'required',
            'category_id' => 'required|numeric',
        ]);

        $user = User::find($request->user_id);

        foreach ($request->assets as $asset) {
            $assetModel = Asset::find($asset);

            // If asset status is not available

            if ($assetModel->asset_status_id != 1) {
                if ($assetModel->asset_status_id != 3) {
                    return redirect()->back()->with('fail', "Sorry, asset with code: $assetModel->code is not available.");
                }
            }

            $assetModel->asset_status_id = '2';
            $assetModel->user_id = $user->id;
            $assetModel->save();
        }

        return redirect()->back()->with('success', "Allocation Succesful!");
    }

    public function withhold(Request $request)
    {
        abort_if(Gate::denies('asset-withhold'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        // $validatedData = $request->validate([
        //     'user_id' => 'required|numeric',
        //     'assets' => 'required',
        //     'category_id' => 'required|numeric',
        // ]);

        $assets = $request->assets;
        $user = $request->user_id;

        foreach ($assets as $asset) {
            $assetTake = Asset::find($asset);
            $assetTake->user_id = null;
            $assetTake->update();
        }

        return redirect()->route('assets.index')->with('success', 'Asset/s withheld');
    }

    public function changeOptions(Request $request)
    {

        abort_if(Gate::denies('asset-allocate'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $category_id = $request->category_id;

        $assets = Asset::where('category_id', $category_id)->whereIn('asset_status_id', array('1', '3'))->get();

        return $assets;
    }
    public function withholdOptions(Request $request)
    {

        abort_if(Gate::denies('asset-allocate'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $user_id = $request->user_id;

        $assets = Asset::where('user_id', $user_id)->get();

        return $assets;
    }
}
