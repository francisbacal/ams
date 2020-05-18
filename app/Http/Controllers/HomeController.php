<?php

namespace App\Http\Controllers;

use App\Asset;
use App\Permissions\HasPermissionsTrait;
use App\Requisition;
use App\User;
use Auth;

class HomeController extends Controller
{
    use HasPermissionsTrait;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        $user = Auth::user();
        $user_id = Auth::user()->id;
        $supervisor = new User();

        // LOGIC FOR FINDING SUPERVISOR (SECTION-MANAGER)
        // GET ALL REQUISITIONS IF ADMIN ONLY

        if ($user_id == 1) {

            $requisitions = Requisition::orderBy('created_at', 'desc')->get()->take(4);
            $supervisor = $user;

        } else {

            $requisitions = Requisition::orderBy('created_at', 'desc')->where('user_id', $user_id)->take(4);

            $members = User::where('section_id', $user->section_id)->get();

            foreach ($members as $member) {
                if ($member->hasRole('section-manager')) {
                    $supervisor = $member;
                }
            }
        }

        $assets = new \stdClass();

        $assets->available = count(Asset::where('asset_status_id', "1")->get());
        $assets->allocated = count(Asset::where('asset_status_id', "2")->get());
        $assets->reserved = count(Asset::where('asset_status_id', "3")->get());
        $assets->diagnosis = count(Asset::where('asset_status_id', "4")->get());
        $assets->repair = count(Asset::where('asset_status_id', "5")->get());

        $assets->total = count(Asset::all());

        return view('home')->with(['assets' => $assets, 'requisitions' => $requisitions, 'user' => $user, 'supervisor' => $supervisor]);
    }
}
