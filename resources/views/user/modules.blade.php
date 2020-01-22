@extends('layouts.appUser')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">@foreach ($courses as $course) @if($course->id === $mid) {{ $course->course_name }} @endif  @endforeach</div>

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
                    <div class="card float-left" style="width: 18rem; margin-left:38px; margin-bottom:18px;">
                      <img src="" height="250px" width="30px" class="card-img-top" src="..." alt="Card image cap">
                      <div class="card-body">
                        <h5 class="card-title">{{ $module->module_name }}</h5>
                        <p class="card-text">Test</p>
                        <a href="{{ route('user.base', $module->id) }}" class="btn btn-primary">Module</a>
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
