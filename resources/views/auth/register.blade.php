@extends('templates.main')
@section('title',"Creer un compte - Pharmacie Kotto")

@section('head')
    <script>
        function registerPage() {
            return {
                email: "",
                password: "",

                initially() {
                    @if (session('error'))
                        Toast.fire(" {{ session('error') }}")
                    @endif
                },

                async requestToken(e) {
                    Swal.showLoading();
                    Swal.update({
                        title: "Veuillez patienter",
                        showConfirmButton: false,
                    })

                    try {
                        var response = await axios.post("/api/users", {
                            email: this.email,
                            password: this.password
                        })

                        var response = await axios.post("/api/auth/login", {
                            email: this.email,
                            password: this.password
                        })

                        this.token = response.data.token.token
                        document.getElementById("token").value = this.token;
                        e.target.submit();
                        Swal.update({
                            text: "Nous y sommes presque"
                        })

                    } catch (error) {

                        Swal.update({
                            title: "Impossible de vous connecter",
                            showConfirmButton: true,
                            text: error.response.data.message
                        })
                        Swal.hideLoading()
                    }
                }
            }
        }
    </script>
@endsection

@section("body")
<div class="absolute inset-0 mt-16 bg-left-top bg-no-repeat bg-cover " x-data='registerPage()' x-init='initially()'>
    <div class="flex justify-center h-full ">
        <div class="w-7/12 bg-cover "
            style="background-image: url('{{ asset('images/bg/african-doctors-14739433.jpg') }}')">
            <div class="flex flex-col items-start justify-center w-full h-full p-8 bg-gray-100 bg-cover bg-opacity-60">
                <p class="text-xl font-medium uppercase text-primary-900">Rejoignez Pharmacie Kotto</p>
                <p class="my-8 text-5xl font-bold text-primary-900">
                    Creez votre compte<br>
                    et faite parti de la grande famille
                </p>

                <p class="mt-4 text-xl text-primary-900">
                    Vous êtes a deux pas, <br>creez votre compte et rejoignez la grande famille!
                </p>
            </div>

        </div>
        <div class="flex flex-col justify-center flex-1 p-5 bg-white rounded-lg lg:rounded-l-none">
            <h3 class="pt-4 ml-8 text-2xl font-bold">Remplissez le formulaire</h3>
            <form @submit.prevent="requestToken" method="POST" action="{{ route('login') }}"
                class="px-8 pt-6 pb-8 mb-4 bg-white rounded">
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Email</span>
                    </label>
                    <input type="email" name="email" x-model="email" required placeholder="atangana@example.com"
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
                        href="{{ route('auth.login') }}">
                        Je deja un compte
                    </a>
                </div>

            </form>
        </div>
    </div>

</div>
@endsection
