
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Lid Details: {{ $member->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-4">Persoonlijke Gegevens</h3>
                        <dl class="divide-y divide-gray-200 dark:divide-gray-700">
                            <div class="py-3">
                                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Voornaam</dt>
                                <dd class="text-sm text-gray-900 dark:text-white">{{ $member->first_name }}</dd>
                            </div>
                            <div class="py-3">
                                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Achternaam</dt>
                                <dd class="text-sm text-gray-900 dark:text-white">{{ $member->last_name }}</dd>
                            </div>
                            <div class="py-3">
                                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">E-mail</dt>
                                <dd class="text-sm text-gray-900 dark:text-white">{{ $member->email }}</dd>
                            </div>
                            <div class="py-3">
                                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Geboortedatum</dt>
                                <dd class="text-sm text-gray-900 dark:text-white">{{ $member->birth_date }}</dd>
                            </div>
                            <div class="py-3">
                                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">NBvV Nummer</dt>
                                <dd class="text-sm text-gray-900 dark:text-white">{{ $member->nbvv_number ?? 'N/A' }}</dd>
                            </div>
                        </dl>
                    </div>

                    <div>
                        <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-4">Contact & Status</h3>
                        <dl class="divide-y divide-gray-200 dark:divide-gray-700">
                            <div class="py-3">
                                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Lidsoort</dt>
                                <dd class="text-sm text-gray-900 dark:text-white">{{ $member->memberType->name ?? 'Geen type' }}</dd>
                            </div>
                            <div class="py-3">
                                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Status</dt>
                                <dd class="text-sm text-gray-900 dark:text-white">{{ $member->is_active ? 'Actief' : 'Inactief' }}</dd>
                            </div>
                            <div class="py-3">
                                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Adres</dt>
                                <dd class="text-sm text-gray-900 dark:text-white">
                                    {{ $member->address->street ?? '' }}, {{ $member->address->house_number ?? '' }}<br>
                                    {{ $member->address->postal_code ?? '' }} {{ $member->address->city ?? '' }}
                                </dd>
                            </div>
                        </dl>
                    </div>
                </div>

                <div class="mt-8 flex space-x-4">
                    <a href="{{ route('members.edit', $member->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Bewerken
                    </a>
                    <a href="{{ route('members.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                        Terug naar lijst
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
