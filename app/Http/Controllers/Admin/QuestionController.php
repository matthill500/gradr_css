<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\QuestionsCollege;
use App\QuestionsCourse;
use App\QuestionsModule;
use App\QuestionsGeneral;
use App\VotesQuestionsGeneral;
use App\VotesQuestionsCollege;
use App\VotesQuestionsCourse;
use App\VotesQuestionsModule;
use App\Question;

use Auth;
use DB;

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
     public function deleteRequests()
     {
         $questionsColleges = QuestionsCollege::all();
         $questionsCourses = QuestionsCourse::all();
         $questionsModules = QuestionsModule::all();
         $questionsGenerals = QuestionsGeneral::all();

         return view('admin.questions.deleteRequests')->with([
           'questionsColleges' => $questionsColleges,
           'questionsCourses' => $questionsCourses,
           'questionsModules' => $questionsModules,
           'questionsGenerals' => $questionsGenerals

         ]);
     }

    public function destroyCollege($id)
    {
      $questionsCollege = QuestionsCollege::findOrFail($id);

      $question_id = $id;

      $votesCollege = DB::table('votes_questions_colleges')->where('question_id', $question_id)->get();

      if(count($votesCollege) == 0){
        $questionsCollege->delete();
          return redirect()->route('admin.questions.deleteRequests');
      }else{
        $votesCollege->delete();
        $questionsCollege->delete();
          return redirect()->route('admin.questions.deleteRequests');
      }
    }


    public function destroyCourse($id)
    {
      $questionsCourse = QuestionsCourse::findOrFail($id);

      $question_id = $id;

      $votesCourse = DB::table('votes_questions_courses')->where('question_id', $question_id)->get();

      if(count($votesCourse) == 0){
        $questionsCourse->delete();
          return redirect()->route('admin.questions.deleteRequests');
      }else{
        $votesCourse->delete();
        $questionsCourse->delete();
          return redirect()->route('admin.questions.deleteRequests');
      }
    }


    public function destroyModule($id)
    {
      $questionsModule = QuestionsModule::findOrFail($id);

      $question_id = $id;

      $votesModule = DB::table('votes_questions_modules')->where('question_id', $question_id)->get();

      if(count($votesModule) == 0){
        $questionsModule->delete();
          return redirect()->route('admin.questions.deleteRequests');
      }else{
        $votesModule->delete();
        $questionsModule->delete();
          return redirect()->route('admin.questions.deleteRequests');
      }
    }

    public function destroyGeneral($id)
    {
      $questionsGeneral = QuestionsGeneral::findOrFail($id);

      $question_id = $id;

      $votesGeneral = DB::table('votes_questions_generals')->where('question_id', $question_id)->get();



      if(count($votesGeneral) == 0){
        $questionsGeneral->delete();
          return redirect()->route('admin.questions.deleteRequests');
      }else{
        $votesGeneral->delete();
        $questionsGeneral->delete();
          return redirect()->route('admin.questions.deleteRequests');
      }
    }
}
