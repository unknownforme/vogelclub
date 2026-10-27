
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Factuur Details') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="mb-6 flex justify-between items-center">
                        <h3 class="text-lg font-bold">Factuur #{{ $invoice->id }}</h3>
                        <span class="text-gray-500">{{ $invoice->created_at->format('d-m-Y') }}</span>
                    </div>
                    <div class="space-y-4">
                        <div class="flex justify-between"><span>Lid:</span><span class="font-semibold">{{ $invoice->member->first_name }} {{ $invoice->member->last_name }}</span></div>
                        <div class="flex justify-between"><span>Beschrijving:</span><span>{{ $invoice->description }}</span></div>
                        <hr class="border-gray-700">
                        <div class="flex justify-between text-xl font-bold"><span>Totaal:</span><span>€{{ number_format($invoice->amount, 2, ',', '.') }}</span></div>
                    </div>
                    <div class="mt-8 flex space-x-4">
                        <a href="{{ route('invoices.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Terug</a>
                        <a href="{{ route('invoices.edit', $invoice->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Wijzig</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

