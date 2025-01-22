<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @can(\App\Enums\PermissionEnum::CREATE_USERS->value)
                    <a href="{{ route('users.create') }}" class="underline">Add new user</a>
                    @endcan
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 mt-4">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    First Name
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Last Name
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Email address
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Date Created
                                </th>
                                @can(\App\Enums\PermissionEnum::EDIT_USERS->value)
                                <th scope="col" class="px-6 py-3">
                                    Action
                                </th>
                                @endcan
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $user->first_name }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $user->last_name }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $user->email }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $user->created_at->format('Y-d-m') }}
                                    </td>
                                    <td class="px-6 py-4">
                                        @can(\App\Enums\PermissionEnum::EDIT_USERS->value)
                                        <a href="{{ route('users.edit', $user) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                        @endcan
                                        @can(\App\Enums\PermissionEnum::DELETE_USERS->value)
                                        |
                                        <form method="POST" 
                                                class="inline-block" 
                                                action="{{ route('users.destroy', $user) }}" 
                                                onsubmit="return confirm('Delete this user?')">
                                                @method('DELETE')
                                                @csrf
                                            <button type="submit" class="font-medium text-red-600 dark:text-blue-500 hover:underline">Delete</button>
                                        </form>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mt-4">
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
