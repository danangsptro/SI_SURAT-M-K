<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterUserController extends Controller
{
    public function index()
    {
        return view('page.register.index');
    }

    public function profile()
    {
        return view('page.register.profile');
    }
}
