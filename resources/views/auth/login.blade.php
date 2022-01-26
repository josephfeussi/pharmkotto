@extends('templates.header')
@section('title', 'Se connecter - Stratochange')

@section('head')
    <script>
        function loginPage() {
            return {
                phone: "",
                password: "",
                token: "",

                initially() {
                    @if (session('info'))
                        Swal.fire({html: " {{ session('info') }}", icon:"info"})
                    @endif
                },

                async requestToken(e) {
                    if (this.phone.length != 9) {
                        Swal.fire({
                            title: "Entrez un numero camerounais à 9 chiffres sans espaces et sans indicatif international",
                            text: "example: 691234567",
                            icon: "error"
                        })
                        return;
                    }
                    Swal.showLoading();
                    Swal.update({
                        title: "Veuillez patienter"
                    })

                    try {
                        var response = await axios.post("/api/auth/login", {
                            phone: '+237' + this.phone,
                            password: this.password
                        })
                        if (!['staff', 'admin'].includes(response.data.user.user.role)) {

                            Swal.fire({
                                icon: "error",
                                title: "Access non authorisé",
                                text: "Vous n'avez pas access a cette resource, si vous pensez que c'est une erreur, contactez l'administrateur"
                            })
                            return;
                        }
                        this.token = response.data.token.token
                        document.getElementById("token").value = this.token;
                        e.target.submit();
                        Swal.update({
                            text: "Nous y sommes presque"
                        })

                    } catch (error) {
                        console.error(error);
                        Swal.update({
                            title: "Impossible de vous connecter",
                            text: error.response.data.message
                        })
                        Swal.hideLoading()
                    }
                }
            }
        }
    </script>
@endsection

@section('body')
    <div class="absolute inset-0 mt-16 bg-left-top bg-no-repeat bg-cover " x-data='loginPage()' x-init='initially()'>
        <div class="flex justify-center h-full ">
            <div class="w-7/12 bg-cover "
                style="background-image: url('{{ asset('images/bg/african-doctors-14739433.jpg') }}')">
                <div class="flex flex-col items-start justify-center w-full h-full p-8 bg-gray-100 bg-cover bg-opacity-60">
                    <p class="text-xl font-medium uppercase text-primary-900">Nous vous attendions</p>
                    <p class="my-8 text-5xl font-bold text-primary-900">
                        Vous êtes là<br>
                        Connectez vous
                    </p>

                    <p class="mt-4 text-xl text-primary-900">
                        Connectez vous, <br>et continuez vos activitées!
                    </p>
                </div>

            </div>
            <div class="flex flex-col justify-center flex-1 p-5 bg-white rounded-lg lg:rounded-l-none">
                <h3 class="pt-4 ml-8 text-2xl font-bold">Remplissez le formulaire</h3>
                <form @submit.prevent="requestToken" method="POST" action="{{ route('login') }}"
                    class="px-8 pt-6 pb-8 mb-4 bg-white rounded">

                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Numero de téléphone</span>
                        </label>

                        <input type="tel" name="phone" x-model="phone" required placeholder="691234567"
                            class="input input-bordered">

                    </div>

                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Mot de passe</span>
                        </label>
                        <input type="password" placeholder="********" name="password" required x-model="password"
                            class="input input-bordered">
                    </div>

                    <input hidden id="token" name="token" x-model="token">
                    {{ csrf_field() }}

                    <div class="my-6 text-center">
                        <button class="btn btn-secondary" type="submit">
                            Continuer
                        </button>
                    </div>
                    <hr class="mb-6 border-t" />
                    <div class="text-center">
                        <a class="inline-block text-sm text-blue-500 align-baseline hover:text-blue-800"
                            href="{{ route('auth.register') }}">
                            Je souhaite creer un compte
                        </a>
                    </div>
                    <div class="text-center">
                        <a class="inline-block text-sm text-blue-500 align-baseline hover:text-blue-800"
                            href="{{ route('auth.reset') }}">
                            J'ai oublié mon mot de passe?
                        </a>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection
