<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Stats Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-5 gap-4 mb-8">
                <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-sm border border-gray-100 dark:border-gray-700">
                    <div class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('Totaal Leden') }}</div>
                    <div class="text-2xl font-semibold text-gray-900 dark:text-white">{{ $stats['total_members'] }}</div>
                </div>
                <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-sm border border-gray-100 dark:border-gray-700">
                    <div class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('Actief') }}</div>
                    <div class="text-2xl font-semibold text-green-600 dark:text-green-400">{{ $stats['active_members'] }}</div>
                </div>
                <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-sm border border-gray-100 dark:border-gray-700">
                    <div class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('Wachtend') }}</div>
                    <div class="text-2xl font-semibold text-orange-600 dark:text-orange-400">{{ $stats['pending_members'] }}</div>
                </div>
                <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-sm border border-gray-100 dark:border-gray-700">
                    <div class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('Lidsoorten') }}</div>
                    <div class="text-2xl font-semibold text-indigo-600 dark:text-indigo-400">{{ $stats['member_types'] }}</div>
                </div>
                <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-sm border border-gray-100 dark:border-gray-700">
                    <div class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('Broednummers') }}</div>
                    <div class="text-2xl font-semibold text-blue-600 dark:text-blue-400">{{ $stats['breeding_numbers'] }}</div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Recent Registrations -->
                <div class="lg:col-span-2 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">{{ __('Recente Registraties') }}</h3>
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th class="px-4 py-3">{{ __('Naam') }}</th>
                                    <th class="px-4 py-3">{{ __('Email') }}</th>
                                    <th class="px-4 py-3">{{ __('Lidsoort') }}</th>
                                    <th class="px-4 py-3">{{ __('Status') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($recent_members as $member)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <th scope="row" class="px-4 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $member->first_name }} {{ $member->last_name }}
                                    </th>
                                    <td class="px-4 py-4">{{ $member->email }}</td>
                                    <td class="px-4 py-4">{{ $member->memberType->name ?? 'N/A' }}</td>
                                    <td class="px-4 py-4">
                                        @if($member->is_active)
                                            <span class="text-green-600 font-medium">Actief</span>
                                        @else
                                            <span class="text-orange-600 font-medium">Wachtend</span>
                                        @endif
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="px-4 py-4 text-center">Geen recente registraties gevonden.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Quick Actions -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">{{ __('Snelle Acties') }}</h3>
                    <div class="space-y-3">
                        <a href="{{ route('members.create') }}" class="flex items-center justify-center w-full px-4 py-2 text-sm font-medium text-white bg-indigo-600 rounded-lg hover:bg-indigo-700">
                            {{ __('Nieuw Lid') }}
                        </a>
                        <a href="{{ route('member_types.create') }}" class="flex items-center justify-center w-full px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 dark:hover:bg-gray-700">
                            {{ __('Nieuwe Lidsoort') }}
                        </a>
                        <a href="{{ route('breeding_numbers.create') }}" class="flex items-center justify-center w-full px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 dark:hover:bg-gray-700">
                            {{ __('Nieuw Broednummer') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
