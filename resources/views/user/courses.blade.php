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
                <div class="card-header">@foreach ($colleges as $college) @if($college->id === $cid) {{ $college->name }} @endif  @endforeach Questions

                  <div class="float-right">

                    <form id="print" method="POST" action="{{route('user.questions.sortCollege', $college->id)}}" target="blank">
                     {{ csrf_field() }}
                     <div class="input-field">
                         <select name="orderBy">
                             <option value="" disabled selected>Order by</option>
                             <option value="votes desc">Popularity</option>
                             <option value="created_at desc">Newest to Oldest</option>
                             <option value="created_at asc">Oldest to Newest</option>
                         </select>
                         <button type="submit" class="btn-flat">Sort</button>
                      </div>
                    </form>

                  </div>

                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if (count($questionsColleges) === 0)
                    <p> There are no questions </p>
                    @else

                    <table id="table-questions" class="table table-hover">
                      <thead>
                        <th>Question Title</th>
                          <th>Up Votes</th>
                          <th>Category</th>
                          <th>User</th>
                          <th>Date</th>
                      </thead>
                      <tbody>
                        @foreach ($questionsColleges as $questionsCollege)
                        @if($questionsCollege->college_id === $cid)
                        <tr data-id="{{$questionsCollege->id}}">
                          <td>{{ substr($questionsCollege->title,'0','45') }}</td>
                          <td>{{ $questionsCollege->votes }}</td>
                          <td>{{ substr($questionsCollege->college->name,'0','40') }}</td>
                          <td><a href="{{ route('user.profile', $questionsCollege->student->user->name) }}">{{ $questionsCollege->student->user->name }}</a></td>
                          <td>{{ substr($questionsCollege->created_at,'0','10')}}</td>
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
                    @endif


                  </br>
                <br />

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
