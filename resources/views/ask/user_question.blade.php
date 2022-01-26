@extends('templates.ask')

@section('body')
    <div class="pb-8">

        <div class="flex-col p-8 text-white bg-gray-800 rounded-lg">
            <p class="text-lg font-bold">{{$user->profile->fullName}}</p>


           <div class="flex mt-2">
               <p class="mr-2 font-bold text-primary-900">Question Posées :</p>
               <p>{{$questionsCount}}</p>
           </div>
   <div class="flex mt-2">
               <p class="mr-2 font-bold text-primary-900">Question Repondu :</p>
               <p>{{$answersCount}}</p>
           </div>


        </div>


        <div class="mt-8 text-gray-800">
            <div class="flex overflow-hidden rounded-lg ring-1 ring-primary-900" >
                <a href="#" class="flex-1 p-2 text-center text-white bg-primary-900">Question</a>
                <a href="{{ route('ask.user.answers', ['id'=>$user->id]) }}" class="flex-1 p-2 text-center">Reponses</a>
            </div>
        </div>


        @foreach ($questions as $question)

        <div class="mt-8">

            @include('sections.mini-question',["question"=>$question])

        </div>
        @endforeach


    </div>
@endsection
