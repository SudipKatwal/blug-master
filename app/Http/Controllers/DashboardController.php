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
}
