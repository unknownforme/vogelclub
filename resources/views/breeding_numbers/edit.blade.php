
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Breeding Number Bewerken') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('breeding_numbers.update', $breedingNumber->id) }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="col-span-1 md:col-span-2">
                            <x-input-label for="breeding_number" :value="__('Breeding Number')" />
                            <x-text-input id="breeding_number" name="breeding_number" type="text" class="mt-1 block w-full" :value="old('breeding_number', $breedingNumber->breeding_number)" required />
                            <x-input-error :messages="$errors->get('breeding_number')" class="mt-2" />
                        </div>

                        <div class="col-span-1 md:col-span-2">
                            <x-input-label for="member_id" :value="__('Lid')" />
                            <select id="member_id" name="member_id" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block w-full" required>
                                <option value="" disabled>Selecteer een lid</option>
                                @foreach($members as $member)
                                    <option value="{{ $member->id }}" {{ old('member_id', $breedingNumber->member_id) == $member->id ? 'selected' : '' }}>{{ $member->first_name }} {{ $member->last_name }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('member_id')" class="mt-2" />
                        </div>
                    </div>

                    <div class="flex items-center justify-end mt-6">
                        <x-primary-button class="ml-3">
                            {{ __('Opslaan') }}
                        </x-primary-button>
                        <a href="{{ route('breeding_numbers.index') }}" class="ml-4 text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-200">
                            Annuleren
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
