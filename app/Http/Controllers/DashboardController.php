<?php

namespace App\Http\Controllers;

use App\AssignPost;
use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    protected $page;
    public $user;

    public function __construct()
    {

        $this->data('userNotification',User::where(['notification'=>1])->get());
        $this->data('postResubmitted',Post::where(['is_resubmitted'=>1])->get());
        $this->data('postNotification',Post::where(['notification'=>1])->get());

        $this->page = 'Back.Pages.';
    }



    public function dashboard()
    {
        $this->data('writerNotification',Post::where(['is_approved'=>1,'user_id'=>Auth::id()])->get());
        $this->data('writerRequestNotification',Post::where(['request_resubmission'=>1,'user_id'=>Auth::id()])->get());
        $this->data('postAssign',AssignPost::where(['is_assigned'=>1,'user_id'=>Auth::id()])->get());

        if (Auth::user()->role->slug=='admin'){
            $this->data('allPost',Post::all()->count());
            $this->data('allWriter',User::all()->count());
        }else{
            $this->data('allPost',Post::where(['user_id'=>Auth::id()])->get()->count());
        }
        $this->data('title',$this->title('Dashboard'));
        return view(
            $this->page.'Dashboard.dashboard',
            $this->data
        );
    }

}
