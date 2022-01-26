@extends('templates.dashboard')

@section('head')
    <script>
        function userPage() {
            return {
                deleted: [],
                async deleteUser(id) {
                    var confirm = await Swal.fire({
                        title: "Voulez vous vraiemnt supprimer ?",
                        confirmButtonText: "Oui, supprimer"
                    })

                    if (confirm.isConfirmed) {
                        Swal.fire({
                            title: "Veuillez patienter",
                            showConfirmButton: false
                        })
                        Swal.showLoading()
                        try {
                            await axios.delete(`/api/users/${id}`)
                            Swal.hideLoading();
                            Toast.fire({
                                icon: 'success',
                                title: "Supprimé avec success"
                            })
                            this.deleted.push(id);
                        } catch (e) {
                            Swal.hideLoading();
                            Swal.fire({

                                title: "Impossible de supprimer",
                                text: e.response.data.message
                            })
                        }

                    }
                },

                formatPhoneNumber(str) {
                    //Filter only numbers from the input
                    let cleaned = ('' + str).replace(/\D/g, '');


                    //Check if the input is of correct
                    let match = cleaned.match(/^(237|)?(\d{3})(\d{3})(\d{3})$/);

                    if (match) {
                        //Remove the matched extension code
                        //Change this to format for any country code.
                        let intlCode = (match[1] ? '+' + match[1] : '')
                        return [intlCode, ' ', match[2], ' ', match[3], ' ', match[4]].join('')
                    }

                    return null;
                }
            }
        }
    </script>
@endsection
@section('main')



    <div class="grid grid-cols-12 gap-6" x-data="userPage()">
        <div class="grid grid-cols-12 col-span-12 gap-6 xxl:col-span-9">

            <div class="col-span-12 mt-5">
                <div class="grid grid-cols-1 gap-2 lg:grid-cols-1">
                    <div class="p-4 bg-white rounded-lg shadow-lg">
                        <div class="flex justify-between">
                            <h1 class="text-base font-bold">Liste des utilisateurs</h1>
                            <a href="{{ route('dashboard.users.create') }}"
                                class="px-4 py-2 text-white rounded-full bg-primary hover:bg-primary">Ajouter un
                                utilisateur</a>
                        </div>
                        <form method="get">
                            <div class="form-control">
                                <label class="label">
                                    <span class="label-text">Recherche</span>
                                </label>
                                <div class="flex space-x-2">
                                    <input type="text" placeholder="Recherche par nom ou numero de téléphone" name="search"
                                        class="w-full input input-primary input-bordered">
                                    <button class="btn btn-primary">Rechercher</button>
                                </div>
                            </div>
                        </form>

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
                                                                <span class="mr-2">Role</span>
                                                            </div>
                                                        </th>
                                                        <th
                                                            class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-gray-500 uppercase bg-gray-50">
                                                            <div class="flex cursor-pointer">
                                                                <span class="mr-2">Date d'inscription</span>
                                                            </div>
                                                        </th>
                                                        <th
                                                            class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-gray-500 uppercase bg-gray-50">
                                                            <div class="flex cursor-pointer">
                                                                <span class="mr-2">Numero de telephone</span>
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

                                                    @foreach ($users as $user)

                                                        <tr class="hover:bg-warmGray-200"
                                                            :class="{'hidden': !!deleted.includes({{ $user->id }})}">
                                                            <td class="px-6 py-4 text-sm leading-5 whitespace-no-wrap">
                                                                <a
                                                                    href="{{ route('dashboard.users.view', ['id' => $user->user->id]) }}">{{ $user->full_name }}</a>


                                                            </td>
                                                            <td class="px-6 py-4 text-sm leading-5 whitespace-no-wrap">
                                                                <p class="capitalize">{{ $user->user->role }}</p>
                                                            </td>

                                                            <td class="px-6 py-4 text-sm leading-5 whitespace-no-wrap">
                                                                <p class="capitalize">{{ $user->user->created_at }}
                                                                </p>
                                                            </td>
                                                            <td class="px-6 py-4 text-sm leading-5 whitespace-no-wrap">
                                                                <div class="flex text-gray-700">
                                                                    <span
                                                                        x-text="formatPhoneNumber('{{ $user->mobile_phone }}')">
                                                                    </span>

                                                                </div>
                                                            </td>
                                                            <td class="px-6 py-4 text-sm leading-5 whitespace-no-wrap">
                                                                <div class="flex space-x-4">
                                                                    <a href="{{ route('dashboard.users.edit', ['id' => $user->id]) }}"
                                                                        class="flex items-center justify-center text-center btn btn-ghost btn-square tooltip tooltip-left text-accent"
                                                                        data-tip="Modifier">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            class="w-6 h-6" fill="none"
                                                                            viewBox="0 0 24 24" stroke="currentColor">
                                                                            <path stroke-linecap="round"
                                                                                stroke-linejoin="round" stroke-width="2"
                                                                                d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                                        </svg>
                                                                    </a>

                                                                    @if ($user->id != auth()->user()->id)
                                                                        <button @click="deleteUser( {{ $user->id }} )"
                                                                            class="flex items-center justify-center btn btn-square btn-ghost text-error tooltip tooltip-left"
                                                                            data-tip="Supprimer">
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                class="w-6 h-6" fill="none"
                                                                                viewBox="0 0 24 24" stroke="currentColor">
                                                                                <path stroke-linecap="round"
                                                                                    stroke-linejoin="round" stroke-width="2"
                                                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                                            </svg>
                                                                        </button>
                                                                    @endif


                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach

                                                </tbody>
                                            </table>

                                        </div>
                                        <div class="mx-auto mt-4">
                                            {{ $users->withQueryString()->onEachSide(1)->links() }}
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
