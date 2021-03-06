<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Education;
use App\Models\PendingRequest;
use App\Models\User;
use App\Models\UserInfo;
use App\Providers\RouteServiceProvider;
use App\Rules\MatchOldPassword;
use Exception;
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
            'profession' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8'
        ]);
        if ($request->role == 'professional') {
            $request->validate([
                'metric' => 'mimes:jpeg,png,jpg|required',
                'intermediate' => 'mimes:jpeg,png,jpg|required',
                'bachelors' => 'mimes:jpeg,png,jpg|required',
                'masters' => 'mimes:jpeg,png,jpg',
                'phd' => 'mimes:jpeg,png,jpg'
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
        $userInfo->profession = $request->profession;
        $userInfo->address = $request->address;
        $userInfo->save();

        if ($request->role == 'professional') {
            $this->goPro($request);
        }
        event(new Registered($user));

        return redirect(RouteServiceProvider::HOME);
    }
    public function goPro(Request $request)
    {
        $education = new Education();
        $education->user_info_id = Auth::id();
        if ($request->hasFile('metric')) {
            $education->metric = Storage::putFile('documents', $request->file('metric'));
        }
        if ($request->hasFile('intermediate')) {
            $education->intermediate = Storage::putFile('documents', $request->file('intermediate'));
        }
        if ($request->hasFile('bachelors')) {
            $education->bachelors = Storage::putFile('documents', $request->file('bachelors'));
        }
        if ($request->hasFile('masters')) {
            $education->masters = Storage::putFile('documents', $request->file('masters'));
        }
        if ($request->hasFile('phd')) {
            $education->phd = Storage::putFile('documents', $request->file('phd'));
        }
        $education->save();

        $pendingRequest = new PendingRequest();
        $pendingRequest->user_id = Auth::id();
        $pendingRequest->save();
    }
    public function update(Request $request)
    {

        $request->validate([

            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'phone_no' => 'required|numeric|min:13',
            'cnic_no' => 'required|numeric|min:13',
            'dp' =>  'mimes:jpeg,png,jpg'

        ]);
        $userInfo = UserInfo::find($request->user_id);
        if ($request->hasFile('dp')) {
            $userInfo->display_picture = Storage::putFile('documents', $request->file('dp'));
        }
        $userInfo->first_name = $request->firstname;
        $userInfo->last_name = $request->lastname;
        $userInfo->gender = $request->gender;
        $userInfo->date_of_birth = $request->dob;
        $userInfo->phone_no = $request->phone_no;
        $userInfo->cnic_no = $request->cnic_no;
        $userInfo->address = $request->address;
        $userInfo->save();
        if(Auth::user()->role == 'admin'){
            return redirect()->back();
        }else{
            return redirect('/profile-account-setting'); 
        }
    }
    public function updatePassword(Request $request)
    {

        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);
        User::find(auth()->user()->id)->update(['password' => Hash::make($request->new_password)]);
        if(Auth::user()->role == 'admin'){
            return redirect()->back();
        }else{
            return redirect('/profile-account-setting'); 
        }
    }

    public function pofessionalProfileSetting($id){
        $professional = User::where('id' , $id)->first();
        return view('Admin.Update.professional-account-setting' , ['professional' => $professional]);
    }
    public function saveUserFirebaseToken(Request $request){
        try{
            $firebaseToken = $request->firebasetoken;
            $user = Auth::user();
            $user->firebase_token = $firebaseToken;
            $user->save();
            return response()->json([
                'user'=> $user
            ],200);
        }
        catch(Exception $error){
            return response()->json([
                'message'=> 'token not saved'.$error
            ],400);
        }
    }
    public function getAllUsers(Request $request){
        $users = User::where('id', '!=', auth()->id())->get();
        $user = Auth::user();
        return response()->json([
            'users' => $users,
            'currentUser' => $user,
        ]);
    }
}
