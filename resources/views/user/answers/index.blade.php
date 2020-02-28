@extends('layouts.appUser')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          Question  @if ($type === "questions_generals")<a href="{{ route('user.answers.create', ['type' => $questionsGeneral->getTable(), 'id' => $questionsGeneral->id])}}" class="btn btn-success float-right">Answer</a>
                    @elseif ($type === "questions_colleges")<a href="{{ route('user.answers.create', ['type' => $questionsCollege->getTable(), 'id' => $questionsCollege->id])}}" class="btn btn-success float-right">Answer</a>
                    @elseif ($type === "questions_courses")<a href="{{ route('user.answers.create', ['type' => $questionsCourse->getTable(), 'id' => $questionsCourse->id])}}" class="btn btn-success float-right">Answer</a>
                    @elseif ($type === "questions_modules")<a href="{{ route('user.answers.create', ['type' => $questionsModule->getTable(), 'id' => $questionsModule->id])}}" class="btn btn-success float-right">Answer</a>@endif


        </div>
        <div class="card-body">
          <table class="table table-hover">
            <tbody>
              <tr>
                @if ($type ==="questions_generals")
                <tr>
                  <td>Number of Up Votes</td>
                  <td>{{ $questionsGeneral->votes }}</td>
                </tr>
                  <td>Question Title</td>
                  <td>{{$questionsGeneral->title}}</td>
              </tr>
              <tr>
                <td>Question Body</td>
                <td>{{$questionsGeneral->info}}</td>
             </tr>
             @elseif ($type ==="questions_colleges")
             <tr>
               <td>Number of Up Votes</td>
               <td>{{ $questionsCollege->votes }}</td>
             </tr>
               <td>Question Title</td>
               <td>{{$questionsCollege->title}}</td>
             </tr>
             <tr>
             <td>Question Body</td>
             <td>{{$questionsCollege->info}}</td>
            </tr>
            @elseif ($type ==="questions_courses")
            <tr>
              <td>Number of Up Votes</td>
              <td>{{ $questionsCourse->votes }}</td>
            </tr>
              <td>Question Title</td>
              <td>{{$questionsCourse->title}}</td>
            </tr>
            <tr>
              <td>Question Body</td>
              <td>{{$questionsCourse->info}}</td>
            </tr>
              @elseif ($type === "questions_modules")
            <tr>
             <td>Number of Up Votes</td>
             <td>{{ $questionsModule->votes }}</td>
           </tr>
             <td>Question Title</td>
             <td>{{$questionsModule->title}}</td>
           </tr>
           <tr>
             <td>Question Body</td>
             <td>{{$questionsModule->info}}</td>
          </tr>
          @endif
           </tbody>
         </table>
        </div>
    </div>

      <div class="card" style="margin-top:20px;">
        <div class="card-header">
          Answers
        </div>
        <div class="card-body">
          @if (count($answersColleges) === 0 && (count($answersCourses) === 0) && (count($answersModules) === 0) && (count($answersGenerals) === 0))
          <p> There are no answers</p>
          @else
          <table id="table-answers" class="table table-hover">
            <thead>
                <th>Student Name</th>
                <th>Answers</th>
                <th>Up Votes</th>
           </thead>
           <tbody>

             @foreach ($answersColleges as $answersCollege)
             @if($answersCollege->question_id === $qid && $answersCollege->type === $type)
             <tr data-id="{{$answersCollege->id}}">
               <td><a href="{{ route('user.profile', $answersCollege->student->user->name) }}">{{ $answersCollege->student->user->name }}</a></td>
               <td>{{ $answersCollege->answer }}</td>
               <td>{{ $answersCollege->votes }}</td>
               <td>
                 <a href="{{ route('user.answers.showCollege', $answersCollege->id )}}" class="btn btn-primary">View</a>
                 @if($answersCollege->student_id === Auth::user()->student->id)
                 <a href="{{ route('user.answers.editCollege', $answersCollege->id )}}" class="btn btn-warning">Edit</a>

                 <form style="display:inline-block" method="POST" action="{{route('user.answers.destroyCollege',  [$answersCollege->getTable(), $answersCollege->id])}}">
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <button type="submit" class="form-control btn btn-danger">Delete</a>
                </form>
                 @endif

                 <form style="display:inline-block" method="POST" action="{{route('user.answers.voteCollege', [$questionsCollege->getTable(), $questionsCollege->id, $answersCollege->id])}}">
                   <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <button type="submit" class="form-control btn btn-success" style="width:100px; margin-left:2px;">Up Vote</a>
                      <i class="fas fa-thumbs-up"></i>
                </form>

               </td>
              @endif
             @endforeach

             @foreach ($answersCourses as $answersCourse)
             @if($answersCourse->question_id === $qid && $answersCourse->type === $type)
             <tr data-id="{{$answersCourse->id}}">
               <td><a href="{{ route('user.profile', $answersCourse->student->user->name) }}">{{ $answersCourse->student->user->name }}</a></td>
               <td>{{ $answersCourse->answer }}</td>
               <td>{{ $answersCourse->votes }}</td>
               <td>
                 <a href="{{ route('user.answers.showCourse', $answersCourse->id )}}" class="btn btn-primary">View</a>
                 @if($answersCourse->student_id === Auth::user()->student->id)
                 <a href="{{ route('user.answers.editCourse', $answersCourse->id )}}" class="btn btn-warning">Edit</a>

                 <form style="display:inline-block" method="POST" action="{{route('user.answers.destroyCourse',  [$answersCourse->getTable(), $answersCourse->id])}}">
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <button type="submit" class="form-control btn btn-danger">Delete</a>
                </form>
                 @endif

                 <form style="display:inline-block" method="POST" action="{{route('user.answers.voteCourse', [$questionsCourse->getTable(), $questionsCourse->id, $answersCourse->id])}}">
                   <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <button type="submit" class="form-control btn btn-success" style="width:100px; margin-left:2px;">Up Vote</a>
                      <i class="fas fa-thumbs-up"></i>
                </form>

               </td>
              @endif

             @endforeach

             @foreach ($answersModules as $answersModule)
             @if($answersModule->question_id === $qid && $answersModule->type === $type)
             <tr data-id="{{$answersModule->id}}">
               <td><a href="{{ route('user.profile', $answersModule->student->user->name) }}">{{ $answersModule->student->user->name }}</td>
               <td>{{ $answersModule->answer }}</td>
               <td>{{ $answersModule->votes }}</td>
               <td>
                 <a href="{{ route('user.answers.showModule', $answersModule->id )}}" class="btn btn-primary">View</a>
                 @if($answersModule->student_id === Auth::user()->student->id)
                 <a href="{{ route('user.answers.editModule', $answersModule->id )}}" class="btn btn-warning">Edit</a>

                 <form style="display:inline-block" method="POST" action="{{route('user.answers.destroyModule',  [$answersModule->getTable(), $answersModule->id])}}">
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <button type="submit" class="form-control btn btn-danger">Delete</a>
                </form>
                 @endif

                 <form style="display:inline-block" method="POST" action="{{route('user.answers.voteModule', [$questionsModule->getTable(), $questionsModule->id, $answersModule->id])}}">
                   <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <button type="submit" class="form-control btn btn-success" style="width:100px; margin-left:2px;">Up Vote</a>
                      <i class="fas fa-thumbs-up"></i>
                </form>


               </td>
              @endif
             @endforeach

             @foreach ($answersGenerals as $answersGeneral)
             @if($answersGeneral->question_id === $qid && $answersGeneral->type === $type)
             <tr data-id="{{$answersGeneral->id}}">
               <td><a href="{{ route('user.profile', $answersGeneral->student->user->name) }}">{{ $answersGeneral->student->user->name }}</a></td>
               <td>{{ $answersGeneral->answer }}</td>
               <td>{{ $answersGeneral->votes }}</td>
               <td>

                 <a href="{{ route('user.answers.showGeneral', $answersGeneral->id )}}" class="btn btn-primary">View</a>

                 @if($answersGeneral->student_id === Auth::user()->student->id)
                 <a href="{{ route('user.answers.editGeneral', $answersGeneral->id )}}" class="btn btn-warning">Edit</a>

                 <form style="display:inline-block" method="POST" action="{{route('user.answers.destroyGeneral',  [$answersGeneral->getTable(), $answersGeneral->id])}}">
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <button type="submit" class="form-control btn btn-danger">Delete</a>
                </form>
                 @endif

                 <form style="display:inline-block" method="POST" action="{{route('user.answers.voteGeneral', [$questionsGeneral->getTable(), $questionsGeneral->id, $answersGeneral->id])}}">
                   <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <button type="submit" class="form-control btn btn-success" style="width:100px; margin-left:2px;">Up Vote</a>
                      <i class="fas fa-thumbs-up"></i>
                </form>

               </td>
              @endif
             @endforeach

           </tbody>
         </table>
          @endif
        </div>
    </div>
  </div>
</div>
@endsection
