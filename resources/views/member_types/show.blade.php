
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Lidsoort Details: {{ $memberType->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="space-y-4">
                    <div>
                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Naam</dt>
                        <dd class="text-lg text-gray-900 dark:text-white">{{ $memberType->name }}</dd>
                    </div>
                </div>

                <div class="mt-8 flex space-x-4">
                    <a href="{{ route('member_types.edit', $memberType->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Bewerken
                    </a>
                    <a href="{{ route('member_types.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                        Terug
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
