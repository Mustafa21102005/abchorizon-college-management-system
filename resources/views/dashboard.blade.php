<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

                @role('teacher||admin')
                    @php
                        $studentHref = auth()->user()->hasRole('admin') ? route('users.index') : '';
                    @endphp

                    <x-card title="Students" :count="$studentsCount" :href="$studentHref" />

                    @role('admin')
                        <x-card title="Teachers" :count="$teachersCount" href="{{ route('users.index') }}" />
                    @endrole

                    <x-card title="Programs" :count="$programsCount" href="{{ route('programs.index') }}" />

                    <x-card title="Sub Programs" :count="$subProgramsCount" href="{{ route('sub_programs.index') }}" />
                @endrole

            </div>
        </div>
    </div>
</x-app-layout>
