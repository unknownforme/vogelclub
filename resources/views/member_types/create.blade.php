
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Nieuwe Lidsoort Toevoegen') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('member_types.store') }}" method="POST" class="space-y-6">
                        @csrf
                        <div>
                            <x-input-label for="name" :value="__('Naam')" />
                            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" required />
                            @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <x-input-label for="price" :value="__('Huidige Prijs (€)')" />
                            <x-text-input id="price" name="price" type="number" step="0.01" class="mt-1 block w-full" required />
                            @error('price') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <x-input-label for="announced_price" :value="__('Aangekondigde Prijs voor volgend jaar (€)')" />
                            <x-text-input id="announced_price" name="announced_price" type="number" step="0.01" class="mt-1 block w-full" />
                            @error('announced_price') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>
                        <div class="flex items-center justify-end mt-6">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                {{ __('Opslaan') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

