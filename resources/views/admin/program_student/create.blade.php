<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Add Program Student') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <form method="POST" action="{{ route('program_student.store') }}">
                        @csrf

                        <div class="mb-4">
                            <label for="student_id" class="block text-gray-700 dark:text-gray-300 mb-2">Select
                                Student</label>
                            <select id="student_id" name="student_id"
                                class="block w-full bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-100 border rounded px-3 py-2">
                                <option value="">-- Select a Student --</option>
                                @foreach ($students as $student)
                                    <option value="{{ $student->id }}">{{ $student->name }}</option>
                                @endforeach
                            </select>
                            @error('student_id')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="program_id" class="block text-gray-700 dark:text-gray-300 mb-2">Select
                                Program</label>
                            <select id="program_id" name="program_id"
                                class="block w-full bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-100 border rounded px-3 py-2">
                                <option value="">-- Select a Program --</option>
                                @foreach ($programs as $program)
                                    <option value="{{ $program->id }}">{{ $program->title }}</option>
                                @endforeach
                            </select>
                            @error('program_id')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <x-action-button name="Create" />
                            <x-cancel-button :route="route('program_student.index')" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
