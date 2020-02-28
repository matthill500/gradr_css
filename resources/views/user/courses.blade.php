@extends('layouts.appUser')

<link rel="stylesheet" href="{{ URL::asset('css/courses.css') }}" />

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                <div class="card-header">@foreach ($colleges as $college) @if($college->id === $cid) {{ $college->name }} @endif  @endforeach   <a href="{{ route('user.questions.create')}}" class="btn btn-primary float-right">Ask Question</a></div>



                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                  </br>
                <br />
                  @foreach ($courses as $course)
                  @if($course->college_id === $cid)
                    <div class="card float-left" style="width: 18rem; margin-left:38px; margin-bottom:18px; text-align:center;">
                      <div class="card-body">
                        <h5 class="card-title">{{ $course->course_name }}</h5>
                        <p class="card-text">Course Code: {{ $course->course_code }}<br />CAO Points: {{$course->cao_points}}</p>
                        <a href="{{ route('user.modules', $course->id) }}" class="btn btn-primary">{{$course->course_name}} Modules</a>
                      </div>
                    </div>
                  @endif
                  @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container questions">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">@foreach ($colleges as $college) @if($college->id === $cid) {{ $college->name }} @endif  @endforeach Questions</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table id="table-questions" class="table table-hover">
                      <thead>
                        <th>Question Title</th>
                          <th>Up Votes</th>
                          <th>Category</th>
                          <th>User</th>
                      </thead>
                      <tbody>
                        @foreach ($questionsColleges as $questionsCollege)
                        @if($questionsCollege->college_id === $cid)
                        <tr data-id="{{$questionsCollege->id}}">
                          <td>{{ substr($questionsCollege->title,'0','45') }}</td>
                          <td>{{ $questionsCollege->votes }}</td>
                          <td>{{ substr($questionsCollege->college->name,'0','40') }}</td>
                          <td><a href="{{ route('user.profile', $questionsCollege->student->user->name) }}">{{ $questionsCollege->student->user->name }}</a></td>
                          <td>
                            <a href="{{ route('user.questions.showCollege', $questionsCollege->id )}}" class="btn btn-primary">View</a>

                            <a href="{{ route('user.answers.create', ['type' => $questionsCollege->getTable(), 'id' => $questionsCollege->id])}}" class="btn btn-success">Answer</a>

                            <a href="{{ route('user.answers.index', ['type' => $questionsCollege->getTable(), 'id' => $questionsCollege->id])}}" class="btn btn-Info" style="color:white;">View Answers</a>
                          </td>
                        </tr>
                        @endif
                     @endforeach
                      </tbody>
                    </table>


                  </br>
                <br />

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
