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
                <div class="card-header">General Questions</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table id="table-questions" class="table table-hover">
                      <thead>
                        <th>Title</th>
                          <th>Info</th>
                          <th>Category</th>
                          <th>User</th>
                      </thead>
                      <tbody>
                        @foreach ($questionsGenerals as $questionsGeneral)
                        <tr data-id="{{$questionsGeneral->id}}">
                          <td>{{ substr($questionsGeneral->title,'0','20') }}</td>
                          <td>{{ substr($questionsGeneral->info,'0','40') }}</td>
                          <td>General</td>
                          <td><a href="{{ route('user.profile.name', $questionsGeneral->student->user->name) }}">{{ $questionsGeneral->student->user->name }}</a></td>
                          <td>
                            <a href="{{ route('user.questions.showGeneral', $questionsGeneral->id )}}" class="btn btn-primary">View</a>
                          </td>
                        </tr>
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
