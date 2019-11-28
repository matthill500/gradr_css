@extends('layouts.appAdmin')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          My Questions
          <a href="{{route('admin.questions.create')}}" class="btn btn-primary float-right">Add</a>
        </div>
        <div class="card-body">
          @if (count($questions) === 0)
          <p> There are no questions </p>
          @else
          <table id="table-questions" class="table table-hover">
            <thead>
              <th>Title</th>
                <th>Info</th>
           </thead>
           <tbody>
             @foreach ($questions as $question)
             @if($question->user_id === Auth::user()->id)
             <tr data-id="{{$question->id}}">
               <td>{{ substr($question->title,'0','20') }}</td>
               <td>{{ substr($question->info,'0','40') }}</td>
               <td>
                 <a href="{{ route('admin.questions.show', $question->id )}}" class="btn btn-default">View</a>
                 <a href="{{route('admin.questions.edit', $question->id )}}" class="btn btn-warning">Edit</a>
                  <form style="display:inline-block" method="POST" action="{{route('admin.questions.destroy',$question->id)}}">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <button type="submit" class="form-control btn btn-danger">Delete</a>
                 </form>
               </td>

               @endif

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
