@extends('layouts.appUser')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          Questions <a href="{{ route('user.questions.create')}}" class="btn btn-primary float-right">Add</a>

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
             @if($question->student_id === Auth::user()->student->id)
             <tr data-id="{{$question->id}}">
               <td>{{ substr($question->title,'0','20') }}</td>
               <td>{{ substr($question->info,'0','40') }}</td>
               <td>


                 <a href="{{ route('user.questions.show', $question->id )}}" class="btn btn-primary">View</a>
                 <a href="{{ route('user.questions.edit', $question->id )}}" class="btn btn-warning">Edit</a>

                 <form style="display:inline-block" method="POST" action="{{route('user.questions.requestDelete',$question->id)}}">
                   <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                   @if ($question->delete === 0)
                   <button type="submit" class="form-control btn btn-danger">Request Delete</a>
                  @else ($question->delete === 1)
                  <button type="submit" class="form-control btn btn-danger">Withdraw Request Delete</a>
                 @endif
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
