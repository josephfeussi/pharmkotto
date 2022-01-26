@extends('templates.dashboard')
@section('main')

<div class="mt-8 text-4xl font-black text-secondary">Information sur la maladie</div>
<div class="mt-4 shadow-lg card">

    <div class="card-body bg-base-200">
        <h2 class="card-title">{{ $maladie->name}}</h2>
      <p>{{ $maladie->description}}</p>
    </div>
  </div>

  <div class="mt-8 text-2xl font-black text-secondary">Patients</div>

  <div class="flex flex-wrap mt-8">
    @foreach ($maladie->users as $user)
    <div class="pr-2">
        <div class="shadow-2xl card lg:card-side bg-neutral text-neutral-content min-w-[24rem]">
            <div class="card-body">
                <div class="flex items-center gap-x-4">
                    <div class="avatar placeholder">

                        <div class="w-12 h-12 rounded-full bg-primary-focus text-primary-content">
                          <span>{{$user->profile->initials}}</span>
                        </div>
                      </div>

                      <div>
                        <p class="text-lg font-bold">{{ $user->profile->fullname }}</p>
                        <p class="text-xs font-light">{{ $user->profile->mobile_phone }}</p>
                      </div>

                </div>

                <div class="flex mt-4 gap-x-2">

                    <span class="font-bold text-secondary">Ville:</span>
                      <p>{{ $user->profile->city }}</p>
                </div>

                <div class="flex mt-4 gap-x-2">
                    <span class="font-bold text-secondary">Sexe:</span>
                    {{ $user->profile->gender == 'm' ? "Homme" : "Femme" }}</div>


              <div class="justify-end card-actions">
                <button class="btn btn-ghost btn-primary">
                      Voir le patient


                </button>
              </div>
            </div>
          </div>
    </div>

    @endforeach
  </div>


  <div class="mt-8 text-2xl font-black text-secondary">Alertes et Notification</div>
  @if (session('info'))
  <div class="alert">
      <div class="flex-1">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="#2196f3" class="w-6 h-6 mx-2">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
        </svg>
        <label>  {{ session('info') }}</label>
      </div>
    </div>
  @endif
  <form action="{{ route('dashboard.sms') }}" method="POST" class="container p-8 mx-auto mt-4">
    @csrf
    <div class="form-control">
        <label class="label">
          <span class="label-text">Votre message</span>
        </label>
        <textarea class="h-24 textarea textarea-bordered" placeholder="Message" name="message"></textarea>
      </div>




    <div class="form-control">
      <label class="justify-start cursor-pointer label">
        <input type="checkbox" checked="checked" onchange="toggleDestination(event)" class="checkbox checkbox-primary">
        <span class="ml-4 label-text">Envoyer a tous les patients</span>

      </label>
    </div>


      <div class="hidden form-control animate-fadeInUp animate-animated" id="destination">
        <label class="label">
          <span class="label-text">Choix des destinataires</span>
        </label>
        <select class="w-full min-h-[16rem] select select-bordered" multiple name="numbers[]">
            @foreach ($maladie->users as $user)
            <option class="p-2" selected value="{{ $user->profile->mobile_phone }}">{{ $user->profile->fullname }} - ({{ $user->profile->mobile_phone }})</option>
            @endforeach


           </select>
      </div>



      <input type="submit" value="Envoyer" class="mt-4 btn btn-primary">

</form>


<script>
function toggleDestination(e) {

    if(e.target.checked){
        document.getElementById('destination').classList.add("hidden")
        //document.getElementById('destination').classList.remove("animate-heartBeat")
    }else{
        document.getElementById('destination').classList.remove("hidden")
        //document.getElementById('destination').classList.add("animate-bounce")

    }

}
</script>

@endsection
