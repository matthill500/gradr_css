<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\QuestionsModule;
use App\QuestionsCourse;
use App\QuestionsCollege;
use App\User;
use App\Student;
use App\Category;
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

        $users = User::all();

        return view('user.questions.index')->with([
          'questionsColleges' => $questionsColleges,
          'questionsCourses' => $questionsCourses,
          'questionsModules' => $questionsModules,
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
          $categories = Category::all();
          $colleges = College::all();
          $courses = Course::all();
          $modules = Module::all();

            return view('user.questions.create')->with([
              'categories' => $categories,
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
        'category' => 'required|starts_with:co,mo'
      ]);



        $questionsCollege = new QuestionsCollege();
        $questionsCollege->title = $request->input('title');
        $questionsCollege->info = $request->input('info');
        $questionsCollege->college_id = $request->input('college');
        $questionsCollege->student_id = Auth::user()->student->id;

        $questionsCollege->save();
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
