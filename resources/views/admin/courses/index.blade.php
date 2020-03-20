@extends('layouts.appAdmin')
<link rel="stylesheet" href="{{ URL::asset('css/master.css') }}" />
@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          Courses
          <a href="{{route('admin.courses.create')}}" class="btn submit float-right">Add</a>
        </div>
        <div class="card-body card-body2">
        @if (count($courses) === 0)
        <p> There are no courses</p>
        @else
        <table id="table-courses" class="table table-hover">
          <thead>
            <th>Course Name</th>
            <th>Course Code</th>
            <th>Cao Points</th>
            <th>College</th>
            <th></th>
          </thead>

          <tbody>

            @foreach ($courses as $course)
              <tr data-id="{{$course->id}}">
                <td>{{ $course->course_name }}</td>
                <td>{{ $course->course_code }}</td>
                <td>{{ $course->cao_points }}</td>
                <td>{{ $course->college->name }}</td>


                <td>
                  <a href="{{ route('admin.courses.show', $course->id) }}" class="btn submit" >View</a>
                  <a href="{{ route('admin.courses.edit', $course->id) }}" class="btn submit" value="edit" >Edit</a>

                  <form style="display:inline-block" method="POST" action ="{{ route('admin.courses.destroy', $course->id) }}">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div *ngIf="response" class="btn-group">
                    <button type="submit" class="form-control btn btn-danger" onclick="return confirm('WANRING!!(I hope you know what you are doing?) Are you sure you want to delete this course? this will delete all related modules, questions and answers')">Delete</a>
                    </div>
                  </form>
                </td>
              </tr>

            @endforeach

          </tbody>
        </table>
        @endif
      </div>
      </div>
    </div>
  </div>
</div>
@endsection
