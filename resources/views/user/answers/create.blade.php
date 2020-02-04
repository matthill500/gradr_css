@extends('layouts.appUser')

@section('content')
  <div class="container">
    <div class="row">
      <div class ="col-md-12 col-md-offset-2">
        <div class="card">
          <div class="card-header">
            Add new answer
          </div>
          <div class="card-body">
            @if ($errors->any())
            <div class="alert alert-danger">
              <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
            @endif
            <form method="POST" action="{{route('user.answers.store', ['type' => $type, 'id' => $id])}}">
                <div class="form-group">
                  <input type="hidden" name="_token">
                        {{ csrf_field() }}
                  <label for="answer">Answer</label>
                  <textarea class="form-control" rows="5" id="answer" name="answer" value="{{old('answer')}}"></textarea>
                </div>
                <a href="{{route('user.questions.index')}}" class="btn btn-link">Cancel</a>
                <button type="submit" class="btn btn-primary float-right">Submit</button>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
