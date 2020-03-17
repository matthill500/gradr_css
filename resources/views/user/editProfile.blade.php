@extends('layouts.appUser')
<link rel="stylesheet" href="{{ URL::asset('css/master.css') }}" />
<link rel="stylesheet" href="{{ URL::asset('css/imageUpload.css') }}" />

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12 col-md-offset-2">
      <div class="card">
        <div class="card-header">
          Edit Profile
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
          <form method="POST" action="{{route('user.updateProfile', $user->id)}}" enctype="multipart/form-data">

            <input type="hidden" name="_method" value ="PUT">
            <input type="hidden" name="_token">
                {{ csrf_field() }}

            <div class="form-group">
              <label for="bio">Bio</label>
              <input type="text" class="form-control" id="bio" name="bio" value="{{old('bio', $user->bio)}}" />
            </div>

              <label for="address">Image</label>
            <div class="custom-file">
            <input type="file" name="image" class="custom-file-input {{$errors->has('image') ? 'is-invalid' : ''}}" id="image">
            <label class="custom-file-label" for="image">Profile Image</label>
            @if($errors->has('image'))
                <span class="invalid-feedback">
                    {{$errors->first('image')}}
                </span>
            @endif
          </div>
          <div class="imageUpload">
            <a href="{{route('user.home')}}" class="btn btn-danger">Cancel</a>
            <button type="submit" class="btn btn-primary float-right">Submit</button>
          </div>
          </form>


        </div>
      </div>
    </div>
  </div>
</div>
@endsection
