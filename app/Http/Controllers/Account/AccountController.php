<?php

namespace App\Http\Controllers\Account;

use App\Course;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AccountController extends Controller
{
    public function index()
    {

        return view('account.index', [
            'user' => Auth::user()
        ]);
    }
}
