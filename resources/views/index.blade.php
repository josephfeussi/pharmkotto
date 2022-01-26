@extends('templates.main')

@section('title', 'Pharmacie Kotto - Votre Pharmacie Digitals')

@section('head')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/css/splide.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
@endsection

@section('body')

    <div>

        <header class="flex w-full mx-auto mt-16 bg-right-bottom bg-cover"
            style="background-image: url('{{ asset('images/bg/medicines.jpg') }}'); height: 700px">

            <div class="flex-1 h-full p-8 bg-gradient-to-tr from-transparent to-white backdrop-blur-xs">

                <div class="container h-full mx-auto splide" id="splide">
                    <div class="h-full splide__track">
                        <div class="h-full splide__list">
                            <div class="flex flex-col items-center justify-center h-full splide__slide">
                                <p class="text-lg uppercase">votre pharmacie dans votre poche</p>
                                <h1 class="text-6xl font-bold text-primary">L'application mobile</h1>
                                <p class="mt-8">Installez l'application Pharmacie Kotto sur Google play store, et
                                    accedez a tout vos services depuis votre telephone mobile</p>
                                <div class="flex mt-8">
                                    <a href="#" class="flex-1 btn btn-lg btn-secondary">er sur playstore
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 ml-1" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M9 19l3 3m0 0l3-3m-3 3V10" />
                                        </svg></a>
                                </div>
                            </div>
                            <div class="flex flex-col items-center justify-center h-full splide__slide">
                                <p class="text-lg uppercase">une pharmacie digital s'ouvre au monde</p>
                                <h1 class="text-6xl font-bold text-primary">Pharmacie Kotto</h1>
                                <p class="mt-8">Profitez des :</p>
                                <ul class="mt-4 text-lg list-disc ">
                                    <li class="list-item">Conseils</li>
                                    <li class="list-item">Suvie a distance</li>
                                    <li class="list-item">Et beaucoup d'autres</li>
                                </ul>
                                <div class="flex mt-8">
                                    <a href="#" class="flex-1 btn btn-lg btn-primary">Se connecter</a>
                                </div>
                            </div>
                            <div class="flex flex-col items-center justify-center h-full splide__slide">
                                <p class="text-lg uppercase">Peut importe le jour et l'heure, trouvez vos</p>
                                <h1 class="text-6xl font-bold text-primary">Pharmacie de gardes</h1>
                                <p class="mt-8">Retrouvez toutes vos pharmacie de gardes sur l'application
                                    pharmacie
                                    kotto et sur notre siteweb<br>
                                    Avec Pharmacie Kotto, l'information est desormais plus accessible et tout cela
                                    gratuitement
                                </p>
                            </div>
                            <div class="flex flex-col items-center justify-center h-full splide__slide">
                                <p class="text-lg uppercase">vous avez des question ? vous avez des reponses ?</p>
                                <h1 class="text-6xl font-bold text-primary">Ask'Kotto</h1>
                                <p class="mt-8">Est une plateforme d'echange complement anonymes, ou les questions
                                    rencontrents les reponse.<br>
                                    Allez y, visité Ask'kotto pour apprendre...
                                </p>
                                <div class="flex mt-8">
                                    <a href="#" class="flex-1 btn btn-lg btn-accent">Ask'Kotto</a>
                                </div>
                            </div>
                            @foreach ($infos as $info)

                                @if (isset($info->image))
                                    <div class="flex justify-center h-full splide__slide">
                                        <div class="flex gap-x-4 p-4 max-h-[80%] bg-white shadow-xl rounded-lg ">
                                            <div class="h-full overflow-hidden rounded-lg ring-1">
                                                <img src="{{ $info->image }}"
                                                    class="object-cover object-center w-full h-full">
                                            </div>
                                            <div class="flex-1 flex flex-col justify-center min-w-[30%]">
                                                <h2 class="mb-4 text-3xl font-bold text-center text-primary">Information
                                                </h2>
                                                <p> {{ $info->information }} </p>

                                            </div>
                                        </div>
                                    </div>

                                @else
                                    <div class="flex flex-col items-center justify-center h-full splide__slide">
                                        <p class="text-lg uppercase">Restez informés avec</p>
                                        <h1 class="text-6xl font-bold text-primary">Kotto à la une</h1>
                                        <p class="mt-8">{{ $info->information }}
                                        </p>
                                    </div>
                                @endif


                            @endforeach
                        </div>
                    </div>
                </div>



            </div>
        </header>

        <section class="flex flex-col justify-between gap-16 py-12 mx-auto md:flex-row max-w-7xl">


            <div class="flex items-center">
                <div class="flex items-center justify-center w-16 h-16 rounded-full bg-accent">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                    </svg>
                </div>

                <div class="flex flex-col flex-1 ml-4">
                    <p class="text-xl font-bold">Suivie & assistance</p>
                    <p class="text-sm text-base-content">Profitez du suivie a distance grâce a notre plateforme en ligne</p>
                </div>
            </div>

            <div class="flex items-center">
                <div class="flex items-center justify-center w-16 h-16 rounded-full bg-accent">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                    </svg>
                </div>

                <div class="flex flex-col flex-1 ml-4">
                    <p class="text-xl font-bold">100% Gratuit</p>
                    <p class="text-sm text-base-content">Nos services sont completement gratuit sur notre plateforme</p>
                </div>
            </div>

            <div class="flex items-center">
                <div class="flex items-center justify-center w-16 h-16 rounded-full bg-accent">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                    </svg>
                </div>

                <div class="flex flex-col flex-1 ml-4">
                    <p class="text-xl font-bold">Question & Reponse</p>
                    <p class="text-sm text-base-content">Rejoignez notre forums des internautes et participé a des themes
                        qui vous interressent </p>
                </div>
            </div>


        </section>

        <div class="divider">VOTRE PHARMACIE</div>
        <section class="relative w-full mx-auto mt-12" id="about">
            <div class="absolute w-full h-full bg-primary class" style="left:30%; width: 70%"></div>
            <div class="container py-8 mx-auto max-w-7xl">
                <div class="relative z-10 items-center md:flex md:space-x-6">
                    <div class="md:w-1/2">
                        <div class="flex items-center justify-center">
                            <div>
                                <img class="object-contain object-center w-full bg-gray-100 rounded-md shadow-lg"
                                    style="height: 500px;" src="{{ asset('images/illustration/2.svg') }}">
                            </div>
                        </div>
                    </div>

                    <div class="w-full pl-8 mt-8 md:mt-0 ">
                        <p class="text-sm font-bold tracking-wide uppercase text-primary">Qui somme nous</p>
                        <h2 class="text-4xl font-bold tracking-wide ">Une pharmacie toujour a l'ecoute pour les patients!
                        </h2>
                        <p class="mt-8 font-light">
                            Labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                            laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
                            voluptate velit esse cillum dolore eu fugiat nulla pariatur.


                        </p>
                        <p class="mt-8 font-light">
                            Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit animd
                            est laborum sed ut perspiciatis unde omnis iste natus error sit.
                        </p>

                        {{-- <div class="mt-16">
                            <a class="p-6 text-white uppercase rounded bg-primary " href="#">Decouvrir l'entreprise</a>
                        </div> --}}

                    </div>
                </div>
            </div>
        </section>

        <section class="mx-auto mt-32 " x-data="{}" id="gardes">
            <h2 class="w-1/2 mx-auto text-4xl font-bold text-center">Vos pharmacies de gardes</h2>


            <div class="w-full mt-24 ">



                <div class=" splide" id="splide2">

                    <div class="h-full splide__track">
                        <div class="h-full splide__list gap-x-16">
                            @foreach ($pharmacies as $pharmacie)
                                <div style="width: 500px"
                                    class="relative flex flex-col flex-shrink-0 h-56 p-8 pl-16 ml-24 bg-gray-200 rounded-md splide__slide">
                                    <img src="{{ asset('images/icons/logo.jpg') }}"
                                        style="width: 6rem!important; height: 6rem"
                                        class="absolute object-cover object-center rounded-full bg-primary top-16 -left-12">
                                    <p x-text='`{{ $pharmacie->name }}`'></p>
                                    <div class="mt-2">
                                        <span class="font-medium">Du :</span>
                                        <span class="ml-4 text-gray-600"
                                            x-text='formatDate(`{{ $pharmacie->from }}`)'></span>
                                    </div>
                                    <div class="mt-2">
                                        <span class="font-medium">Au :</span>
                                        <span class="ml-4 text-gray-600"
                                            x-text='formatDate(`{{ $pharmacie->to }}`)'></span>
                                    </div>

                                    <div class="mt-2">
                                        <span class="font-medium">Situé à :</span>
                                        <span class="ml-4 text-gray-600" x-text="`{{ $pharmacie->location }}`"></span>
                                    </div>
                                </div>

                            @endforeach

                        </div>
                    </div>
                </div>
            </div>


        </section>




        <div class="mx-4 my-16 bg-white" x-data="setup()">

            <div class="text-center">
                <h1 class="mb-4 text-2xl font-normal md:text-3xl lg:text-4xl">
                    Retrouvez nous a Douala
                </h1>
                <p class="text-sm font-normal text-gray-700">

                    Nous sommes situé a Douala, En face de la brasserie
                </p>

                <div style="width: 100%" class="mt-8">
                    <iframe scrolling="no" marginheight="0" marginwidth="0"
                        src="https://maps.google.com/maps?width=100%25&amp;height=400&amp;hl=en&amp;q=Pharmacie%20Kotto+(Pharmacie%20Kotto)&amp;t=&amp;z=15&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"
                        width="100%" height="400" frameborder="0"></iframe>
                </div>
            </div>



        </div>

        <section>
            <div class="flex items-center justify-center bg-gray-white ">
                <div class="w-full px-5 py-16 text-gray-800 bg-white bg-center bg-cover border-t border-gray-200 md:py-24">
                    <div class="w-full max-w-6xl mx-auto mb-12 bg-white">
                        <div class="max-w-xl mx-auto text-center">
                            <h1 class="mb-5 text-6xl font-bold text-gray-600 md:text-7xl">Actualité <br>avec nous
                            </h1>
                            <h3 class="mb-5 text-xl font-light">Restez connecté avec votre pharmicie a tout moment.</h3>
                            <div class="mb-10 text-center">
                                <span class="inline-block w-1 h-1 ml-1 bg-indigo-500 rounded-full"></span>
                                <span class="inline-block w-3 h-1 ml-1 bg-indigo-500 rounded-full"></span>
                                <span class="inline-block w-40 h-1 bg-indigo-500 rounded-full"></span>
                                <span class="inline-block w-3 h-1 ml-1 bg-indigo-500 rounded-full"></span>
                                <span class="inline-block w-1 h-1 ml-1 bg-indigo-500 rounded-full"></span>
                            </div>
                        </div>
                        <div class="">
                            <!-- Set up your HTML -->
                            <div class="">
                                <div class=" splide" id="splide3" x-data="{}">
                                    <div class="h-full py-16 splide__track">
                                        <div class="h-full splide__list gap-x-16">
                                            @foreach ($infos as $info)
                                                @if (isset($info->image))
                                                    <div class="w-full h-64 card glass lg:card-side text-base-content">
                                                        <figure class="p-6">
                                                            <img src="{{ $info->image }}"
                                                                class="object-cover h-full rounded-lg shadow-lg ">
                                                        </figure>
                                                        <div class="max-w-md card-body">
                                                            <h2 class="card-title">Information</h2>
                                                            <p>{{ $info->information }}</p>

                                                        </div>
                                                    </div>
                                                @else
                                                    <div class="shadow-lg card lg:card-side bordered splide__slide">
                                                        <div class="card-body">
                                                            <h2 class="card-title">Informations</h2>
                                                            <p>{{ $info->information }}</p>
                                                            <div class="card-actions">
                                                                <span class="text-sm text-base-content"
                                                                    x-text="timeAgo('{{ $info->updated_at }}')"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="relative flex items-center justify-center hidden bg-accent">

            <div class="w-full px-5 py-16 font-light text-gray-800">
                <div class="w-full px-5 py-16 font-light text-gray-800">
                    <div class="w-full max-w-6xl pb-5 mx-auto">
                        <div class="items-center -mx-3 md:flex">
                            <div class="px-3 mb-10 md:w-2/3 md:mb-0">
                                <h1 class="mb-5 text-6xl font-bold leading-tight text-white md:text-8xl">Restez <br
                                        class="hidden md:block">en contact.</h1>
                                <h3 class="leading-tight text-gray-300 mb-7">Souscrivez a la news letters</h3>
                                <div>
                                    <span class="inline-block w-40 h-1 bg-yellow-400 rounded-full"></span>
                                    <span class="inline-block w-3 h-1 ml-1 bg-yellow-400 rounded-full"></span>
                                    <span class="inline-block w-1 h-1 ml-1 bg-yellow-400 rounded-full"></span>
                                </div>
                            </div>
                            <div class="px-3 md:w-1/3">
                                <form>
                                    <div class="flex mb-3">
                                        <div
                                            class="z-10 flex items-center justify-center w-10 pl-1 text-center pointer-events-none">
                                            <i class="text-lg text-gray-400 mdi mdi-email-outline"></i>
                                        </div>
                                        <input type="email"
                                            class="w-full py-2 pl-10 pr-3 -ml-10 border-2 border-gray-200 rounded-lg outline-none focus:border-indigo-500"
                                            placeholder="email@example.com">
                                    </div>
                                    <div>
                                        <button
                                            class="block w-full px-3 py-2 font-semibold text-white transition-colors bg-indigo-500 rounded-lg hover:bg-indigo-700 focus:bg-indigo-700">Subscribe
                                            now.</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="flex justify-between">
                            <div class="flex flex-col pr-8 mt-4">
                                <p class="mb-4 text-lg font-medium text-white">Contact</p>
                                <div class="mt-2">
                                    <span class="tepharmacie.namext-blue-500 mdi mdi-phone"></span>
                                    <span class="ml-2 font-medium text-white">Telephone :</span>
                                    <span class="text-gray-200">+237 690 000 000</span>
                                </div>


                                <div class="mt-2">
                                    <span class="text-green-500 mdi mdi-whatsapp"></span>
                                    <span class="ml-2 font-medium text-white">Whatsapp :</span>
                                    <span class="text-gray-200">+237 690 000 000</span>
                                </div>

                                <div class="mt-2">
                                    <span class="text-secondary-500 mdi mdi-email"></span>
                                    <span class="ml-2 font-medium text-white">E-mail :</span>
                                    <a href="mailto:ph@kot.med" class="text-gray-200">pharmacie@kotto.med</a>
                                </div>
                            </div>


                            <div class="flex flex-col pr-8 mt-4">
                                <p class="mb-4 text-lg font-medium text-white">Heures de services</p>
                                <div class="mt-2">
                                    <span class="text-blue-500 mdi mdi-clock"></span>
                                    <span class="ml-2 font-medium text-white">Lundi a Vendredi :</span>
                                    <span class="text-gray-200">8h00 ... 20h00</span>
                                </div>

                                <div class="mt-2">
                                    <span class="text-orange-500 mdi mdi-clock"></span>
                                    <span class="ml-2 font-medium text-white">Weekend :</span>
                                    <span class="text-gray-200">10h00 ... 20h00</span>
                                </div>

                                <div class="mt-2">
                                    <span class="text-fuchsia-500 mdi mdi-clock"></span>
                                    <span class="ml-2 font-medium text-white">Jours Fériés :</span>
                                    <span class="text-gray-200">14h00 ... 20h00</span>
                                </div>

                                <div class="mt-2">
                                    <span class="text-gray-500 mdi mdi-clock"></span>
                                    <span class="ml-2 font-medium text-white">Jours de gardes :</span>
                                    <span class="text-gray-200">24h/24h</span>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
        </section>

        <div class="divider"></div>
        <section class="flex py-8 mx-auto max-w-7xl" id="contact">

            <div
                class="relative h-[712px] w-[350px] bg-pink-900 rounded-[60px] shadow-xl overflow-hidden border-[14px] border-black">
                <img src="{{ asset('images/bg/medicines.jpg') }}" alt="Medical"
                    class="absolute inset-0 object-cover w-full h-full mix-blend-exclusion">
                <div class="absolute inset-x-0 top-0">
                    <div class="w-40 h-6 mx-auto bg-black rounded-b-2xl"></div>
                </div>

                <div class="relative">
                    <div class="flex justify-end mt-2 mr-5 space-x-1">
                        <svg class="w-4 h-4 text-white" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M1,21H21V1M19,5.83V19H16V8.83" />
                        </svg>

                        <svg class="w-4 h-4 text-white" viewBox="0 0 24 24">
                            <path fill="currentColor"
                                d="M12,21L15.6,16.2C14.6,15.45 13.35,15 12,15C10.65,15 9.4,15.45 8.4,16.2L12,21M12,3C7.95,3 4.21,4.34 1.2,6.6L3,9C5.5,7.12 8.62,6 12,6C15.38,6 18.5,7.12 21,9L22.8,6.6C19.79,4.34 16.05,3 12,3M12,9C9.3,9 6.81,9.89 4.8,11.4L6.6,13.8C8.1,12.67 9.97,12 12,12C14.03,12 15.9,12.67 17.4,13.8L19.2,11.4C17.19,9.89 14.7,9 12,9Z" />
                        </svg>

                        <svg class="w-4 h-4 text-white" viewBox="0 0 24 24">
                            <path fill="currentColor"
                                d="M16,9H8V6H16M16.67,4H15V2H9V4H7.33A1.33,1.33 0 0,0 6,5.33V20.67C6,21.4 6.6,22 7.33,22H16.67A1.33,1.33 0 0,0 18,20.67V5.33C18,4.6 17.4,4 16.67,4Z" />
                        </svg>
                    </div>

                    <div class="w-10 h-0.5 ml-auto bg-white 5 mr-7 mt-1.5 rounded"></div>

                    <div class="flex flex-col items-center justify-center h-full mt-28">

                        <div class="text-2xl font-bold">Installer l'application</div>
                        <div class="mt-2 avatar">
                            <div class="rounded-full w-44 h-44">
                                <img src="{{ asset('images/icons/logo.jpg') }}">
                            </div>
                        </div>

                        <img src="{{ asset('images/icons/google-play-badge.png') }}">

                    </div>
                </div>
            </div>


            <div class="flex flex-1 ">
                <div class="max-w-6xl pb-5 ml-auto">
                    <div class="items-center -mx-3 md:flex">
                        <div class="px-3 mb-10 md:mb-0">
                            <h1 class="mb-5 text-6xl font-bold leading-tight text-primary md:text-8xl">Restez <br
                                    class="hidden md:block">en contact.</h1>
                            <h3 class="mb-4 text-base leading-tight">Souscrivez a la news letters</h3>
                            <div>
                                <span class="inline-block w-40 h-1 rounded-full bg-accent"></span>
                                <span class="inline-block w-3 h-1 ml-1 rounded-full bg-accent"></span>
                                <span class="inline-block w-1 h-1 ml-1 rounded-full bg-accent"></span>
                            </div>
                        </div>

                    </div>

                    <div class="flex justify-between">
                        <div class="flex flex-col pr-8 mt-4">
                            <p class="mb-4 text-lg font-medium text-content">Contact</p>
                            <div class="mt-2">
                                <span class="tepharmacie.namext-blue-500 mdi mdi-phone"></span>
                                <span class="ml-2 font-medium text-content">Telephone :</span>
                                <span class="text-content">+237 690 000 000</span>
                            </div>


                            <div class="mt-2">
                                <span class="text-green-500 mdi mdi-whatsapp"></span>
                                <span class="ml-2 font-medium text-content">Whatsapp :</span>
                                <span class="text-content">+237 690 000 000</span>
                            </div>

                            <div class="mt-2">
                                <span class="text-secondary-500 mdi mdi-email"></span>
                                <span class="ml-2 font-medium text-content">E-mail :</span>
                                <a href="mailto:ph@kot.med" class="text-content">pharmacie@kotto.med</a>
                            </div>
                        </div>



                    </div>
                </div>
            </div>




        </section>



    </div>

    <script>
        $(document).ready(function() {
            new Splide('#splide', {
                type: 'fade',
                rewind: true,
                autoplay: true,
                padding: "4rem"
            }).mount();


            new Splide('#splide2', {
                type: 'slide',
                perPage: 3,
                rewind: true,
                autoplay: true,
                padding: "8rem"
            }).mount();

            new Splide('#splide3', {
                type: 'loop',

                loop: true,
                autoplay: true,
                padding: "8rem"
            }).mount();
            document.owl = $("#owl-example")
            document.owl.owlCarousel({
                loop: true,
                margin: 32,
                dot: false,
                nav: false,
                merge: true,
                //rewind: true,
                responsiveClass: true,
                autoWidth: true,
                autoHeight: true,
                autoplay: true,
                responsive: {
                    0: {
                        items: 1,
                        nav: true
                    },
                    600: {
                        items: 3,
                        nav: false
                    },
                    1000: {
                        items: 5,
                        nav: true,
                        loop: false
                    }
                }
            });
            $('.owl-next').click(function() {
                owl.trigger('next.owl.carousel');
            })
            // Go to the previous item
            $('.owl-prev').click(function() {
                // With optional speed parameter
                // Parameters has to be in square bracket '[]'
                owl.trigger('prev.owl.carousel', [300]);
            })
        });
        const setup = () => {
            return {
                isNavOpen: false,

                billPlan: 'monthly',
                selected: [],
                toggleSelected(id) {
                    if (this.selected.indexOf(id) >= 0) {
                        this.selected = this.selected.filter(i => i !== id)
                    } else {
                        this.selected = [...this.selected, id]
                    }
                },
                isSelected(id) {
                    return this.selected.indexOf(id) > 0
                },

                plans: [{
                        id: 1,
                        name: 'Analyses des acteurs',
                        discretion: 'Tout le nécessaire pour être procductive',
                        price: {
                            monthly: 29.99,
                            annually: 30 * 12 - 199,
                        },
                    },
                    {
                        id: 2,
                        name: 'Analyses des risque',
                        discretion: 'Idéale pour les entreprises qui souhaite evoluer rapidement',
                        price: {
                            monthly: 59.99,
                            annually: 60 * 12 - 100,
                        },
                    },
                    {
                        id: 3,
                        name: 'Matrices de priorisation',
                        discretion: 'Outils avancées pour ceux qui veulent avoir tout',
                        price: {
                            monthly: 69.50,
                            annually: 70 * 12 - 100,
                        },

                    },

                    {
                        id: 4,
                        name: 'Modèle de resultat',
                        discretion: 'Outils avancées pour ceux qui veulent avoir tout',
                        price: {
                            monthly: 99.99,
                            annually: 100 * 12 - 100,
                        },

                    },
                ],
            }
        }
    </script>
@endsection
