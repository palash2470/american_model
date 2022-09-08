<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('is_admin');
    }

    public function Index()
    {
        return view('admin.dashboard.dashboard');
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }
}
