<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ $title }}
            </h2>
            <a href="{{ route('course.index') }}">Back</a>
        </div>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ !empty($course) ? route('course.update', ['course' => $course->id]) : route('course.store') }}" class="mt-6 space-y-6">
                        @csrf

                        @if (!empty($course))
                            @method('PUT')
                        @endif

                        <div class="row g-3">
                            <div class="col">
                                <div class="col-12 mb-3">
                                    <x-input-label for="name" :value="__('Name')" />
                                    <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $course->name ?? null)" placeholder="Enter course name..."/>
                                    <x-input-error class="mt-2" :messages="$errors->get('name')" />
                                </div>
                                <div class="col-12 mb-3">
                                    <x-input-label for="slug" :value="__('Slug')" />
                                    <x-text-input id="slug" name="slug" type="text" class="mt-1 block w-full" :value="old('slug', $course->slug ?? null)" placeholder="Enter course slug..."/>
                                    <x-input-error class="mt-2" :messages="$errors->get('slug')" />
                                </div>
                                <div class="col-12 mb-3">
                                    <x-input-label for="link" :value="__('Link')" />
                                    <x-text-input id="link" name="link" type="text" class="mt-1 block w-full" :value="old('link', $course->link ?? null)" placeholder="Enter course link..."/>
                                    <x-input-error class="mt-2" :messages="$errors->get('link')" />
                                </div>
                                <div class="col-12 mb-3">
                                    <x-input-label for="price" :value="__('Price')" />
                                    <x-text-input id="price" name="price" type="text" class="mt-1 block w-full" :value="old('price', $course->price ?? null)" placeholder="Enter for number" />
                                    <x-input-error class="mt-2" :messages="$errors->get('price')" />
                                </div>
                                <div class="col-12 mb-3">
                                    <x-input-label for="old_price" :value="__('Old Price')" />
                                    <x-text-input id="old_price" name="old_price" type="text" class="mt-1 block w-full" :value="old('old_price', $course->old_price ?? null)" placeholder="Enter for number" />
                                    <x-input-error class="mt-2" :messages="$errors->get('old_price')" />
                                </div>
                                <div class="col-12 mb-3">
                                    <x-input-label for="created_by" :value="__('Created By')" />
                                    <x-text-input id="created_by" name="created_by" type="text" class="mt-1 block w-full" value="{{ $user_name }}" readonly placeholder="Enter for created by..." />
                                    <x-input-error class="mt-2" :messages="$errors->get('created_by')" />
                                </div>
                                <div class="col-12 mb-3">
                                    <x-input-label for="category" class="mb-2" :value="__('Category')" />
                                    <select class="form-select" aria-label="Default select example" name="category_id">
                                        <option disabled>Category Name</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}" {{ (old('category_id', $course->category->id ?? null) == $category->id) ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-12 mb-3">
                                    <x-input-label for="lessons" :value="__('Lesson')" />
                                    <x-text-input id="lessons" name="lessons" type="text" class="mt-1 block w-full" :value="old('lessons', $course->lessons ?? null)" placeholder="Enter for number lesson..." />
                                    <x-input-error class="mt-2" :messages="$errors->get('lessons')" />
                                </div>
                                <div class="col-12">
                                    <x-input-label for="view_count" :value="__('View Count')" />
                                    <x-text-input id="view_count" name="view_count" type="text" class="mt-1 block w-full" :value="old('view_count', $course->view_count ?? null)" placeholder="Enter for view count" />
                                    <x-input-error class="mt-2" :messages="$errors->get('view_count')" />
                                </div>
                            </div>
                    
                            <div class="col">
                                <div class="col-12 mb-3">
                                    <x-input-label for="benefits" :value="__('Benefits')" />
                                    <x-text-input id="benefits" name="benefits" type="text" class="mt-1 block w-full" :value="old('benefits', $course->benefits ?? null)" placeholder="Enter for benefits json..." />
                                    <x-input-error class="mt-2" :messages="$errors->get('benefits')" />
                                </div>
                                <div class="col-12 mb-3">
                                    <x-input-label for="fqa" :value="__('FQA')" />
                                    <x-text-input id="fqa" name="fqa" type="text" class="mt-1 block w-full" :value="old('fqa', $course->fqa ?? null)" placeholder="Enter for fqa json..." />
                                    <x-input-error class="mt-2" :messages="$errors->get('fqa')" />
                                </div>
                                <div class="col-12 mb-3">
                                    <x-input-label for="is_feature" :value="__('Feature')" />
                                    <x-text-input id="is_feature" name="is_feature" type="text" class="mt-1 block w-full" :value="old('is_feature', $course->is_feature ?? null)" placeholder="Enter for number is_feature..." />
                                    <x-input-error class="mt-2" :messages="$errors->get('is_feature')" />
                                </div>
                                <div class="col-12 mb-3">
                                    <x-input-label for="is_online" :value="__('Online')" />
                                    <x-text-input id="is_online" name="is_online" type="text" class="mt-1 block w-full" :value="old('is_online', $course->is_online ?? null)" placeholder="Enter for number is_online..." />
                                    <x-input-error class="mt-2" :messages="$errors->get('is_online')" />
                                </div>
                                <div class="col-12 mb-3">
                                    <x-input-label for="description" :value="__('Description')" />
                                    <x-text-input id="description" name="description" type="text" class="mt-1 block w-full" :value="old('description', $course->description ?? null)" placeholder="Enter for description..." />
                                    <x-input-error class="mt-2" :messages="$errors->get('description')" />
                                </div>
                                <div class="col-12 mb-3">
                                    <x-input-label for="content" :value="__('Content')" />
                                    <x-text-input id="content" name="content" type="text" class="mt-1 block w-full" :value="old('content', $course->content ?? null)" placeholder="Enter for content..." />
                                    <x-input-error class="mt-2" :messages="$errors->get('content')" />
                                </div>
                                <div class="col-12 mb-3">
                                    <x-input-label for="meta_title" :value="__('Meta Title')" />
                                    <x-text-input id="meta_title" name="meta_title" type="text" class="mt-1 block w-full" :value="old('meta_title', $course->meta_title ?? null)" placeholder="Enter for meta_title..." />
                                    <x-input-error class="mt-2" :messages="$errors->get('meta_title')" />
                                </div>
                                <div class="col-12 mb-3">
                                    <x-input-label for="meta_desc" :value="__('Meta Description')" />
                                    <x-text-input id="meta_desc" name="meta_desc" type="text" class="mt-1 block w-full" :value="old('meta_desc', $course->meta_desc ?? null)" placeholder="Enter for meta_desc..." />
                                    <x-input-error class="mt-2" :messages="$errors->get('meta_desc')" />
                                </div>
                                <div class="col-12">
                                    <x-input-label for="meta_keyword" :value="__('Meta Keyword')" />
                                    <x-text-input id="meta_keyword" name="meta_keyword" type="text" class="mt-1 block w-full" :value="old('meta_keyword', $course->meta_keyword ?? null)" placeholder="Enter for meta_keyword..." />
                                    <x-input-error class="mt-2" :messages="$errors->get('meta_keyword')" />
                                </div>
                                
                            </div>
                        </div>

                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Save') }}</x-primary-button>
                            <x-danger-button type="reset">{{ __('Cancel') }}</x-danger-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>