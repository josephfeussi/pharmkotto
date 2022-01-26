@extends('templates.dashboard')
@section('main')
<div class="grid grid-cols-12 gap-6">
    <div class="grid grid-cols-12 col-span-12 gap-6 xxl:col-span-9">
        <div class="col-span-12 mt-8">
            <div class="flex items-center h-10 intro-y">
                <h2 class="mr-5 text-lg font-medium truncate">Actualité du site</h2>
            </div>
            <div class="grid grid-cols-12 gap-6 mt-5">
                <a class="col-span-12 transition duration-300 transform bg-white rounded-lg shadow-xl hover:scale-105 sm:col-span-12 xl:col-span-12 intro-y"
                   href="#">
                    <div class="p-5">
                        <div class="flex justify-between">
                            <svg xmlns="http://www.w3.org/2000/svg" class="text-blue-400 h-7 w-7"
                                 fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                            </svg>
                            <div
                                class="flex h-6 px-2 text-sm font-semibold text-white bg-green-500 rounded-full justify-items-center">
                                <span class="flex items-center">Voir</span>
                            </div>
                        </div>
                        <div class="flex-1 w-full ml-2">
                            <div>
                                <div class="mt-3 text-3xl font-bold leading-8" ></div>

                                <div class="mt-1 text-base text-gray-600">Information Ajoutées</div>
                            </div>
                        </div>
                    </div>
                </a>

            </div>
        </div>

        <div class="col-span-12 mt-5">
            <div class="grid grid-cols-1 gap-2 lg:grid-cols-1">
                <div class="p-4 bg-white rounded-lg shadow-lg">
                    <h1 class="text-base font-bold">Liste des informations</h1>
                    <div class="mt-4">
                        <div class="flex flex-col">
                            <div class="-my-2 overflow-x-auto">
                                <div class="inline-block min-w-full py-2 align-middle">
                                    <div
                                        class="overflow-hidden bg-white border-b border-gray-200 shadow sm:rounded-lg">
                                        <table class="min-w-full divide-y divide-gray-200">
                                            <thead>
                                            <tr>

                                                <th
                                                    class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-gray-500 uppercase bg-gray-50">
                                                    <div class="flex cursor-pointer">
                                                        <span class="mr-2">Date d'ajout</span>
                                                    </div>
                                                </th>
                                                <th
                                                    class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-gray-500 uppercase bg-gray-50">
                                                    <div class="flex cursor-pointer">
                                                        <span class="mr-2">Message</span>
                                                    </div>
                                                </th>
                                                <th
                                                    class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-gray-500 uppercase bg-gray-50">
                                                    <div class="flex cursor-pointer">
                                                        <span class="mr-2">ACTION</span>
                                                    </div>
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody class="bg-white divide-y divide-gray-200">
                                                @foreach ($infos as $info)
                                                <tr>
                                                    <td class="px-6 py-4 text-sm leading-5 whitespace-no-wrap">
                                                        <p>Hier</p>

                                                    </td>
                                                    <td class="px-6 py-4 text-sm leading-5 whitespace-no-wrap">
                                                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repellendus, optio nihil voluptatibus iste deserunt laboriosam autem pariatur! Consectetur eveniet perspiciatis porro facere tempora, nemo, placeat officia sit animi hic quibusdam.</p>
                                                    </td>

                                                    <td class="px-6 py-4 text-sm leading-5 whitespace-no-wrap">
                                                        <div class="flex space-x-4">
                                                            <a href="#" class="text-blue-500 hover:text-blue-600">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                    class="w-5 h-5 mr-1" fill="none"
                                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                                    <path stroke-linecap="round"
                                                                        stroke-linejoin="round" stroke-width="2"
                                                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                                </svg>
                                                                <p>Modifier</p>
                                                            </a>

                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
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

