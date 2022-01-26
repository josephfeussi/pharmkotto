@extends('templates.dashboard')
@section('head')
    <!-- Remember to include jQuery :) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>


    <!-- jQuery Modal -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />


    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection


@section('main')


    <div class="grid grid-cols-12 gap-6">
        <div class="grid grid-cols-12 col-span-12 gap-6 xxl:col-span-9">
            <div class="col-span-12 mt-8">
                <div class="flex items-center h-10 intro-y">
                    <h2 class="mr-5 text-lg font-medium truncate">Pharmacies de gardes</h2>
                </div>
                <div class="grid grid-cols-12 gap-6 mt-5">
                    <a class="col-span-12 transition duration-300 transform bg-white rounded-lg shadow-xl hover:scale-105 sm:col-span-12 xl:col-span-12 intro-y"
                        href="#">
                        <div class="p-5">
                            <div class="flex justify-between">
                                <svg xmlns="http://www.w3.org/2000/svg" class="text-blue-400 h-7 w-7" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                </svg>
                                <div
                                    class="flex h-6 px-2 text-sm font-semibold text-white bg-green-500 rounded-full justify-items-center">
                                    <span class="flex items-center">Voir</span>
                                </div>
                            </div>
                            <div class="flex-1 w-full ml-2">
                                <div>
                                    <div class="mt-3 text-3xl font-bold leading-8">12</div>

                                    <div class="mt-1 text-base text-gray-600">Pharmacies de gardes</div>
                                </div>
                            </div>
                        </div>
                    </a>

                </div>
            </div>

            <div class="col-span-12 mt-5">
                <div class="grid grid-cols-1 gap-2 lg:grid-cols-1">
                    <div class="p-4 bg-white rounded-lg shadow-lg">
                        <h1 class="text-base font-bold">Liste des pharmacies de gardes</h1>

                        <div class="flex justify-end">
                            <a href="#createmodal" rel="modal:open"
                                class="btn btn-primary"
                                data-micromodal-trigger="createmodal">Ajouter</a>



                        </div>
                        <div class="mt-4">
                            <div class="flex flex-col">
                                <div class="-my-2 overflow-x-auto">
                                    <div class="inline-block min-w-full py-2 align-middle">
                                        <div class="overflow-hidden bg-white border-b border-gray-200 shadow sm:rounded-lg">
                                            <table class="min-w-full divide-y divide-gray-200">
                                                <thead>
                                                    <tr>
                                                        <th
                                                            class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-gray-500 uppercase bg-gray-50">
                                                            <div class="flex cursor-pointer">
                                                                <span class="mr-2">NOM</span>
                                                            </div>
                                                        </th>
                                                        <th
                                                            class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-gray-500 uppercase bg-gray-50">
                                                            <div class="flex cursor-pointer">
                                                                <span class="mr-2">Du</span>
                                                            </div>
                                                        </th>

                                                        <th
                                                            class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-gray-500 uppercase bg-gray-50">
                                                            <div class="flex cursor-pointer">
                                                                <span class="mr-2">Au</span>
                                                            </div>
                                                        </th>
                                                        <th
                                                            class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-gray-500 uppercase bg-gray-50">
                                                            <div class="flex cursor-pointer">
                                                                <span class="mr-2">Lieu</span>
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
                                                    @foreach ($gardes as $garde)
                                                        <tr>
                                                            <td class="px-6 py-4 text-sm leading-5 whitespace-no-wrap">
                                                                <p>Pharmacie Moliva</p>

                                                            </td>
                                                            <td class="px-6 py-4 text-sm leading-5 whitespace-no-wrap">
                                                                <p>Jeudi 11 Mai à 20h</p>
                                                            </td>
                                                            <td class="px-6 py-4 text-sm leading-5 whitespace-no-wrap">
                                                                <div class="flex text-gray-700">

                                                                    <p>Vendredi 12 Mai à 8h</p>
                                                                </div>
                                                            </td>

                                                            <td class="px-6 py-4 text-sm leading-5 whitespace-no-wrap">
                                                                <div class="flex text-gray-700">

                                                                    <p>Madagascar</p>
                                                                </div>
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
                                                                        <p>Supprimer</p>
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

    <!--Create Modal -->

    <div class="hidden no-close-icon" id="createmodal" x-data="xdata()">
        <div class="grid w-full bg-white rounded-lg shadow-xl ">


            <div class="flex justify-center">
                <div class="flex">
                    <h1 class="text-xl font-bold text-gray-600 md:text-2xl">Nouvelle Pharmacie de garde</h1>
                </div>
            </div>

            <div class="grid grid-cols-1 mt-5 mx-7">
                <label class="text-xs font-semibold text-gray-500 uppercase md:text-sm text-light">Nom de la
                    pharmacie</label>
                <input
                    class="px-3 py-2 mt-1 border-2 border-pink-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-600 focus:border-transparent"
                    x-model="name" type="text" placeholder="Nom de la pharmacie" />
            </div>

            <div class="grid grid-cols-1 gap-5 mt-5 md:grid-cols-2 md:gap-8 mx-7">
                <div class="grid grid-cols-1">
                    <label class="text-xs font-semibold text-gray-500 uppercase md:text-sm text-light">A partir du</label>
                    <input x-model="from"
                        class="px-3 py-2 mt-1 border-2 border-pink-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-600 focus:border-transparent"
                        type="datetime" placeholder="Date et heure" />
                </div>
                <div class="grid grid-cols-1">
                    <label class="text-xs font-semibold text-gray-500 uppercase md:text-sm text-light">Jusqu'au</label>
                    <input x-model="to"
                        class="px-3 py-2 mt-1 border-2 border-pink-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-600 focus:border-transparent"
                        type="datetime" placeholder="Date et heure" />
                </div>
            </div>

            <div class="grid hidden grid-cols-1 mt-5 mx-7">
                <label class="text-xs font-semibold text-gray-500 uppercase md:text-sm text-light">Selection</label>
                <select
                    class="px-3 py-2 mt-1 border-2 border-pink-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-600 focus:border-transparent">
                    <option>Option 1</option>
                    <option>Option 2</option>
                    <option>Option 3</option>
                </select>
            </div>

            <div class="grid grid-cols-1 mt-5 mx-7">
                <label class="text-xs font-semibold text-gray-500 uppercase md:text-sm text-light">Lieu</label>
                <input x-model="location"
                    class="px-3 py-2 mt-1 border-2 border-pink-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-600 focus:border-transparent"
                    type="text" placeholder="Quartier, Secteur" />
            </div>

            <div class="grid grid-cols-1 mt-5 mx-7 !hidden">
                <label class="mb-1 text-xs font-semibold text-gray-500 uppercase md:text-sm text-light">Upload Photo</label>
                <div class='flex items-center justify-center w-full'>
                    <label
                        class='flex flex-col w-full h-32 border-4 border-dashed hover:bg-gray-100 hover:border-pink-300 group'>
                        <div class='flex flex-col items-center justify-center pt-7'>
                            <svg class="w-10 h-10 text-pink-400 group-hover:text-pink-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                </path>
                            </svg>
                            <p class='pt-1 text-sm tracking-wider text-gray-400 lowercase group-hover:text-pink-600'>Select
                                a photo</p>
                        </div>
                        <input type='file' class="hidden" />
                    </label>
                </div>
            </div>

            <div class='flex items-center justify-center gap-4 pt-5 pb-5 md:gap-8'>
                <a href="#" rel="modal:close"
                    class='w-auto px-4 py-2 font-medium text-white bg-gray-500 rounded-lg shadow-xl hover:bg-gray-700'>Cancel</a>
                <button class='w-auto px-4 py-2 font-medium text-white bg-pink-500 rounded-lg shadow-xl hover:bg-pink-700'
                    x-on:click="create(name, location, from, to)">Create</button>
            </div>

        </div>
    </div>

@endsection

@section('beforeBody')
<script>
    console.log("Hello Wordl");
    const xdata = function () {
        return {
            creating: false,
            name: '',
            location: '',
            from: '',
            to: '',
            create(name, location,from, to) {
                Swal.fire(
                    {
                        title: "Please wait"
                    }
                )
               Swal.showLoading()
              $("#createmodal a.close-modal").click()
            }
        }
    }

</script>




@endsection
