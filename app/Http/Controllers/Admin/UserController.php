<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
        return view('layouts.admin.users.index');
    }

    public function create()
    {
        return view('layouts.admin.users.create', [
            'title' => 'Create User',
        ]);
    }
}
