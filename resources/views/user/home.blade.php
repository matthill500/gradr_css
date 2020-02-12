@extends('layouts.appUser')

<link rel="stylesheet" href="{{ URL::asset('css/dashboard.css') }}" />

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Home Page - You are logged in as a Student user! <a href="{{route('user.questions.index')}}">Questions</a>
                  </br>
                <br />
                  @foreach ($colleges as $college)
                    <div class="card float-left" style="width: 18rem; margin-left:38px; margin-bottom:18px;">
                      <img src="{{asset('storage/img/'.$college->image)}}" height="200px" width="15px" class="card-img-top" src="..." alt="Card image cap">
                      <div class="card-body">
                        <h5 class="card-title">{{ $college->name }}</h5>
                        <p class="card-text">{{ $college->info }}</p>
                        <a href="{{ route('user.courses', $college->id) }}" class="btn btn-primary">Courses</a>
                      </div>
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
                      </thead>
                      <tbody>
                        @foreach ($questionsGenerals as $questionsGeneral)
                        @if($questionsGeneral->student_id === Auth::user()->student->id)
                        <tr data-id="{{$questionsGeneral->id}}">
                          <td>{{ substr($questionsGeneral->title,'0','20') }}</td>
                          <td>{{ substr($questionsGeneral->info,'0','40') }}</td>
                          <td>General</td>
                          <td>
                            <a href="{{ route('user.questions.showGeneral', $questionsGeneral->id )}}" class="btn btn-primary">View</a>
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
