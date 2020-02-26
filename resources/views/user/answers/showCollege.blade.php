@extends('layouts.appUser')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12 col-md-offset-2">
      <div class="card">
        <div class="card-header">
          Answer
        </div>
        <div class="card-body">
          <table class="table table-hover">
            <tbody>
              <tr>
                    User:<a href="{{ route('user.profile', $answersCollege->student->user->name) }}"> {{$answersCollege->student->user->name}}</a>
                    <p style="float:right;">Date: {{$answersCollege->created_at}}</p>

              </tr>
              <th>Answer</th>
              <tr>
                <td>{{$answersCollege->answer}}</td>
              </tr>
           </tbody>
         </table>





        </div>
      </div>
    </div>
  </div>
</div>
@endsection
