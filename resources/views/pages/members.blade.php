<x-app-layout>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="flex items-center justify-between mb-6">
                <h1 class="text-xl font-semibold text-gray-900">
                    Gevangenen
                </h1>

                {{-- <a href="{{ route('inmates.create') }}"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                    + Nieuwe gevangene
                </a> --}}
            </div>

            <!-- Search -->
            <form method="GET" class="mb-4 space-y-3">
                <div class="flex w-full gap-3 items-center">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Zoeken..."
                        class="flex-1 border-gray-300 rounded shadow-sm">

                    <button type="submit" class="bg-gray-800 text-white px-4 py-2 rounded hover:bg-gray-900">
                        Zoeken</button>
                </div>
                <div class="flex gap-6 text-sm text-gray-700">
                    <label class="flex items-center gap-2">
                        <input type="radio" name="field" value="naam"
                            {{ request('field', 'naam') === 'naam' ? 'checked' : '' }}>
                        Naam
                    </label>

                    <label class="flex items-center gap-2">
                        <input type="radio" name="field" value="gender"
                            {{ request('field') === 'gender' ? 'checked' : '' }}>
                        Geslacht
                    </label>

                    <label class="flex items-center gap-2">
                        <input type="radio" name="field" value="afdeling"
                            {{ request('field') === 'afdeling' ? 'checked' : '' }}>
                        Afdeling
                    </label>

                    <label class="flex items-center gap-2">
                        <input type="radio" name="field" value="cel"
                            {{ request('field') === 'cel' ? 'checked' : '' }}>
                        Cel
                    </label>
                </div>


            </form>

            <!-- Table -->
            <div class="bg-white shadow rounded overflow-hidden">
                <table class="min-w-full divide-y divide-gray-200">

                    <thead class="bg-gray-100">
                        <tr class="text-left text-sm font-semibold text-gray-700">
                            <th class="px-4 py-3">Naam</th>
                            <th class="px-4 py-3">Geslacht</th>
                            <th class="px-4 py-3">Cel</th>
                            <th class="px-4 py-3">Reden</th>
                            <th class="px-4 py-3 text-right">Acties</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-100 text-sm">
                        @forelse ($members as $member)
                            <tr class="hover:bg-gray-50">
                            
                                <td class="px-4 py-3">{{ $member["naam"] }}</td>
                                <td class="px-4 py-3">{{ $member->geslacht }}</td>

                                @if ($member->cel < 8 && $member->cel > 0)
                                    <td class="px-4 py-3">{{ $member->cel }}A</td>
                                @endif

                                @if ($member->cel < 15 && $member->cel > 7)
                                    <td class="px-4 py-3">{{ $member->cel % 7 }}B</td>
                                @endif

                                @if ($member->cel < 22 && $member->cel > 14)
                                    <td class="px-4 py-3">{{ $member->cel % 7 }}C</td>
                                @endif
                                <td class="px-4 py-3">{{ $member->reden }}</td>
                                <td class="px-4 py-3 text-right">
                                    <a href="{{ route('inmates.edit', $member->id) }}"
                                        class="text-blue-600 hover:underline">
                                        Bewerken
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-4 py-6 text-center text-gray-500">
                                    Geen gevangenen gevonden
                                </td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>

        </div>
    </div>
</x-app-layout>
