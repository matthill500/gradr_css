<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\QuestionsModule;
use App\QuestionsCourse;
use App\QuestionsCollege;
use App\QuestionsGeneral;
use App\User;
use App\Student;
use App\College;
use App\Course;
use App\Module;
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
        $questionsColleges = QuestionsCollege::all();
        $questionsCourses = QuestionsCourse::all();
        $questionsModules = QuestionsModule::all();
        $questionsGenerals = QuestionsGeneral::all();

        $users = User::all();

        return view('user.questions.index')->with([
          'questionsColleges' => $questionsColleges,
          'questionsCourses' => $questionsCourses,
          'questionsModules' => $questionsModules,
          'questionsGenerals' => $questionsGenerals,
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
          $colleges = College::all();
          $courses = Course::all();
          $modules = Module::all();

            return view('user.questions.create')->with([
              'colleges' => $colleges,
              'courses' => $courses,
              'modules' => $modules
            ]);
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
        'category' => 'required|starts_with:co,mo,gen'
      ]);

      $about = $request->input('category');


      if($about === "colleges"){
        $questionsCollege = new QuestionsCollege();
        $questionsCollege->title = $request->input('title');
        $questionsCollege->info = $request->input('info');
        $questionsCollege->college_id = $request->input('college');
        $questionsCollege->student_id = Auth::user()->student->id;

        $questionsCollege->save();
      }else if($about === "courses"){
        $questionsCourse = new QuestionsCourse();
        $questionsCourse->title = $request->input('title');
        $questionsCourse->info = $request->input('info');
        $questionsCourse->course_id = $request->input('course');
        $questionsCourse->student_id = Auth::user()->student->id;

        $questionsCourse->save();
      }else if($about === "modules"){
        $questionsModule = new QuestionsModule();
        $questionsModule->title = $request->input('title');
        $questionsModule->info = $request->input('info');
        $questionsModule->module_id = $request->input('module');
        $questionsModule->student_id = Auth::user()->student->id;

        $questionsModule->save();
      }else if($about === "general"){
        $questionsGeneral = new QuestionsGeneral();
        $questionsGeneral->title = $request->input('title');
        $questionsGeneral->info = $request->input('info');
        $questionsGeneral->student_id = Auth::user()->student->id;

        $questionsGeneral->save();
      }

        return redirect()->route('user.questions.index');
      }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showCollege($id)
    {
      $questionsCollege = QuestionsCollege::findOrFail($id);

      return view('user.questions.showCollege')->with([
        'questionsCollege' => $questionsCollege
      ]);
    }
    public function showCourse($id)
    {
      $questionsCourse = QuestionsCourse::findOrFail($id);

      return view('user.questions.showCourse')->with([
        'questionsCourse' => $questionsCourse
      ]);
    }
    public function showModule($id)
    {
      $questionsModule = QuestionsModule::findOrFail($id);

      return view('user.questions.showModule')->with([
        'questionsModule' => $questionsModule
      ]);
    }
    public function showGeneral($id)
    {
      $questionsGeneral = QuestionsGeneral::findOrFail($id);

      return view('user.questions.showGeneral')->with([
        'questionsGeneral' => $questionsGeneral
      ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editCollege($id)
    {
      $questionsCollege = QuestionsCollege::findOrFail($id);

      return view('user.questions.editCollege')->with([
        'questionsCollege' => $questionsCollege
      ]);
    }

    public function editCourse($id)
    {
      $questionsCourse = QuestionsCourse::findOrFail($id);

      return view('user.questions.editCourse')->with([
        'questionsCourse' => $questionsCourse
      ]);
    }
    public function editModule($id)
    {
      $questionsModule = QuestionsModule::findOrFail($id);

      return view('user.questions.editModule')->with([
        'questionsModule' => $questionsModule
      ]);
    }
    public function editGeneral($id)
    {
      $questionsGeneral = QuestionsGeneral::findOrFail($id);

      return view('user.questions.editGeneral')->with([
        'questionsGeneral' => $questionsGeneral
      ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateCollege(Request $request, $id)
    {
      $questionsCollege = QuestionsCollege::findOrFail($id);

      $request->validate([
        'title' => 'required|max:191',
        'info' => 'required|min:30|max:300',
      ]);

      $questionsCollege->title = $request->input('title');
      $questionsCollege->info = $request->input('info');
      $questionsCollege->save();

      return redirect()->route('user.questions.index');

    }

    public function updateCourse(Request $request, $id)
    {
      $questionsCourse = QuestionsCourse::findOrFail($id);

      $request->validate([
        'title' => 'required|max:191',
        'info' => 'required|min:30|max:300',
      ]);

      $questionsCourse->title = $request->input('title');
      $questionsCourse->info = $request->input('info');
      $questionsCourse->save();

      return redirect()->route('user.questions.index');

    }

    public function updateModule(Request $request, $id)
    {
      $questionsModule = QuestionsModule::findOrFail($id);

      $request->validate([
        'title' => 'required|max:191',
        'info' => 'required|min:30|max:300',
      ]);

      $questionsModule->title = $request->input('title');
      $questionsModule->info = $request->input('info');
      $questionsModule->save();

      return redirect()->route('user.questions.index');

    }

    public function updateGeneral(Request $request, $id)
    {
      $questionsGeneral = QuestionsGeneral::findOrFail($id);

      $request->validate([
        'title' => 'required|max:191',
        'info' => 'required|min:30|max:300',
      ]);

      $questionsGeneral->title = $request->input('title');
      $questionsGeneral->info = $request->input('info');
      $questionsGeneral->save();

      return redirect()->route('user.questions.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     public function requestDeleteCollege($id)
      {
       $questionsCollege = QuestionsCollege::findOrFail($id);

              if($questionsCollege->delete === 0){
                $questionsCollege->delete = 1;
                  $questionsCollege->save();
                  return redirect()->route('user.questions.index')->with('status','Requested to delete!');
              }else if($questionsCollege->delete === 1){
                $questionsCollege->delete = 0;
                $questionsCollege->save();
             return redirect()->route('user.questions.index')->with('status','Request withdrawn!');
               }
      }

      public function requestDeleteCourse($id)
       {
        $questionsCourse = QuestionsCourse::findOrFail($id);

               if($questionsCourse->delete === 0){
                 $questionsCourse->delete = 1;
                   $questionsCourse->save();
                   return redirect()->route('user.questions.index')->with('status','Requested to delete!');
               }else if($questionsCourse->delete === 1){
                 $questionsCourse->delete = 0;
                 $questionsCourse->save();
              return redirect()->route('user.questions.index')->with('status','Request withdrawn!');
                }
       }

       public function requestDeleteModule($id)
        {
         $questionsModule = QuestionsModule::findOrFail($id);

                if($questionsModule->delete === 0){
                  $questionsModule->delete = 1;
                    $questionsModule->save();
                    return redirect()->route('user.questions.index')->with('status','Requested to delete!');
                }else if($questionsModule->delete === 1){
                  $questionsModule->delete = 0;
                  $questionsModule->save();
               return redirect()->route('user.questions.index')->with('status','Request withdrawn!');
                 }
        }

        public function requestDeleteGeneral($id)
         {
          $questionsGeneral = QuestionsGeneral::findOrFail($id);

                 if($questionsGeneral->delete === 0){
                   $questionsGeneral->delete = 1;
                     $questionsGeneral->save();
                     return redirect()->route('user.questions.index')->with('status','Requested to delete!');
                 }else if($questionsGeneral->delete === 1){
                   $questionsGeneral->delete = 0;
                   $questionsGeneral->save();
                return redirect()->route('user.questions.index')->with('status','Request withdrawn!');
                  }
         }


}
