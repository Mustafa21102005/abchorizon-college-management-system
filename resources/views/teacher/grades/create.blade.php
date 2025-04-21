<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Grade a Student') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('grades.store') }}" method="POST">
                        @csrf

                        <div class="mb-4">
                            <label for="student_id" class="block text-gray-700 dark:text-gray-300">Student</label>
                            <select name="student_id" id="student_id" class="form-select mt-1 text-black block w-full">
                                <option value="" disabled selected>Select a Student</option>
                                @foreach ($students as $student)
                                    <option value="{{ $student->id }}">{{ $student->name }}</option>
                                @endforeach
                            </select>
                            @error('student_id')
                                <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="subject_id" class="block text-gray-700 dark:text-gray-300">Subject</label>
                            <select name="subject_id" id="subject_id" class="form-select mt-1 text-black block w-full"
                                disabled>
                                <option disabled selected>Select a Subject</option>
                            </select>
                            @error('subject_id')
                                <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="grade" class="block text-gray-700 dark:text-gray-300">Grade</label>
                            <select name="grade" id="grade" class="form-select mt-1 text-black block w-full">
                                <option value="" disabled selected>Select a Grade</option>
                                @foreach ($grades as $grade)
                                    <option value="{{ $grade }}">{{ $grade }}</option>
                                @endforeach
                            </select>
                            @error('grade')
                                <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <x-action-button name="Create" />
                            <x-cancel-button :route="route('grades.index')" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const studentSelect = document.getElementById("student_id");
            const subjectSelect = document.getElementById("subject_id");

            studentSelect.addEventListener("change", function() {
                const studentId = this.value;

                // Disable the subject dropdown and clear its options
                subjectSelect.disabled = true;
                subjectSelect.innerHTML = '<option value="" disabled selected>Loading...</option>';

                // Fetch subjects for the selected student
                if (studentId) {
                    fetch(`{{ route('grades.subjects', ':id') }}`.replace(':id', studentId))
                        .then(response => {
                            if (!response.ok) {
                                throw new Error("Network response was not ok");
                            }
                            return response.json();
                        })
                        .then(data => {
                            subjectSelect.innerHTML =
                                '<option value="" disabled selected>Select a Subject</option>';

                            // Populate the dropdown with the fetched subjects
                            if (data.length > 0) {
                                data.forEach(subject => {
                                    const option = document.createElement("option");
                                    option.value = subject.id;
                                    option.textContent = subject.title;
                                    subjectSelect.appendChild(option);
                                });

                                // Enable the subject dropdown
                                subjectSelect.disabled = false;
                            } else {
                                subjectSelect.innerHTML =
                                    '<option value="" disabled selected>No subjects available</option>';
                            }
                        })
                        .catch(error => {
                            console.error("Error fetching subjects:", error);
                            subjectSelect.innerHTML =
                                '<option value="" disabled selected>Error loading subjects</option>';
                        });
                } else {
                    subjectSelect.innerHTML =
                        '<option value="" disabled selected>Select a Student first</option>';
                }
            });
        });
    </script>

</x-app-layout>
