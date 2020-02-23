<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;
use Validator;
use Auth;
use App\simaksi;
class generalController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    
    public function index()
    {
        // dd(Auth::user()->name);
        return view('contentUser/index');
    }

    public function search($request)
    {
        return simaksi::detailSimaksi($request);
    }

    public function simaksi()
    {
        return view('contentUser/simaksi');
    }

    public function registrasi()
    {
        return view('auth/register');
    }

    public function login()
    {
        return view('auth/login');
    }
}
