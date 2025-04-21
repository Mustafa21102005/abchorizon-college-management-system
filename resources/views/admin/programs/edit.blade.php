<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Program') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">

                    <form method="POST" action="{{ route('programs.update', $program->id) }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="space-y-6">
                            <!-- Program Title -->
                            <div>
                                <label for="title"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    Program Title
                                </label>
                                <input type="text" name="title" id="title"
                                    value="{{ old('title', $program->title) }}"
                                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                @error('title')
                                    <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Program Image -->
                            <div>
                                <label for="image"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    Program Image
                                </label>

                                @if ($program->image)
                                    @php
                                        // Check if the image path is a URL or a local storage path
                                        $imagePath = filter_var($program->image->path, FILTER_VALIDATE_URL)
                                            ? $program->image->path
                                            : asset('storage/' . $program->image->path);
                                    @endphp

                                    <div class="mt-2 mb-4">
                                        <img src="{{ $imagePath }}" alt="Program Image"
                                            class="w-32 h-32 object-cover rounded-md">
                                    </div>
                                @endif

                                <!-- Allow the user to upload a new image -->
                                <input type="file" name="image" id="image" accept="image/*"
                                    class="mt-2 block w-full px-3 py-2 border text-white border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">

                                @error('image')
                                    <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
                                @enderror
                            </div>


                            <div>
                                <x-action-button name="Update" />
                                <x-cancel-button :route="route('programs.index')" />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
