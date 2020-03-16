@extends('layouts.appUser')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">

      <div class="container questions">
          <div class="row justify-content-center">
              <div class="col-md-12">


                  <div class="card">
                      <div class="card-body">
                          <table id="table-questions" class="table table-hover">
                            <tbody>
                                @if ($type === "questions_colleges")
                                    <div class="sideBar float-left" style="margin-right:1em; height:75px">
                                      <form style="display:inline-block" method="POST" action="{{route('user.questions.voteCollege',$questionsCollege->id)}}" class="float-right">
                                        <input type="hidden" name="_method" value="PUT">
                                         <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                           <button type="submit" class="form-control btn btn-sm"><i class="fas fa-thumbs-up" style="margin-right:0.2em;"></i>{{$questionsCollege->votes}}</a>
                                     </form>
                                    </div>
                               @elseif ($type === "questions_courses")
                                   <div class="sideBar float-left" style="margin-right:1em; height:75px">
                                     <form style="display:inline-block" method="POST" action="{{route('user.questions.voteCourse',$questionsCourse->id)}}" class="float-right">
                                       <input type="hidden" name="_method" value="PUT">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                          <button type="submit" class="form-control btn btn-sm"><i class="fas fa-thumbs-up" style="margin-right:0.2em;"></i>{{$questionsCourse->votes}}</a>
                                    </form>
                                   </div>
                              @elseif($type === "questions_modules")
                                   <div class="sideBar float-left" style="margin-right:1em; height:75px">
                                     <form style="display:inline-block" method="POST" action="{{route('user.questions.voteModule',$questionsModule->id)}}" class="float-right">
                                       <input type="hidden" name="_method" value="PUT">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                          <button type="submit" class="form-control btn btn-sm"><i class="fas fa-thumbs-up" style="margin-right:0.2em;"></i>{{$questionsModule->votes}}</a>
                                    </form>
                                   </div>
                                   @elseif($type === "questions_generals")
                                   <div class="sideBar float-left" style="margin-right:1em; height:75px">
                                     <form style="display:inline-block" method="POST" action="{{route('user.questions.voteGeneral',$questionsGeneral->id)}}" class="float-right">
                                       <input type="hidden" name="_method" value="PUT">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                          <button type="submit" class="form-control btn btn-sm"><i class="fas fa-thumbs-up" style="margin-right:0.2em;"></i>{{$questionsGeneral->votes}}</a>
                                    </form>
                                   </div>
                                   @endif
                                    <div class="content">
                                      <h7><b>
                                        @if ($type === "questions_colleges")
                                        {{$questionsCollege->college->name}}
                                        @elseif ($type === "questions_courses")
                                        {{$questionsCourse->course->course_name}}
                                        @elseif ($type === "questions_modules")
                                        {{$questionsModule->module->module_name}}
                                        @elseif ($type === "questions_generals")
                                        General
                                        @endif

                                      @if ($type === "questions_generals")
                                      </b></h7> ·
                                      <h7>Posted by: <a href="{{ route('user.profile', $questionsGeneral->student->user->name) }}">
                                        {{ $questionsGeneral->student->user->name }}</a></h7> · {{ substr($questionsGeneral->created_at,'0','10')}}
                                        <h7><a href="{{ route('user.answers.create', ['type' => $questionsGeneral->getTable(), 'id' => $questionsGeneral->id])}}"
                                           class="float-right">Answer</a>
                                      @elseif ($type === "questions_colleges")
                                    </b></h7> ·
                                    <h7>Posted by: <a href="{{ route('user.profile', $questionsCollege->student->user->name) }}">
                                      {{ $questionsCollege->student->user->name }}</a></h7> · {{ substr($questionsCollege->created_at,'0','10')}}
                                      <h7><a href="{{ route('user.answers.create', ['type' => $questionsCollege->getTable(), 'id' => $questionsCollege->id])}}"
                                         class="float-right">Answer</a>
                                      @elseif ($type === "questions_courses")
                                      </b></h7> ·
                                      <h7>Posted by: <a href="{{ route('user.profile', $questionsCourse->student->user->name) }}">
                                        {{ $questionsCourse->student->user->name }}</a></h7> · {{ substr($questionsCourse->created_at,'0','10')}}
                                        <h7><a href="{{ route('user.answers.create', ['type' => $questionsCourse->getTable(), 'id' => $questionsCourse->id])}}"
                                           class="float-right">Answer</a>
                                      @elseif ($type === "questions_modules")
                                    </b></h7> ·
                                    <h7>Posted by: <a href="{{ route('user.profile', $questionsModule->student->user->name) }}">
                                      {{ $questionsModule->student->user->name }}</a></h7> · {{ substr($questionsModule->created_at,'0','10')}}
                                      <h7><a href="{{ route('user.answers.create', ['type' => $questionsModule->getTable(), 'id' => $questionsModule->id])}}"
                                         class="float-right">Answer</a>
                                     @endif


                                      @if ($type === "questions_colleges")
                                      <h2 style="margin-top:0.2em;">{{ $questionsCollege->title }}</h2>
                                      <p>{{ $questionsCollege->info }}</p>
                                      @elseif ($type === "questions_courses")
                                      <h2 style="margin-top:0.2em;">{{ $questionsCourse->title }}</h2>
                                      <p>{{ $questionsCourse->info }}</p>
                                      @elseif ($type === "questions_modules")
                                      <h2 style="margin-top:0.2em;">{{ $questionsModule->title }}</h2>
                                      <p>{{ $questionsModule->info }}</p>
                                      @elseif ($type === "questions_generals")
                                      <h2 style="margin-top:0.2em;">{{ $questionsGeneral->title }}</h2>
                                      <p>{{ $questionsGeneral->info }}</p>
                                      @endif

                                   </div>
                            </tbody>
                          </table>
                      </div>
                  </div>

                  <div class="card" style="margin-top:20px;">
                    <div class="card-header">
                      Answers

                      <div class="float-right">
                        @if($type === "questions_generals")
                        <form id="print" method="POST" action="{{route('user.answers.sort', ['type' => $questionsGeneral->getTable(), 'id' => $questionsGeneral->id])}}">
                         {{ csrf_field() }}
                         <div class="input-field">
                             <select name="orderBy" onchange="this.form.submit()">
                                 <option value="" disabled selected>Order by</option>
                                 <option value="votes desc">Popularity</option>
                                 <option value="created_at asc">Newest to Oldest</option>
                                 <option value="created_at desc">Oldest to Newest</option>
                             </select>

                          </div>
                        </form>
                        @elseif($type === "questions_colleges")
                        <form id="print" method="POST" action="{{route('user.answers.sort', ['type' => $questionsCollege->getTable(), 'id' => $questionsCollege->id])}}">
                         {{ csrf_field() }}
                         <div class="input-field">
                             <select name="orderBy" onchange="this.form.submit()">
                                 <option value="" disabled selected>Order by</option>
                                 <option value="votes desc">Popularity</option>
                                 <option value="created_at asc">Newest to Oldest</option>
                                 <option value="created_at desc">Oldest to Newest</option>
                             </select>

                          </div>
                        </form>
                        @elseif($type === "questions_courses")
                        <form id="print" method="POST" action="{{route('user.answers.sort', ['type' => $questionsCourse->getTable(), 'id' => $questionsCourse->id])}}">
                         {{ csrf_field() }}
                         <div class="input-field">
                             <select name="orderBy" onchange="this.form.submit()">
                                 <option value="" disabled selected>Order by</option>
                                 <option value="votes desc">Popularity</option>
                                 <option value="created_at asc">Newest to Oldest</option>
                                 <option value="created_at desc">Oldest to Newest</option>
                             </select>

                          </div>
                        </form>
                        @elseif($type === "questions_modules")
                        <form id="print" method="POST" action="{{route('user.answers.sort', ['type' => $questionsModule->getTable(), 'id' => $questionsModule->id])}}">
                         {{ csrf_field() }}
                         <div class="input-field">
                             <select name="orderBy" onchange="this.form.submit()">
                                 <option value="" disabled selected>Order by</option>
                                 <option value="votes desc">Popularity</option>
                                 <option value="created_at asc">Newest to Oldest</option>
                                 <option value="created_at desc">Oldest to Newest</option>
                             </select>

                          </div>
                        </form>
                        @endif
                      </div>

                    </div>
                    <div class="card-body">
                      @if (count($answersColleges) === 0 && (count($answersCourses) === 0) && (count($answersModules) === 0) && (count($answersGenerals) === 0))
                      <p> There are no answers</p>
                      @else
                      <!-- college answer -->
                      @foreach ($answersColleges as $answersCollege)
                      @if($answersCollege->question_id === $qid && $answersCollege->type === $type)
                      <div class="card">
                          <div class="card-body">
                              <table id="table-questions" class="table table-hover">
                                <tbody>
                                        <div class="sideBar float-left" style="margin-right:1em; height:75px">
                                          <form style="display:inline-block" method="POST" action="{{route('user.answers.voteCollege', [$questionsCollege->getTable(), $questionsCollege->id, $answersCollege->id])}}" class="float-right">
                                            <input type="hidden" name="_method" value="PUT">
                                             <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                               <button type="submit" class="form-control btn btn-sm"><i class="fas fa-thumbs-up" style="margin-right:0.2em;"></i>{{$answersCollege->votes}}</a>
                                         </form>
                                        </div>
                                        <div class="content">
                                          <h7>Posted by: <a href="{{ route('user.profile', $questionsCollege->student->user->name) }}">{{ $answersCollege->student->user->name }}</a></h7> · {{ substr($answersCollege->created_at,'0','10') }}
                                          <h7 class="float-right">
                                            @if($answersCollege->student_id === Auth::user()->student->id)
                                            <a href="{{ route('user.answers.editCollege', $answersCollege->id )}}" class="btn">Edit</a>
                                            <form style="display:inline-block" method="POST" action="{{route('user.answers.destroyCollege',  [$answersCollege->getTable(), $answersCollege->id])}}">
                                               <input type="hidden" name="_method" value="PUT">
                                               <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <button type="submit">Delete</button></a>
                                           </form>
                                            @endif
                                          </h7>

                                          <p style="margin-top:15px;">{{ $answersCollege->answer }}</p>

                                       </div>
                                </tbody>
                              </table>
                          </div>
                      </div>
                      @endif
                      @endforeach
                      <!-- course answer -->
                      @foreach ($answersCourses as $answersCourse)
                      @if($answersCourse->question_id === $qid && $answersCourse->type === $type)
                      <div class="card">
                          <div class="card-body">
                              <table id="table-questions" class="table table-hover">
                                <tbody>
                                        <div class="sideBar float-left" style="margin-right:1em; height:75px">
                                          <form style="display:inline-block" method="POST" action="{{route('user.answers.voteCourse', [$questionsCourse->getTable(), $questionsCourse->id, $answersCourse->id])}}" class="float-right">
                                            <input type="hidden" name="_method" value="PUT">
                                             <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                               <button type="submit" class="form-control btn btn-sm"><i class="fas fa-thumbs-up" style="margin-right:0.2em;"></i>{{$answersCourse->votes}}</a>
                                         </form>
                                        </div>
                                        <div class="content">
                                          <h7>Posted by: <a href="{{ route('user.profile', $questionsCourse->student->user->name) }}">{{ $answersCourse->student->user->name }}</a></h7> · {{ substr($answersCourse->created_at,'0','10') }}
                                          <h7 class="float-right">
                                            @if($answersCourse->student_id === Auth::user()->student->id)
                                            <a href="{{ route('user.answers.editCourse', $answersCourse->id )}}" class="btn">Edit</a>
                                            <form style="display:inline-block" method="POST" action="{{route('user.answers.destroyCourse',  [$answersCourse->getTable(), $answersCourse->id])}}">
                                               <input type="hidden" name="_method" value="PUT">
                                               <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <button type="submit">Delete</button></a>
                                           </form>
                                            @endif
                                          </h7>

                                          <p style="margin-top:15px;">{{ $answersCourse->answer }}</p>

                                       </div>
                                </tbody>
                              </table>
                          </div>
                      </div>
                      @endif
                      @endforeach
                      <!-- module answer -->
                      @foreach ($answersModules as $answersModule)
                      @if($answersModule->question_id === $qid && $answersModule->type === $type)
                      <div class="card">
                          <div class="card-body">
                              <table id="table-questions" class="table table-hover">
                                <tbody>
                                        <div class="sideBar float-left" style="margin-right:1em; height:75px">
                                          <form style="display:inline-block" method="POST" action="{{route('user.answers.voteModule', [$questionsModule->getTable(), $questionsModule->id, $answersModule->id])}}" class="float-right">
                                            <input type="hidden" name="_method" value="PUT">
                                             <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                               <button type="submit" class="form-control btn btn-sm"><i class="fas fa-thumbs-up" style="margin-right:0.2em;"></i>{{$answersModule->votes}}</a>
                                         </form>
                                        </div>
                                        <div class="content">
                                          <h7>Posted by: <a href="{{ route('user.profile', $questionsModule->student->user->name) }}">{{ $answersModule->student->user->name }}</a></h7> · {{ substr($answersModule->created_at,'0','10') }}
                                          <h7 class="float-right">
                                            @if($answersModule->student_id === Auth::user()->student->id)
                                            <a href="{{ route('user.answers.editModule', $answersModule->id )}}" class="btn">Edit</a>
                                            <form style="display:inline-block" method="POST" action="{{route('user.answers.destroyModule',  [$answersModule->getTable(), $answersModule->id])}}">
                                               <input type="hidden" name="_method" value="PUT">
                                               <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <button type="submit">Delete</button></a>
                                           </form>
                                            @endif
                                          </h7>

                                          <p style="margin-top:15px;">{{ $answersModule->answer }}</p>

                                       </div>
                                </tbody>
                              </table>
                          </div>
                      </div>
                      @endif
                      @endforeach

                      <!-- general answer -->
                      @foreach ($answersGenerals as $answersGeneral)
                      @if($answersGeneral->question_id === $qid && $answersGeneral->type === $type)
                      <div class="card">
                          <div class="card-body">
                              <table id="table-questions" class="table table-hover">
                                <tbody>
                                        <div class="sideBar float-left" style="margin-right:1em; height:75px">
                                          <form style="display:inline-block" method="POST" action="{{route('user.answers.voteGeneral', [$questionsGeneral->getTable(), $questionsGeneral->id, $answersGeneral->id])}}" class="float-right">
                                            <input type="hidden" name="_method" value="PUT">
                                             <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                               <button type="submit" class="form-control btn btn-sm"><i class="fas fa-thumbs-up" style="margin-right:0.2em;"></i>{{$answersGeneral->votes}}</a>
                                         </form>
                                        </div>
                                        <div class="content">
                                          <h7>Posted by: <a href="{{ route('user.profile', $questionsGeneral->student->user->name) }}">{{ $answersGeneral->student->user->name }}</a></h7> · {{ substr($answersGeneral->created_at,'0','10') }}
                                          <h7 class="float-right">
                                            @if($answersGeneral->student_id === Auth::user()->student->id)
                                            <a href="{{ route('user.answers.editGeneral', $answersGeneral->id )}}" class="btn">Edit</a>
                                            <form style="display:inline-block" method="POST" action="{{route('user.answers.destroyGeneral',  [$answersGeneral->getTable(), $answersGeneral->id])}}">
                                               <input type="hidden" name="_method" value="PUT">
                                               <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <button type="submit">Delete</button></a>
                                           </form>
                                            @endif
                                          </h7>

                                          <p style="margin-top:15px;">{{ $answersGeneral->answer }}</p>

                                       </div>
                                </tbody>
                              </table>
                          </div>
                      </div>
                      @endif
                      @endforeach
                      @endif
                    </div>
                </div>
              </div>
          </div>
      </div>


  </div>
</div>
@endsection
