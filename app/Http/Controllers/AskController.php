<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('ask.index', ["questions" => Question::has('answers')->with('answers.user.profile', function ($query) {
            $query->take(1);
        })->get()]);
    }


    public function userQuestion($id)
    {
        if($id  == 'me'){
            if (Auth::guest()) {
                return redirect()->route('auth.login');
            }
            $id = auth()->user()->id;
        }

        return view('ask.user_question', ["questions" => Question::where('user_id', $id)->with('answers.user.profile')->get(), 'user'=>User::find($id),'answersCount'=>Answer::count(), 'questionsCount'=>Question::where('user_id',$id)->count()]);
    }



    public function userAnswers($id)
    {
        if($id  == 'me'){
            if (Auth::guest()) {
                return redirect()->route('auth.login');
            }
            $id = auth()->user()->id;
        }

        //return dd(Answer::where('user_id', $id)->with('question')->get());
        return view('ask.user_answers', ["answers" => Answer::where('user_id', $id)->with('question.user.profile')->get(), 'user'=>User::find($id), 'answersCount'=>Answer::count(), 'questionsCount'=>Question::where('user_id',$id)->count()] );
    }


    public function notAnswered()
    {
        return view('ask.index', ["questions" => Question::doesnthave('answers')->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required|min:3',
        ]);

        $question = new Question();
        $question->text = $request->get('question');

        if (Auth::check() && !$request->has('anonymous')) {
            $question->user_id = auth()->user()->id;
        }

        $question->save();

        return redirect()->route("ask.show", ['id' => $question->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $question = Question::with('answers.user.profile')->with('user', function ($query) {
            $query->with('profile');
        })->find($id);
        return view('ask.question', ['question' => $question]);
    }


    public function answer($id)
    {
        $question = Question::find($id);
        $answer = new Answer(['text' => request()->get('answer')]);
        $answer->user_id = auth()->user()->id;
        $question->answers()->save($answer);
        return redirect()->route("ask.show", ['id' => $question->id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
