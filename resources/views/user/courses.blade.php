@extends('layouts.appUser')
<link rel="stylesheet" href="{{ URL::asset('css/master.css') }}" />
<link rel="stylesheet" href="{{ URL::asset('css/courses.css') }}" />

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                <div class="card-header">@foreach ($colleges as $college) @if($college->id === $cid) {{ $college->name }} @endif  @endforeach   <a href="{{ route('user.questions.create')}}" class="btn submit float-right">Ask Question</a></div>



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
                        <a href="{{ route('user.modules', $course->id) }}" class="btn submit">{{$course->course_name}} Modules</a>
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

                    <form id="print" method="POST" action="{{route('user.questions.sortCollege', $college->id)}}">
                     {{ csrf_field() }}
                     <div class="input-field">
                         <select name="orderBy" onchange="this.form.submit()">
                             <option value="" disabled selected>Order by</option>
                             <option value="votes desc">Popularity</option>
                             <option value="created_at desc">Newest to Oldest</option>
                             <option value="created_at asc">Oldest to Newest</option>
                         </select>

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

                      <tbody>
                        @foreach ($questionsColleges as $questionsCollege)
                        @if($questionsCollege->college_id === $cid)
                        <div class="card">
                            <div class="card-body">
                              <div class="sideBar float-left" style="margin-right:1em; height:75px">
                                <i class="fas fa-thumbs-up" style="margin-right:0.2em;"></i>{{ $questionsCollege->votes }}
                              </div>
                              <div class="content">
                                <h7><b>{{$questionsCollege->college->name}}</b></h7> · <h7>Posted by: <a href="{{ route('user.profile', $questionsCollege->student->user->name) }}">{{ $questionsCollege->student->user->name }}</a></h7> · {{ substr($questionsCollege->created_at,'0','10')}}<h7 class="float-right"><a href="{{ route('user.answers.create', ['type' => $questionsCollege->getTable(), 'id' => $questionsCollege->id])}}">Answer</a></h7>
                                <h2 style="margin-top:0.2em;"><a href="{{ route('user.questions.showCollege', $questionsCollege->id )}}" >{{ $questionsCollege->title }}</a></h2>
                                <h7><a href="{{ route('user.answers.index', ['type' => $questionsCollege->getTable(), 'id' => $questionsCollege->id])}}" > {{$questionsCollege->answers}} Answer(s) </a></h7>
                             </div>
                            </div>
                        </div>
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
