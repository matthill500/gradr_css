@extends('layouts.appUser')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12 col-md-offset-2">
      <div class="card">
        <div class="card-header">
          Question: {{$questionsGeneral->title}}

          <form style="display:inline-block" method="POST" action="{{route('user.questions.voteGeneral',$questionsGeneral->id)}}" class="float-right">

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
                <td>{{ $questionsGeneral->votes }}</td>
              </tr>
              <tr>
                <td>Title</td>
                <td>{{ $questionsGeneral->title }}</td>
              </tr>
              <tr>
                <td>Info</td>
                <td>{{ $questionsGeneral->info }}</td>
             </tr>
           </tbody>
         </table>

         <a href="{{ route('user.questions.index' )}}" class="btn btn-secondary">My Questions</a>
         <a href="{{ route('user.answers.create', ['type' => $questionsGeneral->getTable(), 'id' => $questionsGeneral->id])}}" class="btn btn-success">Answer</a>
         <a href="{{ route('user.answers.index', ['type' => $questionsGeneral->getTable(), 'id' => $questionsGeneral->id])}}" class="btn btn-info" style="color:white;">View Answers</a>

        </div>
      </div>
    </div>
  </div>
</div>
@endsection
