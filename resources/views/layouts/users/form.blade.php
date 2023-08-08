<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ $title }}
            </h2>
            <a href="{{ route('user.index') }}">Back</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="post" action="{{ !empty($user) ? route('user.update', ['user' => $user->id]) : route('user.store') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
                        @csrf

                        @if (!empty($user))
                            @method('put')
                        @endif
                
                        <div>
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name ?? null)" />
                            <x-input-error class="mt-2" :messages="$errors->get('name')" />
                        </div>
                        <div>
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" name="email" type="text" class="mt-1 block w-full" :value="old('email', $user->email ?? null)" />
                            <x-input-error class="mt-2" :messages="$errors->get('email')" />
                        </div>
                        <div>
                            <x-input-label for="phone" :value="__('Phone')" />
                            <x-text-input id="phone" name="phone" type="text" class="mt-1 block w-full" :value="old('phone', $user->phone ?? null)" />
                            <x-input-error class="mt-2" :messages="$errors->get('phone')" />
                        </div>
                        <div>
                            <x-input-label for="address" :value="__('Address')" />
                            <x-text-input id="address" name="address" type="text" class="mt-1 block w-full" :value="old('address', $user->address ?? null)" />
                            <x-input-error class="mt-2" :messages="$errors->get('address')" />
                        </div>
                        <div>
                            <x-input-label for="password" :value="__('Password')" />
                            <x-text-input id="password" name="password" type="password" class="mt-1 block w-full" :value="old('password')" />
                            <x-input-error class="mt-2" :messages="$errors->get('password')" />
                        </div>
                        <div>
                            <x-input-label for="password_confirm" :value="__('Password_confirm')" />
                            <x-text-input id="password_confirm" name="password_confirm" type="password" class="mt-1 block w-full" :value="old('password_confirm')" />
                            <x-input-error class="mt-2" :messages="$errors->get('password_confirm')" />
                        </div>
                        <div>
                            <select class="form-select" aria-label="Default select example" name="family_id">
                                @foreach ($families as $family)
                                    <option value="{{ $family->id }}" {{ (old('family_id', $user->family->id ?? null) == $family->id) ? 'selected' : '' }}>
                                        {{ $family->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        
                        <!-- Button trigger modal -->
                        <button type="button" name="profiles" class="btn btn-primary text-black-50" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Profile Details
                        </button>
                        
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Modal Profile Details</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="facebook_url" class="form-label">Facebook URL:</label>
                                            <input type="text" name="facebook_url" value="{{ old('facebook_url', $user->profile->facebook_url ?? '') }}" class="form-control" id="facebook_url" placeholder="Facebook Url...">
                                            <x-input-error class="mt-2" :messages="$errors->get('facebook_url')" />
                                        </div>
                                        <div class="mb-3">
                                            <label for="twitter_url" class="form-label">Twitter URL:</label>
                                            <input type="text" name="twitter_url" value="{{ old('facebook_url', $user->profile->twitter_url ?? '') }}" class="form-control" id="twitter_url" placeholder="Twitter url...">
                                            <x-input-error class="mt-2" :messages="$errors->get('twitter_url')" />
                                        </div>
                                        <div class="mb-3">
                                            <label for="youtube_url" class="form-label">Youtube URL:</label>
                                            <input type="text" name="youtube_url" value="{{ old('facebook_url', $user->profile->youtube_url ?? '') }}" class="form-control" id="youtube_url" placeholder="Youtube url...">
                                            <x-input-error class="mt-2" :messages="$errors->get('youtube_url')" />
                                        </div>
                                        <div class="mb-3">
                                            <label for="zalo_phone" class="form-label">Zalo Phone:</label>
                                            <input type="text" name="zalo_phone" value="{{ old('facebook_url', $user->profile->zalo_phone ?? '') }}" class="form-control" id="zalo_phone" placeholder="Zalo phone...">
                                            <x-input-error class="mt-2" :messages="$errors->get('zalo_phone')" />
                                        </div>
                                        <div class="mb-3">
                                            <label for="other_info" class="form-label">Other:</label>
                                            <input type="text" name="other_info" value="{{ old('facebook_url', $user->profile->other_info ?? '') }}" class="form-control" id="other_info" placeholder="Other_info...">
                                            <x-input-error class="mt-2" :messages="$errors->get('other_info')" />
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary text-black-50" data-bs-dismiss="modal">Save Profile</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <x-input-label for="gender" :value="__('Gender')" />
                            <label for="male">
                                <input type="radio" id="male" name="gender" value="1" {{ old('gender', $user->gender ?? null) == 1 ? 'checked' : '' }}> Male
                            </label>
                            <label for="female">
                                <input type="radio" id="female" name="gender" value="2" {{ old('gender', $user->gender ?? null) == 2 ? 'checked' : '' }}> Female
                            </label>
                            <x-input-error class="mt-2" :messages="$errors->get('gender')" />
                        </div>
                        <div>
                            <x-input-label for="avatar" :value="__('Avatar')" />
                            <input type="file" id="avatar" name="avatar">
                            @if(!empty($user) && $user->avatar)
                            <img src="/storage/{{ $user->avatar }}" alt="" 
                                style="width: 100px; margin-top: 10px; "
                            >
                            @endif
                            <x-input-error class="mt-2" :messages="$errors->get('avatar')" />
                        </div>
                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Save') }}</x-primary-button>
                            <x-danger-button>{{ __('Cancel') }}</x-danger-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>