@extends('layouts.appAdmin')
<link rel="stylesheet" href="{{ URL::asset('css/master.css') }}" />
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="card">
        <div class="card-header">
          Add new College
        </div>
        <div class="card-body">
          @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
              <li>{{$error}}</li>
              @endforeach
            </ul>
          </div>
          @endif
          <form method="POST" action="{{route('admin.modules.store')}}">
            <input type="hidden" name="_token" value ="{{ csrf_token() }}">

            <div class="form-group">
              <label for="name">Module Name</label>
              <input type="text" class="form-control" id="module_name" name="module_name" value="{{old('module_name')}}" />
            </div>

            <div class="form-group">
              <label for="course">Course Name</label>
              <select name="course_id">
                @foreach($courses as $course)
                  <option value="{{$course->id}}" {{ (old('course_id') == $course->id) ? "selected" : "" }} >
                    {{$course->course_name}}
                  </option>
                @endforeach
              </select>
            </div>


            <a href="{{route('admin.modules.index')}}" class="btn btn-danger">Cancel</a>
            <button type="submit" class="btn submit float-right">Submit</button>

          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
