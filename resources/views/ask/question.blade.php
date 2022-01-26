@extends('templates.ask')

@section('body')
<div class="pb-8">

    @include('sections.ask-question-component')





    <div class="mt-8">
        @include('sections.question',["question"=>$question])
    </div>


</div>
@endsection
