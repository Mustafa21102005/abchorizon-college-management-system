<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Program Assignment') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <form action="{{ route('program_student.update', $programStudent->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="student_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Select Student
                            </label>
                            <select name="student_id_display" id="student_id_display"
                                class="w-full mt-1 text-black p-2 border rounded" disabled>
                                <option class="text-black" value="">-- Select a Student --</option>
                                @foreach ($students as $student)
                                    <option class="text-black" value="{{ $student->id }}"
                                        {{ old('student_id', $programStudent->student_id) == $student->id ? 'selected' : '' }}>
                                        {{ $student->name }}
                                    </option>
                                @endforeach
                            </select>
                            <input type="hidden" name="student_id" value="{{ $programStudent->student_id }}">
                            @error('student_id')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="program_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Select Program
                            </label>
                            <select name="program_id" id="program_id" class="w-full text-black mt-1 p-2 border rounded"
                                required>
                                <option class="text-black" value="">-- Select a Program --</option>
                                @foreach ($programs as $program)
                                    <option class="text-black" value="{{ $program->id }}"
                                        {{ $programStudent->program_id == $program->id ? 'selected' : '' }}>
                                        {{ $program->title }}
                                    </option>
                                @endforeach
                            </select>
                            @error('program_id')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <x-action-button name="Update" />
                            <x-cancel-button :route="route('program_student.index')" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
