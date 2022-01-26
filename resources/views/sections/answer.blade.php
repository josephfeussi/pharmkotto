<div class="p-8 text-white bg-gray-800 rounded-lg">
    <p class="text-lg font-bold">{{$answer->question->text}} <span class="text-xs font-normal text-secondary-500">Par {{ isset($answer->question->user) ? $answer->question->user->profile->fullName : 'Anonyme' }}</span></p>


    @if ($answer->question->answers->count() > 0)
    <p class="mt-6 font-bold">{{$answer->user->profile->fullName}}</p>

    <p class="mt-4 font-light">{{$answer->text}}</p>

    <div class="w-full h-1 mt-3 bg-secondary-500"></div>


    <div class="flex justify-center mt-4">
        <a href="{{ route('ask.show', ['id'=>$answer->question->id]) }}" class="p-2 px-4 font-semibold text-center rounded-lg bg-primary">Voir toute les reponses</a>
    </div>

    @endif

    @guest
    <div class="mt-4 text-sm text-center">
        <a href="{{ route('auth.login') }}" class="text-secondary-500">Connectez-vous</a> pour repondre a cette question
    </div>
    @endguest

    @auth
    <form method="POST" action="{{ route('ask.show', ['id'=>$answer->question->id]) }}" class="mt-4 ">
        <p class="font-semibold">Je reponds</p>
        <textarea name="answer" id="answer"  placeholder="Donne nous ta reponse" class="w-full p-4 mt-4 text-black rounded-lg focus:outline-none"></textarea>
        <div class="flex items-center justify-between mt-4">
            <p class="text-xs text-gray-600">Votre reponse sera publique</p>
            <button type="submit" class="p-2 px-4 text-white rounded-lg bg-primary"><em class="text-2xl">a</em>nswer</button>
            @csrf
        </div>
    </form>
    @endauth




</div>
