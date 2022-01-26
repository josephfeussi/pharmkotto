<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', "Ask'Kotto - La reponse aux question")</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <meta name="theme-color" content="#fafafa">

    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="stylesheet" href="//cdn.materialdesignicons.com/5.4.55/css/materialdesignicons.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
          integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
          crossorigin="anonymous"/>

          <style>
              html {
  scroll-behavior: smooth;
}
          </style>
    @yield('head')
</head>
<body class="relative">

    <!-- Main Nav 1 -->

    <div class="fixed z-50 w-full text-white transition duration-200 bg-primary-900"  x-data="{
        open: false}">


        <nav class="container h-full px-6 py-4 mx-auto md:flex md:justify-between md:items-center ">
            <div class="flex items-center justify-between">
                <a class="text-4xl font-bold transition-colors duration-300 transform md:text-3xl hover:text-indigo-400"
                    href="{{ route('home') }}">
                    <div >
                        <img src="{{ asset('images/illustration/logo-white.png') }}" class="h-16" alt="">
                    </div>


                </a>

                <!-- Mobile menu button -->
                <div @click="open = !open" class="flex md:hidden">
                    <button type="button" class=" hover:text-yellow-400 focus:outline-none focus:text-yellow-400"
                        aria-label="toggle menu">
                        <svg viewBox="0 0 24 24" class="w-6 h-6 fill-current">
                            <path fill-rule="evenodd"
                                d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z">
                            </path>
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Mobile Menu open: "block", Menu closed: "hidden" -->
            <div :class="open ? 'flex' : 'hidden'"
                class="flex-col mt-2 space-y-4 text-base font-medium md:flex md:space-y-0 md:flex-row md:items-center md:space-x-10 md:mt-0">
                <a class="transition-colors duration-300 transform hover:text-indigo-400"
                href="{{ route('home') }}">Acceuil</a>
            <a class="transition-colors duration-300 transform hover:text-indigo-400"
                href="{{ route('home') }}/#about">Pharmacies de gardes</a>
            <a class="transition-colors duration-300 transform hover:text-indigo-400"
                href="{{ route('ask.index') }}">Mes questions</a>

            <a class="transition-colors duration-300 transform t hover:text-indigo-400"
                href="{{ route('home') }}/#contact">Contact</a>


                @auth




                    <a class="transition-colors duration-300 transform md:hidden hover:text-pink-400"
                        href="{{ route('dashboard') }}">Tableau de bord</a>
                @endauth
                @guest
                    <a class="transition-colors duration-300 transform md:hidden hover:text-pink-400"
                        href="{{ route('auth.login') }}">Nous rejoindre</a>
                @endguest




            </div>
            <!-- Login -->
            <div>
                @auth()
                    <a class="hidden p-5 text-center text-gray-800 transition-colors duration-300 transform bg-white border rounded md:block hover:bg-primary-900 "
                        href="{{ route('dashboard') }}">Tableau de bords</a>
                @else
                    <a class="hidden p-5 text-center text-gray-800 transition-colors duration-300 transform bg-white border rounded md:block hover:bg-primary-900 "
                        href="{{ route('auth.login') }}">Nous rejoindre</a>
                @endauth

            </div>
        </nav>
    </div>
<!-- /Main Nav 1     -->


<div class="pt-32">
    <nav class="flex items-center justify-between max-w-5xl mx-auto">
        <a href="{{ route('ask.index') }}" id="logo" class="text-2xl text-primary-900"><em class="text-4xl font-bold">a</em>sk<span class="text-3xl font-bold text-secondary-500">'</span><em class="text-base">kotto</em></a>


        <div id="menu" class="flex text-sm">
            <a href="{{ route('ask.notAnswered') }}">Non repondues</a>
            @auth()
            <a href="{{ route('ask.user.questions', ['id'=>'me']) }}" class="mx-6">{{auth()->user()->profile->first_name}} {{auth()->user()->profile->last_name}}</a>
            <form action="{{ route('logout') }}" method="post">
                <button type="submit" >Se déconnecter</button>
                @csrf
            </form>

            @endauth

       </div>
    </nav>
</div>



<div class="flex max-w-5xl pt-8 mx-auto">
    <div class="w-8/12">
        @yield('body')
    </div>
    <div class="w-4/12 pl-8">
        <div class="p-8 text-white bg-gray-800">
            <p class="font-bold">Une soucis ?</p>
            <p class="mt-2 text-sm">Quelque choses vous préoccupe ?</p>

            <p class="mt-4">Posez votre question et obtenez des réponse fiables</p>
<div class="mt-6">
    <a href="{{ route('ask.index') }}" class="w-full p-4 mt-4 font-bold text-center rounded-lg bg-primary-900">Je pose ma question</a>
</div>

        </div>


        <div class="p-8 mt-4 text-gray-800 ring-1 ring-secondary-500">
            <p class="font-bold">Vous en savez des choses ?</p>
            <p class="mt-2 text-sm">Alors partagez vos connaissance avec le monde</p>

            <p class="mt-4">Repondez aux questions avec nous</p>
<div class="mt-6">
    <a href="{{ route('ask.notAnswered') }}" class="w-full p-4 mt-4 font-bold text-center text-white rounded-lg bg-secondary-500 ring-1 ring-gray-200">Voir les question</a>
</div>

        </div>

        <div class="hidden mt-6">
            <p class="pb-1 font-bold border-b border-gray-800 text gray-800">Leaderboard</p>
            <div class="flex items-center justify-between px-4 mt-4">
                <a href="#" class="text-secondary-500">Hiro</a>
                <p class="text-sm text-gray-600">8 reponses</p>
            </div>
        </div>
    </div>


</div>



</body>




</html>
