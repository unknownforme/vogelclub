
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Lidsoorten Overzicht') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-200">Lidsoorten</h2>
                <a href="{{ route('member_types.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Nieuwe Lidsoort Toevoegen</a>
            </div>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead class="bg-gray-50 dark:bg-gray-700">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Naam</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Huidige Prijs</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aangekondigde Prijs (volgend jaar)</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acties</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                            @foreach($memberTypes as $type)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $type->name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">€{{ number_format($type->price, 2, ',', '.') }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">€{{ $type->announced_price ? number_format($type->announced_price, 2, ',', '.') : 'N/A' }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <a href="{{ route('member_types.show', $type->id) }}" class="text-indigo-600 hover:text-indigo-900 mr-3">Bekijk</a>
                                        <a href="{{ route('member_types.edit', $type->id) }}" class="text-blue-600 hover:text-blue-900 mr-3">Wijzig</a>
                                        <form action="{{ route('member_types.destroy', $type->id) }}" method="POST" class="inline" onsubmit="return confirm('Weet je het zeker?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900">Verwijder</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

