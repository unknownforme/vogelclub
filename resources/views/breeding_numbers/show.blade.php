
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Kweeknummer Details') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="mb-6 flex justify-between items-center">
                        <h3 class="text-lg font-bold">Details: {{ $breedingNumber->breeding_number }}</h3>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-8">
                        <div><p class="text-sm text-gray-500">Lid</p><p class="text-lg font-semibold">{{ $breedingNumber->member->first_name ?? 'N/A' }} {{ $breedingNumber->member->last_name ?? '' }}</p></div>
                    </div>
                    <div class="mt-8 flex space-x-4">
                        <a href="{{ route('breeding_numbers.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Terug</a>
                        <a href="{{ route('breeding_numbers.edit', $breedingNumber->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Wijzig</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

