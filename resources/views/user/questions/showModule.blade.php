@extends('layouts.appUser')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12 col-md-offset-2">
      <div class="card">
        <div class="card-header">
          Question: {{$questionsModule->title}}

          <form style="display:inline-block" method="POST" action="" class="float-right">

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
                <td>Title</td>
                <td>{{ $questionsModule->title }}</td>
              </tr>
              <tr>
                <td>Info</td>
                <td>{{ $questionsModule->info }}</td>
             </tr>
           </tbody>
         </table>

         <a href="{{ route('user.questions.index' )}}" class="btn btn-secondary">My Questions</a>
         <a href="{{ route('user.answers.create', ['type' => $questionsModule->getTable(), 'id' => $questionsModule->id])}}" class="btn btn-success">Answer</a>
         <a href="{{ route('user.answers.index', ['type' => $questionsModule->getTable(), 'id' => $questionsModule->id])}}" class="btn btn-info" style="color:white;">View Answers</a>

        </div>
      </div>
    </div>
  </div>
</div>
@endsection
