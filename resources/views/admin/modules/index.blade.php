@extends('layouts.appAdmin')
<link rel="stylesheet" href="{{ URL::asset('css/master.css') }}" />
@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          Modules
          <a href="{{route('admin.modules.create')}}" class="btn submit float-right">Add</a>
        </div>
        @if (count($modules) === 0)
        <p> There are no modules</p>
        @else
        <table id="table-colleges" class="table table-hover">
          <thead>
            <th>Module Name</th>
            <th>Course</th>


          </thead>

          <tbody>

            @foreach ($modules as $module)
              <tr data-id="{{$module->id}}">
                <td>{{ $module->module_name }}</td>
                <td>{{ $module->course->course_name }}</td>


                <td>
                  <a href="{{ route('admin.modules.show', $module->id) }}" class="btn submit" >View</a>
                  <a href="{{ route('admin.modules.edit', $module->id) }}" class="btn submit" value="edit" >Edit</a>

                  <form style="display:inline-block" method="POST" action ="{{ route('admin.modules.destroy', $module->id) }}">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div *ngIf="response" class="btn-group">
                    <button type="submit" class="form-control btn btn-danger" onclick="return confirm('WANRING!!(I hope you know what you are doing?) Are you sure you want to delete this module? this will delete all related questions and answers')">Delete</a>
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
@endsection
