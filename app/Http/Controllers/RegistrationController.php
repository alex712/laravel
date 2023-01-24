<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class RegistrationController extends Controller
{

    public function index()
    {
        return view('auth.login');
    }

    public function registration()
    {
        $countries = DB::table('countries')->pluck('name', 'id');
        $counties = DB::table('counties')->pluck('name', 'id');

        return view('registration.create', ['countries' => $countries, 'counties' => $counties]);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard')
                ->withSuccess('Signed in');
        }

        return redirect("login")->withSuccess('Login details are not valid');
    }

    public function register(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'country_id' => 'required|integer',
            'county_id' => 'required|integer',
            'terms' => 'required',
        ]);

        if($request->input('terms') == 'on')
            $request->merge(['terms' => 1]);

        $data = $request->all();
        $check = $this->create($data);

        return redirect("dashboard")->withSuccess('You have signed-in');
    }

    public function create(array $data)
    {
        return User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'password' => Hash::make($data['password']),
            'country_id' => $data['country_id'],
            'county_id' => $data['county_id'],
            'terms' => $data['terms'],
        ]);
    }

    public function dashboard()
    {
        if(Auth::check()){
            return view('dashboard');
        }

        return redirect("login")->withSuccess('You are not allowed to access');
    }

    public function signOut() {
        Session::flush();
        Auth::logout();

        return Redirect('login');
    }

    public function update()
    {
        if(Auth::check()) {
            $countries = DB::table('countries')->pluck('name', 'id');
            $counties = DB::table('counties')->pluck('name', 'id');

            return view('auth.update', ['countries' => $countries, 'counties' => $counties]);
        }

        return redirect("login")->withSuccess('You are not allowed to access');
    }

    public function updateUser(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required',
            'country_id' => 'required|integer',
            'county_id' => 'required|integer',
            'birthdate' => 'required',
            'address' => 'required',
        ]);

        $user =Auth::user();
        $user->first_name = $request['first_name'];
        $user->last_name = $request['last_name'];
        $user->phone = $request['phone'];
        $user->country_id = $request['country_id'];
        $user->county_id = $request['county_id'];
        $user->birthdate = $request['birthdate'];
        $user->address = $request['address'];
        $user->save();
        return redirect("dashboard")->withSuccess('User has been saved');
    }
}
