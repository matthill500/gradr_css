@extends('layouts.appUser')
<link rel="stylesheet" href="{{ URL::asset('css/master.css') }}" />
@section('content')

<link rel="stylesheet" href="{{ URL::asset('css/base.css') }}" />

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">@foreach ($modules as $module) @if($module->id === $bid) {{ $module->module_name }} @endif  @endforeach Questions

                  <div class="float-right">

                    <form id="print" method="POST" action="{{route('user.questions.sortModule', $module->id)}}">
                     {{ csrf_field() }}
                     <div class="input-field">
                         <select name="orderBy" onchange="this.form.submit()" style="width:82px;">
                             <option value="" disabled selected>Order by</option>
                             <option value="votes desc">Popularity</option>
                             <option value="created_at desc">Newest to Oldest</option>
                             <option value="created_at asc">Oldest to Newest</option>
                         </select>
                      </div>
                    </form>
                  </div>
                </div>


                <div class="card-body card-body2">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if (count($questionsModules) === 0)
                    <p> There are no questions </p>
                    @else

                    <table id="table-questions" class="table table-hover">
                      <tbody>
                        @foreach ($questionsModules as $questionsModule)
                        @if($questionsModule->module_id === $bid)
                        <div class="card">
                            <div class="card-tbody card-question">
                              <div class="sideBar float-left" style="margin-right:1em; height:75px">
                                <i class="fas fa-thumbs-up" style="margin-right:0.2em;"></i>{{ $questionsModule->votes }}
                              </div>
                              <div class="content">
                                <h7><b>{{$questionsModule->module->module_name}}</b></h7> · <h7>Posted by: <a href="{{ route('user.profile', $questionsModule->student->user->name) }}">{{ $questionsModule->student->user->name }}</a></h7> · {{ substr($questionsModule->created_at,'0','10')}}<h7 class="float-right btn submit dButton"><a href="{{ route('user.answers.create', ['type' => $questionsModule->getTable(), 'id' => $questionsModule->id])}}">Answer</a></h7>
                                <h2 style="margin-top:0.2em;"><a href="{{ route('user.questions.showModule', $questionsModule->id )}}" >{{ $questionsModule->title }}</a></h2>
                                <h7><a href="{{ route('user.answers.index', ['type' => $questionsModule->getTable(), 'id' => $questionsModule->id])}}" > {{$questionsModule->answers}} Answer(s) </a></h7><h7 class="float-right btn submit mButton"><a href="{{ route('user.answers.create', ['type' => $questionsModule->getTable(), 'id' => $questionsModule->id])}}">Answer</a></h7>
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
