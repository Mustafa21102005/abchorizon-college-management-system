<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Sub Programs') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg">
                <div class="p-6">

                    <x-error-message />

                    <x-success-message />

                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-100">Sub Programs</h2>
                        @role('admin')
                            <x-create-button href="{{ route('sub_programs.create') }}" name="Create Sub Program" />
                        @endrole
                    </div>

                    @if ($subPrograms->isEmpty())
                        <div class="text-center text-gray-600 dark:text-gray-400 mt-6">
                            <p>No Courses Available</p>
                        </div>
                    @else
                        @foreach ($subPrograms as $subProgram)
                            <div class="mt-6 border rounded-lg bg-gray-50 dark:bg-gray-900 p-4">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                            <a href="{{ route('sub_programs.show', $subProgram->id) }}"
                                                class="hover:underline">
                                                {{ $subProgram->title }}
                                            </a>
                                        </h3>
                                        <p class="text-sm text-gray-600 dark:text-gray-400">
                                            Language: {{ $subProgram->language }}
                                        </p>
                                        <p class="text-sm text-gray-600 dark:text-gray-400">
                                            Price: ${{ number_format($subProgram->price, 2) }}
                                        </p>
                                    </div>

                                    @role('admin')
                                        <div class="flex space-x-3">
                                            <x-edit-button :href="route('sub_programs.edit', $subProgram->id)" />
                                            <x-delete-button :action="route('sub_programs.destroy', $subProgram->id)" />
                                        </div>
                                    @endrole
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
