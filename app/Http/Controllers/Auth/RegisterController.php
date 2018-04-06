<?php

namespace App\Http\Controllers\Auth;

use App\Category;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Image;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function register()
    {
        $this->data('title',$this->title('Login'));
        $categories = Category::all();

        return view(
            'auth.register',
            $this->data,
            compact('categories')
        );
    }


    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
            'address'   => 'required|string',
            'phone' => 'required',
            'gender'    => 'required',
            'profile'   => 'image|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('profile')){
            $image = $request->file('profile');
            $uploadPath = public_path('Images/profile-thumbnails/');
            $ext = $image->getClientOriginalExtension();
            $imageName = date('Ymds-').str_random(6).'.'.$ext;
            $save = Image::make($image)->resize(
                800,
                null,
                function ($constraint) {
                    $constraint->aspectRatio();
                }
            )->crop(800,450)->save($uploadPath.$imageName);

            if ($save){
                $data['thumbnail'] = $imageName;
            }
        }
        if ($this->userJson($data)){
            return redirect()->route('login')->with('You are successfully registered. Login now...');
        }

    }

    protected function userJson($data)
    {
        return User::create([
            'role_id' => 3,
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'address'   =>$data['address'],
            'phone_no'  => $data['phone'],
            'gender'    => $data['gender'],
            'interests' => $data['interest'],
            'thumbnails' => $data['thumbnail'],
        ]);
    }
}
