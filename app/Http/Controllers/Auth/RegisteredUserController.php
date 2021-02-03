<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Education;
use App\Models\User;
use App\Models\UserInfo;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use SebastianBergmann\Environment\Console;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $activeTab = "signup";
        return view('auth.login', ['activeTab' => $activeTab]);
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8'
        ]);
        if ($request->role == 'professional') {
            $request->validate([
                'metric' => 'mimes:jpeg,png,jpg|required',
                'intermediate' => 'mimes:jpeg,png,jpg|required',
                'bachelors' => 'mimes:jpeg,png,jpg|required',
                'masters' => 'mimes:jpeg,png,jpg|required',
                'phd' => 'mimes:jpeg,png,jpg|required'
            ]);
        }
        Auth::login($user = User::create([
            'name' => $request->firstname . ' ' . $request->lastname,
            'username' => $request->username,
            'role' => 'customer',
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]));

        $userInfo = new UserInfo();
        $userInfo->user_id = Auth::id();
        $userInfo->first_name = $request->firstname;
        $userInfo->last_name = $request->lastname;
        $userInfo->save();

        $education = new Education();
        $education->user_info_id = $userInfo->id;
        if ($request->hasFile('metric')) {
            $education->metric = Storage::putFile('public/documents', $request->file('metric'));
        }
        if ($request->hasFile('intermediate')) {
            $education->intermediate = Storage::putFile('public/documents', $request->file('intermediate'));
        }
        if ($request->hasFile('bachelors')) {
            $education->bachelors = Storage::putFile('public/documents', $request->file('bachelors'));
        }
        if ($request->hasFile('masters')) {
            $education->masters = Storage::putFile('public/documents', $request->file('masters'));
        }
        if ($request->hasFile('phd')) {
            $education->phd = Storage::putFile('public/documents', $request->file('phd'));
        }
        $education->save();

        event(new Registered($user));

        return redirect(RouteServiceProvider::HOME);
    }
}
