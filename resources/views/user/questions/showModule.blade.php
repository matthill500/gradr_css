@extends('layouts.appUser')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12 col-md-offset-2">
      <div class="card">
        <div class="card-header">
          Question: {{$questionsModule->title}}
        </div>
        <div class="card-body">
          <table class="table table-hover">
            <tbody>
              <tr>
                <td>Title</td>
                <td>{{ $questionsModule->title }}</td>
              </tr>
              <tr>
                <td>Info</td>
                <td>{{ $questionsModule->info }}</td>
             </tr>
           </tbody>
         </table>

         <a href="{{ route('user.questions.index' )}}" class="btn btn-default">My Questions</a>
         <a href="{{ route('user.answers.create', ['type' => $questionsModule->getTable(), 'id' => $questionsModule->id])}}" class="btn btn-default">Answer</a>
         <a href="{{ route('user.answers.index', ['type' => $questionsModule->getTable(), 'id' => $questionsModule->id])}}" class="btn btn-default">View Answers</a>

        </div>
      </div>
    </div>
  </div>
</div>
@endsection
