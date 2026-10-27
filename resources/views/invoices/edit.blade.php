
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Factuur Wijzigen') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('invoices.update', $invoice->id) }}" method="POST" class="space-y-6">
                        @csrf
                        @method('PUT')
                        <div>
                            <x-input-label for="member_id" :value="__('Lid')" />
                            <select id="member_id" name="member_id" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block w-full" required>
                                @foreach($members as $member)
                                    <option value="{{ $member->id }}" {{ old('member_id', $invoice->member_id) == $member->id ? 'selected' : '' }}>{{ $member->first_name }} {{ $member->last_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <x-input-label for="amount" :value="__('Bedrag (€)')" />
                            <x-text-input id="amount" name="amount" type="number" step="0.01" value="{{ old('amount', $invoice->amount) }}" class="mt-1 block w-full" required />
                        </div>
                        <div>
                            <x-input-label for="description" :value="__('Beschrijving')" />
                            <x-text-input id="description" name="description" type="text" value="{{ old('description', $invoice->description) }}" class="mt-1 block w-full" required />
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

