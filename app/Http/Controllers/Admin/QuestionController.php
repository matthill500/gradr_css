<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Question;
use Auth;

class QuestionController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Question::all();

        return view('admin.questions.index')->with([
          'questions' => $questions
        ]);
    }
    public function deleteRequests()
    {
        $questions = Question::all();

        return view('admin.questions.deleteRequests')->with([
          'questions' => $questions
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.questions.create');
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
        $question->user_id = Auth::user()->getId();

        $question->save();

        return redirect()->route('admin.questions.index');
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

        return view('admin.questions.show')->with([
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

      return view('admin.questions.edit')->with([
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

      return redirect()->route('admin.questions.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $question = Question::findOrFail($id);

      $question->delete();

      return redirect()->route('admin.questions.deleteRequests');
    }
}
