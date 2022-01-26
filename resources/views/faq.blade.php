@extends('templates.main')
@section('body')
    @include('sections.header', ['page_title'=>"Questions fréquement posées"])

    <!-- component -->
    <div class="bg-gray-100 pt-10">
        <div class="mx-auto max-w-6xl">
            <div class="p-2 bg-gray-100 rounded">
                <div class="flex flex-col md:flex-row">
                    <div class="md:w-1/3 p-4 text-sm">
                        <div class="text-3xl">Questions fréquements <span class="font-medium">Posées</span></div>
                        <div class="my-2">Vous cherchez a decouvrir comment nos outils fonctionnent ?</div>
                        <div class="mb-2">Vous ne savez pas comment nous pouvons améliorer votre entreprise ?</div>
                        <div class="text-xs text-gray-600">Plongez dans notre FAQ pour plus de détails</div>
                    </div>
                    <div class="md:w-2/3">
                        <div class="p-4">
                            <div class="mb-2">
                                <div class="font-medium rounded-sm text-lg px-2 py-3 flex text-gray-800 flex-row-reverse mt-2 cursor-pointer text-black bg-white hover:bg-white">
                                    <div class="flex-auto">Comment installer les outils sur Windows ?</div>
                                    <div class="px-2 mt-1">
                                        <div style="">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down w-5 h-5">
                                                <polyline points="6 9 12 15 18 9"></polyline>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-2">
                                <div class="font-medium rounded-sm text-lg px-2 py-3 flex text-gray-800 flex-row-reverse mt-2 cursor-pointer text-black bg-white hover:bg-white">
                                    <div class="flex-auto">Comment verifier le temps restant pour mon forfaits</div>
                                    <div class="px-2 mt-1">
                                        <div style="">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down w-5 h-5">
                                                <polyline points="6 9 12 15 18 9"></polyline>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-2">
                                <div class="font-medium rounded-sm text-lg px-2 py-3 flex text-gray-800 flex-row-reverse mt-2 cursor-pointer text-black bg-white hover:bg-white">
                                        <div class="flex-auto">Est ce que j'ai besion d'une licence pour l'utiliser sur plusieur postes ?</div>
                                    <div class="px-2 mt-1">
                                        <div style="">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-up w-5 h-5">
                                                <polyline points="18 15 12 9 6 15"></polyline>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                <div class="p-2 text-justify text-left text-gray-800 mb-5 bg-white" style="">Lorem, ipsum dolor sit amet consectetur <span class="font-bold">adipisicing elit</span>. Mollitia temporibus doloremque non eligendi unde ipsam? Voluptatibus, suscipit deserunt quidem delectus perferendis velit molestias, veritatis officia fugiat cumque quaerat earum adipisci?</div>
                            </div>
                            <div class="mb-2">
                                <div class="font-medium rounded-sm text-lg px-2 py-3 flex text-gray-800 flex-row-reverse mt-2 cursor-pointer text-black bg-white hover:bg-white">
                                    <div class="flex-auto">Comment telecharger les outils</div>
                                    <div class="px-2 mt-1">
                                        <div style="">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down w-5 h-5">
                                                <polyline points="6 9 12 15 18 9"></polyline>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-2">
                                <div class="font-medium rounded-sm text-lg px-2 py-3 flex text-gray-800 flex-row-reverse mt-2 cursor-pointer text-black bg-white hover:bg-white">
                                    <div class="flex-auto">Y'as t'il des manuel d'aide pour ces outils ?</div>
                                    <div class="px-2 mt-1">
                                        <div style="">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down w-5 h-5">
                                                <polyline points="6 9 12 15 18 9"></polyline>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
