<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Question;
use App\User;
use App\Student;
use Auth;

class QuestionController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
    //  $this->middleware('role:admin');
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Question::all();
        $users = User::all();

        return view('user.questions.index')->with([
          'questions' => $questions,
          'users' => $users

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          return view('user.questions.create');
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
        'title' => 'required|max:191',
        'info' => 'required|min:30|max:300',
      ]);

      $question = new Question();

      $question->title = $request->input('title');
      $question->info = $request->input('info');
      $question->student_id = Auth::user()->student->id;

      $question->save();

      return redirect()->route('user.questions.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $question = Question::findOrFail($id);

      return view('user.questions.show')->with([
        'question' => $question
      ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $question = Question::findOrFail($id);

      return view('user.questions.edit')->with([
        'question' => $question
      ]);
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
      $question = Question::findOrFail($id);

      $request->validate([
        'title' => 'required|max:191',
        'info' => 'required|min:30|max:300',
      ]);

      $question->title = $request->input('title');
      $question->info = $request->input('info');
      $question->save();

      return redirect()->route('user.questions.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     public function requestDelete($id)
      {
       $question = Question::findOrFail($id);
              if($question->delete === 0){
                $question->delete = 1;
                  $question->save();
                  return redirect()->route('user.questions.index')->with('status','Requested to delete!');
              }else if($question->delete === 1){
                $question->delete = 0;
                $question->save();
             return redirect()->route('user.questions.index')->with('status','Request withdrawn!');
               }
      }
}
