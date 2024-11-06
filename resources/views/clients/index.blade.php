<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Clients') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a href="{{ route('clients.create') }}" class="underline">Add new client</a>
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 mt-4">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Company
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    VAT
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Address
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Date Created
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($clients as $client)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $client->company_name }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $client->company_vat }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $client->company_address }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $client->created_at->format('Y-d-m') }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <a href="{{ route('clients.edit', $client) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                        @can(\App\Enums\PermissionEnum::DELETE_CLIENTS->value)
                                        |
                                        <form method="POST" 
                                                class="inline-block" 
                                                action="{{ route('clients.destroy', $client) }}" 
                                                onsubmit="return confirm('Delete this client?')">
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
                        {{ $clients->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
