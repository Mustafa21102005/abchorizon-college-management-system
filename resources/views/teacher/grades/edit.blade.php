<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Grade') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <form action="{{ route('grades.update', $grade->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="student_id" class="block text-gray-700 dark:text-gray-300">Student</label>
                            <select name="student_id" id="student_id" class="form-select text-black mt-1 block w-full"
                                disabled>
                                <option value="" disabled>Select a Student</option>
                                @foreach ($students as $student)
                                    <option value="{{ $student->id }}"
                                        {{ old('student_id', $grade->student_id) == $student->id ? 'selected' : '' }}>
                                        {{ $student->name }}
                                    </option>
                                @endforeach
                            </select>
                            <!-- Hidden input to send student_id with the form -->
                            <input type="hidden" name="student_id" value="{{ $grade->student_id }}">

                            @error('student_id')
                                <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="subject_id" class="block text-gray-700 dark:text-gray-300">Course</label>
                            <select name="subject_id" id="subject_id" class="form-select text-black mt-1 block w-full"
                                disabled>
                                <option value="" disabled>Select a Course</option>
                                @foreach ($subPrograms as $subProgram)
                                    <option value="{{ $subProgram->id }}"
                                        {{ old('subject_id', $grade->subject_id) == $subProgram->id ? 'selected' : '' }}>
                                        {{ $subProgram->title }}
                                    </option>
                                @endforeach
                            </select>
                            <!-- Hidden input to send subject_id with the form -->
                            <input type="hidden" name="subject_id" value="{{ $grade->subject_id }}">

                            @error('subject_id')
                                <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="grade" class="block text-gray-700 dark:text-gray-300">Grade</label>
                            <select name="grade" id="grade" class="form-select mt-1 text-black block w-full">
                                <option value="" disabled>Select a Grade</option>
                                @foreach ($grades as $gradeOption)
                                    <option value="{{ $gradeOption }}"
                                        {{ old('grade', $grade->grade) == $gradeOption ? 'selected' : '' }}>
                                        {{ $gradeOption }}
                                    </option>
                                @endforeach
                            </select>
                            @error('grade')
                                <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <x-action-button name="Update" />
                            <x-cancel-button :route="route('grades.index')" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
