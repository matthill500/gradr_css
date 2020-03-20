@extends('layouts.appAdmin')
<link rel="stylesheet" href="{{ URL::asset('css/master.css') }}" />
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="card">
        <div class="card-header">
          College: {{ $college->name }}
        </div>
        <div class="card-body card-body2">
        <table class="table table-hover">
          <tbody>

            <tr>
              <td>Name</td>
              <td>{{ $college->name }}</td>
            </tr>
            <tr>
              <td>Information</td>
              <td>{{ $college->info }}</td>
            </tr>

          </tbody>
        </table>

        <a href="{{ route('admin.colleges.index') }}" class="btn submit">Back</a>
        <a href="{{ route('admin.colleges.edit', $college->id) }}" class="btn submit">Edit</a>
        <form style="display:inline-block" method="POST" action ="{{ route('admin.colleges.destroy', $college->id) }}">
          <input type="hidden" name="_method" value="DELETE">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <button type="submit" class="form-control btn btn-danger">Delete</a>
      </div>
    </div>
  </div>
</div>
@endsection
