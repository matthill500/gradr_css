<?php
# @Date:   2019-11-26T18:40:50+00:00
# @Last modified time: 2019-11-28T12:48:22+00:00




namespace App\Http\Controllers\User;
use App\AnswersCollege;
use App\AnswersCourse;
use App\AnswersModule;
use App\AnswersGeneral;
use Auth;
use DB;
use App\QuestionsModule;
use App\QuestionsCourse;
use App\QuestionsCollege;
use App\QuestionsGeneral;
use App\VotesAnswersGeneral;
use App\VotesAnswersCollege;
use App\VotesAnswersCourse;
use App\VotesAnswersModule;
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

      if ($type === "questions_generals"){
          $questionsGeneral = questionsGeneral::findOrFail($id);

          return view('user.answers.index')->with([
            'qid' => $qid,
            'type' => $type,
            'questionsGeneral' => $questionsGeneral,
            'answersColleges' => $answersColleges,
            'answersCourses' => $answersCourses,
            'answersModules' => $answersModules,
            'answersGenerals' => $answersGenerals
          ]);

      }else if($type === "questions_colleges"){
        $questionsCollege = QuestionsCollege::findOrFail($id);

          return view('user.answers.index')->with([
            'qid' => $qid,
            'type' => $type,
            'questionsCollege' => $questionsCollege,
            'answersColleges' => $answersColleges,
            'answersCourses' => $answersCourses,
            'answersModules' => $answersModules,
            'answersGenerals' => $answersGenerals
          ]);

      }else if($type === "questions_courses"){
        $questionsCourse = questionsCourse::findOrFail($id);

          return view('user.answers.index')->with([
            'qid' => $qid,
            'type' => $type,
            'questionsCourse' => $questionsCourse,
            'answersColleges' => $answersColleges,
            'answersCourses' => $answersCourses,
            'answersModules' => $answersModules,
            'answersGenerals' => $answersGenerals
          ]);
      }else{
        $questionsModule = questionsModule::findOrFail($id);

          return view('user.answers.index')->with([
            'qid' => $qid,
            'type' => $type,
            'questionsModule' => $questionsModule,
            'answersColleges' => $answersColleges,
            'answersCourses' => $answersCourses,
            'answersModules' => $answersModules,
            'answersGenerals' => $answersGenerals
          ]);
      }

      // return view('user.answers.index')->with([
      //   'answersColleges' => $answersColleges,
      //   'answersCourses' => $answersCourses,
      //   'answersModules' => $answersModules,
      //   'answersGenerals' => $answersGenerals,
      //   'qid' => $qid,
      //   'type' => $type
      // ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($type, $id)
    {
      if ($type === "questions_generals"){
          $questionsGeneral = questionsGeneral::findOrFail($id);

          return view('user.answers.create')->with([
            'id' => $id,
            'type' => $type,
            'questionsGeneral' => $questionsGeneral
          ]);

      }else if($type === "questions_colleges"){
          $questionsCollege = questionsCollege::findOrFail($id);

          return view('user.answers.create')->with([
            'id' => $id,
            'type' => $type,
            'questionsCollege' => $questionsCollege
          ]);

      }else if($type === "questions_courses"){
          $questionsCourse = questionsCourse::findOrFail($id);

          return view('user.answers.create')->with([
            'id' => $id,
            'type' => $type,
            'questionsCourse' => $questionsCourse
          ]);
      }else{
          $questionsModule = questionsModule::findOrFail($id);

          return view('user.answers.create')->with([
            'id' => $id,
            'type' => $type,
            'questionsModule' => $questionsModule
          ]);
      }
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
        $answer = new AnswersCourse();

        $answer->answer = $request->input('answer');
        $answer->question_id = $id;
        $answer->type = $type;
        $answer->student_id = Auth::user()->student->id;

        $answer->save();
      }else if($type === "questions_modules"){
        $answer = new AnswersModule();

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
     public function showGeneral($id)
     {
         $answersGeneral = AnswersGeneral::findOrFail($id);

         return view('user.answers.showGeneral')->with([
           'answersGeneral' => $answersGeneral
         ]);
     }

    public function showCollege($id)
    {
        $answersCollege = AnswersCollege::findOrFail($id);

        return view('user.answers.showCollege')->with([
          'answersCollege' => $answersCollege
        ]);
    }

    public function showCourse($id)
    {
        $answersCourse = AnswersCourse::findOrFail($id);

        return view('user.answers.showCourse')->with([
          'answersCourse' => $answersCourse
        ]);
    }

    public function showModule($id)
    {
        $answersModule = AnswersModule::findOrFail($id);

        return view('user.answers.showModule')->with([
          'answersModule' => $answersModule
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editGeneral($id)
    {
      $answersGeneral = AnswersGeneral::findOrFail($id);

      return view('user.answers.editGeneral')->with([
        'answersGeneral' => $answersGeneral
      ]);
    }

    public function editCollege($id)
    {
      $answersCollege = AnswersCollege::findOrFail($id);

      return view('user.answers.editCollege')->with([
        'answersCollege' => $answersCollege
      ]);
    }

    public function editCourse($id)
    {
      $answersCourse = AnswersCourse::findOrFail($id);

      return view('user.answers.editCourse')->with([
        'answersCourse' => $answersCourse
      ]);
    }

    public function editModule($id)
    {
      $answersModule = AnswersModule::findOrFail($id);

      return view('user.answers.editModule')->with([
        'answersModule' => $answersModule
      ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateGeneral(Request $request, $id)
    {
      $answersGeneral = AnswersGeneral::findOrFail($id);

      $request->validate([
        'answer' => 'required|min:2|max:300',

      ]);

      $answersGeneral->answer = $request->input('answer');
      $answersGeneral->save();

      return redirect()->route('user.answers.showGeneral', $id);

    }

    public function updateCollege(Request $request, $id)
    {
      $answersCollege = AnswersCollege::findOrFail($id);

      $request->validate([
        'answer' => 'required|min:2|max:300',

      ]);

      $answersCollege->answer = $request->input('answer');
      $answersCollege->save();

      return redirect()->route('user.answers.showCollege', $id);

    }
    public function updateCourse(Request $request, $id)
    {
      $answersCourse = AnswersCourse::findOrFail($id);

      $request->validate([
        'answer' => 'required|min:2|max:300',

      ]);

      $answersCourse->answer = $request->input('answer');
      $answersCourse->save();

      return redirect()->route('user.answers.showCourse', $id);

    }
    public function updateModule(Request $request, $id)
    {
      $answersModule = AnswersModule::findOrFail($id);

      $request->validate([
        'answer' => 'required|min:2|max:300',

      ]);

      $answersModule->answer = $request->input('answer');
      $answersModule->save();

      return redirect()->route('user.answers.showModule', $id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyGeneral($type, $id)
    {
       $answersGeneral = AnswersGeneral::findOrFail($id);
       $qId  = $answersGeneral->question_id;
       $qType = $answersGeneral->type;
       $answersGeneral->delete();

       return redirect()->route('user.answers.index',[$qType, $qId]);
    }

    public function destroyCollege($type, $id)
    {
       $answersCollege = AnswersCollege::findOrFail($id);
       $qId  = $answersCollege->question_id;
       $qType = $answersCollege->type;
       $answersCollege->delete();

       return redirect()->route('user.answers.index',[$qType, $qId]);
    }
    public function destroyCourse($type, $id)
    {
       $answersCourse = AnswersCourse::findOrFail($id);
       $qId  = $answersCourse->question_id;
       $qType = $answersCourse->type;
       $answersCourse->delete();

       return redirect()->route('user.answers.index',[$qType, $qId]);
    }
    public function destroyModule($type, $id)
    {
       $answersModule = AnswersModule::findOrFail($id);
       $qId  = $answersModule->question_id;
       $qType = $answersModule->type;
       $answersModule->delete();

       return redirect()->route('user.answers.index',[$qType, $qId]);
    }

    public function voteGeneral($type, $qId, $aId)
     {

       $answersGeneral = AnswersGeneral::findOrFail($aId);
       $userId = Auth::user()->id;

       $query = DB::table('votes_answers_generals')->where('user_id', $userId)
                                                    ->where('answer_id', $aId)
                                                    ->get();
      if(count($query) == 0){

      $voteGeneral = new VotesAnswersGeneral();

      $voteGeneral->answer_id = $aId;
      $voteGeneral->voted = 1;
      $voteGeneral->user_id = Auth::user()->id;
      $voteGeneral->save();

      $answersGeneral->votes += 1;
      $answersGeneral->save();

      return redirect()->route('user.answers.index',[$type, $qId])->with('status','You Voted!');
      }else{

      return redirect()->route('user.answers.index', [$type, $qId])->with('status','You Already Voted.');
      }
     }

     public function voteCollege($type, $qId, $aId)
      {

        $answersCollege = AnswersCollege::findOrFail($aId);
        $userId = Auth::user()->id;

        $query = DB::table('votes_answers_colleges')->where('user_id', $userId)
                                                     ->where('answer_id', $aId)
                                                     ->get();
       if(count($query) == 0){

       $voteCollege = new VotesAnswersCollege();

       $voteCollege->answer_id = $aId;
       $voteCollege->voted = 1;
       $voteCollege->user_id = Auth::user()->id;
       $voteCollege->save();

       $answersCollege->votes += 1;
       $answersCollege->save();

       return redirect()->route('user.answers.index',[$type, $qId])->with('status','You Voted!');
       }else{

       return redirect()->route('user.answers.index', [$type, $qId])->with('status','You Already Voted.');
       }
      }
      public function voteCourse($type, $qId, $aId)
       {

         $answersCourse = AnswersCourse::findOrFail($aId);
         $userId = Auth::user()->id;

         $query = DB::table('votes_answers_courses')->where('user_id', $userId)
                                                      ->where('answer_id', $aId)
                                                      ->get();
        if(count($query) == 0){

        $voteCourse = new VotesAnswersCourse();

        $voteCourse->answer_id = $aId;
        $voteCourse->voted = 1;
        $voteCourse->user_id = Auth::user()->id;
        $voteCourse->save();

        $answersCourse->votes += 1;
        $answersCourse->save();

        return redirect()->route('user.answers.index',[$type, $qId])->with('status','You Voted!');
        }else{

        return redirect()->route('user.answers.index', [$type, $qId])->with('status','You Already Voted.');
        }
       }
       public function voteModule($type, $qId, $aId)
        {

          $answersModule = AnswersModule::findOrFail($aId);
          $userId = Auth::user()->id;

          $query = DB::table('votes_answers_modules')->where('user_id', $userId)
                                                       ->where('answer_id', $aId)
                                                       ->get();
         if(count($query) == 0){

         $voteModule = new VotesAnswersModule();

         $voteModule->answer_id = $aId;
         $voteModule->voted = 1;
         $voteModule->user_id = Auth::user()->id;
         $voteModule->save();

         $answersModule->votes += 1;
         $answersModule->save();

         return redirect()->route('user.answers.index',[$type, $qId])->with('status','You Voted!');
         }else{

         return redirect()->route('user.answers.index', [$type, $qId])->with('status','You Already Voted.');
         }
        }

}
