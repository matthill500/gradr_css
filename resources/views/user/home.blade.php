@extends('layouts.appUser')

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
@endsection
