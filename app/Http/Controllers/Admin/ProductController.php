<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index()
    {
        return view('layouts.admin.products.index');
    }

    public function create()
    {
        return view('layouts.admin.products.create', [
            'title' => 'Create Product',
        ]);
    }
}
