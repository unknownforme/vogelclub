
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Kweeknummer Wijzigen') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('breeding_numbers.update', $breedingNumber->id) }}" method="POST" class="space-y-6">
                        @csrf
                        @method('PUT')
                        <div>
                            <x-input-label for="breeding_number" :value="__('Kweeknummer')" />
                            <x-text-input id="breeding_number" name="breeding_number" type="text" value="{{ old('breeding_number', $breedingNumber->breeding_number) }}" class="mt-1 block w-full" required />
                        </div>
                        <div>
                            <x-input-label for="member_id" :value="__('Lid')" />
                            <select id="member_id" name="member_id" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block w-full" required>
                                @foreach($members as $member)
                                    <option value="{{ $member->id }}" {{ old('member_id', $breedingNumber->member_id) == $member->id ? 'selected' : '' }}>{{ $member->first_name }} {{ $member->last_name }}</option>
                                @endforeach
                            </select>
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

