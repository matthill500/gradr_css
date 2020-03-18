@extends('layouts.appUser')
<link rel="stylesheet" href="{{ URL::asset('css/master.css') }}" />
<link rel="stylesheet" href="{{ URL::asset('css/answer.css') }}" />

@section('content')
  <div class="container">
    <div class="row">
      <div class ="col-md-12 col-md-offset-2">
        <div class="card">
          <div class="card-header">
            Question
          </div>
          <div class="card-body">
            <table class="table table-hover">
              <tbody>
                <tr>
                  @if ($type ==="questions_generals")
                  <td>Question Title</td>
                  <td>{{$questionsGeneral->title}}</td>
                </tr>
                <tr>
                  <td>Question Body</td>
                  <td>{{$questionsGeneral->info}}</td>
               </tr>
               @elseif ($type ==="questions_colleges")
               <td>Question Title</td>
               <td>{{$questionsCollege->title}}</td>
             </tr>
             <tr>
               <td>Question Body</td>
               <td>{{$questionsCollege->info}}</td>
            </tr>
            @elseif ($type ==="questions_courses")
            <td>Question Title</td>
            <td>{{$questionsCourse->title}}</td>
          </tr>
          <tr>
            <td>Question Body</td>
            <td>{{$questionsCourse->info}}</td>
         </tr>
         @elseif ($type === "questions_modules")
         <td>Question Title</td>
         <td>{{$questionsModule->title}}</td>
       </tr>
       <tr>
         <td>Question Body</td>
         <td>{{$questionsModule->info}}</td>
      </tr>
      @endif
             </tbody>
           </table>
          </div>
        </div>

        <div class="card answer">
          <div class="card-header">
            Add new answer
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
            <form method="POST" action="{{route('user.answers.store', ['type' => $type, 'id' => $id])}}">
                <div class="form-group">
                  <input type="hidden" name="_token">
                        {{ csrf_field() }}
                  <label for="answer">Answer</label>
                  <textarea class="form-control" rows="5" id="answer" name="answer" value="{{old('answer')}}"></textarea>
                </div>
                <a href="{{route('user.questions.redirect', ['type' => $type, 'id' => $id] )}}" class="btn btn-link">Cancel</a>
                <button type="submit" class="btn submit float-right">Submit</button>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
