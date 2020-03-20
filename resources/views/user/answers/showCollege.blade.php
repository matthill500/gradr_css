@extends('layouts.appUser')
<link rel="stylesheet" href="{{ URL::asset('css/master.css') }}" />
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12 col-md-offset-2">

      <div class="card">
        <div class="card-header">
          Answer
        </div>
        <div class="card-body card-body2">
          <table class="table table-hover">
            <tbody>
              <tr>
                    User:<a href="{{ route('user.profile', $answersCollege->student->user->name) }}"> {{$answersCollege->student->user->name}}</a>
                    <p style="float:right;">Date: {{$answersCollege->created_at}}</p>

              </tr>
              <th>Answer</th>
              <tr>
                <td>@php echo $answersCollege->answer @endphp</td>
              </tr>
           </tbody>
         </table>





        </div>
      </div>
    </div>
  </div>
</div>
@endsection
