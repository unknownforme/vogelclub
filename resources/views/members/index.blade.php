<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <!-- Filter Section -->
                <form action="{{ route('members.index') }}" method="GET" class="mb-6 bg-gray-50 dark:bg-gray-700 p-4 rounded-lg">
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 items-end">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Naam</label>
                            <input type="text" name="name" id="name" value="{{ request('name') }}" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-800 dark:text-white shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                        </div>
                        <div>
                            <label for="member_type_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Lidsoort</label>
                            <select name="member_type_id" id="member_type_id" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-800 dark:text-white shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                <option value="">Alle</option>
                                @foreach($memberTypes as $type)
                                    <option value="{{ $type->id }}" {{ request('member_type_id') == $type->id ? 'selected' : '' }}>{{ $type->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="is_active" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Status</label>
                            <select name="is_active" id="is_active" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-800 dark:text-white shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                <option value="">Alle</option>
                                <option value="1" {{ request('is_active') === '1' ? 'selected' : '' }}>Actief</option>
                                <option value="0" {{ request('is_active') === '0' ? 'selected' : '' }}>Inactief / Wachtend</option>
                            </select>
                        </div>
                        <div>
                            <label for="breeding_number" class="block text-sm font-medium text-gray-700 dark:text-gray-300">NBVV Nummer</label>
                            <input type="text" name="breeding_number" id="breeding_number" value="{{ request('breeding_number') }}" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-800 dark:text-white shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                        </div>
                    </div>
                    <div class="mt-4 flex space-x-2">
                        <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">
                            Filteren
                        </button>
                        <a href="{{ route('members.index') }}" class="bg-gray-400 hover:bg-gray-500 text-white font-bold py-2 px-4 rounded">
                            Reset
                        </a>
                    </div>
                </form>

                <div class="flex justify-between items-center mb-6">
                    <h1 class="text-2xl font-bold text-gray-800 dark:text-white">Leden Lijst</h1>
                    <a href="{{ route('members.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Nieuwe Leden Toevoegen
                    </a>
                </div>

                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                    <thead class="bg-gray-50 dark:bg-gray-700">
                        <tr class="text-left text-sm font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                            <th class="px-6 py-3">
                                <a href="{{ route('members.index', array_merge(request()->query(), ['sort' => 'last_name', 'direction' => request('direction') == 'asc' ? 'desc' : 'asc'])) }}" class="hover:text-indigo-600">
                                    Naam
                                    @if(request('sort') == 'last_name') {{ request('direction') == 'asc' ? '↑' : '↓' }} @endif
                                </a>
                            </th>
                            <th class="px-6 py-3">
                                <a href="{{ route('members.index', array_merge(request()->query(), ['sort' => 'email', 'direction' => request('direction') == 'asc' ? 'desc' : 'asc'])) }}" class="hover:text-indigo-600">
                                    E-mail
                                    @if(request('sort') == 'email') {{ request('direction') == 'asc' ? '↑' : '↓' }} @endif
                                </a>
                            </th>
                            <th class="px-6 py-3">Lidtype</th>
                            <th class="px-6 py-3">
                                <a href="{{ route('members.index', array_merge(request()->query(), ['sort' => 'is_active', 'direction' => request('direction') == 'asc' ? 'desc' : 'asc'])) }}" class="hover:text-indigo-600">
                                    Status
                                    @if(request('sort') == 'is_active') {{ request('direction') == 'asc' ? '↑' : '↓' }} @endif
                                </a>
                            </th>
                            <th class="px-6 py-3 text-right">Acties</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                        @foreach($members as $member)
                            <tr class="bg-white dark:bg-gray-800">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">{{ $member->first_name . ' ' . $member->last_name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">{{ $member->email }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">{{ $member->memberType->name ?? 'Geen type' }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm">
                                    @if($member->is_active)
                                        <span class="text-green-600 font-semibold">Actief</span>
                                    @else
                                        <span class="text-red-500 font-semibold">Inactief</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-right">
                                    <div class="flex justify-end items-center space-x-4">
                                        <a href="{{ route('members.show', $member->id) }}" class="text-indigo-600 hover:text-indigo-900">Bekijken</a>
                                        <a href="{{ route('members.edit', $member->id) }}" class="text-blue-600 hover:text-blue-900">Bewerken</a>
                                        <form action="{{ route('members.destroy', $member->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Weet je het zeker?')">Verwijderen</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-6">
                    {{ $members->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
