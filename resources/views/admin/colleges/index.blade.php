@extends('layouts.appAdmin')
<link rel="stylesheet" href="{{ URL::asset('css/master.css') }}" />
@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          Colleges
          <a href="{{route('admin.colleges.create')}}" class="btn btn-primary float-right">Add</a>
        </div>
        @if (count($colleges) === 0)
        <p> There are no colleges</p>
        @else
        <table id="table-colleges" class="table table-hover">
          <thead>
            <th>Name</th>
            <th>Address</th>


          </thead>

          <tbody>

            @foreach ($colleges as $college)
              <tr data-id="{{$college->id}}">
                <td>{{ $college->name }}</td>
                <td>{{ $college->address }}</td>


                <td>
                  <a href="{{ route('admin.colleges.show', $college->id) }}" class="btn btn-default" >View</a>
                  <a href="{{ route('admin.colleges.edit', $college->id) }}" class="btn btn-warning" value="edit" >Edit</a>

                  <form style="display:inline-block" method="POST" action ="{{ route('admin.colleges.destroy', $college->id) }}">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div *ngIf="response" class="btn-group">
                    <button type="submit" class="form-control btn btn-danger" onclick="return confirm('WARNING!!(I hope you know what you are doing?) Are you sure you want to delete this college? this will delete all related courses, modules, questions and answers')">Delete</a>
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
