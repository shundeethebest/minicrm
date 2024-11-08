<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Clients') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="overflow-hidden overflow-x-auto p-6 bg-white border-b border">
                    <form method="POST" action="{{ route('projects.store') }}">
                        @csrf
                        <div class="divide-y-2 divide-none space-y-4">

                            <!-- Project Title -->
                            <div class="mt-4">
                                <x-input-label for="title" :value="__('Title')" />
                                <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required />
                                <x-input-error :messages="$errors->get('title')" class="mt-2" />
                            </div>

                            <!-- Project Description -->
                            <div class="mt-4">
                                <x-input-label for="description" :value="__('Description')" />
                                <textarea class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
                                            id="description" class="block mt-1 w-full" type="text" name="description" :value="old('description')" required></textarea>
                                <x-input-error :messages="$errors->get('description')" class="mt-2" />
                            </div>

                            <!-- Deadline At -->
                            <div class="mt-4">
                                <x-input-label for="deadline_at" :value="__('Deadline')" />
                                <x-text-input id="deadline_at" class="block mt-1 w-full" type="date" name="deadline_at" :value="old('deadline_at')" required />
                                <x-input-error :messages="$errors->get('deadline_at')" class="mt-2" />
                            </div>

                            <!-- Assigned User -->
                            <div class="mt-4">
                                <x-input-label for="user_id" :value="__('Assigned User')" />
                                <select class="block mt-1 w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="user_id" id="user_id">
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}"
                                            @selected(old('user_id') == $user->id)>{{ $user->first_name . ' ' . $user->last_name }}</option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('user_id')" class="mt-2" />
                            </div>

                            <!-- Assigned Client -->
                            <div class="mt-4">
                                <x-input-label for="client_id" :value="__('Client')" />
                                <select class="block mt-1 w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="client_id" id="client_id">
                                    @foreach ($clients as $client)
                                        <option value="{{ $client->id }}"
                                            @selected(old('client_id') == $client->id)>{{ $client->company_name }}</option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('client_id')" class="mt-2" />
                            </div>

                            <!-- Status -->
                            <div class="mt-4">
                                <x-input-label for="status" :value="__('Status')" />
                                <select class="block mt-1 w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="status" id="status">
                                    @foreach (\App\Enums\ProjectStatus::cases() as $status)
                                        <option value="{{ $status->value }}"
                                            @selected(old('status') == $status->value)>{{ $status->value }}</option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('status')" class="mt-2" />
                            </div>

                        </div>

                        <div class="flex items-center justify-start mt-4">
                            <x-primary-button class="mt-4">
                                {{ __('Save') }}
                            </x-primary-button>
                        </div>
                    </form>                
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
