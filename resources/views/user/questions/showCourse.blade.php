@extends('layouts.appUser')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12 col-md-offset-2">
      <div class="card">
        <div class="card-header">
          Question: {{$questionsCourse->title}}
        </div>
        <div class="card-body">
          <table class="table table-hover">
            <tbody>
              <tr>
                <td>Title</td>
                <td>{{ $questionsCourse->title }}</td>
              </tr>
              <tr>
                <td>Info</td>
                <td>{{ $questionsCourse->info }}</td>
             </tr>
           </tbody>
         </table>

         <a href="{{ route('user.questions.index' )}}" class="btn btn-default">Back</a>
         <a href="{{ route('user.answers.create', $questionsCourse->id )}}" class="btn btn-default">Answer</a>
         <a href="{{ route('user.answers.index', $questionsCourse->id)}}" class="btn btn-default">View Answers</a>

        </div>
      </div>
    </div>
  </div>
</div>
@endsection
