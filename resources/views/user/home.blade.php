@extends('layouts.appUser')

<link rel="stylesheet" href="{{ URL::asset('css/dashboard.css') }}" />

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard <a href="{{ route('user.questions.create')}}" class="btn btn-primary float-right">Ask Question</a></div>


                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif



                <br />
                  @foreach ($colleges as $college)
                    <div class="card float-left" style="width: 14rem; margin-left:38px; margin-bottom:18px;">
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
            <div class="card">
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

                      <thead>
                        <th>Question Title</th>
                          <th>Up Votes</th>
                          <th>Category</th>
                          <th>User</th>
                          <th>Date</th>
                      </thead>
                      <tbody>
                        @foreach ($questionsGenerals as $questionsGeneral)

                        <tr data-id="{{$questionsGeneral->id}}">
                          <td>{{ substr($questionsGeneral->title,'0','50') }}</td>
                          <td>{{ $questionsGeneral->votes }}</td>
                          <td>General</td>
                          <td><a href="{{ route('user.profile', $questionsGeneral->student->user->name) }}">{{ $questionsGeneral->student->user->name }}</a></td>
                          <td>{{ substr($questionsGeneral->created_at,'0','10')}}</td>
                          <td>
                            <a href="{{ route('user.questions.showGeneral', $questionsGeneral->id )}}" class="btn btn-primary">View</a>
                            <a href="{{ route('user.answers.create', ['type' => $questionsGeneral->getTable(), 'id' => $questionsGeneral->id])}}" class="btn btn-success">Answer</a>
                            <a href="{{ route('user.answers.index', ['type' => $questionsGeneral->getTable(), 'id' => $questionsGeneral->id])}}" class="btn btn-Info" style="color:white;">View Answers</a>
                          </td>
                        </tr>
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
