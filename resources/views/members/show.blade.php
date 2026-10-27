
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Lid Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    
                    <div class="mb-6 flex justify-between items-center">
                        <h3 class="text-lg font-bold border-b pb-2 w-full">Persoonlijke Informatie</h3>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-8">
                        <div>
                            <p class="text-sm text-gray-500 dark:text-gray-400">Volledige Naam</p>
                            <p class="text-lg font-semibold">{{ $member->first_name }} {{ $member->last_name }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500 dark:text-gray-400">Geboortedatum</p>
                            <p class="text-lg font-semibold">{{ $member->birth_date }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500 dark:text-gray-400">Lidsoort</p>
                            <p class="text-lg font-semibold">{{ $member->memberType->name ?? 'N/A' }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500 dark:text-gray-400">NBvV Nummer</p>
                            <p class="text-lg font-semibold">{{ $member->nbvv_number ?? 'N/A' }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500 dark:text-gray-400">Status</p>
                            <p class="text-lg font-semibold">
                                <span class="{{ $member->is_active ? 'text-green-600' : 'text-red-600' }}">
                                    {{ $member->is_active ? 'Actief' : 'Inactief' }}
                                </span>
                            </p>
                        </div>
                    </div>

                    <div class="mb-6 flex justify-between items-center">
                        <h3 class="text-lg font-bold border-b pb-2 w-full">Adresgegevens</h3>
                    </div>

                    @if($member->address)
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-8">
                            <div>
                                <p class="text-sm text-gray-500 dark:text-gray-400">Straat</p>
                                <p class="text-lg font-semibold">{{ $member->address->street }} {{ $member->address->house_number }}</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500 dark:text-gray-400">Postcode</p>
                                <p class="text-lg font-semibold">{{ $member->address->postal_code }}</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500 dark:text-gray-400">Stad</p>
                                <p class="text-lg font-semibold">{{ $member->address->city }}</p>
                            </div>
                        </div>
                    @else
                        <p class="text-red-500">Geen adresgegevens bekend.</p>
                    @endif

                    <div class="mb-6 flex justify-between items-center">
                        <h3 class="text-lg font-bold border-b pb-2 w-full">Kweeknummers</h3>
                    </div>

                    @if($member->breedingNumbers->count() > 0)
                        <ul class="divide-y divide-gray-200 dark:divide-gray-700">
                            @foreach($member->breedingNumbers as $bn)
                                <li class="py-2">
                                    <span class="font-medium">{{ $bn->breeding_number }}</span>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p class="text-gray-500 italic">Geen kweeknummers geregistreerd.</p>
                    @endif

                    <div class="mt-8 flex space-x-4">
                        <a href="{{ route('members.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Terug</a>
                        <a href="{{ route('members.edit', $member->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Wijzig</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
