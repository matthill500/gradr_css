@extends('layouts.appAdmin')
<link rel="stylesheet" href="{{ URL::asset('css/master.css') }}" />
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="card">
        <div class="card-header">
          Course: {{ $course->name }}
        </div>
        <div class="card-body">
        <table class="table table-hover">
          <tbody>

            <tr>
              <td>Course Name</td>
              <td>{{ $course->course_name }}</td>
            </tr>
            <tr>
              <td>Course Code</td>
              <td>{{ $course->course_code }}</td>
            </tr>
            <tr>
              <td>Cao Points</td>
              <td>{{ $course->cao_points }}</td>
            </tr>
            <tr>
              <td>College</td>
              <td>{{ $course->college->name }}</td>
            </tr>

          </tbody>
        </table>

        <a href="{{ route('admin.courses.index') }}" class="btn btn-default">Back</a>
        <a href="{{ route('admin.courses.edit', $course->id) }}" class="btn btn-warning">Edit</a>
        <form style="display:inline-block" method="POST" action ="{{ route('admin.courses.destroy', $course->id) }}">
          <input type="hidden" name="_method" value="DELETE">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <button type="submit" class="form-control btn btn-danger">Delete</a>
      </div>
    </div>
  </div>
</div>
@endsection
