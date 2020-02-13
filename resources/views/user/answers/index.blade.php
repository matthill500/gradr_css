@extends('layouts.appUser')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          Answers
        </div>
        <div class="card-body">
          @if (count($answersColleges) === 0 && (count($answersCourses) === 0) && (count($answersModules) === 0) && (count($questionsGenerals) === 0))
          <p> There are no answers</p>
          @else
          <table id="table-answers" class="table table-hover">
            <thead>
                <th>Student Name</th>
                <th>Answers</th>
           </thead>
           <tbody>

             @foreach ($answersColleges as $answersCollege)
             @if($answersCollege->question_id === $qid && $answersCollege->type === $type)
             <tr data-id="{{$answersCollege->id}}">
               <td>{{ $answersCollege->student->user->name }}</td>
               <td>{{ $answersCollege->answer }}</td>
              @endif
             @endforeach

             @foreach ($answersCourses as $answersCourse)
             @if($answersCourse->question_id === $qid && $answersCourse->type === $type)
             <tr data-id="{{$answersCourse->id}}">
               <td>{{ $answersCourse->student->user->name }}</td>
               <td>{{ $answersCourse->answer }}</td>
              @endif
             @endforeach

             @foreach ($answersModules as $answersModule)
             @if($answersModule->question_id === $qid && $answersModule->type === $type)
             <tr data-id="{{$answersModule->id}}">
               <td>{{ $answersModule->student->user->name }}</td>
               <td>{{ $answersModule->answer }}</td>
              @endif
             @endforeach

             @foreach ($answersGenerals as $answersGeneral)
             @if($answersGeneral->question_id === $qid && $answersGeneral->type === $type)
             <tr data-id="{{$answersGeneral->id}}">
               <td>{{ $answersGeneral->student->user->name }}</td>
               <td>{{ $answersGeneral->answer }}</td>
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
