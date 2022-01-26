@extends('templates.dashboard')
@section('main')
    <div class="container  mx-auto my-5 p-5">
        <div class="md:flex no-wrap md:-mx-2 ">
            <!-- Left Side -->
            <div class="w-full md:w-3/12 md:mx-2">
                <!-- Profile Card -->
                <div class="bg-white p-3 border-t-4 border-green-400">
                    <div class="image overflow-hidden">
                        <img class="h-auto w-full mx-auto"
                             src="https://lavinephotography.com.au/wp-content/uploads/2017/01/PROFILE-Photography-112.jpg"
                             alt="">
                    </div>
                    <h1 class="text-gray-900 font-bold text-xl leading-8 my-1">Hiro Hamada</h1>
                    <h3 class="text-gray-600 font-lg text-semibold leading-6">Software Engineer</h3>
                    <p class="text-sm text-gray-500 hover:text-gray-600 leading-6">Lorem ipsum dolor sit amet
                        consectetur adipisicing elit.
                        Reprehenderit, eligendi dolorum sequi illum qui unde aspernatur non deserunt</p>
                    <ul
                        class="bg-gray-100 text-gray-600 hover:text-gray-700 hover:shadow py-2 px-3 mt-3 divide-y rounded shadow-sm">
                        <li class="flex items-center py-3">
                            <span>Status</span>
                            <span class="ml-auto"><span
                                    class="bg-green-500 py-1 px-2 rounded text-white text-sm">Active</span></span>
                        </li>
                        <li class="flex items-center py-3">
                            <span>Membre depuis</span>
                            <span class="ml-auto">Nov 07, 2016</span>
                        </li>
                    </ul>
                </div>
                <!-- End of profile card -->
                <div class="my-4"></div>

            </div>
            <!-- Right Side -->
            <div class="w-full md:w-9/12 mx-2 h-64">
                <!-- Profile tab -->
                <!-- About Section -->
                <div class="bg-white p-3 shadow-sm rounded-sm">
                    <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8">
                        <span clas="text-green-500">
                            <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                 stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </span>
                        <span class="tracking-wide">A propos</span>
                    </div>
                    <div class="text-gray-700">
                        <div class="grid md:grid-cols-2 text-sm">
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Nom</div>
                                <div class="px-4 py-2">Hiro Hamada</div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Compte</div>
                                <div class="px-4 py-2">Personnel</div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Gender</div>
                                <div class="px-4 py-2">Male</div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">No Contact</div>
                                <div class="px-4 py-2">+22 12 34 567 889</div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Addresse actuel</div>
                                <div class="px-4 py-2">Bencha, Madagascar</div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Addresse Permanente</div>
                                <div class="px-4 py-2">Arlington Heights, IL, Illinois</div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Email.</div>
                                <div class="px-4 py-2">
                                    <a class="text-blue-800" href="mailto:jane@example.com">hiro@hamada.soft</a>
                                </div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Date de naissance</div>
                                <div class="px-4 py-2">Fev 06, 1998</div>
                            </div>
                        </div>
                    </div>
                    <button
                        class="block w-full text-blue-800 text-sm font-semibold rounded-lg hover:bg-gray-100 focus:outline-none focus:shadow-outline focus:bg-gray-100 hover:shadow-xs p-3 my-4">Show
                       Mettre a jour</button>
                </div>
                <!-- End of about section -->

                <div class="my-4"></div>

                <!-- Experience and education -->
                <div class="bg-white p-3 shadow-sm rounded-sm">

                    <div class="grid grid-cols-2">
                        <div>
                            <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8 mb-3">
                                <span clas="text-green-500">
                                    <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                </span>
                                <span class="tracking-wide">Historique de paiements</span>
                            </div>
                            <ul class="list-inside space-y-2">
                                <li>
                                    <div class="text-teal-600">Activation Mensuel du module D'analyse</div>
                                    <div class="text-gray-500 text-xs">12 Juin 2020 - $27,000</div>
                                </li>
                                <li>
                                    <div class="text-teal-600">Activation Mensuel du module D'analyse</div>
                                    <div class="text-gray-500 text-xs">12 Mai 2020 - $27,000</div>
                                </li>
                                <li>
                                    <div class="text-teal-600">Activation Mensuel du module D'analyse</div>
                                    <div class="text-gray-500 text-xs">12 Avril 2020 - $27,000</div>
                                </li>
                                <li>
                                    <div class="text-teal-600">Activation Mensuel du module D'analyse</div>
                                    <div class="text-gray-500 text-xs">12March 2020 - $27,000</div>
                                </li>
                            </ul>
                        </div>
                        <div>
                            <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8 mb-3">
                                <span clas="text-green-500">
                                    <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke="currentColor">
                                        <path fill="#fff" d="M12 14l9-5-9-5-9 5 9 5z" />
                                        <path fill="#fff"
                                              d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
                                    </svg>
                                </span>
                                <span class="tracking-wide">Mes abonnement</span>
                            </div>
                            <ul class="list-inside space-y-2">
                                <li>
                                    <div class="text-teal-600">Analyse des risque</div>
                                    <div class="text-gray-500 text-xs">Novembre 2020 - Novembre 2021</div>
                                </li>
                                <li>
                                    <div class="text-teal-600">Partie prenante complete</div>
                                    <div class="text-gray-500 text-xs">March 2020 - Aout 2021</div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- End of Experience and education grid -->
                </div>
                <!-- End of profile tab -->
            </div>
        </div>
    </div>
@endsection
