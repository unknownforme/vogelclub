
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Lid Wijzigen: ' . $member->first_name . ' ' . $member->last_name) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('members.update', $member->id) }}" method="POST" class="space-y-6">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Personal Info -->
                            <div class="col-span-1 md:col-span-2 border-b pb-2 dark:border-gray-700">
                                <h3 class="text-lg font-medium">Persoonlijke Gegevens</h3>
                            </div>
                            
                            <div class="col-span-1 md:col-span-2">
                                <x-input-label for="first_name" :value="__('Voornaam')" />
                                <x-text-input id="first_name" name="first_name" type="text" value="{{ old('first_name', $member->first_name) }}" class="mt-1 block w-full" required />
                                @error('first_name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>

                            <div class="col-span-1 md:col-span-2">
                                <x-input-label for="last_name" :value="__('Achternaam')" />
                                <x-text-input id="last_name" name="last_name" type="text" value="{{ old('last_name', $member->last_name) }}" class="mt-1 block w-full" required />
                                @error('last_name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>

                            <div class="col-span-1 md:col-span-2">
                                <x-input-label for="birth_date" :value="__('Geboortedatum')" />
                                <x-text-input id="birth_date" name="birth_date" type="date" value="{{ old('birth_date', $member->birth_date) }}" class="mt-1 block w-full" required />
                                @error('birth_date') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>

                            <div class="col-span-1 md:col-span-2">
                                <x-input-label for="nbvv_number" :value="__('NBvV Nummer')" />
                                <x-text-input id="nbvv_number" name="nbvv_number" type="text" value="{{ old('nbvv_number', $member->nbvv_number) }}" class="mt-1 block w-full" />
                                @error('nbvv_number') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>

                            <div class="col-span-1 md:col-span-2">
                                <x-input-label for="member_type_id" :value="__('Lidsoort')" />
                                <select id="member_type_id" name="member_type_id" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block w-full" required>
                                    @foreach($memberTypes as $type)
                                        <option value="{{ $type->id }}" {{ old('member_type_id', $member->member_type_id) == $type->id ? 'selected' : '' }}>{{ $type->name }}</option>
                                    @endforeach
                                </select>
                                @error('member_type_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>

                            <div class="col-span-1 md:col-span-2">
                                <x-input-label for="is_active" :value="__('Status')" />
                                <select id="is_active" name="is_active" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block w-full" required>
                                    <option value="1" {{ old('is_active', $member->is_active) == 1 ? 'selected' : '' }}>Actief</option>
                                    <option value="0" {{ old('is_active', $member->is_active) == 0 ? 'selected' : '' }}>Inactief</option>
                                </select>
                                @error('is_active') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>

                            <!-- Address Info -->
                            <div class="col-span-1 md:col-span-2 border-b pb-2 dark:border-gray-700 mt-4">
                                <h3 class="text-lg font-medium">Adresgegevens</h3>
                            </div>

                            <div class="col-span-1 md:col-span-2">
                                <x-input-label for="street" :value="__('Straat')" />
                                <x-text-input id="street" name="street" type="text" value="{{ old('street', $member->address->street) }}" class="mt-1 block w-full" required />
                                @error('street') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>

                            <div class="col-span-1 md:col-span-2">
                                <x-input-label for="house_number" :value="__('Huisnummer')" />
                                <x-text-input id="house_number" name="house_number" type="text" value="{{ old('house_number', $member->address->house_number) }}" class="mt-1 block w-full" required />
                                @error('house_number') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>

                            <div class="col-span-1 md:col-span-2">
                                <x-input-label for="postal_code" :value="__('Postcode')" />
                                <x-text-input id="postal_code" name="postal_code" type="text" value="{{ old('postal_code', $member->address->postal_code) }}" class="mt-1 block w-full" required />
                                @error('postal_code') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>

                            <div class="col-span-1 md:col-span-2">
                                <x-input-label for="city" :value="__('Stad')" />
                                <x-text-input id="city" name="city" type="text" value="{{ old('city', $member->address->city) }}" class="mt-1 block w-full" required />
                                @error('city') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="flex items-center justify-end mt-6">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                {{ __('Bijwerken') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
