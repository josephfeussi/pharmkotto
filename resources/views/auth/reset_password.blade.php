@extends('templates.main')
@section('title',"Reinitialiser le mot de passe - Stratochange")
@section("body")
    @include('sections.header', ['page_title'=>"Reinitialiser le mot de passe"])
    <div class="container mx-auto">
        <div class="flex justify-center px-6 my-12">
            <!-- Row -->
            <div class="w-full xl:w-3/4 lg:w-11/12 flex">
                <!-- Col -->
                <div
                    class="w-full h-auto bg-gray-400 hidden lg:block lg:w-1/2 bg-contain bg-no-repeat bg-center bg-top rounded-l-lg"
                    style="background-image: url('{{asset('/images/illustration/2 People collaborating.svg')}}')"
                ></div>
                <!-- Col -->
                <div class="w-full lg:w-1/2 bg-white p-5 rounded-lg lg:rounded-l-none">
                    <h3 class="pt-4 text-2xl text-center">Demande de reinitialisation du compte</h3>
                    <form class="px-8 pt-6 pb-8 mb-4 bg-white rounded">
                        <div class="mb-4">
                            <label class="block mb-2 text-sm font-bold text-gray-700" for="username">
                                Addresse email
                            </label>
                            <input
                                class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                id="username"
                                type="email"
                                placeholder="Username"
                            />
                        </div>
                        <div class="mb-4">
                            <label class="block mb-2 text-sm font-bold text-gray-700" for="password">
                                Nouveau Mot de passe
                            </label>
                            <input
                                class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border border-red-500 rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                id="password"
                                type="password"
                                placeholder="******************"
                            />
                            <p class="text-xs italic text-red-500">Veuillez entrer un nouveau mot de passe.</p>
                        </div>

                        <div class="mb-6 text-center">
                            <button
                                class="w-full px-4 py-2 font-bold text-white bg-blue-500 rounded-full hover:bg-blue-700 focus:outline-none focus:shadow-outline"
                                type="button"
                            >
                                Reinitialiser
                            </button>
                        </div>
                        <hr class="mb-6 border-t" />

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
