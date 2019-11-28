@extends('layouts.appAdmin')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12 col-md-offset-2">
      <div class="card">
        <div class="card-header">
          Question: {{$question->title}}
        </div>
        <div class="card-body">
          <table class="table table-hover">
            <tbody>
              <tr>
                <td>Title</td>
                <td>{{ $question->title }}</td>
              </tr>
              <tr>
                <td>Info</td>
                <td>{{ $question->info }}</td>
             </tr>
           </tbody>
         </table>

         <a href="{{ route('admin.questions.index', $question->id )}}" class="btn btn-default">Back</a>
         <a href="{{route('admin.questions.edit', $question->id )}}" class="btn btn-warning">Edit</a>
          <form style="display:inline-block" method="POST" action="{{route('admin.questions.destroy',$question->id)}}">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <button type="submit" class="form-control btn btn-danger">Delete</a>
         </form>

        </div>
      </div>
    </div>
  </div>
</div>
@endsection
