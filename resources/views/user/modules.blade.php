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
                <div class="card-header">@foreach ($courses as $course) @if($course->id === $mid) {{ $course->course_name }} @endif  @endforeach Questions

                  <div class="float-right">

                    <form id="print" method="POST" action="{{route('user.questions.sortCourse', $course->id)}}">
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

                    @if (count($questionsCourses) === 0)
                    <p> There are no questions </p>
                    @else

                    <table id="table-questions" class="table table-hover">


                        @foreach ($questionsCourses as $questionsCourse)
                        @if($questionsCourse->course_id === $mid)
                        <div class="card">
                            <div class="card-body">
                              <div class="sideBar float-left" style="margin-right:1em; height:75px">
                                <i class="fas fa-thumbs-up" style="margin-right:0.2em;"></i>{{ $questionsCourse->votes }}
                              </div>
                              <div class="content">
                                <h7><b>{{$questionsCourse->course->course_name}}</b></h7> · <h7>Posted by: <a href="{{ route('user.profile', $questionsCourse->student->user->name) }}">{{ $questionsCourse->student->user->name }}</a></h7> · {{ substr($questionsCourse->created_at,'0','10')}}<h7 class="float-right"><a href="{{ route('user.answers.create', ['type' => $questionsCourse->getTable(), 'id' => $questionsCourse->id])}}">Answer</a></h7>
                                <h2 style="margin-top:0.2em;"><a href="{{ route('user.questions.showCourse', $questionsCourse->id )}}" >{{ $questionsCourse->title }}</a></h2>
                                <h7><a href="{{ route('user.answers.index', ['type' => $questionsCourse->getTable(), 'id' => $questionsCourse->id])}}" > {{$questionsCourse->answers}} Answer(s) </a></h7>
                             </div>
                            </div>
                        </div>
                        @endif
                     @endforeach
                      </tbody>
                    </table>

                    @endif


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
