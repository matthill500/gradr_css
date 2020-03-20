@extends('layouts.appAdmin')
<link rel="stylesheet" href="{{ URL::asset('css/master.css') }}" />
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
         Delete Requests
        </div>
        <div class="card-body card-body2">
          @if (count($questionsColleges) === 0 && count($questionsCourses) === 0 && count($questionsModules) === 0 && count($questionsGenerals) === 0 )
          <p> There are no questions to delete </p>
          @else
          <table id="table-questions" class="table table-hover">
            <thead>
              <th>Title</th>
                <th class="displayTable">Info</th>
                <th></th>
           </thead>
           <tbody>
             @foreach ($questionsColleges as $questionsCollege)
             @if ($questionsCollege->delete === 1)
             <tr data-id="{{$questionsCollege->id}}">
               <td>{{ substr($questionsCollege->title,'0','20') }}</td>
               <td class="displayTable">{{ substr($questionsCollege->info,'0','40') }}</td>
               <td>
                 <a href="{{ route('admin.questions.show', $questionsCollege->id )}}" class="btn submit">View</a>
                 <a href="{{route('admin.questions.edit', $questionsCollege->id )}}" class="btn submit">Edit</a>
                  <form style="display:inline-block" method="POST" action="{{route('admin.questions.destroyCollege',$questionsCollege->id)}}">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <button type="submit" class="form-control btn btn-danger" style="margin-top:.6em;">Delete</a>
                 </form>
               </td>
               @endif
             @endforeach

             @foreach ($questionsCourses as $questionsCourse)
             @if ($questionsCourse->delete === 1)
             <tr data-id="{{$questionsCourse->id}}">
               <td>{{ substr($questionsCourse->title,'0','20') }}</td>
               <td class="displayTable">{{ substr($questionsCourse->info,'0','40') }}</td>
               <td>
                 <a href="{{ route('admin.questions.show', $questionsCourse->id )}}" class="btn submit">View</a>
                 <a href="{{route('admin.questions.edit', $questionsCourse->id )}}" class="btn submit">Edit</a>
                  <form style="display:inline-block" method="POST" action="{{route('admin.questions.destroyCourse',$questionsCourse->id)}}">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <button type="submit" class="form-control btn btn-danger" style="margin-top:.6em;">Delete</a>
                 </form>
               </td>
               @endif
             @endforeach

             @foreach ($questionsModules as $questionsModule)
             @if ($questionsModule->delete === 1)
             <tr data-id="{{$questionsModule->id}}">
               <td>{{ substr($questionsModule->title,'0','20') }}</td>
               <td class="displayTable">{{ substr($questionsModule->info,'0','40') }}</td>
               <td>
                 <a href="{{ route('admin.questions.show', $questionsModule->id )}}" class="btn submit">View</a>
                 <a href="{{route('admin.questions.edit', $questionsModule->id )}}" class="btn submit">Edit</a>
                  <form style="display:inline-block" method="POST" action="{{route('admin.questions.destroyModule',$questionsModule->id)}}">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <button type="submit" class="form-control btn btn-danger" style="margin-top:.6em;">Delete</a>
                 </form>
               </td>
               @endif
             @endforeach

             @foreach ($questionsGenerals as $questionsGeneral)

             @if ($questionsGeneral->delete === 1)
             <tr data-id="{{$questionsGeneral->id}}">
               <td>{{ substr($questionsGeneral->title,'0','20') }}</td>
               <td class="displayTable">{{ substr($questionsGeneral->info,'0','40') }}</td>
               <td>
                 <a href="{{ route('admin.questions.show', $questionsGeneral->id )}}" class="btn submit">View</a>
                 <a href="{{route('admin.questions.edit', $questionsGeneral->id )}}" class="btn submit">Edit</a>
                  <form style="display:inline-block" method="POST" action="{{route('admin.questions.destroyGeneral',$questionsGeneral->id)}}">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <button type="submit" class="form-control btn btn-danger" style="margin-top:.6em;">Delete</a>
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
