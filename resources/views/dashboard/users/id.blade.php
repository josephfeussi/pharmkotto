@extends('templates.dashboard')

@section('beforeBody')
    <script>
        var blankCarnet = {
            consultation_date: undefined,
            prescription: undefined,
            doctor_name: undefined,
            hospital: undefined,
            observation: '',
            user_id: {{ $user->id }}
        }

        var blankAntecedant = {
            maladie_id: '',
            user_id: {{ $user->id }}
        }

        function carnet() {
            return {
                inited: false,
                createModal: false,
                createAntecedant: false,

                deleteModal: false,
                carnet: blankCarnet,
                maladie: blankAntecedant,
                editID: null,
                carnets: [],
                maladies: [],
                antecedants: [],
                loading: false,
                onCreate() {
                    this.editID = null;
                    this.carnet = blankCarnet
                    this.createModal = true
                },

                createAntecedantFxn() {
                    this.editID = null;
                    this.maladie = blankAntecedant
                    this.createAntecedant = true
                },

                async attachAntecedant() {
                   this.loading = true;
                   await axios.post('/api/maladies/users/attach', this.maladie)
                   response = await axios.get(`/api/maladies/user/${this.maladie.user_id}`)
                   this.antecedants = response.data
                   this.maladie = {...this.maladie, maladie_id: undefined}
                   this.loading =false;
                    this.createAntecedant = false
                },

                onEdit(info) {
                    this.editID = info.id;
                    this.carnet = info
                    this.createModal = true
                },

               async onDelete(_carnet) {

                    confirmation = await Swal.fire({icon:"question", title: "Confirmez la suppression du carnet ?", text: "Cette action est irréversible", showDenyButton:true, confirmButtonText:"Oui, supprimer"});
                    if(confirmation.isConfirmed){

                        Swal.showLoading()
                        try {
                            await axios.delete(`/api/carnets/${_carnet.id}`)
                            this.carnets.splice(this.carnets.indexOf(_carnet), 1)
                            Toast.fire({'icon': 'success', title: "Carnet supprimé"})
                        } catch (error) {
                            Swal.fire({icon:"error", title: "Impossible de supprimer", text: error.response.data.message, showDenyButton:true, confirmButtonText:"Oui, supprimer"});
                        }
                    }
                  /*   this.editID = info.id;
                    this.carnet = info
                    this.deleteModal = true */
                },

                async deletedAntecedant(maladie) {
                    confirmation = await Swal.fire({icon:"question", title: "Confirmez la suppression de l'antécédant ?", text: "Cette action est irréversible", showDenyButton:true, confirmButtonText:"Oui, supprimer"});
                    if(confirmation.isConfirmed){

                        Swal.showLoading()
                        try {
                            await axios.post('/api/maladies/users/detach', {user_id: {{$user->id}}, maladie_id: maladie.id })
                            this.antecedants.splice(this.antecedants.indexOf(maladie), 1)
                            Toast.fire({'icon': 'success', title: "Antécédant supprimé"})
                        } catch (error) {
                            Swal.fire({icon:"error", title: "Impossible de supprimer", text: error.response.data.message, showDenyButton:true, confirmButtonText:"Oui, supprimer"});
                        }

                    }
                },
                async fetchinfo() {

                    var res = {
                        data: {
                            data: @json($user->carnets)
                        }
                    }
                    console.log(res);
                    this.carnets = res.data.data;
                    this.antecedants = @json($user->maladies);
                    this.maladies = @json($maladies);
                    this.maladie.maladie_id = "empty"
                    this.inited = true
                },
                async store() {
                    this.loading = true
                    try {
                        res = await window.axios.post("{{ route('dashboard.carnet.store') }}", this.carnet)
                    } catch (e) {
                        this.loading = false
                        return
                    }

                    console.log(res);
                    this.carnets.push(res.data.data)
                    this.carnet = blankCarnet
                    this.createModal = false;
                    this.loading = false
                },
                async deleteInfo() {
                    this.loading = true
                    try {
                        res = await window.axios.delete(`/dashboard/users/carnet/${this.editID}`)
                    } catch (e) {
                        this.loading = false
                        return
                    }

                    console.log(res);
                    this.carnets = this.carnets.filter(x => x.id !== this.editID)
                    this.carnet = blankCarnet
                    this.editID = null;
                    this.deleteModal = false;
                    this.loading = false
                },
                async updateInfo() {
                    this.loading = true
                    try {
                        res = await window.axios.put(`/dashboard/users/carnet/${this.editID}`, this.carnet)
                    } catch (e) {
                        this.loading = false
                        return
                    }

                    console.log(res);
                    let target = this.carnets.find(x => x.id == this.editID)
                    target.carnet = this.carnet
                    this.editID = null
                    this.carnet = blankCarnet
                    this.createModal = false;
                    this.loading = false
                },


            }
        }
    </script>
@endsection
@section('main')
    <div x-data='carnet()' x-init="fetchinfo()">
        <div x-show="createModal" x-transition:enter="transition duration-200 transform ease-out"
            x-transition:enter-start="scale-75" x-transition:leave="transition duration-100 transform ease-in"
            x-transition:leave-end="opacity-0 scale-90" @click='createModal=false'
            class="absolute inset-0 z-40 flex items-center justify-center ">
            <div class="absolute inset-0 bg-gray-200 exit-issue opacity-60"></div>
            <div class="relative z-40 p-8 px-16 bg-white rounded-lg shadow-xl" @click.stop>
                <button @click='createModal = false'
                    class="absolute w-6 h-6 text-sm text-white transition-colors rounded-full -descriptionp-2 -right-2 bg-primary-900 hover:bg-primary-500"><i
                        class="fa fa-window-close" aria-hidden="true"></i></button>
                <p class="text-3xl font-bold text-center" x-text="editID ? 'Modification' : 'Nouveau carnet du patient'">
                </p>

                <div class="mt-4 mb-6 -mx-3">
                    <div class="mt-4">
                        <p class="mb-2 font-bold text-center text-gray-800 uppercase">Information du médécin</p>
                        <div class="flex gap-1">

                            <div class="px-3 md:w-full">
                                <label class="block mb-2 text-xs font-bold tracking-wide uppercase text-grey-darker"
                                    for="doctor_name">
                                    Nom du médécin
                                </label>

                                <input
                                    class="block w-full px-4 py-3 mb-3 border rounded appearance-none bg-grey-lighter text-grey-darker border-grey-lighter"
                                    id="doctor_name" type="text" name="doctor_name" x-model.number="carnet.doctor_name" />

                            </div>
                            <div class="px-3 md:w-full">
                                <label class="block mb-2 text-xs font-bold tracking-wide uppercase text-grey-darker"
                                    for="hospital">
                                    Nom du centre
                                </label>

                                <input
                                    class="block w-full px-4 py-3 mb-3 border rounded appearance-none bg-grey-lighter text-grey-darker border-grey-lighter"
                                    id="hospital" type="text" name="hospital" x-model.number="carnet.hospital" />

                            </div>
                        </div>
                    </div>







                    <div class="px-3 md:w-full">
                        <label class="block mb-2 text-xs font-bold tracking-wide uppercase text-grey-darker"
                            for="observation">
                            Observation
                        </label>
                        <textarea
                            class="block w-full px-4 py-3 mb-3 border rounded appearance-none bg-grey-lighter text-grey-darker border-grey-lighter"
                            id="observation" type="text" name="observation" x-model="carnet.observation"></textarea>
                    </div>

                    <div class="px-3 md:w-full">
                        <label class="block mb-2 text-xs font-bold tracking-wide uppercase text-grey-darker"
                            for="prescription">
                            Prescription
                        </label>
                        <textarea
                            class="block w-full px-4 py-3 mb-3 border rounded appearance-none bg-grey-lighter text-grey-darker border-grey-lighter"
                            id="prescription" type="text" name="prescription" x-model="carnet.prescription"></textarea>
                    </div>

                    <div class="px-3 md:w-full">
                        <label class="block mb-2 text-xs font-bold tracking-wide uppercase text-grey-darker"
                            for="consultation_date">
                            Date de consultation
                        </label>
                        <input type="date"
                            class="block w-full px-4 py-3 mb-3 border rounded appearance-none bg-grey-lighter text-grey-darker border-grey-lighter"
                            id="consultation_date" type="text" name="consultation_date"
                            x-model="carnet.consultation_date" />
                    </div>






                </div>



                <div class="flex justify-center mt-4">
                    <button @click='loading ? false : editID ? updateInfo(): store(carnet)'
                        class="px-4 py-2 text-sm text-white rounded-lg bg-primary-900">




                        <span x-show="!loading" x-text="editID ? 'Modifier' : 'Publier'">

                        </span>

                        <span x-show="loading">
                            <i class="fa fa-spinner animate-spin" aria-hidden="true"></i>
                        </span>
                    </button>
                </div>
            </div>
        </div>

        <div x-show="createAntecedant" x-transition:enter="transition duration-200 transform ease-out"
        x-transition:enter-start="scale-75" x-transition:leave="transition duration-100 transform ease-in"
        x-transition:leave-end="opacity-0 scale-90" @click='createAntecedant=false'
        class="absolute inset-0 z-40 flex items-center justify-center ">
        <div class="absolute inset-0 bg-gray-200 exit-issue opacity-60"></div>
        <div class="relative z-40 p-8 px-16 bg-white rounded-lg shadow-xl" @click.stop>
            <button @click='createAntecedant = false'
                class="absolute w-6 h-6 text-sm text-white transition-colors rounded-full -descriptionp-2 -right-2 bg-primary-900 hover:bg-primary-500"><i
                    class="fa fa-window-close" aria-hidden="true"></i></button>
            <p class="text-3xl font-bold text-center" x-text="editID ? 'Modification' : 'Nouvel antécédant du patient'">
            </p>

            <div class="mt-4 mb-6 -mx-3">
                <div class="mt-4">
                    <p class="mb-2 font-bold text-center text-gray-800 uppercase">Choix de la maladie</p>

                    <select class="w-full select select-bordered" x-model='maladie.maladie_id'>
                        <option  disabled value="empty">Listes des maladies</option>
                        <template x-for="m in maladies.filter(x => !antecedants.map(x=>x.id).includes(x.id))" :key="m.id" >
                            <option x-text="m.name" :value="m.id"></option>
                        </template>

                      </select>

                </div>
            </div>



            <div class="flex justify-center mt-4">
                <button @click='loading ? false : attachAntecedant()'
                    class="btn btn-primary">




                    <span x-show="!loading" x-text="editID ? 'Modifier' : 'Publier'">

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
                        <h2 class="mr-5 text-lg font-medium truncate">
                            {{ $user->role == 'patient' ? 'Patients' : 'Utilisateur' }}</h2>
                    </div>
                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <a class="col-span-12 transition duration-300 transform bg-white rounded-lg shadow-xl hover:scale-105 sm:col-span-12 xl:col-span-12 intro-y"
                            href="#">
                            <div class="p-5">

                                <div class="flex-1 w-full ml-2">
                                    <div>
                                        <div class="mt-3 text-3xl font-bold leading-8">{{ $user->profile->full_name }}
                                        </div>

                                        <div class="mt-1 text-base text-gray-600">Email: {{ $user->email }}</div>
                                        <div class="mt-1 text-base text-gray-600">Téléphone :
                                            {{ $user->profile->mobile_phone }}</div>
                                        <div class="mt-1 text-base text-gray-600">Ville : {{ $user->profile->city }}</div>
                                        <div class="mt-1 text-base text-gray-600"
                                            x-text="`Date de naissance : ${birthday('{{ $user->profile->birthday }}')}`">
                                        </div>
                                        <div class="mt-1 text-base text-gray-600">Sexe :
                                            {{ $user->profile->gender == 'm' ? 'Homme' : 'Femme' }}</div>



                                    </div>

                                </div>
                            </div>
                        </a>

                    </div>
                </div>

                @if ($user->role == 'patient')


                    <div class="col-span-12 mt-5">
                        <div class="grid grid-cols-1 gap-2 lg:grid-cols-1">
                            <div class="p-4 bg-white rounded-lg shadow-lg">

                                <div class="flex justify-between">
                                    <h1 class="text-base font-bold">Dossier médical</h1> <template x-if='!inited'>
                                        <p class="mt-2 text-center"><i class="fa fa-spinner animate-spin"
                                                aria-hidden="true"></i></p>
                                    </template>
                                 <div class="flex gap-x-6">
                                    <button @click="onCreate()"
                                    class="btn btn-primary">Ajouter
                                    un carnet</button>

                                    <button @click="createAntecedantFxn()"
                                    class="btn btn-secondary">Ajouter
                                    un antecedant</button>
                                 </div>
                                </div>
                                <div class="mt-4">
                                    <div class="flex flex-col">
                                        <div class="-my-2 overflow-x-audescription">
                                            <div class="inline-block min-w-full py-2 align-middle">
                                                <div class="text-sm text-center text-base-content"
                                                    :class="{'hidden': carnets.length}">Aucun carnet dans le dossier </div>
                                                <template x-for="info in carnets" :key="info.id">
                                                    <div
                                                        class="p-8 mt-4 overflow-hidden bg-white border-b border-gray-200 shadow ring-1 ring-gray-300 sm:rounded-lg">

                                                        <div class="">
                                                            <p class="text-lg font-semibold text-gray-800 ">Hôpital</p>
                                                            <span>
                                                                <p class="mt-2 text-gray-700" x-text="info.hospital"></p>
                                                                <p class="text-sm"
                                                                    x-text="'par ' + info.doctor_name"></p>
                                                        </div>




                                                        <div class="mt-4">
                                                            <p class="text-lg font-semibold text-gray-800">Date de
                                                                consultation</p>
                                                            <p class="mt-2 text-gray-700"
                                                                x-text="formatDate(info.consultation_date)">
                                                            </p>
                                                        </div>


                                                        <div class="mt-4">
                                                            <p class="text-lg font-semibold text-gray-800">Observation</p>
                                                            <p class="mt-2 text-gray-700 whitespace-pre-wrap"
                                                                x-html="info.observation"></p>
                                                        </div>

                                                        <div class="mt-4">
                                                            <p class="text-lg font-semibold text-gray-800">Prescription </p>
                                                            <p class="mt-2 text-gray-700 whitespace-pre-wrap"
                                                                x-html="info.prescription"></p>
                                                        </div>


                                                        <div class="flex justify-between mt-4">
                                                            <div class="flex flex-col">
                                                                <p class="text-sm text-gray-600"
                                                                    x-text="'Ajouté '+timeAgo(info.created_at)"></p>
                                                                <p class="text-sm text-gray-600"
                                                                    x-text="'Mis a jour '+timeAgo(info.updated_at)"></p>
                                                            </div>
                                                            <div class="flex gap-4 ">
                                                                <button @click="onEdit(info)"
                                                                    class="btn btn-accent">
                                                                    <i class="mr-2 fas fa-edit"></i> Modifier</button>
                                                                <button @click="onDelete(info)"
                                                                    class="btn btn-error"><i
                                                                        class="mr-2 fa fa-trash" aria-hidden="true"></i>
                                                                    Supprimer</button>
                                                            </div>

                                                        </div>
                                                    </div>

                                                </template>

                                                <h3 class="mt-8 text-xl font-bold">Antécedants médicals</h3>
                                                <template x-for="ante in antecedants" :key="ante.id">
                                                    <div
                                                        class="mt-4 shadow-lg card glass">

                                                        <div class="card-body">
                                                            <p class="card-title " x-text="ante.name"></p>

                                                                <p class="" x-text="ante.description"></p>
                                                                <div class="justify-end card-actions">



                                                                    <button @click="deletedAntecedant(ante)"
                                                                        class="btn btn-error"><i
                                                                            class="mr-2 fa fa-trash" aria-hidden="true"></i>
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
                @endif
            </div>
        </div>

    </div>


@endsection
