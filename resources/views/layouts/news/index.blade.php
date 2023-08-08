<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ $title }}
            </h2>
            <a href="{{ route('news.create') }}">Create news</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 overflow-scroll">
                    <table class="table">
                        @if(Session::has('success'))
                            <div class="alert alert-success">
                                {{ Session::get('success') }}
                            </div>
                        @endif
                        <thead>
                            <tr>
                                <th scope="col">STT</th>
                                <th scope="col">Name</th>
                                <th scope="col">Start At</th>
                                <th scope="col">End At</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($newsList as $news)
                                <tr>
                                    <th scope="row">{{ $news->id }}</th>
                                    <td>{{ $news->name }}</td>
                                    <td>{{ $news->start_at }}</td>
                                    <td>{{ $news->end_at }}</td>
                                    <td>
                                        @if ($news->is_suppension == 1)
                                            <font color="orange">Đã dừng</font>
                                        @elseif ($news->start_at > now())
                                            <font color="blue">Đã đăng</font>
                                        @elseif ($news->end_at < now())
                                            <font color="red">Đã hết hạn</font>
                                        @else
                                            Đang chờ đăng
                                        @endif
                                    </td>
                                    <td>
                                        <form action="{{ route('news.destroy', ['news' => $news->id]) }}" method="POST" 
                                            onclick="return confirm('Bạn có chắc chắn muốn xoá {{ $news->name }} này không?')"
                                            >
                                            <a href="{{ route('news.edit', ['news' => $news->id]) }}" class="btn btn-primary">Edit</a>

                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger bg-danger text-white">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>