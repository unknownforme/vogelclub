
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Kweeknummers Overzicht') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-200">Kweeknummers</h2>
                <a href="{{ route('breeding_numbers.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Nieuw Kweeknummer Toevoegen</a>
            </div>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kweeknummer</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Lid</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acties</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                            @foreach($breedingNumbers as $bn)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap font-semibold">{{ $bn->breeding_number }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $bn->member->first_name ?? 'N/A' }} {{ $bn->member->last_name ?? '' }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <a href="{{ route('breeding_numbers.show', $bn->id) }}" class="text-indigo-600 hover:text-indigo-900 mr-3">Bekijk</a>
                                        <a href="{{ route('breeding_numbers.edit', $bn->id) }}" class="text-blue-600 hover:text-blue-900 mr-3">Wijzig</a>
                                        <form action="{{ route('breeding_numbers.destroy', $bn->id) }}" method="POST" class="inline" onsubmit="return confirm('Weet je het zeker?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900">Verwijder</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mt-4">
                        {{ $breedingNumbers->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
