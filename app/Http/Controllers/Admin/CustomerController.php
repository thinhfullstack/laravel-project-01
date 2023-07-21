<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        return view('layouts.admin.customers.index');
    }

    public function create()
    {
        return view('layouts.admin.customers.create', [
            'title' => 'Create Customer',
        ]);
    }

    public function update()
    {
        return __METHOD__;
    }

    public function destroy()
    {
        return __METHOD__;
    }
}
