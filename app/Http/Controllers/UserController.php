<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveUserRequest;
use App\Models\Family;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $model;

    public function __construct(User $userModel)
    {
        $this->model = $userModel;
    }

    public function index()
    {
        $users = $this->model->with('family')->get();

        return view('layouts.users.index', [
            'users' => $users,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('layouts.users.form', [
            'title' => 'User Create',
            'families' => Family::get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SaveUserRequest $request)
    {
        $inputs = $request->all();
        $inputs['password'] = bcrypt($request->password);
        $inputs['type'] = User::TYPE['admin'];

        if ($request->avatar) {
            $inputs['avatar'] = Storage::disk('public')->put('media', $request->avatar);
        }

        $this->model->create($inputs);

        $request->session()->flash('success', 'Create user successful!');

        return to_route('user.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('layouts.users.form', [
            'user' => $this->model->find($id),
            'title' => 'User Edit',
            'families' => Family::get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SaveUserRequest $request, string $id)
    {
        $inputs = array_filter($request->all());
        if($request->password) {
            $inputs['password'] = bcrypt($request->password);
        }

        if ($request->avatar) {
            $inputs['avatar'] = Storage::disk('public')->put('media', $request->avatar);
        }

        $this->model->find($id)->update($inputs);

        $request->session()->flash('success', 'Update user successful!');

        return to_route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->model->find($id)->delete();

        return to_route('user.index');
    }
}
