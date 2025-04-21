<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Sub Program Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg">
                <div class="p-6">

                    <div class="mb-6">
                        <h3 class="text-2xl font-semibold text-gray-900 dark:text-gray-100">{{ $subProgram->title }}</h3>
                        <p class="text text-gray-600 dark:text-gray-400">Code: {{ $subProgram->code }}</p>
                        <p class="text text-gray-600 dark:text-gray-400">Level: {{ $subProgram->level }}</p>
                        <p class="text text-gray-600 dark:text-gray-400">Language: {{ $subProgram->language }}</p>
                        <p class="text text-gray-600 dark:text-gray-400">Price:
                            ${{ number_format($subProgram->price) }}</p>
                        <p class="text-sm text-gray-600 dark:text-gray-400">Program:
                            {{ $subProgram->program->title }}
                        </p>
                    </div>

                    <div>
                        <a href="{{ route('sub_programs.index') }}"
                            class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Back to Sub Programs
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
