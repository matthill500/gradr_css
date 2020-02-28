@extends('layouts.appUser')

<link rel="stylesheet" href="{{ URL::asset('css/modules.css') }}" />

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">@foreach ($courses as $course) @if($course->id === $mid) {{ $course->course_name }} @endif  @endforeach <a href="{{ route('user.questions.create')}}" class="btn btn-primary float-right">Ask Question</a></div>


                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                  </br>
                <br />
                  @foreach ($modules as $module)
                  @if($module->course_id === $mid)
                    <div class="card float-left" style="width: 18rem; margin-left:38px; margin-bottom:18px; text-align:center;">
                      <div class="card-body">
                        <h5 class="card-title">{{ $module->module_name }}</h5>

                        <a href="{{ route('user.base', $module->id) }}" class="btn btn-primary">{{$module->module_name}} Modules</a>
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
                <div class="card-header">@foreach ($courses as $course) @if($course->id === $mid) {{ $course->course_name }} @endif  @endforeach Questions</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table id="table-questions" class="table table-hover">
                      <thead>
                        <th>Title</th>
                          <th>Up Votes</th>
                          <th>Category</th>
                          <th>User</th>
                      </thead>
                      <tbody>
                        @foreach ($questionsCourses as $questionsCourse)
                        @if($questionsCourse->course_id === $mid)
                        <tr data-id="{{$questionsCourse->id}}">
                          <td>{{ substr($questionsCourse->title,'0','45') }}</td>
                          <td>{{ $questionsCourse->votes }}</td>
                          <td>{{ substr($questionsCourse->course->course_name,'0','40') }}</td>
                          <td><a href="{{ route('user.profile', $questionsCourse->student->user->name) }}">{{ $questionsCourse->student->user->name }}</a></td>
                          <td>
                            <a href="{{ route('user.questions.showCourse', $questionsCourse->id )}}" class="btn btn-primary">View</a>

                            <a href="{{ route('user.answers.create', ['type' => $questionsCourse->getTable(), 'id' => $questionsCourse->id])}}" class="btn btn-success">Answer</a>

                            <a href="{{ route('user.answers.index', ['type' => $questionsCourse->getTable(), 'id' => $questionsCourse->id])}}" class="btn btn-Info" style="color:white;">View Answers</a>
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
