<?php
# @Date:   2019-11-26T18:40:50+00:00
# @Last modified time: 2019-11-28T12:48:22+00:00




namespace App\Http\Controllers\User;
use App\Answer;
use App\Question;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $qid = (int)($id);
        $answers = Answer::all();
        $questions = Question::all();

      return view('user.answers.index')->with([
        'answers' => $answers,
        'questions' => $questions,
        'qid' => $qid
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        return view('user.answers.create')->with([
          'id' => $id
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {

      $request->validate([
        'answer' => 'required|min:2|max:300',
      ]);

      $answer = new Answer();

      $answer->answer = $request->input('answer');
      $answer->question_id = $id;
      $answer->student_id = Auth::user()->student->id;

      $answer->save();

      return redirect()->route('user.questions.show', $id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $question_id = $id;
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
