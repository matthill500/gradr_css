@extends('layouts.appAdmin')

@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          Categories
          <a href="{{route('admin.categories.create')}}" class="btn btn-primary float-right">Add</a>
        </div>
        @if (count($categories) === 0)
        <p> There are no categories</p>
        @else
        <table id="table-categories" class="table table-hover">
          <thead>
            <th>Category Name</th>
          </thead>

          <tbody>

            @foreach ($categories as $category)
              <tr data-id="{{$category->id}}">
                <td>{{ $category->category_name }}</td>

                <td>
                  <a href="{{ route('admin.categories.show', $category->id) }}" class="btn btn-default" >View</a>
                  <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-warning" value="edit" >Edit</a>

                  <form style="display:inline-block" method="POST" action ="{{ route('admin.categories.destroy', $category->id) }}">
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
@endsection
