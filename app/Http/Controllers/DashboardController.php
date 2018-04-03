<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    protected $page;

    public function __construct()
    {
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
