
<x-app-layout>
    <div class="space-y-8 w-full py-6">
        <div class="text-center">
            <h1 class="mt-6 text-4xl font-extrabold text-gray-900 dark:text-white">
                Welkom bij Vogelvereniging 't Fratertje
            </h1>
            <p class="mt-4 text-lg text-gray-600 dark:text-gray-400">
                De plek waar passie voor vogels en gemeenschap samenkomen.
            </p>
        </div>

        <div class="max-w-xl mx-auto bg-white dark:bg-gray-800 shadow-md rounded-lg p-8 text-center">
            <h2 class="text-xl font-semibold text-gray-800 dark:text-white mb-4">
                Wilt u lid worden?
            </h2>
            <p class="text-gray-600 dark:text-gray-400 mb-6">
                Meld u aan om deel uit te maken van onze vereniging, toegang te krijgen tot exclusieve evenementen en meer.
            </p>
            <a href="{{ route('members.create') }}" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-offset-2 focus:ring-blue-500">
                Registreer u nu
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center mt-12">
            <div class="p-6">
                <div class="text-blue-500 text-3xl mb-2">🐦</div>
                <h3 class="text-lg font-medium text-gray-900 dark:text-white">Passie</h3>
                <p class="text-gray-500 dark:text-gray-400 text-sm">Samen delen we de liefde voor vogelsoorten.</p>
            </div>
            <div class="p-6">
                <div class="text-blue-500 text-3xl mb-2">🤝</div>
                <h3 class="text-lg font-medium text-gray-900 dark:text-white">Gemeenschap</h3>
                <p class="text-gray-500 dark:text-gray-400 text-sm">Ontmoet andere vogelliefhebbers in de buurt.</p>
            </div>
            <div class="p-6">
                <div class="text-blue-500 text-3xl mb-2">✨</div>
                <h3 class="text-lg font-medium text-gray-900 dark:text-white">Kennis</h3>
                <p class="text-gray-500 dark:text-gray-400 text-sm">Leer alles over de verzorging en kweek van vogels.</p>
            </div>
        </div>
    </div>
</x-app-layout>
