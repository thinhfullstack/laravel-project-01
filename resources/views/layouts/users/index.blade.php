<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('User List') }}
            </h2>
            <a href="{{ route('user.create') }}">Create new</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="form-search">
                <form action="{{ route('user.index') }}" method="GET" class="d-flex">
                    <select class="form-select" aria-label="Default select example" name="family_id">
                        <option selected disabled>All Selected</option>
                        @foreach ($families as $family)
                            <option value="{{ $family->id }}" {{ request()->get('family_id') == $family->id ? 'selected' : '' }}>
                                {{ $family->name }}
                            </option>
                        @endforeach
                    </select>
                    <input type="text" name="keyword" value="{{ request()->get('keyword') }}" placeholder="Search keyword...">
                    <button class="btn btn-primary">Search</button>
                </form>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="table">
                        @if(Session::has('success'))
                            <div class="alert alert-success">
                                {{ Session::get('success') }}
                            </div>
                        @endif
                        <thead>
                            <tr>
                                <th scope="col">STT</th>
                                <th scope="col">Avatar</th>
                                <th scope="col">User Type</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Family Name</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Gender</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($usersPaginate->items() as $user)
                                <tr>
                                    <th scope="row">{{ $user->id }}</th>
                                    <td>
                                        <img style="width: 50px; height: 50px; border-radius: 50%" src="/storage/{{ $user->avatar }}" alt="">
                                    </td>
                                    <td>{{ $user->user_type }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->family->name }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <td>{{ $user->gender_label }}</td>
                                    <td>   
                                        <form action="{{ route('user.destroy', ['user' => $user->id]) }}" method="POST" 
                                            onclick="return confirm('Bạn có chắc chắn muốn xoá {{ $user->name }} này không?')"
                                            >
                                            <a href="{{ route('user.edit', ['user' => $user->id]) }}">Edit</a>
                                            
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div>
                        {{ $usersPaginate->appends(request()->query())->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>