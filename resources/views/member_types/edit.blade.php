
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Lidsoort Wijzigen: ' . $memberType->name) }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('member_types.update', $memberType->id) }}" method="POST" class="space-y-6">
                        @csrf
                        @method('PUT')
                        <div>
                            <x-input-label for="name" :value="__('Naam')" />
                            <x-text-input id="name" name="name" type="text" value="{{ old('name', $memberType->name) }}" class="mt-1 block w-full" required />
                        </div>
                        <div>
                            <x-input-label for="price" :value="__('Huidige Prijs (€)')" />
                            <x-text-input id="price" name="price" type="number" step="0.01" value="{{ old('price', $memberType->price) }}" class="mt-1 block w-full" required />
                        </div>
                        <div>
                            <x-input-label for="announced_price" :value="__('Aangekondigde Prijs voor volgend jaar (€)')" />
                            <x-text-input id="announced_price" name="announced_price" type="number" step="0.01" value="{{ old('announced_price', $memberType->announced_price) }}" class="mt-1 block w-full" />
                        </div>
                        <div class="flex items-center justify-end mt-6">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Bijwerken</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

