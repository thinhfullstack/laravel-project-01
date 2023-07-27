<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index()
    {
        return view('layouts.admin.categories.index');
    }

    public function create()
    {
        return view('layouts.admin.categories.create', [
            'title' => 'Create Category',
        ]);
    }
}
