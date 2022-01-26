<form method="POST" action="{{ route('ask.index') }}" class="flex-col p-8 text-white bg-gray-800 rounded-lg">
    <p class="text-lg font-bold">Ma question</p>

    <div class="p-4 mt-4 bg-white rounded-lg">
        <input name="question" required class="w-full text-gray-800 outline-none hover:outline-none focus:outline-none" placeholder="Que souhaitez vous savoir ?" type="text"/>
    </div>

    @guest
    <div class="mt-4 text-xs text-gray-200">
        <p><a href="{{ route('auth.login') }}" class="text-secondary-500">Connectez-vous</a> pour suivre l'evolution de vos question</p>
    </div>
    @endguest


    <div class="flex items-center justify-between mt-4 text-xs">
        <div>
            <input type="checkbox" name="anonymous" id="anonymous"   @guest
            checked readonly disabled
        @endguest>
            <label class="ml-2" for="anonymous">Je veux rester anonyme</label>

        </div>


        <div>
            <button class="p-2 px-6 rounded-lg bg-primary" type="submit"><em class="text-3xl" >a</em>sk</button>
        </div>

    </div>

    @csrf
</form>
