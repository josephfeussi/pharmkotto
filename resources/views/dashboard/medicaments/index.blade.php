@extends('templates.dashboard')

@section('beforeBody')
    <script>

        let blankMedicament = {
            name: '',
            description: '',
            type:'',
        }

        function medicament() {
            return {
                inited: false,
                createModal: false,

                deleteModal: false,
                medicament: blankMedicament,
                editID: null,
                medicaments: [],
                loading: false,
                onCreate() {
                    this.editID = null;
                    this.medicament = blankMedicament
                    this.createModal = true
                },

                onEdit(info) {
                    this.editID = info.id;
                    this.medicament = info
                    this.createModal = true
                },

                onDelete(info) {
                    this.editID = info.id;
                    this.medicament = info
                    this.deleteModal = true
                },
                async fetchinfo() {

                    res = await window.axios.get("{{route('dashboard.medicament')}}")
                    console.log(res);
                    this.medicaments = res.data.data;
                    this.inited = true
                },
                async store() {
                    this.loading = true
                    res = await window.axios.post("{{route('dashboard.medicament.create')}}", this.medicament)
                    console.log(res);
                    this.medicaments.push(res.data.data)
                    this.medicament = blankMedicament
                    this.createModal = false;
                    this.loading = false
                },
                async deleteInfo() {
                    this.loading = true
                    res = await window.axios.delete(`/dashboard/medicaments/${this.editID}`)
                    console.log(res);
                    this.medicaments = this.medicaments.filter(x => x.id !== this.editID)
                    this.medicament = blankMedicament
                    this.editID = null;
                    this.deleteModal = false;
                    this.loading = false
                },
                async updateInfo() {
                    this.loading = true
                    res = await window.axios.put(`/dashboard/medicaments/${this.editID}`, this.medicament)
                    console.log(res);
                    let target = this.medicaments.find(x => x.id == this.editID)
                    target.medicament = this.medicament
                    this.editID = null
                    this.medicament = blankMedicament
                    this.createModal = false;
                    this.loading = false
                },


            }
        }

    </script>
@endsection
@section('main')
    <div x-data='medicament()' x-init="fetchinfo()">
        <div x-show="createModal" x-transition:enter="transition duration-200 transform ease-out"
            x-transition:enter-start="scale-75" x-transition:leave="transition duration-100 transform ease-in"
            x-transition:leave-end="opacity-0 scale-90" @click='createModal=false'
            class="absolute inset-0 z-40 flex items-center justify-center ">
            <div class="absolute inset-0 bg-gray-200 exit-issue opacity-60"></div>
            <div class="relative z-40 p-8 px-16 bg-white rounded-lg shadow-xl" @click.stop>
                <button @click='createModal = false'
                    class="absolute w-6 h-6 text-sm text-white transition-colors rounded-full -descriptionp-2 -right-2 bg-primary hover:bg-primary"><i
                        class="fa fa-window-close" aria-hidden="true"></i></button>
                <p class="text-3xl font-bold text-center" x-text="editID ? 'Modification' : 'Nouvelle medicament de garde'"></p>

                <div class="mt-4 mb-6 -mx-3">
                    <div class="px-3 md:w-full">
                        <label class="block mb-2 text-xs font-bold tracking-wide uppercase text-grey-darker" for="name">
                            Nom du medicament
                        </label>
                        <input
                            class="block w-full px-4 py-3 mb-3 border rounded appearance-none bg-grey-lighter text-grey-darker border-grey-lighter"
                            id="name" type="text" name="name" x-model="medicament.name" />

                    </div>

                    <div class="px-3 md:w-full">
                        <label class="block mb-2 text-xs font-bold tracking-wide uppercase text-grey-darker" for="name">
                            Description
                        </label>
                        <textarea
                            class="block w-full px-4 py-3 mb-3 border rounded appearance-none bg-grey-lighter text-grey-darker border-grey-lighter"
                            id="location" type="text" name="description" x-model="medicament.description" ></textarea>
                    </div>


                    <div class="px-3 md:w-full">
                        <label class="block mb-2 text-xs font-bold tracking-wide uppercase text-grey-darker" for="type">
                            Categorie
                        </label>
                        <input
                            class="block w-full px-4 py-3 mb-3 border rounded appearance-none bg-grey-lighter text-grey-darker border-grey-lighter"
                            id="type" type="text" name="type" x-model="medicament.type" />

                    </div>



                </div>



                <div class="flex justify-center mt-4">
                    <button @click='loading ? false : editID ? updateInfo(): store(medicament)'
                        class="px-4 py-2 text-sm text-white rounded-lg bg-primary">




                        <span x-show="!loading" x-text="editID ? 'Modifier' : 'Publier'">

                        </span>

                        <span x-show="loading">
                            <i class="fa fa-spinner animate-spin" aria-hidden="true"></i>
                        </span>
                    </button>
                </div>
            </div>
        </div>


        <div x-show="deleteModal" x-transition:enter="transition duration-200 transform ease-out"
            x-transition:enter-start="scale-75" x-transition:leave="transition duration-100 transform ease-in"
            x-transition:leave-end="opacity-0 scale-90" @click='deleteModal=false'
            class="absolute inset-0 z-40 flex items-center justify-center ">
            <div class="absolute inset-0 bg-gray-200 exit-issue opacity-60"></div>
            <div class="relative z-40 p-8 px-16 bg-white rounded-lg shadow-xl" @click.stop>
                <button @click='deleteModal = false'
                    class="absolute w-6 h-6 text-sm text-white transition-colors rounded-full -descriptionp-2 -right-2 bg-primary hover:bg-primary"><i
                        class="fa fa-window-close" aria-hidden="true"></i></button>
                <p class="text-3xl font-bold text-center">Voulez vous vraiment supprimer ce medicament ?</p>
                <p class="mt-4 text-lg" x-text="medicament.name"></p>
                <div class="flex justify-center mt-4">
                    <button @click='loading ? false : deleteInfo()'
                        class="px-4 py-2 text-sm text-white rounded-lg bg-primary">




                        <span x-show="!loading">
                            Oui supprimer
                        </span>

                        <span x-show="loading">
                            <i class="fa fa-spinner animate-spin" aria-hidden="true"></i>
                        </span>
                    </button>
                </div>
            </div>
        </div>
        <div class="relative grid grid-cols-12 gap-6">

            <div class="grid grid-cols-12 col-span-12 gap-6 xxl:col-span-9">
                <div class="col-span-12 mt-8">
                    <div class="flex items-center h-10 intro-y">
                        <h2 class="mr-5 text-lg font-medium truncate">Medicaments</h2>
                    </div>
                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <a class="col-span-12 transition duration-300 transform bg-white rounded-lg shadow-xl hover:scale-105 sm:col-span-12 xl:col-span-12 intro-y"
                            href="#">
                            <div class="p-5">

                                <div class="flex-1 w-full ml-2">
                                    <div>
                                        <div class="mt-3 text-3xl font-bold leading-8"
                                            x-text="inited ? medicaments.length :'Veillez patienter'"></div>

                                        <div class="mt-1 text-base text-gray-600">Medicament Ajout??es</div>
                                    </div>
                                </div>
                            </div>
                        </a>

                    </div>
                </div>

                <div class="col-span-12 mt-5">
                    <div class="grid grid-cols-1 gap-2 lg:grid-cols-1">
                        <div class="p-4 bg-white rounded-lg shadow-lg">

                            <div class="flex justify-between">
                                <h1 class="text-base font-bold">Liste des medicaments</h1> <template x-if='!inited'>
                                    <p class="mt-2 text-center"><i class="fa fa-spinner animate-spin"
                                            aria-hidden="true"></i></p>
                                </template>
                                <button @click="onCreate()"
                                    class="px-4 py-2 text-white rounded-full bg-primary hover:bg-primary">Ajouter
                                    un medicament</button>
                            </div>
                            <div class="mt-4">
                                <div class="flex flex-col">
                                    <div class="-my-2 overflow-x-audescription">
                                        <div class="inline-block min-w-full py-2 align-middle">
                                            <div
                                                class="overflow-hidden bg-white border-b border-gray-200 shadow sm:rounded-lg">
                                                <table class="min-w-full divide-y divide-gray-200">
                                                    <thead>
                                                        <tr>

                                                            <th
                                                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-gray-500 uppercase bg-gray-50">
                                                                <div class="flex cursor-pointer">
                                                                    <span class="mr-2">Mis a jour</span>
                                                                </div>
                                                            </th>
                                                            <th
                                                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-gray-500 uppercase bg-gray-50">
                                                                <div class="flex cursor-pointer">
                                                                    <span class="mr-2">medicament</span>
                                                                </div>
                                                            </th>
                                                            <th
                                                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-gray-500 uppercase bg-gray-50">
                                                                <div class="flex cursor-pointer">
                                                                    <span class="mr-2">category</span>
                                                                </div>
                                                            </th>
                                                            <th
                                                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-gray-500 uppercase bg-gray-50">
                                                                <div class="flex cursor-pointer">
                                                                    <span class="mr-2">Description</span>
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

                                                        <template x-for="info in medicaments" :key="info.id">
                                                            <tr>
                                                                <td class="px-6 py-4 text-sm leading-5 whitespace-no-wrap">
                                                                    <p x-text="timeAgo(info.updated_at)"></p>

                                                                </td>
                                                                <td class="px-6 py-4 text-sm leading-5 whitespace-no-wrap">
                                                                    <p x-text='info.name'></p>
                                                                </td>

                                                                <td class="px-6 py-4 text-sm leading-5 whitespace-no-wrap">
                                                                    <p x-text='info.type ?? "Non classifi??"'></p>
                                                                </td>



                                                                <td class="px-6 py-4 text-sm leading-5 whitespace-no-wrap">
                                                                    <p x-text='info.description'></p>
                                                                </td>

                                                                <td class="px-6 py-4 text-sm leading-5 whitespace-no-wrap">
                                                                    <div class="flex space-x-4">
                                                                        <a :href="`/dashboard/medicaments/${info.id}`"
                                                                        class="p-2 py-1 text-xs text-gray-700 bg-blue-300 rounded-full"><i
                                                                            class="fa fa-link" aria-hidden="true"></i>
                                                                        Voir</a>

                                                                        <button @click="onEdit(info)"
                                                                            class="p-2 py-1 text-xs text-gray-700 bg-green-300 rounded-full">
                                                                            <i class="fas fa-edit"></i> Modifier</button>
                                                                        <button @click="onDelete(info)"
                                                                            class="p-2 py-1 text-xs text-gray-700 bg-red-300 rounded-full"><i
                                                                                class="fa fa-trash" aria-hidden="true"></i>
                                                                            Supprimer</button>


                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </template>

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

    </div>


@endsection
