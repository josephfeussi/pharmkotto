@extends('templates.dashboard')
@section('main')
    <div class="grid grid-cols-12 gap-6">
        <div class="grid grid-cols-12 col-span-12 gap-6 xxl:col-span-9">
            <div class="col-span-12 mt-8">
                <div class="flex items-center h-10 intro-y">
                    <h2 class="mr-5 text-lg font-medium truncate">Résumé</h2>
                </div>
                <div class="grid grid-cols-12 gap-6 mt-5">
                    <a class="col-span-12 transition duration-300 transform bg-white rounded-lg shadow-xl hover:scale-105 sm:col-span-6 xl:col-span-3 intro-y"
                       href="{{ route('dashboard.users') }}">
                        <div class="p-5">
                            <div class="flex justify-between">
                                <svg xmlns="http://www.w3.org/2000/svg" class="text-blue-400 h-7 w-7"
                                     fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          stroke-width="2"
                                          d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                </svg>
                                <div
                                    class="flex h-6 px-2 text-sm font-semibold text-white bg-green-500 rounded-full justify-items-center">
                                    <span class="flex items-center">Voir</span>
                                </div>
                            </div>
                            <div class="flex-1 w-full ml-2">
                                <div>
                                    <div class="mt-3 text-3xl font-bold leading-8">{{$userCount}}</div>

                                    <div class="mt-1 text-base text-gray-600">Utilisateurs</div>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a class="col-span-12 transition duration-300 transform bg-white rounded-lg shadow-xl hover:scale-105 sm:col-span-6 xl:col-span-3 intro-y"
                       href="{{ route('dashboard.faq') }}">
                        <div class="p-5">
                            <div class="flex justify-between">
                                <svg xmlns="http://www.w3.org/2000/svg" class="text-yellow-400 h-7 w-7"
                                     fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          stroke-width="2"
                                          d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                                </svg>
                                <div
                                    class="flex h-6 px-2 text-sm font-semibold text-white bg-red-500 rounded-full justify-items-center">
                                    <span class="flex items-center">Voir</span>
                                </div>
                            </div>
                            <div class="flex-1 w-full ml-2">
                                <div>
                                    <div class="mt-3 text-3xl font-bold leading-8">{{$FAQCount}}</div>

                                    <div class="mt-1 text-base text-gray-600">Question/Reponse</div>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a class="col-span-12 transition duration-300 transform bg-white rounded-lg shadow-xl hover:scale-105 sm:col-span-6 xl:col-span-3 intro-y"
                       href="{{ route('dashboard.pharmacies') }}">
                        <div class="p-5">
                            <div class="flex justify-between">
                                <svg xmlns="http://www.w3.org/2000/svg" class="text-pink-600 h-7 w-7"
                                     fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          stroke-width="2"
                                          d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z" />
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          stroke-width="2"
                                          d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z" />
                                </svg>
                                <div
                                    class="flex h-6 px-2 text-sm font-semibold text-white bg-yellow-500 rounded-full justify-items-center">
                                    <span class="flex items-center">Voir<span>
                                </div>
                            </div>
                            <div class="flex-1 w-full ml-2">
                                <div>
                                    <div class="mt-3 text-3xl font-bold leading-8">{{$pharmaciesCount}}</div>

                                    <div class="mt-1 text-base text-gray-600">Pharmacies de gardes</div>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a class="col-span-12 transition duration-300 transform bg-white rounded-lg shadow-xl hover:scale-105 sm:col-span-6 xl:col-span-3 intro-y"
                       href="{{ route('dashboard.informations') }}">
                        <div class="p-5">
                            <div class="flex justify-between">
                                <svg xmlns="http://www.w3.org/2000/svg" class="text-green-400 h-7 w-7"
                                     fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          stroke-width="2"
                                          d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z" />
                                </svg>
                                <div
                                    class="flex h-6 px-2 text-sm font-semibold text-white bg-blue-500 rounded-full justify-items-center">
                                    <span class="flex items-center">Voir</span>
                                </div>
                            </div>
                            <div class="flex-1 w-full ml-2">
                                <div>
                                    <div class="mt-3 text-3xl font-bold leading-8">{{$infoCount}}</div>

                                    <div class="mt-1 text-base text-gray-600">Information d'actualité</div>
                                </div>
                            </div>
                        </div>
                    </a>

                    <a class="col-span-12 transition duration-300 transform bg-white rounded-lg shadow-xl hover:scale-105 sm:col-span-6 xl:col-span-3 intro-y"
                    href="{{ route('dashboard.maladie') }}">
                     <div class="p-5">
                         <div class="flex justify-between">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                              </svg>
                             <div
                                 class="flex h-6 px-2 text-sm font-semibold text-white bg-red-500 rounded-full justify-items-center">
                                 <span class="flex items-center">Voir</span>
                             </div>
                         </div>
                         <div class="flex-1 w-full ml-2">
                             <div>
                                 <div class="mt-3 text-3xl font-bold leading-8">{{$maladieCount}}</div>

                                 <div class="mt-1 text-base text-gray-600">Maladies/Pathologies</div>
                             </div>
                         </div>
                     </div>
                 </a>
                </div>
            </div>
            {{-- <div class="col-span-12 mt-5">
                <div class="grid grid-cols-1 gap-2 lg:grid-cols-2">
                    <div class="p-4 bg-white shadow-lg" id="chartline"></div>
                    <div class="bg-white shadow-lg" id="chartpie"></div>
                </div>
            </div> --}}

        </div>
    </div>
@endsection
