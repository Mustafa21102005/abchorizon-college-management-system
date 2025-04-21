<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Grades') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <x-error-message />

                    <x-success-message />


                    <div class="mb-4 flex items-center justify-between">
                        <h2 class="text-xl font-semibold mb-4">Grades</h2>
                        @role('teacher')
                            <x-create-button href="{{ route('grades.create') }}" name="Grade a Student" />
                        @endrole
                    </div>

                    @if ($grades->isEmpty())
                        <p class="text-gray-600 dark:text-gray-300">No grades available.</p>
                    @else
                        <table class="table-auto w-full text-left border-collapse border border-gray-700">
                            <thead>
                                <tr>
                                    <th class="border border-gray-700 px-4 py-2">Student</th>
                                    <th class="border border-gray-700 px-4 py-2">Subject</th>
                                    <th class="border border-gray-700 px-4 py-2">Grade</th>
                                    @role('teacher')
                                        <th class="border border-gray-700 px-4 py-2">Actions</th>
                                    @endrole
                                    @role('admin')
                                        <th class="border border-gray-700 px-4 py-2">Date</th>
                                    @endrole
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($grades as $grade)
                                    <tr>
                                        <td class="border border-gray-700 px-4 py-2">
                                            {{ $grade->student->name }}
                                        </td>
                                        <td class="border border-gray-700 px-4 py-2">
                                            {{ $grade->subject->title }}
                                        </td>
                                        <td class="border border-gray-700 px-4 py-2">
                                            {{ $grade->grade }}
                                        </td>
                                        <td class="border border-gray-700 px-4 py-2">
                                            @role('teacher')
                                                <div class="flex space-x-3">

                                                    <x-edit-button :href="route('grades.edit', $grade->id)" />

                                                    <x-delete-button :action="route('grades.destroy', $grade->id)" />

                                                </div>
                                            @endrole
                                            @role('admin')
                                                {{ \Carbon\Carbon::parse($grade->created_at)->format('Y-m-d') }}
                                            @endrole
                                        </td>
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
