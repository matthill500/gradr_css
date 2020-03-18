@extends('layouts.appAdmin')
<link rel="stylesheet" href="{{ URL::asset('css/master.css') }}" />
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="card">
        <div class="card-header">
          Edit Course
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
          <form method="POST" action="{{route('admin.courses.update', $course->id)}}">

            <input type="hidden" name="_method" value ="PUT">
            <input type="hidden" name="_token">
                {{ csrf_field() }}

            <div class="form-group">
              <label for="title">Course Name</label>
              <input type="text" class="form-control" id="course_name" name="course_name" value="{{old('course_name', $course->course_name)}}" />
            </div>

            <div class="form-group">
              <label for="address">Course Code</label>
              <input type="text" class="form-control" id="course_code" name="course_code" value="{{old('course_code', $course->course_code)}}" />
            </div>

            <div class="form-group">
              <label for="address">Cao Points</label>
              <input type="text" class="form-control" id="cao_points" name="cao_points" value="{{old('cao_points', $course->cao_points)}}" />
            </div>

            <div class="form-group">
              <label for="college">College</label>
              <select name="college_id">
                @foreach($colleges as $college)
                  <option value="{{$college->id}}" {{ (old('college_id', $course->college->id) == $college->id) ? "selected" : "" }} >
                    {{$college->name}}
                  </option>
                @endforeach
              </select>
            </div>

            <a href="{{route('admin.colleges.index')}}" class="btn btn-danger">Cancel</a>
            <button type="submit" class="btn submit float-right">Submit</button>

          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
