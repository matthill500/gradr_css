@extends('layouts.appAdmin')
<link rel="stylesheet" href="{{ URL::asset('css/master.css') }}" />
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="card">
        <div class="card-header">
          Module: {{ $module->module_name }}
        </div>
        <div class="card-body">
        <table class="table table-hover">
          <tbody>

            <tr>
              <td>Module Name</td>
              <td>{{ $module->module_name }}</td>
            </tr>
            <tr>
              <td>Course Name</td>
              <td>{{ $module->course->course_name }}</td>
            </tr>

          </tbody>
        </table>

        <a href="{{ route('admin.modules.index') }}" class="btn btn-default">Back</a>
        <a href="{{ route('admin.modules.edit', $module->id) }}" class="btn btn-warning">Edit</a>
        <form style="display:inline-block" method="POST" action ="{{ route('admin.modules.destroy', $module->id) }}">
          <input type="hidden" name="_method" value="DELETE">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <button type="submit" class="form-control btn btn-danger">Delete</a>
      </div>
    </div>
  </div>
</div>
@endsection
