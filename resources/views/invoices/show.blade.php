
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Factuur Details: #{{ $invoice->id }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="space-y-4">
                    <div>
                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Lid</dt>
                        <dd class="text-lg text-gray-900 dark:text-white">{{ $invoice->member->first_name }} {{ $invoice->member->last_name }}</dd>
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Bedrag</dt>
                        <dd class="text-lg text-gray-900 dark:text-white">€{{ number_format($invoice->amount, 2, ',', '.') }}</dd>
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Omschrijving</dt>
                        <dd class="text-lg text-gray-900 dark:text-white">{{ $invoice->description }}</dd>
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Datum</dt>
                        <dd class="text-sm text-gray-900 dark:text-white">{{ $invoice->created_at->format('d-m-Y H:i') }}</dd>
                    </div>
                </div>

                <div class="mt-8 flex space-x-4">
                    <a href="{{ route('invoices.edit', $invoice->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Bewerken
                    </a>
                    <a href="{{ route('invoices.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                        Terug
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
