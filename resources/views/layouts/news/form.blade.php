<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ $title }}
            </h2>
            <a href="{{ route('news.index') }}">Back</a>
        </div>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ !empty($news) ? route('news.update', ['news' => $news->id]) : route('news.store') }}" class="mt-6 space-y-6">
                        @csrf

                        @if (!empty($news))
                            @method('PUT')
                        @endif

                        <div>
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $news->name ?? null)" placeholder="Enter post name..."/>
                            <x-input-error class="mt-2" :messages="$errors->get('name')" />
                        </div>
                        <div>
                            <x-input-label for="start_at" :value="__('Start At')" />
                            <x-text-input id="start_at" name="start_at" type="datetime-local" class="mt-1 block w-full" :value="old('start_at', $news->start_at ?? null)" />
                            <x-input-error class="mt-2" :messages="$errors->get('start_at')" />
                        </div>
                        <div>
                            <x-input-label for="end_at" :value="__('End At')" />
                            <x-text-input id="end_at" name="end_at" type="datetime-local" class="mt-1 block w-full" :value="old('end_at', $news->end_at ?? null)" />
                            <x-input-error class="mt-2" :messages="$errors->get('end_at')" />
                        </div>
                        <div>
                            <x-input-label for="is_suppension" :value="__('Suppension')" />
                            <x-text-input id="is_suppension" name="is_suppension" type="number" class="mt-1 block w-full" :value="old('is_suppension', $news->is_suppension ?? null)" placeholder="Enter for number" />
                            <x-input-error class="mt-2" :messages="$errors->get('is_suppension')" />
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