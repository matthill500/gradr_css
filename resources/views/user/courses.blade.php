@extends('layouts.appUser')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                <div class="card-header">@foreach ($colleges as $college) @if($college->id === $cid) {{ $college->name }} @endif  @endforeach</div>


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
                    <div class="card float-left" style="width: 18rem; margin-left:38px; margin-bottom:18px;">
                      <img src="" height="250px" width="30px" class="card-img-top" src="..." alt="Card image cap">
                      <div class="card-body">
                        <h5 class="card-title">{{ $course->course_name }}</h5>
                        <p class="card-text">Course Code: {{ $course->course_code }}<br />CAO Points: {{$course->cao_points}}</p>
                        <a href="{{ route('user.modules', $course->id) }}" class="btn btn-primary">Modules</a>
                      </div>
                    </div>
                  @endif
                  @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
