@extends('layouts.appUser')

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
            
            {!! Form::open(['route' => ['user.questions.update', $question->id], 'method' => 'POST']) !!}
            {{ csrf_field() }}

              <div class="form-group">
                  {{Form::label('title')}}
                  {{Form::text('title', $question->title, ['class' => 'form-control'])}}
              </div>
              <div class="form-group">
                  {{Form::label('info')}}
                  {{Form::textarea('info', $question->info, ['class' => 'form-control'])}}
              </div>
              {{  Form::submit('Submit',['class'=>'btn btn-primary'])  }}
              {!! Form::close() !!}

          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
