<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Permission;
use App\Providers\RouteServiceProvider;
use App\Role;
use App\User;
use Auth;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
     */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $user = Auth::user();
        $this->middleware('role:admin');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $role = Role::where('slug', 'employee')->first();
        $permission = Permission::where('slug', 'view-asset')->first();

        // dd($role);
        // dd($permission);
        $image = '/dist/img/new-user-avatar.png';

        $newUser = new User();
        $newUser->firstname = $data['firstname'];
        $newUser->lastname = $data['lastname'];
        $newUser->email = $data['email'];
        $newUser->password = Hash::make($data['password']);
        $newUser->image = $image;

        $newUser->save();
        $newUser->roles()->attach($role);
        $newUser->permissions()->attach($permission);

        $this->newUser = "$newUser->firstname  $newUser->lastname";
    }
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        //$this->guard()->login($user);

        //return $this->registered($request, $user)
        //                ?: redirect($this->redirectPath());

        return redirect(route('register'))->with('message', "$this->newUser registered.");
    }
}
