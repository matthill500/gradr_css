@extends('layouts.appAdmin')
<link rel="stylesheet" href="{{ URL::asset('css/master.css') }}" />
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="card">
        <div class="card-header">
          Add new students
        </div>
        <div class="card-body card-body2">
          @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
              <li>{{$error}}</li>
              @endforeach
            </ul>
          </div>
          @endif
          <form method="POST" action="{{route('admin.students.store')}}">
            <input type="hidden" name="_token" value ="{{ csrf_token() }}">

            <div class="form-group">
              <label for="title">Name</label>
              <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}" />
            </div>

            <div class="form-group">
              <label for="phone">Phone</label>
              <input type="text" class="form-control" id="phone" name="phone" value="{{old('phone')}}" />
            </div>

            <div class="form-group">
              <label for="email">Email</label>
              <input type="text" class="form-control" id="email" name="email" value="{{old('email')}}" />
            </div>

            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" class="form-control" id="password" name="password" value="{{old('password')}}" />
            </div>

            <div class="form-group">
              <label for="address">Address</label>
              <input type="text" class="form-control" id="address" name="address" value="{{old('address')}}" />
            </div>
            <br>

            <a href="{{route('admin.students.index')}}" class="btn btn-danger">Cancel</a>
            <button type="submit" class="btn submit float-right">Submit</button>

          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
