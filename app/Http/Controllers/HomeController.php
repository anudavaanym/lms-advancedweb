<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Solution;
use App\Models\Task;

class HomeController extends Controller
{
public function index()
{
        return view('home');
}
    public function contact()
    {
        return view('contact');
    }
}