<?php

namespace App\Http\Controllers;

use App\Mail\EmailVerification;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data('title',$this->title('All Users'));
        $users = User::where(
            function ($query){
                $query->where('role_id',3);
            }
        )->get();
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
        //
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
}
