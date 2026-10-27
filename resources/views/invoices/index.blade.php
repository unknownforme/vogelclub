
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Facturen Overzicht') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-200">Facturen</h2>
                <a href="{{ route('invoices.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Nieuwe Factuur</a>
            </div>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead class="bg-gray-50 dark:bg-gray-700">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Datum</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Lid</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Beschrijving</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Bedrag</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acties</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                            @foreach($invoices as $invoice)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $invoice->created_at->format('d-m-Y') }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $invoice->member->first_name ?? 'N/A' }} {{ $invoice->member->last_name ?? '' }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $invoice->description }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">€{{ number_format($invoice->amount, 2, ',', '.') }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <a href="{{ route('invoices.show', $invoice->id) }}" class="text-indigo-600 hover:text-indigo-900 mr-3">Bekijk</a>
                                        <a href="{{ route('invoices.edit', $invoice->id) }}" class="text-blue-600 hover:text-blue-900 mr-3">Wijzig</a>
                                        <form action="{{ route('invoices.destroy', $invoice->id) }}" method="POST" class="inline" onsubmit="return confirm('Weet je het zeker?')">
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
                        {{ $invoices->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
