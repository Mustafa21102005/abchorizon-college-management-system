<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Program Students') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <x-error-message />

                    <x-success-message />

                    @role('admin')
                        <div class="mb-4 flex items-center justify-between">
                            <h2 class="text-xl font-semibold mb-4">Program Students</h2>
                            <x-create-button href="{{ route('program_student.create') }}" name="Assign Student" />
                        </div>
                    @endrole

                    @if ($programStudents->isEmpty())
                        <p class="text-gray-600 dark:text-gray-300">No program students available.</p>
                    @else
                        <table class="table-auto w-full text-left border-collapse border border-gray-700">
                            <thead>
                                <tr>
                                    <th class="border border-gray-700 px-4 py-2">
                                        Student</th>
                                    <th class="border border-gray-700 px-4 py-2">Program</th>
                                    @role('admin')
                                        <th class="border border-gray-700 px-4 py-2">Actions</th>
                                    @endrole
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($programStudents as $programStudent)
                                    <tr>
                                        <td class="border border-gray-700 px-4 py-2">
                                            {{ $programStudent->user->name }}
                                        </td>
                                        <td class="border border-gray-700 px-4 py-2">
                                            {{ $programStudent->program->title }}
                                        </td>
                                        @role('admin')
                                            <td class="border border-gray-700 px-4 py-2">
                                                <div class="flex space-x-3">

                                                    <x-edit-button :href="route('program_student.edit', $programStudent->id)" />

                                                    <x-delete-button :action="route('program_student.destroy', $programStudent->id)" />

                                                </div>
                                            </td>
                                        @endrole
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
