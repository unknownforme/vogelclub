
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Lidsoort Bewerken') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('member_types.update', $memberType->id) }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')
                    <div>
                        <x-input-label for="name" :value="__('Lidsoort Naam')" />
                        <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $memberType->name)" required />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="description" :value="__('Beschrijving')" />
                        <textarea id="description" name="description" class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" rows="3" required>{{ old('description', $memberType->description) }}</textarea>
                        <x-input-error :messages="$errors->get('description')" class="mt-2" />
                    </div>
                        <div class="mt-4">
                            <x-input-label for="price" :value="__('Prijs (in centen)')" />
                            <x-text-input id="price" name="price" type="text" class="mt-1 block w-full" :value="old('price', $memberType->price)" required />
                            <x-input-error :messages="$errors->get('price')" class="mt-2" />
                        </div>

                    <div class="flex items-center justify-end mt-6">
                        <x-primary-button class="ml-3">
                            {{ __('Opslaan') }}
                        </x-primary-button>
                        <a href="{{ route('member_types.index') }}" class="ml-4 text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-200">
                            Annuleren
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
