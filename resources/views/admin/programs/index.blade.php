<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Programs') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg">
                <div class="p-6">

                    <x-error-message />

                    <x-success-message />

                    <div class="flex justify-between items-center">
                        <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-100">Programs</h2>

                        @role('admin')
                            <x-create-button href="{{ route('programs.create') }}" name="Create Program" />
                        @endrole
                    </div>

                    @if ($programs->isEmpty())
                        <div class="text-center text-gray-600 dark:text-gray-400 mt-6">
                            <p>No Programs Available</p>
                        </div>
                    @else
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-6">
                            @foreach ($programs as $program)
                                <div class="border rounded-lg bg-gray-50 dark:bg-gray-900 p-4 shadow-md">
                                    <div class="flex flex-col items-center">
                                        <!-- Program Image -->
                                        @if ($program->image)
                                            @php
                                                $imagePath = filter_var($program->image->path, FILTER_VALIDATE_URL)
                                                    ? $program->image->path
                                                    : asset('storage/' . $program->image->path);
                                            @endphp

                                            <img src="{{ $imagePath }}" alt="{{ $program->title }}"
                                                class="w-full h-48 object-cover rounded-md mb-4">
                                        @else
                                            <div
                                                class="w-full h-48 bg-gray-200 dark:bg-gray-700 rounded-md flex items-center justify-center">
                                                <span class="text-gray-400">No Image Available</span>
                                            </div>
                                        @endif

                                        <!-- Program Title -->
                                        <h3
                                            class="text-lg font-medium text-gray-900 dark:text-gray-100 text-center mb-2">
                                            <a href="{{ route('programs.show', $program->id) }}"
                                                class="text-blue-600 hover:underline">
                                                {{ $program->title }}
                                            </a>
                                        </h3>

                                        <!-- Admin Actions -->
                                        @role('admin')
                                            <div class="flex space-x-3 mt-3">
                                                <a href="{{ route('programs.edit', $program->id) }}"
                                                    class="text-white bg-yellow-500 hover:bg-yellow-600 px-3 py-1.5 rounded text-sm">
                                                    Edit
                                                </a>
                                                <form action="{{ route('programs.destroy', $program->id) }}" method="POST"
                                                    onsubmit="return confirm('Are you sure you want to delete this?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="text-white bg-red-500 hover:bg-red-600 px-3 py-1.5 rounded text-sm">
                                                        Delete
                                                    </button>
                                                </form>
                                            </div>
                                        @endrole
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
