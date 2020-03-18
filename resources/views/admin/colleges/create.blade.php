@extends('layouts.appAdmin')
<link rel="stylesheet" href="{{ URL::asset('css/master.css') }}" />
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="card">
        <div class="card-header">
          Add new College
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
          <form method="POST" action="{{route('admin.colleges.store')}}" enctype="multipart/form-data">
            <input type="hidden" name="_token" value ="{{ csrf_token() }}">

            <div class="form-group">
              <label for="name">name</label>
              <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}" />
            </div>

            <div class="form-group">
              <label for="info">info</label>
              <input type="text" class="form-control" id="info" name="info" value="{{old('info')}}" />
            </div>

            <div class="form-group">
              <label for="address">address</label>
              <input type="text" class="form-control" id="address" name="address" value="{{old('address')}}" />
            </div>

            <div class="custom-file">
              <label for="address">Image</label>
            <input type="file" name="image" class="custom-file-input {{$errors->has('image') ? 'is-invalid' : ''}}" id="image">
            <label class="custom-file-label" for="image">College Image</label>
            @if($errors->has('image'))
                <span class="invalid-feedback">
                    {{$errors->first('image')}}
                </span>
            @endif
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
