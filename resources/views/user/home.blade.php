@extends('layouts.appUser')

<link rel="stylesheet" href="{{ URL::asset('css/dashboard.css') }}" />

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">Dashboard <a href="{{ route('user.questions.create')}}" class="btn submit float-right">Ask Question</a></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                <br />
                  @foreach ($colleges as $college)
                    <div class="float-left" style="width: 14rem; margin-left:38px; margin-bottom:18px;">
                      <a href="{{ route('user.courses', $college->id) }}">
                        <img src="{{asset('storage/img/'.$college->image)}}" height="160px" class="card-img-top" src="..." alt="Card image cap">
                      </a>
                    </div>

                  @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container questions">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">General Questions

                   <div class="float-right">

                     <form id="print" method="POST" action="{{route('user.questions.sortGeneral')}}">
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

                    @if (count($questionsGenerals) === 0)
                    <p> There are no questions </p>
                    @else



                    <table id="table-questions" class="table table-hover">


                      <tbody>
                        @foreach ($questionsGenerals as $questionsGeneral)
                        <div class="card">
                            <div class="card-tbody card-question">
                              <div class="sideBar float-left" style="margin-right:1em; height:75px">
                                <i class="fas fa-thumbs-up" style="margin-right:0.2em;"></i>{{ $questionsGeneral->votes }}
                              </div>
                              <div class="content">
                                <h7><b>General</b></h7> · <h7>Posted by: <a href="{{ route('user.profile', $questionsGeneral->student->user->name) }}">{{ $questionsGeneral->student->user->name }}</a></h7> · {{ substr($questionsGeneral->created_at,'0','10')}}<h7 class="float-right btn submit"><a href="{{ route('user.answers.create', ['type' => $questionsGeneral->getTable(), 'id' => $questionsGeneral->id])}}">Answer</a></h7>
                                <h2 style="margin-top:0.2em;"><a href="{{ route('user.questions.showGeneral', $questionsGeneral->id )}}" >{{ $questionsGeneral->title }}</a></h2>
                                <h7><a href="{{ route('user.answers.index', ['type' => $questionsGeneral->getTable(), 'id' => $questionsGeneral->id])}}" > {{$questionsGeneral->answers}} Answer(s) </a></h7>
                             </div>
                            </div>
                        </div>
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
