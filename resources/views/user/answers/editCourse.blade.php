@extends('layouts.appUser')
<link rel="stylesheet" href="{{ URL::asset('css/master.css') }}" />
@section('content')
  <div class="container">
    <div class="row">
      <div class ="col-md-12 col-md-offset-2">
        <div class="card">
          <div class="card-header">
            Edit question
          </div>
          <div class="card-body">
            @if ($errors->any())
            <div class="alert alert-danger">
              <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
            @endif

            {!! Form::open(['route' => ['user.answers.updateCourse', $answersCourse->id], 'method' => 'POST']) !!}
            {{ csrf_field() }}

            <div class="form-group">
                {{Form::label('Answer')}}
                {{Form::textarea('answer', $answersCourse->answer, ['class' => 'form-control'])}}
            </div>
              {{  Form::submit('Submit',['class'=>'btn submit'])  }}
              {!! Form::close() !!}

          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
