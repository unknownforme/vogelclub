<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-lg font-medium text-gray-900 dark:text-white">Invoices Lijst</h3>
                <div class="flex items-center space-x-4">
                    <form action="{{ route('invoices.index') }}" method="GET" class="flex items-center space-x-2">
                        <select name="status" onchange="this.form.submit()" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm text-sm">
                            <option value="" {{ request('status') == '' ? 'selected' : '' }}>Alle Status</option>
                            <option value="paid" {{ request('status') == 'paid' ? 'selected' : '' }}>Betaald</option>
                            <option value="unpaid" {{ request('status') == 'unpaid' ? 'selected' : '' }}>Nog te betalen</option>
                        </select>
                        @if(request('status'))
                            <a href="{{ route('invoices.index') }}" class="text-sm text-red-600 hover:underline">Reset</a>
                        @endif
                    </form>
                    <a href="{{ route('invoices.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded shadow text-sm">
                        + Nieuwe Factuur
                    </a>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                    <thead class="bg-gray-50 dark:bg-gray-700">
                        <tr class="text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                            <th class="px-6 py-3">
                                <a href="{{ route('invoices.index', array_merge(request()->query(), ['sort' => 'member_id', 'direction' => request('direction') == 'asc' ? 'desc' : 'asc'])) }}" class="hover:text-indigo-600">
                                    Lid
                                    @if(request('sort') == 'member_id') {{ request('direction') == 'asc' ? '↑' : '↓' }} @endif
                                </a>
                            </th>
                            <th class="px-6 py-3">
                                <a href="{{ route('invoices.index', array_merge(request()->query(), ['sort' => 'amount', 'direction' => request('direction') == 'asc' ? 'desc' : 'asc'])) }}" class="hover:text-indigo-600">
                                    Bedrag
                                    @if(request('sort') == 'amount') {{ request('direction') == 'asc' ? '↑' : '↓' }} @endif
                                </a>
                            </th>
                            <th class="px-6 py-3">
                                <a href="{{ route('invoices.index', array_merge(request()->query(), ['sort' => 'description', 'direction' => request('direction') == 'asc' ? 'desc' : 'asc'])) }}" class="hover:text-indigo-600">
                                    Omschrijving
                                    @if(request('sort') == 'description') {{ request('direction') == 'asc' ? '↑' : '↓' }} @endif
                                </a>
                            </th>
                            <th class="px-6 py-3">
                                <a href="{{ route('invoices.index', array_merge(request()->query(), ['sort' => 'status', 'direction' => request('direction') == 'asc' ? 'desc' : 'asc'])) }}" class="hover:text-indigo-600">
                                    Status
                                    @if(request('sort') == 'status') {{ request('direction') == 'asc' ? '↑' : '↓' }} @endif
                                </a>
                            </th>
                            <th class="px-6 py-3 text-right">Acties</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                        @foreach($invoices as $invoice)
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                            <td class="px-6 py-4 whitespace-nowrap text-sm">
                                <div class="font-medium text-gray-900 dark:text-white">{{ $invoice->member->first_name }} {{ $invoice->member->last_name }}</div>
                                <div class="text-sm text-gray-500 dark:text-gray-400">{{ $invoice->member->email }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white">
                                €{{ number_format($invoice->amount, 2, ',', '.') }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                {{ $invoice->description }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm">
                                @if($invoice->status === 'paid')
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Betaald</span>
                                @elseif($invoice->status === 'unpaid')
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">Nog te betalen</span>
                                @else
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">{{ ucfirst($invoice->status) }}</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <a href="{{ route('invoices.show', $invoice->id) }}" class="text-indigo-600 hover:text-indigo-900 dark:text-indigo-400">Bekijk</a>
                                <a href="{{ route('invoices.edit', $invoice->id) }}" class="ml-4 text-blue-600 hover:text-blue-900 dark:text-blue-400">Bewerken</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="p-4">
                    {{ $invoices->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
