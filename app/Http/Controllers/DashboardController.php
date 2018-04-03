<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    protected $page;

    public function __construct()
    {
        $this->data('userNotification',User::where(['notification'=>1])->get());
        $this->data('postNotification',Post::where(['notification'=>1])->get());
        $this->page = 'Back.Pages.';
    }

    public function dashboard()
    {
        $this->data('title',$this->title('Dashboard'));
        return view(
            $this->page.'Dashboard.dashboard',
            $this->data
        );
    }
    public function userdashboard()
    {
        $this->data('title',$this->title('Writer Dashboard'));
        return view(
            $this->page.'Dashboard.user-dashboard',
            $this->data
        );
    }
}
