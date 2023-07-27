<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;

class OrderController extends Controller
{
    public function index()
    {
        return view('layouts.admin.orders.index');
    }

    public function create()
    {
        return view('layouts.admin.orders.create', [
            'title' => 'Create Order',
        ]);
    }

    public function store(OrderRequest $request)
    {
        dd($request->input());
    }
}
