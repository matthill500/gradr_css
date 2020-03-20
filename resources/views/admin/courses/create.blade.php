@extends('layouts.appAdmin')
<link rel="stylesheet" href="{{ URL::asset('css/master.css') }}" />
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="card">
        <div class="card-header">
          Add new Course
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
          <form method="POST" action="{{route('admin.courses.store')}}">
            <input type="hidden" name="_token" value ="{{ csrf_token() }}">

            <div class="form-group">
              <label for="course_name">Course Name</label>
              <input type="text" class="form-control" id="course_name" name="course_name" value="{{old('course_name')}}" />
            </div>

            <div class="form-group">
              <label for="course_code">Course Code</label>
              <input type="text" class="form-control" id="course_code" name="course_code" value="{{old('course_code')}}" />
            </div>

            <div class="form-group">
              <label for="cao_points">Cao Points</label>
              <input type="text" class="form-control" id="cao_points" name="cao_points" value="{{old('cao_points')}}" />
            </div>

            <div class="form-group">
              <label for="college">College</label>
              <select name="college_id">
                @foreach($colleges as $college)
                  <option value="{{$college->id}}" {{ (old('college_id') == $college->id) ? "selected" : "" }} >
                    {{$college->name}}
                  </option>
                @endforeach
              </select>
            </div>
            <br>

            <a href="{{route('admin.colleges.index')}}" class="btn btn-danger">Cancel</a>
            <button type="submit" class="btn submit float-right">Submit</button>

          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
