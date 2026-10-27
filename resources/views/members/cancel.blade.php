<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8 bg-white dark:bg-gray-800 p-10 rounded-xl shadow-lg">
            <div>
                <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900 dark:text-white">
                    Lidmaatschap Annuleren
                </h2>
                <p class="mt-2 text-center text-sm text-gray-600 dark:text-gray-400">
                    Voer uw e-mailadres in om een verzoek tot annulering in te dienen.
                </p>
            </div>
            
            @if(session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <span class="block sm:inline">{{ session('error') }}</span>
                </div>
            @endif

            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            <form class="mt-8 space-y-6" action="{{ route('members.cancel') }}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                
                <div class="rounded-md shadow-sm">
                    <label for="email" class="block font-medium text-gray-700 dark:text-gray-300">E-mailadres</label>
                    <input id="email" name="email" type="email" required autocomplete="email" class="appearance-none rounded-md block w-full px-3 py-2 border border-gray-300 placeholder-gray-400 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:ring-offset-2 focus:border-indigo-500 sm:text-sm dark:bg-gray-900 dark:border-gray-700 dark:text-white" placeholder="...">
                </div>

                <div>
                    <button type="submit" class="group inline-flex align-middle justify-center text-sm font-medium rounded-md text-white w-full px-4 py-2 border border-transparent bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                        Verzoek indienen
                    </button>
                </div>
            </form>

            <div class="mt-6 text-center">
                <a href="{{ route('home') }}" class="text-sm text-indigo-600 hover:text-indigo-900 dark:text-indigo-400">
                    Terug naar de homepagina
                </a>
            </div>
        </div>
    </div>
</x-guest-layout>
