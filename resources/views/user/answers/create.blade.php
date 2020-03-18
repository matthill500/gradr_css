@extends('layouts.appUser')
<link rel="stylesheet" href="{{ URL::asset('css/master.css') }}" />
<link rel="stylesheet" href="{{ URL::asset('css/answer.css') }}" />

@section('content')
  <div class="container">
    <div class="row">
      <div class ="col-md-12 col-md-offset-2">

        <div class="card card-question">
          <div class="card-body">
            @if($type === "questions_colleges")
            <table id="table-questions" class="table table-hover">
              <tbody>
                      <div class="sideBar float-left" style="margin-right:1em; height:75px">
                        <form style="display:inline-block" method="POST" action="{{route('user.questions.voteCollege',$questionsCollege->id)}}" class="float-right">
                          <input type="hidden" name="_method" value="PUT">
                           <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <button type="submit" class="form-control btn btn-sm" style="color: white"><i class="fas fa-thumbs-up" style="margin-right:0.2em; color: white;"></i>{{$questionsCollege->votes}}</a>
                       </form>
                      </div>
                      <div class="content">
                        <h7><b>{{$questionsCollege->college->name}}</b></h7> · <h7>Posted by: <a href="{{ route('user.profile', $questionsCollege->student->user->name) }}">{{ $questionsCollege->student->user->name }}</a></h7> · {{ substr($questionsCollege->created_at,'0','10')}}
                        <h2 style="margin-top:0.2em;">{{ $questionsCollege->title }}</h2>
                        <p>{{ $questionsCollege->info }}</p>
                        <h7 style="margin-left:3.8em;"><a href="{{ route('user.answers.index', ['type' => $questionsCollege->getTable(), 'id' => $questionsCollege->id])}}" > {{$questionsCollege->answers}} Answer(s) </a></h7>
                     </div>
              </tbody>
            </table>
            @elseif($type === "questions_generals")
            <table id="table-questions" class="table table-hover">
              <tbody>
                      <div class="sideBar float-left" style="margin-right:1em; height:75px">
                        <form style="display:inline-block" method="POST" action="{{route('user.questions.voteGeneral',$questionsGeneral->id)}}" class="float-right">
                          <input type="hidden" name="_method" value="PUT">
                           <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <button type="submit" class="form-control btn btn-sm" style="color: white"><i class="fas fa-thumbs-up" style="margin-right:0.2em; color: white;"></i>{{$questionsGeneral->votes}}</a>
                       </form>
                      </div>
                      <div class="content">
                        <h7><b>General</b></h7> · <h7>Posted by: <a href="{{ route('user.profile', $questionsGeneral->student->user->name) }}">{{ $questionsGeneral->student->user->name }}</a></h7> · {{ substr($questionsGeneral->created_at,'0','10')}}
                        <h2 style="margin-top:0.2em;">{{ $questionsGeneral->title }}</h2>
                        <p>{{ $questionsGeneral->info }}</p>
                        <h7 style="margin-left:3.8em;"><a href="{{ route('user.answers.index', ['type' => $questionsGeneral->getTable(), 'id' => $questionsGeneral->id])}}" > {{$questionsGeneral->answers}} Answer(s) </a></h7>
                     </div>
              </tbody>
            </table>
            @elseif($type === "questions_courses")
            <table id="table-questions" class="table table-hover">
              <tbody>
                      <div class="sideBar float-left" style="margin-right:1em; height:75px">
                        <form style="display:inline-block" method="POST" action="{{route('user.questions.voteCourse',$questionsCourse->id)}}" class="float-right submit">
                          <input type="hidden" name="_method" value="PUT">
                           <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <button type="submit" class="form-control btn btn-sm" style="color: white"><i class="fas fa-thumbs-up" style="margin-right:0.2em; color: white;"></i>{{$questionsCourse->votes}}</a>
                       </form>
                      </div>
                      <div class="content">
                        <h7><b>{{$questionsCourse->course->name}}</b></h7> · <h7>Posted by: <a href="{{ route('user.profile', $questionsCourse->student->user->name) }}">{{ $questionsCourse->student->user->name }}</a></h7> · {{ substr($questionsCourse->created_at,'0','10')}}
                        <h2 style="margin-top:0.2em;">{{ $questionsCourse->title }}</h2>
                        <p>{{ $questionsCourse->info }}</p>
                        <h7 style="margin-left:3.8em;"><a href="{{ route('user.answers.index', ['type' => $questionsCourse->getTable(), 'id' => $questionsCourse->id])}}" > {{$questionsCourse->answers}} Answer(s) </a></h7>
                     </div>
              </tbody>
            </table>
            @elseif($type === "questions_modules")
            <table id="table-questions" class="table table-hover">
              <tbody>
                      <div class="sideBar float-left" style="margin-right:1em; height:75px">
                        <form style="display:inline-block" method="POST" action="{{route('user.questions.voteModule',$questionsModule->id)}}" class="float-right">
                          <input type="hidden" name="_method" value="PUT">
                           <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <button type="submit" class="form-control btn btn-sm" style="color: white"><i class="fas fa-thumbs-up" style="margin-right:0.2em; color: white;"></i>{{$questionsModule->votes}}</a>
                       </form>
                      </div>
                      <div class="content">
                        <h7><b>{{$questionsGeneral->module->name}}</b></h7> · <h7>Posted by: <a href="{{ route('user.profile', $questionsModule->student->user->name) }}">{{ $questionsModule->student->user->name }}</a></h7> · {{ substr($questionsModule->created_at,'0','10')}}
                        <h2 style="margin-top:0.2em;">{{ $questionsCourse->title }}</h2>
                        <p>{{ $questionsCourse->info }}</p>
                        <h7 style="margin-left:3.8em;"><a href="{{ route('user.answers.index', ['type' => $questionsModule->getTable(), 'id' => $questionsModule->id])}}" > {{$questionsModule->answers}} Answer(s) </a></h7>
                     </div>
              </tbody>
            </table>
            @endif

          </div>
        </div>

        <div class="card answer card-question">
          <div class="card-header">
            Add new answer
          </div>
          <div class="card-body">
            @if ($errors->any())
            <div class="alert alert-danger">
              <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
            @endif
            <form method="POST" action="{{route('user.answers.store', ['type' => $type, 'id' => $id])}}">
                <div class="form-group">
                  <input type="hidden" name="_token">
                        {{ csrf_field() }}
                  <label for="answer">Answer</label>
                  <textarea class="form-control" rows="5" id="answer" name="answer" value="{{old('answer')}}"></textarea>
                </div>
                <a href="{{route('user.questions.redirect', ['type' => $type, 'id' => $id] )}}" class="btn btn-link">Cancel</a>
                <button type="submit" class="btn submit float-right">Submit</button>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
