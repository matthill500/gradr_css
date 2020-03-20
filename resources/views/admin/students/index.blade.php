@extends('layouts.appAdmin')
<link rel="stylesheet" href="{{ URL::asset('css/master.css') }}" />
@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          Students
          <a href="{{route('admin.students.create')}}" class="btn submit float-right">Add</a>
        </div>
        <div class="card-body card-body2">
        @if (count($students) === 0)
        <p> There are no students</p>
        @else
        <table id="table-students" class="table table-hover">
          <thead>
            <th>Name</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Address</th>
            <th></th>

          </thead>

          <tbody>

            @foreach ($students as $student)
              <tr data-id="{{$student->user_id}}">
                <td>{{ $student->name }}</td>
                <td>{{ $student->phone }}</td>
                <td>{{ $student->email }}</td>
                <td>{{ $student->address }}</td>


                <td>
                  <a href="{{ route('admin.students.show', $student->id) }}" class="btn submit" >View</a>
                  <a href="{{ route('admin.students.edit', $student->id) }}" class="btn submit" value="edit" >Edit</a>

                  <form style="display:inline-block" method="POST" action ="{{ route('admin.students.destroy', $student->user_id) }}">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div *ngIf="response" class="btn-group">
                    <button type="submit" class="form-control btn btn-danger">Delete</a>
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
