@extends('templates.dashboard')
@section('main')
    <div>

        <div class="col-span-12 mt-8">
            <div class="flex flex-col items-center h-10 intro-y">
                <h2 class="mr-5 text-lg font-medium truncate">Ajouter un utilisateur</h2>

                @if (Session::has('message'))
   <div class="w-full px-4 py-2 bg-green-300">{{ Session::get('message') }}</div>
@endif

@if($errors->any())
<h4>{{$errors}}</h4>
@endif
            </div>

        </div>


        <!-- component -->
        <div class="sm:px-8 md:px-16 sm:py-8">
            <main class="container h-full max-w-screen-lg mx-auto">
                <!-- file upload modal -->
                <form method="post" action="{{ route('dashboard.users.create') }}" aria-label="File Upload Modal" class="relative flex flex-col h-full bg-white rounded-md shadow-xl">
                    <!-- scroll area -->




                    <section>
                        <!-- component -->
                        <div class="flex flex-col px-8 pt-6 pb-8 my-2 mb-4">
                            <div class="mb-6 -mx-3 md:flex">
                                <div class="px-3 mb-6 md:w-1/2 md:mb-0">
                                    <label class="block mb-2 text-xs font-bold tracking-wide uppercase text-grey-darker"
                                        for="grid-first-name" name="first_name">
                                        Nom
                                    </label>
                                    <input v-model="doc.title"
                                        class="block w-full px-4 py-3 mb-3 border rounded appearance-none bg-grey-lighter text-grey-darker border-red"
                                        id="grid-first-name" name="first_name" type="text" value="{{ old('first_name') }}"/>

                                </div>
                                <div class="px-3 mb-6 md:w-1/2 md:mb-0">
                                    <label class="block mb-2 text-xs font-bold tracking-wide uppercase text-grey-darker"
                                        for="last_name" >
                                        Prenom
                                    </label>
                                    <input v-model="doc.title"
                                        class="block w-full px-4 py-3 mb-3 border rounded appearance-none bg-grey-lighter text-grey-darker border-red"
                                        id="last_name"  name="last_name" type="text"  value="{{ old('last_name') }}"/>

                                </div>
                            </div>
                            <div class="mb-6 -mx-3 md:flex">
                                <div class="px-3 md:w-full">
                                    <label class="block mb-2 text-xs font-bold tracking-wide uppercase text-grey-darker"
                                        for="email">
                                        Email
                                    </label>
                                    <input
                                        class="block w-full px-4 py-3 mb-3 border rounded appearance-none bg-grey-lighter text-grey-darker border-grey-lighter"
                                        id="email" type="email" name="email" v-model="doc.email" value="{{ old('email') }}" />
                                    <p class="text-xs italic text-grey-dark">

                                    </p>
                                </div>
                            </div>
                            <div class="mb-6 -mx-3 md:flex">
                                <div class="px-3 md:w-full">
                                    <label class="block mb-2 text-xs font-bold tracking-wide uppercase text-grey-darker"
                                        for="role">
                                        Type de compte
                                    </label>
                                    <select
                                        class="block w-full px-4 py-3 mb-3 border rounded appearance-none bg-grey-lighter text-grey-darker border-grey-lighter"
                                        id="role" name="role" v-model="doc.role" value="{{ old('role') }}">

                                    <option value="user">Utilisateur</option>
                                    <option value="patient">Patient</option>
                                    <option value="staff">Staff</option>
                                    </select>
                                    <p class="text-xs italic text-grey-dark">

                                    </p>
                                </div>
                            </div>

                            <div class="mb-6 -mx-3 md:flex">
                                <div class="px-3 md:w-full">
                                    <label class="block mb-2 text-xs font-bold tracking-wide uppercase text-grey-darker"
                                        for="mobile_phone">
                                        Numero de téléphone
                                    </label>
                                    <input
                                        class="block w-full px-4 py-3 mb-3 border rounded appearance-none bg-grey-lighter text-grey-darker border-grey-lighter"
                                        id="mobile_phone" name="mobile_phone" value="{{ old('mobile_phone') }}" type="tel" v-model="doc.mobile_phone" />
                                    <p class="text-xs italic text-grey-dark">
                                        Le numero de telephone portable
                                    </p>
                                </div>
                            </div>


                            <div class="mb-6 -mx-3 md:flex">
                                <div class="px-3 md:w-full">
                                    <label class="block mb-2 text-xs font-bold tracking-wide uppercase text-grey-darker"
                                        for="city">
                                        Ville de residence
                                    </label>
                                    <input
                                        class="block w-full px-4 py-3 mb-3 border rounded appearance-none bg-grey-lighter text-grey-darker border-grey-lighter"
                                        id="city" type="text" name="city" value="{{ old('city') }}" v-model="doc.city" />
                                    <p class="text-xs italic text-grey-dark">
                                        La ville ou vous habitez
                                    </p>
                                </div>
                            </div>



                            <div class="mb-6 -mx-3 md:flex">
                                <div class="px-3 md:w-full">
                                    <label class="block mb-2 text-xs font-bold tracking-wide uppercase text-grey-darker"
                                        for="birthday">
                                        Date de naissance
                                    </label>
                                    <input
                                        class="block w-full px-4 py-3 mb-3 border rounded appearance-none bg-grey-lighter text-grey-darker border-grey-lighter"
                                        id="birthday" type="date" name="birthday" value="{{ old('birthday') }}" v-model="doc.city" />
                                    <p class="text-xs italic text-grey-dark">
                                        Date de naissance
                                    </p>
                                </div>
                            </div>


                            <div class="mb-6 -mx-3 md:flex">
                                <div class="px-3 md:w-full">
                                    <label class="block mb-2 text-xs font-bold tracking-wide uppercase text-grey-darker"
                                        for="password">
                                        Mot de passe
                                    </label>
                                    <input
                                        class="block w-full px-4 py-3 mb-3 border rounded appearance-none bg-grey-lighter text-grey-darker border-grey-lighter"
                                        id="password" type="password" autocomplete="false" name="password"
                                        v-model="doc.password" />
                                    <p class="text-xs italic text-grey-dark">
                                        Choissez un mot de passe (defaut: 12345678)
                                    </p>
                                </div>
                            </div>


                            <div class="px-3 mb-6 -mx-3 md:flex">
                                <div>
                                    <label class="block mb-2 text-xs font-bold tracking-wide uppercase text-grey-darker"
                                        for="password">
                                        Sexe
                                    </label>

                                    <div>
                                        <label class="inline-flex items-center mt-3">
                                            <input type="radio" name="gender" value="m"
                                                class="w-5 h-5 text-gray-600 form-radio"  checked><span
                                                class="ml-2 text-gray-700">Homme</span>
                                        </label>

                                        <label class="inline-flex items-center mt-3 ml-4">
                                            <input type="radio" name="gender" value='f'
                                                class="w-5 h-5 text-red-600 form-radio"><span
                                                class="ml-2 text-gray-700">Femme</span>
                                        </label>
                                    </div>
                                </div>


                                @csrf


                            </div>


                        </div>
                    </section>
                    <div class="flex justify-end p-8">
                        <button @click="createDocument" type="submit"
                            class="p-2 px-4 text-center text-white bg-green-700 rounded-lg hover:bg-green-500">
                            Ajouter
                        </button>
                    </div>
                </form>
            </main>
        </div>
    </div>


@endsection
