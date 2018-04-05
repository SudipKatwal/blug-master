<?php

namespace App\Http\Controllers;

use App\Mail\EmailVerification;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Image;

class UserController extends DashboardController
{

    public function __construct()
    {
        parent::__construct();
        $this->middleware('admin')->except('settingForm','settingAction','changePassword','changePhoto');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->data('title',$this->title('All Users'));
        if ($request->user =='admin'){
            $users = User::where(
                function ($query){
                    $query->where('role_id',2);
                }
            )->get();
        } elseif($request->user='writer') {
            $users = User::where(
                function ($query) {
                    $query->where('role_id', 3);
                }
            )->get();
        }
        return view(
            'Back.Pages.Users.users',
            $this->data,
            compact('users')
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data('title',$this->title('Add new user'));
        return view(
            'Back.Pages.Users.new-user',
            $this->data
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'type'  => 'required',
            'address'   => 'required|string',
            'phone' => 'required',
            'gender'    => 'required',

        ]);
        $data = $request->all();
        $data['password'] = str_random(6);
        $user = $this->userJson($data);
        if ($user){
            Mail::to($user->email)->send(new EmailVerification($user,$data['password']));
            return redirect()->route('users.index');
        }
    }

    protected function userJson($data)
    {
        $user = User::create([
            'role_id' => $data['type'],
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'address'   =>$data['address'],
            'phone_no'  => $data['phone'],
            'gender'    => $data['gender'],
            'interests' => $data['interest'],
        ]);
        return $user;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->data('title',$this->title('Setting'));
        return view(
            'Back.Pages.setting.setting',
            $this->data
        );
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function settingForm()
    {
        $this->data('title',$this->title('Setting'));
        return view(
            'Back.Pages.setting.setting',
            $this->data
        );
    }/**
 * Show the form for editing the specified resource.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
    public function settingAction(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|string|max:255',
            'address'   => 'required|string',
        ]);
        $data = $request->all();
        unset($data['_token']);
        unset($data['id']);
        if (User::find($request->id)->update($data)){
            return redirect()->route('users.setting')->with('success','Setting has been updated.');
        }

    }

/* Show the form for editing the specified resource.
*
* @param  int  $id
* @return \Illuminate\Http\Response
*/
    public function changePassword(Request $request)
    {
        $this->validate($request,[
            'o_password' => 'required|min:6',
            'password' => 'required|confirmed|min:6',
        ]);

        $password = bcrypt($request->password);

        if (!(Hash::check($request->o_password, Auth::user()->password))) {
            return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again.");
        }


        if (User::find($request->id)->update(['password'=>$password])){
            return redirect()->route('users.setting')->with('success','Password has been updated.');
        }

    }
    public function changePhoto(Request $request)
    {
        $this->validate($request, [
            'profile' => 'required|image|max:2048',
        ]);

        if ($request->hasFile('profile')) {

            $uploadPath = public_path('Images/profile-thumbnails/');
            if (Auth::user()->thumbnails){
                unlink($uploadPath.Auth::user()->thumbnails);
            }
            $image = $request->file('profile');
            $ext = $image->getClientOriginalExtension();
            $imageName = date('Ymds-') . str_random(6) . '.' . $ext;
            $save = Image::make($image)->resize(
                850,
                null,
                function ($constraint) {
                    $constraint->aspectRatio();
                }
            )->crop(850, 450)->save($uploadPath . $imageName);

                if (User::find($request->id)->update(['thumbnails'=>$imageName])) {
                    return redirect()->route('users.setting')->with('success', 'Profile picture has been updated.');
                }
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (isset($request['enable'])) {
            $data['is_active'] = 1;
            $message = "User was Enabled";
        }
        if (isset($request['disable'])) {
            $data['is_active'] = 0;
            $message = "User was Disabled";
        }
        $user = User::find($id);
        if ($user::where('id',$id)->update($data)) {
            return redirect()->route('users.index')->with('success', $message);
        } else {
            return redirect()->back()->with('success', $message);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function notification(){
        if (User::where('is_active',1)->update(['notification'=>0])){
            return User::where('notification',1)->get()->count();
        }
    }


    public function profile($id)
    {
        $detail = User::find($id);
        $this->data('title',$this->title($detail->name));
        return view(
            'Back.Pages.profile.profile',
            $this->data,
            compact('detail')
        );
    }
}
