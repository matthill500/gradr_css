<?php
# @Date:   2019-11-26T18:40:50+00:00
# @Last modified time: 2019-11-28T12:48:22+00:00




namespace App\Http\Controllers\User;
use App\AnswersCollege;
use App\AnswersCourse;
use App\AnswersModule;
use App\AnswersGeneral;
use Auth;
use App\QuestionsModule;
use App\QuestionsCourse;
use App\QuestionsCollege;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($type, $id)
    {
      $qid = (int)($id);
      $answersColleges = AnswersCollege::all();
      $answersCourses = AnswersCourse::all();
      $answersModules = AnswersModule::all();
      $answersGenerals = AnswersGeneral::all();

      return view('user.answers.index')->with([
        'answersColleges' => $answersColleges,
        'answersCourses' => $answersCourses,
        'answersModules' => $answersModules,
        'answersGenerals' => $answersGenerals,
        'qid' => $qid,
        'type' => $type
      ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($type, $id)
    {

        return view('user.answers.create')->with([
          'id' => $id,
          'type' => $type
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $type, $id)
    {

      $request->validate([
        'answer' => 'required|min:2|max:300',
      ]);

      if($type === "questions_colleges"){
        $answer = new AnswersCollege();

        $answer->answer = $request->input('answer');
        $answer->question_id = $id;
        $answer->type = $type;
        $answer->student_id = Auth::user()->student->id;

        $answer->save();
      }else if($type === "questions_courses"){
        $answer = new AnswersCollege();

        $answer->answer = $request->input('answer');
        $answer->question_id = $id;
        $answer->type = $type;
        $answer->student_id = Auth::user()->student->id;

        $answer->save();
      }else if($type === "questions_modules"){
        $answer = new AnswersCollege();

        $answer->answer = $request->input('answer');
        $answer->question_id = $id;
        $answer->type = $type;
        $answer->student_id = Auth::user()->student->id;

        $answer->save();
      }else if($type === "questions_generals"){
        $answer = new AnswersGeneral();

        $answer->answer = $request->input('answer');
        $answer->question_id = $id;
        $answer->type = $type;
        $answer->student_id = Auth::user()->student->id;

        $answer->save();
      }

      return redirect()->route('user.answers.index',['type' => $type, 'id' => $id]);
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

    }
}
