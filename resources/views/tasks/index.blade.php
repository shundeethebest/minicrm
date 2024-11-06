<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tasks') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a href="{{ route('tasks.create') }}" class="underline">Add new Task</a>
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
                                    Project
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
                            @foreach($tasks as $task)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row" class="px-2 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $task->title }}
                                    </th>
                                    <td class="px-2 py-4">
                                        {{ $task->user->first_name }} {{ $task->user->last_name }}
                                    </td>
                                    <td class="px-2 py-4">
                                        {{ $task->client->company_name }}
                                    </td>
                                    <td class="px-2 py-4">
                                        {{ $task->project->title }}
                                    </td>
                                    <td class="px-2 py-4">
                                        {{ $task->deadline_at }}
                                    </td>
                                    <td class="px-2 py-4">
                                        {{ $task->status }}
                                    </td>
                                    <td class="px-2 py-4">
                                        <a href="{{ route('tasks.edit', $task) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                        @can(\App\Enums\PermissionEnum::DELETE_TASKS->value)
                                        |
                                        <form method="POST" 
                                                class="inline-block" 
                                                action="{{ route('tasks.destroy', $task) }}" 
                                                onsubmit="return confirm('Delete this task?')">
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
                        {{ $tasks->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
