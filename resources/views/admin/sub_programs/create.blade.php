<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Sub Program') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg">
                <div class="p-6">

                    <form method="POST" action="{{ route('sub_programs.store') }}">
                        @csrf

                        <div class="space-y-6">

                            <div>
                                <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    Title
                                </label>
                                <input type="text" name="title" id="title" value="{{ old('title') }}"
                                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                @error('title')
                                    <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div>
                                <label for="level"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    Level
                                </label>
                                <input type="number" name="level" id="level" value="{{ old('level') }}"
                                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                @error('level')
                                    <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div>
                                <label for="language"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    Language
                                </label>
                                <select name="language" id="language"
                                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    <option value="English" {{ old('language') == 'English' ? 'selected' : '' }}>English
                                    </option>
                                    <option value="Arabic" {{ old('language') == 'Arabic' ? 'selected' : '' }}>Arabic
                                    </option>
                                </select>
                                @error('language')
                                    <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div>
                                <label for="price"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    Price
                                </label>
                                <input type="number" name="price" id="price" value="{{ old('price') }}"
                                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                @error('price')
                                    <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div>
                                <label for="program_id"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    Select Program
                                </label>
                                <select name="program_id" id="program_id"
                                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    @foreach ($programs as $program)
                                        <option value="{{ $program->id }}"
                                            {{ old('program_id') == $program->id ? 'selected' : '' }}>
                                            {{ $program->title }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('program_id')
                                    <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div>
                                <x-action-button name="Create" />
                                <x-cancel-button :route="route('sub_programs.index')" />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
