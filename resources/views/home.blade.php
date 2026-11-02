<x-app-layout>
    <!-- Dark Overlay for Readability -->
    <div class="relative min-h-screen">
        <div class="absolute inset-0 bg-black/40"></div>

        <!-- Main Content Container -->
        <div class="relative z-10 container mx-auto px-4 py-12 space-y-16">
            <!-- Hero Section -->
            <div class="text-center text-white space-y-6">
                <h1 class="text-5xl md:text-6xl font-extrabold drop-shadow-lg">
                    Welkom bij Vogelvereniging 't Fratertje
                </h1>
                <p class="text-xl md:text-2xl font-light max-w-3xl mx-auto drop-shadow-md">
                    De plek waar passie voor vogels en gemeenschap samenkomen.
                </p>
            </div>

            <!-- Action Cards Section -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-4xl mx-auto">
                <!-- Registration Card -->
                <div class="bg-white/90 dark:bg-gray-800/90 backdrop-blur-sm shadow-xl rounded-2xl p-8 text-center transition hover:scale-105 flex flex-col">
                    <h2 class="text-2xl font-semibold text-gray-800 dark:text-white mb-4">
                        Wilt u lid worden?
                    </h2>
                    <p class="text-gray-600 dark:text-gray-300 mb-6">
                        Meld u aan om deel uit te maken van onze vereniging en toegang te krijgen tot exclusieve evenementen.
                    </p>
                    <a href="{{ route('members.create') }}" class="inline-block w-full py-3 px-6 text-center text-white bg-blue-600 hover:bg-blue-700 rounded-lg font-bold transition mt-auto">
                        Registreer u nu
                    </a>
                </div>
                <!-- Cancellation Card -->
                <div class="bg-white/90 dark:bg-gray-800/90 backdrop-blur-sm shadow-xl rounded-2xl p-8 text-center transition hover:scale-105 flex flex-col">
                    <h2 class="text-2xl font-semibold text-gray-800 dark:text-white mb-4">
                        Lidmaatschap opzeggen
                    </h2>
                    <p class="text-gray-600 dark:text-gray-300 mb-6">
                        Wilt u uw lidmaatschap beëindigen? U kunt via de onderstaande link een verzoek indienen.
                    </p>
                    <a href="{{ route('members.cancel_form') }}" class="inline-block w-full py-3 px-6 text-center text-white bg-red-600 hover:bg-red-700 rounded-lg font-bold transition mt-auto">
                        Lidmaatschap opzeggen
                    </a>
                </div>
            </div>
            </div>

            <!-- About Us Section -->
            <div class="bg-white/80 dark:bg-gray-900/80 backdrop-blur-md rounded-3xl p-8 md:p-12 shadow-lg text-center">
                <div class="max-w-4xl mx-auto space-y-6">
                    <h2 class="text-3xl font-bold text-gray-900 dark:text-white">Over Ons</h2>
                    <p class="text-lg text-gray-700 dark:text-gray-300 leading-relaxed">
                        Vogelvereniging 't Fratertje is meer dan alleen een club; het is een warme gemeenschap voor vogelliefhebbers van alle niveaus. 
                        Sinds onze oprichting richten wij ons op het beschermen, observeren en vieren van de prachtige vogelwereld.
                    </p>
                    <p class="text-lg text-gray-700 dark:text-gray-300 leading-relaxed">
                        Of je nu een ervaren breeder bent of gewoon de eerste zang in de ochtend wilt horen, bij ons vind je een plek waar kennis wordt gedeeld en passie wordt gevoed.
                    </p>
                </div>
            </div>

            <!-- Activities Section -->
            <div class="space-y-8">
                <h2 class="text-3xl font-bold text-center text-white drop-shadow-md">Wat wij doen</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <!-- Activity 1 -->
                    <div class="bg-white/20 dark:bg-black/20 backdrop-blur-sm border border-white/30 rounded-xl p-6 text-center text-white hover:bg-white/30 transition">
                        <h3 class="text-xl font-bold mb-2">Vogelobservatie</h3>
                        <p class="text-sm opacity-90">Wekelijkse excursies naar lokale natuurgebieden om zeldzame soorten in het wild te spotten.</p>
                    </div>
                    <!-- Activity 2 -->
                    <div class="bg-white/20 dark:bg-black/20 backdrop-blur-sm border border-white/30 rounded-xl p-6 text-center text-white hover:bg-white/30 transition">
                        <h3 class="text-xl font-bold mb-2">Kweekworkshops</h3>
                        <p class="text-sm opacity-90">Lessen in vogelverzorging, nestbouw en verantwoorde kweektechnieken voor hobbyisten.</p>
                    </div>
                    <!-- Activity 3 -->
                    <div class="bg-white/20 dark:bg-black/20 backdrop-blur-sm border border-white/30 rounded-xl p-6 text-center text-white hover:bg-white/30 transition">
                        <h3 class="text-xl font-bold mb-2">Verenigingsavonden</h3>
                        <p class="text-sm opacity-90">Maandelijkse bijeenkomsten waar leden ervaringen uitwisselen en nieuwe projecten bespreken.</p>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <footer class="pt-12 pb-6 text-center text-white/70 text-sm">
                <p>&copy; 2026 Vogelvereniging 't Fratertje. Alle rechten voorbehouden.</p>
            </footer>
        </div>
    </div>
</x-app-layout>
