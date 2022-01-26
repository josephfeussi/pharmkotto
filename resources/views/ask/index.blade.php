@extends('templates.ask')

@section('body')
    <div class="pb-8">

       @include('sections.ask-question-component')


        <div class="mt-8 text-gray-800">
            <div class="flex overflow-hidden rounded-lg ring-1 ring-primary-900" >
                <a href="#" class="flex-1 p-2 text-center text-white bg-primary-900">Découvrez</a>
                <a href="{{ route('ask.user.questions', ['id'=>'me']) }}" class="flex-1 p-2 text-center">Mes question</a>
            </div>
        </div>

        @foreach ($questions as $question)

        <div class="mt-8">

            @include('sections.mini-question',["question"=>$question])

        </div>
        @endforeach


    </div>
@endsection
