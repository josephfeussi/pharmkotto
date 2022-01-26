@extends('templates.main')
@section('title', 'Bienvenue sur Pharmacie Kotto')

@section('head')
    <script>
        function completeProfile() {
            return {
                form: {
                    first_name: "",
                    last_name: "",
                    mobile_phone: "",
                    city: "",
                    birthday: "",
                    gender: "f",
                    user_id: {{ auth()->user()->id }},
                },

                initially() {
                    @if (session('error'))
                        Toast.fire(" {{ session('error') }}")
                    @endif

                    Toast.fire({
                        icon: 'info',
                        title: "Bienvenue sur Kotto {{ auth()->user()->email }}",
                        text: "Nous somme impatient de vous connaitre, completez vos informations."
                    })
                },

                async requestToken(e) {
                    if(this.form.mobile_phone.length !== 9 || !["69", "65", "66", "62", "67", "24", "22", "68"].includes(this.form.mobile_phone.substring(0,2))){
                        Swal.fire({
                            icon: "error",
                            title: "Votre numero de telephone n'est pas valide",
                            text: "Entrez un numero de téléphone camerounais valide sans indicateur (+237)"
                        })
                        return;
                    }
                    Swal.showLoading();
                    Swal.update({
                        title: "Veuillez patienter",
                        showConfirmButton: false,
                    })

                    try {
                        var response = await axios.post("/api/profiles", {...this.form, mobile_phone: "+237"+this.form.mobile_phone})


                            window.location = "/dashboard"


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

@section('body')
    <div class="inset-0 mt-16 bg-white bg-left-top bg-no-repeat bg-cover " x-data='completeProfile()' x-init='initially()'>
        <div class="flex justify-center ">
            <div class="w-7/12 bg-cover "
                style="background-image: url('{{ asset('images/bg/african-doctors-14739433.jpg') }}')">
                <div class="flex flex-col items-start justify-center w-full h-full p-8 bg-gray-100 bg-cover bg-opacity-60">
                    <p class="text-xl font-medium uppercase text-primary-900">Bienvenue sur Pharmacie Kotto</p>
                    <p class="my-8 text-5xl font-bold text-primary-900">
                        Commencez maintenant<br>
                        Parlez nous de vous
                    </p>

                    <p class="mt-4 text-xl text-primary-900">
                        Vous êtes a un pas de rejoindre notre grande famille, <br>nous avons hâte de vous compter parmi les
                        notres!
                    </p>
                </div>

            </div>
            <div class="flex flex-col justify-center flex-1 p-5 bg-white rounded-lg lg:rounded-l-none">
                <h3 class="pt-4 ml-8 text-2xl font-bold">Remplissez le formulaire</h3>
                <form @submit.prevent="requestToken" method="POST" action="{{ route('login') }}"
                    class="px-8 pt-6 pb-8 mb-4 bg-white rounded">
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Nom</span>
                        </label>
                        <input type="text" name="last_name" x-model="form.last_name" required placeholder="Atangana"
                            class="input input-bordered">
                    </div>

                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Prenom</span>
                        </label>
                        <input type="text" placeholder="Martin" name="first_name" required x-model="form.first_name"
                            class="input input-bordered">
                    </div>

                    <div class="relative form-control">
                        <label class="label">
                            <span class="label-text">Numero de telephone</span>
                        </label>
                        <input type="text" name="mobile_phone" x-model="form.mobile_phone" required
                            placeholder="690000000" class="pl-12 input input-bordered" minlength="9" maxlength="9">
                            <span class="absolute bottom-[0.9rem] ml-4 text-sm ">+237</span>
                    </div>

                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Ville</span>
                        </label>
                        <input type="text" placeholder="Douala" required name="city" x-model="form.city"
                            class="input input-bordered">
                    </div>

                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Date de naissance</span>
                        </label>
                        <input type="date" placeholder="1999/10/10" required name="birthday" x-model="form.birthday"
                            class="input input-bordered">
                    </div>

                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Sexe</span>
                        </label>
                        <div class="flex">
                            <div class="form-control">
                                <label class="cursor-pointer label">
                                    <span class="label-text">Male</span>
                                    <input type="radio" name="gender" x-model="form.gender" class="radio radio-primary"
                                        value="m">
                                </label>
                            </div>
                            <div class="form-control">
                                <label class="cursor-pointer label">
                                    <span class="label-text">Female</span>
                                    <input type="radio" name="gender" x-model="form.gender" class="radio radio-primary"
                                        value="f">
                                </label>
                            </div>

                        </div>
                    </div>










                    <input hidden id="token" name="token" x-model="token">
                    {{ csrf_field() }}

                    <div class="mb-6 text-center">
                        <button class="btn btn-secondary" type="submit">
                            Continuer
                        </button>
                    </div>
                    <hr class="mb-6 border-t" />
                    <div class="text-center">
                        <a class="inline-block text-sm text-blue-500 align-baseline hover:text-blue-800"
                            href="{{ route('auth.login') }}">
                            J'ai deja un compte
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
