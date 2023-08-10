<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ $title }}
            </h2>
            <a href="{{ route('course.create') }}">Create new</a>
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
                                <th scope="col">Price</th>
                                <th scope="col">Old Price</th>
                                <th scope="col">Admin Name</th>
                                <th scope="col">Category Name</th>
                                <th scope="col">Lesson</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($courses as $course)
                                <tr>
                                    <th scope="row">{{ $course->id }}</th>
                                    <td>{{ $course->name }}</td>
                                    <td>{{ $course->price }}</td>
                                    <td>{{ $course->old_price }}</td>
                                    <td>{{ optional($course->users->first())->name }}</td>
                                    <td>{{ optional($course->category)->name }}</td>
                                    <td>{{ $course->lessons }}</td>
                                    <td class="d-flex">
                                        <button class="text-info" type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                            Show  |
                                        </button>
                                        <form action="{{ route('course.destroy', ['course' => $course->id]) }}" method="POST">
                                            <a href="{{ route('course.edit', ['course' => $course->id]) }}" class="text-primary"
                                                onclick="return confirm('Bạn có thực sự muốn sửa {{ $course->name }} không?')">Edit |
                                            </a>

                                            @csrf
                                            @method('DELETE')
                                            <button class="text-danger" 
                                                onclick="return confirm('Bạn có thực sự muốn xoá {{ $course->name }} không?')">Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- Modal -->
                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Show Course</h5>
                                    <button type="button" class="btn-close text-danger" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <table class="table">
                                        <thead>
                                            <tr class="text-center">
                                                <th scope="col">STT</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Slug</th>
                                                <th scope="col">Link</th>
                                                <th scope="col">Price</th>
                                                <th scope="col">Old Price</th>
                                                <th scope="col">Created By</th>
                                                <th scope="col">Category Name</th>
                                                <th scope="col">Lesson Name</th>
                                                <th scope="col">View Count</th>
                                                <th scope="col">Benefits</th>
                                                <th scope="col">Fqa</th>
                                                <th scope="col">Feature</th>
                                                <th scope="col">Online</th>
                                                <th scope="col">Description</th>
                                                <th scope="col">Content</th>
                                                <th scope="col">Meta Title</th>
                                                <th scope="col">Meta Desc</th>
                                                <th scope="col">Meta Keyword</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($courses as $course)
                                                <tr class="text-center">
                                                    <th scope="row">{{ $course->id }}</th>
                                                    <td>{{ $course->name }}</td>
                                                    <td>{{ $course->slug }}</td>
                                                    <td>{{ $course->link }}</td>
                                                    <td>{{ $course->price }}</td>
                                                    <td>{{ $course->old_price }}</td>
                                                    <td>{{ $course->created_by }}</td>
                                                    <td>{{ optional($course->category)->name }}</td>
                                                    <td>{{ $course->lessons }}</td>
                                                    <td>{{ $course->view_count }}</td>
                                                    <td>{{ $course->benefits }}</td>
                                                    <td>{{ $course->fqa }}</td>
                                                    <td>{{ $course->is_feature }}</td>
                                                    <td>{{ $course->is_online }}</td>
                                                    <td>{{ $course->description }}</td>
                                                    <td>{{ $course->content }}</td>
                                                    <td>{{ $course->meta_title }}</td>
                                                    <td>{{ $course->meta_desc }}</td>
                                                    <td>{{ $course->meta_keyword }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary text-black-50" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>