@extends('layouts.appUser')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12 col-md-offset-2">
      <div class="card">
        <div class="card-header">
          Question: {{$questionsCollege->title}}

          <form style="display:inline-block" method="POST" action="{{route('user.questions.voteCollege',$questionsCollege->id)}}" class="float-right">
            <input type="hidden" name="_method" value="PUT">
             <input type="hidden" name="_token" value="{{ csrf_token() }}">
               <button type="submit" class="form-control btn btn-success btn-sm">Up Vote</a>
               <i class="fas fa-thumbs-up"></i>
         </form>

        </div>
        <div class="card-body">
          <table class="table table-hover">
            <tbody>
              <tr>
                <td>Number of Up Votes</td>
                <td>{{ $questionsCollege->votes }}</td>
              </tr>
              <tr>
                <td>Title</td>
                <td>{{ $questionsCollege->title }}</td>
              </tr>
              <tr>
                <td>Info</td>
                <td>{{ $questionsCollege->info }}</td>
             </tr>
           </tbody>
         </table>

         <a href="{{ route('user.questions.index' )}}" class="btn btn-secondary">My Questions</a>
         <a href="{{ route('user.answers.create', ['type' => $questionsCollege->getTable(), 'id' => $questionsCollege->id])}}" class="btn btn-success">Answer</a>
         <a href="{{ route('user.answers.index', ['type' => $questionsCollege->getTable(), 'id' => $questionsCollege->id])}}" class="btn btn-info" style="color:white;">View Answers</a>

        </div>
      </div>
    </div>
  </div>
</div>
@endsection
