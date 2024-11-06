<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Projects') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a href="{{ route('projects.create') }}" class="underline">Add new project</a>
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 mt-4">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Title
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Assigned To
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Client
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Deadline
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Status
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($projects as $project)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $project->title }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $project->user->first_name }} {{ $project->user->last_name }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $project->client->company_name }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $project->deadline_at }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $project->status }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <a href="{{ route('projects.edit', $project) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                        @can(\App\Enums\PermissionEnum::DELETE_PROJECTS->value)
                                        |
                                        <form method="POST" 
                                                class="inline-block" 
                                                action="{{ route('projects.destroy', $project) }}" 
                                                onsubmit="return confirm('Delete this project?')">
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
                        {{ $projects->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
