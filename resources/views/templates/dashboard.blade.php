<!DOCTYPE html>
<html x-data="data()" lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
          rel="stylesheet" />
    <!-- Favicon -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <meta name="theme-color" content="#fafafa">

    <script src="{{ asset('js/app.js') }}" defer></script>
<style>

</style>

    @yield('head')


</head>

<body>
    @yield("beforeBody")
<div class="flex h-screen bg-gray-800 " :class="{ 'overflow-hidden': isSideMenuOpen }">



    <!-- Desktop sidebar -->
    <aside class="z-20 flex-shrink-0 hidden pl-2 overflow-y-auto bg-gray-800 w-60 md:block">
        <div>
            <div class="text-white">
                <div class="flex p-2 bg-gray-800">
                    <div class="flex items-center px-2 py-3">
                        <p class="text-2xl font-semibold text-accent">Pharmacie Kotto</p>

                    </div>
                </div>
                <div class="flex justify-center">
                    <div class="">
                        <img class="hidden object-cover w-24 h-24 mr-2 rounded-full sm:block"
                             src=" {{ asset('images/icons/logo.jpg')}} " alt="">
                        <p class="pt-2 text-base font-bold text-center text-gray-400">{{auth()->user()->profile->first_name}} {{auth()->user()->profile->last_name}}</p>
                        <p class="w-24 pt-2 text-sm font-bold text-center text-pink-500 capitalize">{{auth()->user()->role}} </p>
                    </div>
                </div>
                <div>
                    <ul class="mt-6 leading-10">
                        <li class="relative px-2 py-1 ">
                            <a class="inline-flex items-center w-full text-sm font-semibold text-white transition-colors duration-150 cursor-pointer hover:text-orange-400"
                               href="{{route('dashboard')}}">
                               <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                              </svg>
                                <span class="ml-4">Résumé</span>
                            </a>
                        </li>
                        <li class="relative px-2 py-1 ">
                            <a class="inline-flex items-center w-full text-sm font-semibold text-white transition-colors duration-150 cursor-pointer hover:text-orange-400"
                               href="{{route('dashboard.users')}}">
                               <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                              </svg>
                                <span class="ml-4">Utilisateurs</span>
                            </a>
                        </li>


                        <li class="relative px-2 py-1 ">
                            <a class="inline-flex items-center w-full text-sm font-semibold text-white transition-colors duration-150 cursor-pointer hover:text-orange-400"
                               href="{{route('dashboard.medicament')}}">
                               <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                              </svg>
                                <span class="ml-4">Médicaments</span>
                            </a>
                        </li>

                        <li class="relative px-2 py-1 ">
                            <a class="inline-flex items-center w-full text-sm font-semibold text-white transition-colors duration-150 cursor-pointer hover:text-orange-400"
                               href="{{route('dashboard.conseil')}}">
                               <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                              </svg>
                                <span class="ml-4">Conseils</span>
                            </a>
                        </li>

                        <li class="relative px-2 py-1 ">
                            <a class="inline-flex items-center w-full text-sm font-semibold text-white transition-colors duration-150 cursor-pointer hover:text-orange-400"
                               href="{{route('dashboard.sms')}}">
                               <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                              </svg>
                                <span class="ml-4">SMS et Alert</span>
                            </a>
                        </li>
                        <li class="relative px-2 py-1 ">
                            <a class="inline-flex items-center w-full text-sm font-semibold text-white transition-colors duration-150 cursor-pointer hover:text-orange-400"
                               href="{{route('dashboard.maladie')}}">
                               <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 14l6-6m-5.5.5h.01m4.99 5h.01M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16l3.5-2 3.5 2 3.5-2 3.5 2zM10 8.5a.5.5 0 11-1 0 .5.5 0 011 0zm5 5a.5.5 0 11-1 0 .5.5 0 011 0z" />
                              </svg>
                                <span class="ml-4">Maladies</span>
                            </a>
                        </li>
                        <li class="relative px-2 py-1" x-data="{ Open : false  }">
                            <div class="inline-flex items-center justify-between w-full text-base font-semibold text-gray-500 transition-colors duration-150 cursor-pointer hover:text-orange-400"
                                 x-on:click="Open = !Open">
                                    <span
                                        class="inline-flex items-center text-sm font-semibold text-white hover:text-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                                             viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M8 4H6a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-2m-4-1v8m0 0l3-3m-3 3L9 8m-5 5h2.586a1 1 0 01.707.293l2.414 2.414a1 1 0 00.707.293h3.172a1 1 0 00.707-.293l2.414-2.414a1 1 0 01.707-.293H20" />
                                        </svg>
                                        <span class="ml-4">Gestion du site</span>
                                    </span>
                                <svg xmlns="http://www.w3.org/2000/svg" x-show="!Open"
                                     class="w-4 h-4 ml-1 text-white" fill="none" viewBox="0 0 24 24"
                                     stroke="currentColor" style="display: none;">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M15 19l-7-7 7-7" />
                                </svg>

                                <svg xmlns="http://www.w3.org/2000/svg" x-show="Open"
                                     class="w-4 h-4 ml-1 text-white" fill="none" viewBox="0 0 24 24"
                                     stroke="currentColor" style="display: none;">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M19 9l-7 7-7-7" />
                                </svg>
                            </div>

                            <div x-show.transition="Open" style="display:none;">
                                <ul x-transition:enter="transition-all ease-in-out duration-300"
                                    x-transition:enter-start="opacity-25 max-h-0"
                                    x-transition:enter-end="opacity-100 max-h-xl"
                                    x-transition:leave="transition-all ease-in-out duration-300"
                                    x-transition:leave-start="opacity-100 max-h-xl"
                                    x-transition:leave-end="opacity-0 max-h-0"
                                    class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium rounded-md shadow-inner bg-primary"
                                    aria-label="submenu">

                                    <li class="px-2 py-1 text-white transition-colors duration-150">
                                        <div class="px-1 rounded-md hover:text-gray-800 hover:bg-gray-100">
                                            <div class="flex items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                  </svg>
                                                <a href="{{route('dashboard.pharmacies')}}"
                                                   class="w-full ml-2 text-sm font-semibold text-white hover:text-gray-800">Pharmacies de gardes</a>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="px-2 py-1 text-white transition-colors duration-150">
                                        <div class="px-1 rounded-md hover:text-gray-800 hover:bg-gray-100">
                                            <div class="flex items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                  </svg>
                                                <a href="{{route('dashboard.informations')}}"
                                                   class="w-full ml-2 text-sm font-semibold text-white hover:text-gray-800">Informations</a>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="hidden px-2 py-1 text-white transition-colors duration-150">
                                        <div class="px-1 rounded-md hover:text-gray-800 hover:bg-gray-100">
                                            <div class="flex items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                                                     viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                          stroke-width="2"
                                                          d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                                </svg>
                                                <a href="{{route('dashboard.faq')}}"
                                                   class="w-full ml-2 text-sm font-semibold text-white hover:text-gray-800">Question reponse</a>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </aside>

    <!-- Mobile sidebar -->
    <!-- Backdrop -->
    <div x-show="isSideMenuOpen" x-transition:enter="transition ease-in-out duration-150"
         x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in-out duration-150" x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="fixed inset-0 z-10 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center"></div>

    <aside
        class="fixed inset-y-0 z-20 flex-shrink-0 w-64 mt-16 overflow-y-auto bg-gray-900 dark:bg-gray-800 md:hidden"
        x-show="isSideMenuOpen" x-transition:enter="transition ease-in-out duration-150"
        x-transition:enter-start="opacity-0 transform -translate-x-20" x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in-out duration-150" x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0 transform -translate-x-20" @click.away="closeSideMenu"
        @keydown.escape="closeSideMenu">
        <div>
            <div class="text-white">
                <div class="flex p-2 bg-gray-800">
                    <div class="flex items-center px-2 py-3">
                        <p class="text-2xl font-semibold text-orange-400">SA</p <p class="ml-2 italic font-semibold">
                            DASHBOARD</p>
                    </div>
                </div>
                <div>
                    <ul class="mt-6 leading-10">
                        <li class="relative px-2 py-1 ">
                            <a class="inline-flex items-center w-full text-sm font-semibold text-white transition-colors duration-150 cursor-pointer hover:text-orange-400"
                               href=" #">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                                     viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                </svg>
                                <span class="ml-4">Tableau de bord</span>
                            </a>
                        </li>
                        <li class="relative px-2 py-1" x-data="{ Open : false  }">
                            <div class="inline-flex items-center justify-between w-full text-base font-semibold text-gray-500 transition-colors duration-150 cursor-pointer hover:text-orange-400"
                                 x-on:click="Open = !Open">
                                    <span
                                        class="inline-flex items-center text-sm font-semibold text-white hover:text-blue-900">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                                             viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M8 4H6a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-2m-4-1v8m0 0l3-3m-3 3L9 8m-5 5h2.586a1 1 0 01.707.293l2.414 2.414a1 1 0 00.707.293h3.172a1 1 0 00.707-.293l2.414-2.414a1 1 0 01.707-.293H20" />
                                        </svg>
                                        <span class="ml-4">ITEM</span>
                                    </span>
                                <svg xmlns="http://www.w3.org/2000/svg" x-show="!Open"
                                     class="w-4 h-4 ml-1 text-white" fill="none" viewBox="0 0 24 24"
                                     stroke="currentColor" style="display: none;">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M15 19l-7-7 7-7" />
                                </svg>

                                <svg xmlns="http://www.w3.org/2000/svg" x-show="Open"
                                     class="w-4 h-4 ml-1 text-white" fill="none" viewBox="0 0 24 24"
                                     stroke="currentColor" style="display: none;">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M19 9l-7 7-7-7" />
                                </svg>
                            </div>

                            <div x-show.transition="Open" style="display:none;">
                                <ul x-transition:enter="transition-all ease-in-out duration-300"
                                    x-transition:enter-start="opacity-25 max-h-0"
                                    x-transition:enter-end="opacity-100 max-h-xl"
                                    x-transition:leave="transition-all ease-in-out duration-300"
                                    x-transition:leave-start="opacity-100 max-h-xl"
                                    x-transition:leave-end="opacity-0 max-h-0"
                                    class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium bg-blue-900 rounded-md shadow-inner"
                                    aria-label="submenu">

                                    <li class="px-2 py-1 text-white transition-colors duration-150">
                                        <div class="px-1 rounded-md hover:text-gray-800 hover:bg-gray-100">
                                            <div class="flex items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                                                     viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                          stroke-width="2"
                                                          d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                                </svg>
                                                <a href="#"
                                                   class="w-full ml-2 text-sm font-semibold text-white hover:text-gray-800">Item
                                                    1</a>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </aside>

    <div class="flex flex-col flex-1 w-full overflow-y-auto">
        <header class="z-40 py-4 bg-gray-800 ">
            <div class="flex items-center justify-between h-8 px-6 mx-auto">
                <!-- Mobile hamburger -->
                <button class="p-1 mr-5 -ml-1 rounded-md md:hidden focus:outline-none focus:shadow-outline-purple"
                        @click="toggleSideMenu" aria-label="Menu">

                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white" fill="none"
                         viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h7" />
                    </svg>
                </button>

                <!-- Search Input -->
                <div class="flex justify-center mt-2 mr-4">
                    <div class="relative flex flex-wrap items-stretch w-full mb-3">
                        <input type="search" placeholder="Search" @{{ $attributes }}
                        class="relative w-full px-3 py-2 pr-10 text-sm text-gray-700 placeholder-gray-400 bg-white rounded-lg shadow outline-none form-input focus:outline-none focus:shadow-outline" />
                        <span
                            class="absolute right-0 z-10 items-center justify-center w-8 h-full py-3 pr-3 text-base font-normal leading-snug text-center text-gray-400 bg-transparent rounded">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 -mt-1" fill="none"
                                     viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                            </span>
                    </div>
                </div>

                <ul class="flex items-center flex-shrink-0 space-x-6">



                    <!-- Profile menu -->
                    <li class="relative">
                        <button
                            class="p-2 text-blue-500 align-middle bg-white rounded-full hover:text-blue-900 hover:bg-blue-900 focus:outline-none "
                            @click="toggleProfileMenu" @keydown.escape="closeProfileMenu" aria-label="Account"
                            aria-haspopup="true">
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                                     viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </div>
                        </button>
                        <template x-if="isProfileMenuOpen">
                            <ul x-transition:leave="transition ease-in duration-150"
                                x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                                @click.away="closeProfileMenu" @keydown.escape="closeProfileMenu"
                                class="absolute right-0 w-56 p-2 mt-2 space-y-2 text-gray-600 bg-white border border-orange-400 rounded-md shadow-md"
                                aria-label="submenu">

                                <li class="flex">
                                    <form method="post" action="{{ route('logout') }}" class="inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800"
                                       >
                                       <button type="submit" class="w-full btn btn-ghost">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                       <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                             d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                   </svg>
                                   @csrf
                                   <span>Log out</span>
                                       </button>

                                    </form>
                                </li>
                            </ul>
                        </template>
                    </li>
                </ul>

            </div>
        </header>
        <main class="">
            <div class="grid px-8 pb-10 mx-4 mb-4 bg-gray-100 border-4 border-blue-900 rounded-3xl">

              @yield('main')
            </div>
        </main>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
    function data() {

        return {

            isSideMenuOpen: false,
            toggleSideMenu() {
                this.isSideMenuOpen = !this.isSideMenuOpen
            },
            closeSideMenu() {
                this.isSideMenuOpen = false
            },
            isNotificationsMenuOpen: false,
            toggleNotificationsMenu() {
                this.isNotificationsMenuOpen = !this.isNotificationsMenuOpen
            },
            closeNotificationsMenu() {
                this.isNotificationsMenuOpen = false
            },
            isProfileMenuOpen: false,
            toggleProfileMenu() {
                this.isProfileMenuOpen = !this.isProfileMenuOpen
            },
            closeProfileMenu() {
                this.isProfileMenuOpen = false
            },
            isPagesMenuOpen: false,
            togglePagesMenu() {
                this.isPagesMenuOpen = !this.isPagesMenuOpen
            },

        }
    }
</script>
{{-- <script>
    var chart = document.querySelector('#chartline')
    var options = {
        series: [{
            name: 'Visiteur inscrit',
            type: 'area',
            data: [44, 55, 31, 47, 31, 43, 26, 41, 31, 47, 33]
        }, {
            name: 'Visiteur anonyme',
            type: 'line',
            data: [55, 69, 45, 61, 43, 54, 37, 52, 44, 61, 43]
        }],
        chart: {
            height: 350,
            type: 'line',
            zoom: {
                enabled: false
            }
        },
        stroke: {
            curve: 'smooth'
        },
        fill: {
            type: 'solid',
            opacity: [0.35, 1],
        },
        labels: ['Dec 01', 'Dec 02', 'Dec 03', 'Dec 04', 'Dec 05', 'Dec 06', 'Dec 07', 'Dec 08', 'Dec 09 ',
            'Dec 10', 'Dec 11'
        ],
        markers: {
            size: 0
        },
        yaxis: [{
            title: {
                text: 'Nombre',
            },
        },
            {
                opposite: true,
                title: {
                    text: 'Nombre',
                },
            },
        ],
        tooltip: {
            shared: true,
            intersect: false,
            y: {
                formatter: function(y) {
                    if (typeof y !== "undefined") {
                        return y.toFixed(0) + " Visiteurs";
                    }
                    return y;
                }
            }
        }
    };
    var chart = new ApexCharts(chart, options);
    chart.render();
</script>
<script>
    var chart = document.querySelector('#chartpie')
    var options = {
        series: [80, 55, 12],
        chart: {
            height: 350,
            type: 'radialBar',
        },
        plotOptions: {
            radialBar: {
                dataLabels: {
                    name: {
                        fontSize: '22px',
                    },
                    value: {
                        fontSize: '16px',
                    },
                    total: {
                        show: true,
                        label: 'Total',
                        formatter: function(w) {
                            // By default this function returns the average of all series. The below is just an example to show the use of custom formatter function
                            return 249
                        }
                    }
                }
            }
        },
        labels: ['Visiteur', 'Utilisateur', 'Staff',],
    };
    var chart = new ApexCharts(chart, options);
    chart.render();
</script> --}}
@yield('beforeBody')
</body>

</html>
