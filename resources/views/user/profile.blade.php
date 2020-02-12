@extends('layouts.appUser')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          Profile <a href="{{ route('user.questions.create')}}" class="btn btn-primary float-right">Edit</a>
        </div>
        <div class="card-body">
          Test
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
