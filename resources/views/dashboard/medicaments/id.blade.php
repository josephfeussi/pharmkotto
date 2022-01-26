@extends('templates.dashboard')

@section('beforeBody')
    <script>
        let blankPosologie = {
            min_age: undefined,
            max_age: undefined,
            max_weight: undefined,
            min_weight: undefined,
            dose: '',
            medicament_id: {{ $medicament->id }}
        }

        function posologie() {
            return {
                inited: false,
                createModal: false,

                deleteModal: false,
                posologie: blankPosologie,
                editID: null,
                posologies: [],
                loading: false,
                onCreate() {
                    this.editID = null;
                    this.posologie = blankPosologie
                    this.createModal = true
                },

                onEdit(info) {
                    this.editID = info.id;
                    this.posologie = info
                    this.createModal = true
                },

                onDelete(info) {
                    this.editID = info.id;
                    this.posologie = info
                    this.deleteModal = true
                },
                async fetchinfo() {

                    res = {
                        data: {
                            data: @json($medicament->posologies)
                        }
                    }
                    console.log(res);
                    this.posologies = res.data.data;
                    this.inited = true
                },
                async store() {
                    this.loading = true
                    res = await window.axios.post("{{ route('dashboard.posologie.store') }}", this.posologie)
                    console.log(res);
                    this.posologies.push(res.data.data)
                    this.posologie = blankPosologie
                    this.createModal = false;
                    this.loading = false
                },
                async deleteInfo() {
                    this.loading = true
                    res = await window.axios.delete(`/dashboard/medicaments/posologie/${this.editID}`)
                    console.log(res);
                    this.posologies = this.posologies.filter(x => x.id !== this.editID)
                    this.posologie = blankPosologie
                    this.editID = null;
                    this.deleteModal = false;
                    this.loading = false
                },
                async updateInfo() {
                    this.loading = true
                    res = await window.axios.put(`/dashboard/medicaments/posologie/${this.editID}`, this.posologie)
                    console.log(res);
                    let target = this.posologies.find(x => x.id == this.editID)
                    target.posologie = this.posologie
                    this.editID = null
                    this.posologie = blankPosologie
                    this.createModal = false;
                    this.loading = false
                },


            }
        }

    </script>
@endsection
@section('main')
    <div x-data='posologie()' x-init="fetchinfo()">
        <div x-show="createModal" x-transition:enter="transition duration-200 transform ease-out"
            x-transition:enter-start="scale-75" x-transition:leave="transition duration-100 transform ease-in"
            x-transition:leave-end="opacity-0 scale-90" @click='createModal=false'
            class="absolute inset-0 z-40 flex items-center justify-center ">
            <div class="absolute inset-0 bg-gray-200 exit-issue opacity-60"></div>
            <div class="relative z-40 p-8 px-16 bg-white rounded-lg shadow-xl" @click.stop>
                <button @click='createModal = false'
                    class="absolute w-6 h-6 text-sm text-white transition-colors rounded-full -descriptionp-2 -right-2 bg-primary hover:bg-primary"><i
                        class="fa fa-window-close" aria-hidden="true"></i></button>
                <p class="text-3xl font-bold text-center" x-text="editID ? 'Modification' : 'Nouvelle posologie'"></p>

                <div class="mt-4 mb-6 -mx-3">
                    <div class="mt-4">
                        <p class="mb-2 font-bold text-center text-gray-800 uppercase">Par AGe</p>
                        <div class="flex gap-1">

                            <div class="px-3 md:w-full">
                                <label class="block mb-2 text-xs font-bold tracking-wide uppercase text-grey-darker"
                                    for="min_age">
                                    Age minimum
                                </label>

                                <input
                                    class="block w-full px-4 py-3 mb-3 border rounded appearance-none bg-grey-lighter text-grey-darker border-grey-lighter"
                                    id="min_age" type="number" min="0" name="min_age" x-model.number="posologie.min_age" />

                            </div>
                            <div class="px-3 md:w-full">
                                <label class="block mb-2 text-xs font-bold tracking-wide uppercase text-grey-darker"
                                    for="max_age">
                                    Age maximum
                                </label>

                                <input
                                    class="block w-full px-4 py-3 mb-3 border rounded appearance-none bg-grey-lighter text-grey-darker border-grey-lighter"
                                    id="max_age" type="number" min="0" name="max_age" x-model.number="posologie.max_age" />

                            </div>
                        </div>
                    </div>


                    <div class="mt-4">
                        <p class="mb-2 font-bold text-center text-gray-800 uppercase">Par poids (kg)</p>
                        <div class="flex gap-1">

                            <div class="px-3 md:w-full">
                                <label class="block mb-2 text-xs font-bold tracking-wide uppercase text-grey-darker"
                                    for="min_weight">
                                    Poids minimum
                                </label>

                                <input
                                    class="block w-full px-4 py-3 mb-3 border rounded appearance-none bg-grey-lighter text-grey-darker border-grey-lighter"
                                    id="min_weight" type="number" min="0" name="min_weight"
                                    x-model.number="posologie.min_weight" />

                            </div>
                            <div class="px-3 md:w-full">
                                <label class="block mb-2 text-xs font-bold tracking-wide uppercase text-grey-darker"
                                    for="max_weight">
                                    Poids maximum
                                </label>

                                <input
                                    class="block w-full px-4 py-3 mb-3 border rounded appearance-none bg-grey-lighter text-grey-darker border-grey-lighter"
                                    id="max_weight" type="number" min="0" name="max_weight"
                                    x-model.number="posologie.max_weight" />

                            </div>
                        </div>
                    </div>




                    <div class="px-3 md:w-full">
                        <label class="block mb-2 text-xs font-bold tracking-wide uppercase text-grey-darker" for="dose">
                            Dose a prendre
                        </label>
                        <textarea
                            class="block w-full px-4 py-3 mb-3 border rounded appearance-none bg-grey-lighter text-grey-darker border-grey-lighter"
                            id="dose" type="text" name="dose" x-model="posologie.dose"></textarea>
                    </div>






                </div>



                <div class="flex justify-center mt-4">
                    <button @click='loading ? false : editID ? updateInfo(): store(posologie)'
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
                <p class="text-3xl font-bold text-center">Voulez vous vraiment supprimer cette posologie ?</p>
                <p class="mt-4 text-lg" x-text="posologie.dose"></p>
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
                        <h2 class="mr-5 text-lg font-medium truncate">Posologies</h2>
                    </div>
                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <a class="col-span-12 transition duration-300 transform bg-white rounded-lg shadow-xl hover:scale-105 sm:col-span-12 xl:col-span-12 intro-y"
                            href="#">
                            <div class="p-5">

                                <div class="flex-1 w-full ml-2">
                                    <div>
                                        <div class="mt-3 text-3xl font-bold leading-8">{{ $medicament->name }}</div>

                                        <div class="mt-1 text-base text-gray-600">{{ $medicament->description }}</div>
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
                                <h1 class="text-base font-bold">Liste des posologies</h1> <template x-if='!inited'>
                                    <p class="mt-2 text-center"><i class="fa fa-spinner animate-spin"
                                            aria-hidden="true"></i></p>
                                </template>
                                <button @click="onCreate()"
                                    class="px-4 py-2 text-white rounded-full bg-primary hover:bg-primary">Ajouter
                                    une posologie</button>
                            </div>
                            <div class="mt-4">
                                <div class="flex flex-col">
                                    <div class="-my-2 overflow-x-audescription">
                                        <div class="inline-block min-w-full py-2 align-middle">

                                                <template x-for="info in posologies" :key="info.id">
                                                    <div class="p-8 mt-4 overflow-hidden bg-white border-b border-gray-200 shadow ring-1 ring-gray-300 sm:rounded-lg">
                                                        <template x-if="info.min_age !== null">
                                                            <div class="" >
                                                                <p class="text-lg font-semibold text-gray-800">Par age</p>
                                                                <p class="mt-2 text-gray-700">A partir de <span x-text="info.min_age + ' ans'"> </span> jusqu'a <span x-text="info.max_age + ' ans'"> </span></p>
                                                            </div>
                                                        </template>


                                                        <template x-if='info.min_weight != null'>
                                                            <div class="mt-4">
                                                                <p class="text-lg font-semibold text-gray-800">Par poids</p>
                                                                <p class="mt-2 text-gray-700">Entre <span x-text="info.min_weight + ' Kg'"> </span> à <span x-text="info.max_weight + ' Kg'"> </span></p>
                                                            </div>
                                                        </template>

                                                        <div class="mt-4">
                                                            <p class="text-lg font-semibold text-gray-800">Dosage</p>
                                                            <p class="mt-2 text-gray-700 whitespace-pre-wrap" x-html="info.dose"></p>
                                                        </div>


                                                        <div class="flex justify-between mt-4">
                                                            <div>
                                                                <p class="text-sm text-gray-600" x-text="'Mis a jour '+timeAgo(info.updated_at)"></p>
                                                            </div>
                                                            <div class="flex gap-4 ">
                                                                <button @click="onEdit(info)"
                                                                class="p-2 py-1 text-gray-700 bg-green-300 rounded-full">
                                                                <i class="fas fa-edit"></i> Modifier</button>
                                                            <button @click="onDelete(info)"
                                                                class="p-2 py-1 text-gray-700 bg-red-300 rounded-full"><i
                                                                    class="fa fa-trash" aria-hidden="true"></i>
                                                                Supprimer</button>
                                                            </div>

                                                        </div>
                                                    </div>

                                                </template>

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
