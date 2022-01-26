@extends('templates.dashboard')
@section('main')
    @if (session('info'))
        <div class="alert">
            <div class="flex-1">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="#2196f3"
                    class="w-6 h-6 mx-2">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <label> {{ session('info') }}</label>
            </div>
        </div>
    @endif
    <div class="grid grid-cols-12 gap-6">
        <div class="grid grid-cols-12 col-span-12 gap-6 xxl:col-span-9">
            <div class="col-span-12 mt-8">
                <div class="flex items-center h-10 intro-y">
                    <h2 class="mr-5 text-lg font-medium truncate">Envoie des SMS et Notification d'alert</h2>
                </div>

                <form action="" method="POST" class="container p-8 mx-auto mt-4">
                    @csrf
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Votre message</span>
                        </label>
                        <textarea class="h-24 textarea textarea-bordered" placeholder="Message" name="message"></textarea>
                    </div>

                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Numero du destinataire</span>
                        </label>
                        <select class="w-full min-h-[16rem] select select-bordered" multiple name="numbers[]">
                            @foreach ($users as $user)
                                <option class="p-2" value="{{ $user->mobile_phone }}">{{ $user->full_name }}
                                    - ({{ $user->mobile_phone }})</option>
                            @endforeach


                        </select>
                    </div>



                    <input type="submit" value="Envoyer" class="mt-4 btn btn-primary">

                </form>

            </div>
        </div>
    @endsection
