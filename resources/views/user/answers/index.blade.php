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
          @if (count($answers) === 0)
          <p> There are no answers</p>
          @else
          <table id="table-answers" class="table table-hover">
            <thead>
                <th>Student Name</th>
                <th>Answers</th>
           </thead>
           <tbody>
             @foreach ($answers as $answer)

             @if($answer->question_id === $qid)
             <tr data-id="{{$answer->id}}">
               <td>{{ $answer->student->user->name }}</td>
               <td>{{ $answer->answer }}</td>
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
