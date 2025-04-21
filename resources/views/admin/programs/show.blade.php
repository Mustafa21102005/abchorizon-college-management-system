<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Program Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="border rounded-lg p-4">
                        <h3 class="text-2xl font-semibold text-gray-900 dark:text-gray-100">{{ $program->title }}</h3>

                        <h4 class="mt-4 text-xl font-semibold text-gray-900 dark:text-gray-100">Courses</h4>

                        @if ($program->subPrograms->isEmpty())
                            <p class="text-gray-500 dark:text-gray-400">No courses available for this program.</p>
                        @else
                            <ul class="mt-2 space-y-2">
                                @foreach ($program->subPrograms as $subProgram)
                                    <li class="p-4 bg-gray-100 dark:bg-gray-700 rounded-lg">
                                        <a href="{{ route('sub_programs.show', $subProgram->id) }}"
                                            class="font-medium text-white hover:underline">
                                            {{ $subProgram->title }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>

                    <div class="mt-6 flex justify-center">
                        <a href="{{ route('programs.index') }}"
                            class="inline-flex items-center px-4 py-2 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                            Back to Programs
                        </a>
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>
