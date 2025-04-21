<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <x-error-message />
                    <x-success-message />

                    <div class="justify-between items-center flex mb-4">
                        <h1 class="text-2xl font-bold">Users</h1>

                        <!-- Filter Dropdown -->
                        <form method="GET" action="{{ route('users.index') }}" class="flex items-center">
                            <label for="role" class="mr-2">Filter by Role:</label>
                            <select name="role" id="role" class=" text-black px-4 py-2 border rounded">
                                @foreach ($roles as $role)
                                    <option class="text-black" value="{{ $role->name }}"
                                        {{ request('role') === $role->name ? 'selected' : '' }}>
                                        {{ ucfirst($role->name) }}
                                    </option>
                                @endforeach
                            </select>
                            <button type="submit"
                                class="ml-2 mr-2 px-4 py-2 bg-blue-500 text-white rounded">Filter</button>
                            <a href="{{ route('users.index') }}"
                                class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-gray-700 bg-gray-200 hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                                Remove Filter
                            </a>
                        </form>

                        <x-create-button href="{{ route('users.create') }}" name="Create User" />
                    </div>

                    <table id="users" class="table-auto w-full text-left border-collapse border border-gray-700">
                        <thead>
                            <tr>
                                <th class="border border-gray-700 px-4 py-2">Name</th>
                                <th class="border border-gray-700 px-4 py-2">Email</th>
                                <th class="border border-gray-700 px-4 py-2">Role</th>
                                <th class="border border-gray-700 px-4 py-2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td class="border border-gray-700 px-4 py-2">{{ $user->name }}</td>
                                    <td class="border border-gray-700 px-4 py-2">{{ $user->email }}</td>
                                    <td class="border border-gray-700 px-4 py-2">
                                        {{ $user->roles->pluck('name')->join(', ') }}
                                    </td>
                                    <td class="border border-gray-700 px-4 py-2">
                                        <div class="flex space-x-3">
                                            <x-edit-button :href="route('users.edit', $user->id)" />
                                            <x-delete-button :action="route('users.destroy', $user->id)" />
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
