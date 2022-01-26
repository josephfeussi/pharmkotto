<div id="navbar" class="fixed z-50 w-full text-white transition duration-200 bg-transparent " x-data="{
    open: false,
    hasScrolled: false,
     reactOnScroll() {
        if (this.$el.getBoundingClientRect().top < 96 && window.scrollY > 96) {
            this.hasScrolled = true;
        } else {
            this.hasScrolled = false;
        }

        if(document.getElementsByTagName('body')[0].getBoundingClientRect().height < window.screen.availHeight){
            this.hasScrolled=true;
        }
    }
}" x-init="reactOnScroll()" @scroll.window="reactOnScroll()">

    <div class="mb-2 bg-white navbar !text-primary backdrop-blur-sm"
        x-bind:class="{' shadow-lg bg-opacity-80':hasScrolled||open}">
        <div class="px-2 mx-2 navbar-start">
            <span class="text-lg font-bold">
                Pharmacie Kotto
            </span>
        </div>
        <div class="hidden px-2 mx-2 navbar-center lg:flex">
            <div class="flex items-stretch">
                <a href="{{ route('home') }}" class="btn btn-ghost btn-sm rounded-btn">
                    Acceuil
                </a>
                <a href="{{ route('home') }}#about" class="btn btn-ghost btn-sm rounded-btn">
                    A propos
                </a>
                <a href="{{ route('home') }}#gardes" class="btn btn-ghost btn-sm rounded-btn">
                    Pharmacies
                </a>
                <a href="{{ route('home') }}#contact" class="btn btn-ghost btn-sm rounded-btn">
                    Contact
                </a>
            </div>
        </div>
        <div class="navbar-end">
            @auth
                <a href="{{ route('dashboard') }}" class="bg-white text-primary btn btn-ghost hover:bg-gray-300 "
                    x-bind:class="{'!btn-primary  !text-white':hasScrolled||open}">
                    Mon compte
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 ml-1" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </a>
            @endauth

            @guest
                <a href=" {{ route('auth.register') }} " class="btn btn-ghost">
                    S'inscrire
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 ml-1" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                    </svg>
                </a>
                <a href=" {{ route('auth.login') }} " class="btn btn-ghost">
                    Se connecter
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 ml-1" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                    </svg>


                </a>
            @endguest

        </div>
    </div>
</div>
