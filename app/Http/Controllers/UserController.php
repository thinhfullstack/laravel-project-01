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
    protected $userModel;
    protected $familyModel;

    public function __construct(User $userModel, Family $familyModel)
    {
        $this->userModel = $userModel;
        $this->familyModel = $familyModel;
    }

    public function index(Request $request)
    {
        $inputs = $request->all();
        $query = $this->userModel->query();

        if (!empty($inputs['family_id'])) {
            $query->where('family_id', $inputs['family_id']);
        }

        if (!empty($inputs['keyword'])) {
            $query->where(function($query) use ($inputs) {
                $query->orWhere('name', 'like', '%' . $inputs['keyword'] . '%')
                    ->orWhere('email', 'like', '%' . $inputs['keyword'] . '%')
                    ->orWhere('phone', 'like', '%' . $inputs['keyword'] . '%');
            });
        }

        $usersPaginate = $query->with('family')->paginate(10);

        $families = $this->familyModel->all();

        return view('layouts.users.index', [
            'usersPaginate' => $usersPaginate,
            'families' => $families
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $families = $this->familyModel->all();

        return view('layouts.users.form', [
            'title' => 'User Create',
            'families' => $families
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
        
        $user = $this->userModel->create($inputs);

        $profileData = $request->only(['facebook_url', 'twitter_url', 'youtube_url', 'zalo_phone', 'other_info']);

        if (!empty(array_filter($profileData))) {
            $user->profile()->create($profileData);
        }

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
        $families = $this->familyModel->all();

        return view('layouts.users.form', [
            'user' => $this->userModel->find($id),
            'title' => 'User Edit',
            'families' => $families
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SaveUserRequest $request, string $id)
    {
        $user = $this->userModel->find($id);

        $inputs = array_filter($request->all());
        if ($request->password) {
            $inputs['password'] = bcrypt($request->password);
        }

        if ($request->avatar) {
            $inputs['avatar'] = Storage::disk('public')->put('media', $request->avatar);
        }

        $user->update($inputs);

        $profileData = $request->only(['facebook_url', 'twitter_url', 'youtube_url', 'zalo_phone', 'other_info']);

        if (!empty(array_filter($profileData))) {
            $user->profile()->updateOrCreate([], $profileData);
        }

        $request->session()->flash('success', 'Update user successful!');

        return to_route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->userModel->find($id)->delete();

        return to_route('user.index');
    }
}
