<x-front-guest-layout>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700,900&display=swap" rel="stylesheet">

    <main class="bg-white font-montserrat">
        <header class="h-24 sm:h-32 flex items-center">
            <div class="container mx-auto px-6 sm:px-12 flex items-center justify-between">
                <div class="text-black font-black text-2xl flex items-center">
                    <img src="images/GIR-logos_black.png" style="height: 20ch;"> </img>

                </div>
                <div class="flex items-center">
                    <nav class="text-black text-lg hidden lg:flex items-center">

                        @if (Route::has('login'))
                        @auth('front')
                        <a href="{{ url('/dashboard') }}" class="py-2 px-6 flex hover:text-blue-500">Dashboard</a>
                        @else
                        <!-- <a href="{{ route('login') }}" class="py-2 px-6 flex hover:text-blue-500">Login</a> -->

                        @if(Route::has('admin.login'))
                        <a href="{{ route('admin.login') }}"
                            class="font-semibold text-lg-dark bg-purple-300 hover:bg-white text-dark py-3 px-7 rounded-full">
                            Login</a>
                        @endif

                        {{-- @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 py-2 px-6 flex hover:text-blue-500">Register</a>
                        @endif --}}
                        @endauth
                        @endif
                    </nav>
                    <button class="lg:hidden flex flex-col">
                        <span class="w-6 h-px bg-gray-900 mb-1"></span>
                        <span class="w-6 h-px bg-gray-900 mb-1"></span>
                        <span class="w-6 h-px bg-gray-900 mb-1"></span>
                    </button>
                </div>
            </div>
        </header>
        <div class="container mx-auto px-6 sm:px-12 flex flex-row items-center pt-2">
            <div class="sm:w-2/5 flex flex-col items-start items-center mt-8 sm:mt-0">
                <h1 class="text-4xl lg:text-6xl leading-none mb-4 text-purple-400 font-extrabold">
                    <strong>Gérez vos réclamations avec efficacité</strong>
                </h1>
                <p class="text-lg mb-4 sm:mb-12 text-justify text-left">
                    Nous nous offrons des interventions personnalisées pour répondre aux besoins de chaque client.
                    Nous sommes engagés à offrir un service de qualité supérieure pour résoudre rapidement et
                    efficacement les réclamations de nos clients.
                </p>
            </div>
            <div class="sm:w-3/5 ml-20">
                <img src="images/reclamation.jpg" class="w-full h-auto rounded-full">
            </div>
        </div>




    </main>
    <br>

    <br>

    <footer class="p-9" id="Contact">
        <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8">
        <div class="sm:flex sm:items-center sm:justify-between">
            <div class="flex mt-4 space-x-6 sm:justify-center sm:mt-0">
                <img src="images/logo_ministere_MIC.png"></img>
            </div>
            <div class="d-flex">
                <span class="text-sm text-gray-1000 sm:text-center dark:text-gray-600">
                    <script>
                        document.write(new Date().getFullYear());
                    </script>©copyright | Royaume du Maroc Ministère de l'Industrie et du Commerce - Tous droits
                    réservés
                    <span class="flex mt-4 space-x-6">
                        <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </a>
                        <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </a>
                        <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path
                                    d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84">
                                </path>
                            </svg>
                        </a>
                    </span>
                </span>
            </div>

        </div>
    </footer>
</x-front-guest-layout>