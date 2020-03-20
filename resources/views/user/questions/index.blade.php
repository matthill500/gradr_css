@extends('layouts.appUser')
<link rel="stylesheet" href="{{ URL::asset('css/master.css') }}" />
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          My Questions <a href="{{ route('user.questions.create')}}" class="btn submit float-right">Ask Question</a>
        </div>
        <div class="card-body card-body2">
          @if ((count($questionsColleges) === 0) && (count($questionsCourses) === 0) && (count($questionsModules) === 0) && (count($questionsGenerals) === 0))
          <p> There are no questions </p>
          @else
          <table id="table-questions" class="table table-hover">
            <thead>
              <th>Title</th>
                <th class="displayTable">Info</th>
                <th class="displayTable">Category</th>
                <th></th>
           </thead>
           <tbody>
             @foreach ($questionsColleges as $questionsCollege)

             @if($questionsCollege->student_id === Auth::user()->student->id)
             <tr data-id="{{$questionsCollege->id}}">
               <td>{{ substr($questionsCollege->title,'0','20') }}</td>
               <td class="displayTable">{{ substr($questionsCollege->info,'0','40') }}</td>
               <td class="displayTable">{{ substr($questionsCollege->college->name,'0','40') }}</td>
               <td>
                 <a href="{{ route('user.questions.showCollege', $questionsCollege->id )}}" class="btn submit">View</a>
                 <a href="{{ route('user.questions.editCollege', $questionsCollege->id )}}" class="btn submit">Edit</a>

                 <form style="display:inline-block" method="POST" action="{{route('user.questions.requestDeleteCollege',$questionsCollege->id)}}">
                   <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                   @if ($questionsCollege->delete === 0)
                   <button type="submit" class="form-control btn btn-danger reqDelete">Request Delete</a>
                  @else ($questionsCollege->delete === 1)
                  <button type="submit" class="form-control btn btn-danger cancel wReqDelete">Withdraw Delete</a>
                  @endif
                </form>

               </td>
             </tr>
          @endif
          @endforeach

          @foreach ($questionsCourses as $questionsCourse)

          @if($questionsCourse->student_id === Auth::user()->student->id)
          <tr data-id="{{$questionsCourse->id}}">
            <td>{{ substr($questionsCourse->title,'0','20') }}</td>
            <td class="displayTable">{{ substr($questionsCourse->info,'0','40') }}</td>
            <td class="displayTable">{{ substr($questionsCourse->course->course_name,'0','40') }}</td>
            <td>
              <a href="{{ route('user.questions.showCourse', $questionsCourse->id )}}" class="btn submit">View</a>
              <a href="{{ route('user.questions.editCourse', $questionsCourse->id )}}" class="btn submit">Edit</a>

               <form style="display:inline-block" method="POST" action="{{route('user.questions.requestDeleteCourse',$questionsCourse->id)}}">
                <input type="hidden" name="_method" value="PUT">
                 <input type="hidden" name="_token" value="{{ csrf_token() }}">
                @if ($questionsCourse->delete === 0)
                <button type="submit" class="form-control btn cancel reqDelete">Request Delete</a>
               @else ($questionsCourse->delete === 1)
               <button type="submit" class="form-control btn btn-danger wReqDelete">Withdraw Delete</a>
               @endif
             </form>

            </td>
          </tr>
       @endif
       @endforeach

       @foreach ($questionsModules as $questionsModule)

       @if($questionsModule->student_id === Auth::user()->student->id)
       <tr data-id="{{$questionsModule->id}}">
         <td>{{ substr($questionsModule->title,'0','20') }}</td>
         <td class="displayTable">{{ substr($questionsModule->info,'0','40') }}</td>
         <td class="displayTable">{{ substr($questionsModule->module->module_name,'0','40') }}</td>
         <td>
           <a href="{{ route('user.questions.showModule', $questionsModule->id )}}" class="btn submit">View</a>
           <a href="{{ route('user.questions.editModule', $questionsModule->id )}}" class="btn submit">Edit</a>

            <form style="display:inline-block" method="POST" action="{{route('user.questions.requestDeleteModule',$questionsModule->id)}}">
             <input type="hidden" name="_method" value="PUT">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
             @if ($questionsModule->delete === 0)
             <button type="submit" class="form-control btn btn-danger reqDelete">Request Delete</a>
            @else ($questionsModule->delete === 1)
            <button type="submit" class="form-control btn btn-danger wReqDelete">Withdraw Delete</a>
            @endif
          </form>

         </td>
       </tr>
    @endif
    @endforeach

    @foreach ($questionsGenerals as $questionsGeneral)
    @if($questionsGeneral->student_id === Auth::user()->student->id)
    <tr data-id="{{$questionsGeneral->id}}">
      <td>{{ substr($questionsGeneral->title,'0','20') }}</td>
      <td class="displayTable">{{ substr($questionsGeneral->info,'0','40') }}</td>
      <td class="displayTable">General</td>
      <td>
        <a href="{{ route('user.questions.showGeneral', $questionsGeneral->id )}}" class="btn submit">View</a>
        <a href="{{ route('user.questions.editGeneral', $questionsGeneral->id )}}" class="btn submit">Edit</a>

         <form style="display:inline-block" method="POST" action="{{route('user.questions.requestDeleteGeneral',$questionsGeneral->id)}}">
          <input type="hidden" name="_method" value="PUT">
           <input type="hidden" name="_token" value="{{ csrf_token() }}">
          @if ($questionsGeneral->delete === 0)
          <button type="submit" class="form-control btn btn-danger reqDelete">Request Delete</a>
         @else ($questionsGeneral->delete === 1)
         <button type="submit" class="form-control btn btn-danger wReqDelete">Withdraw Delete</a>
         @endif
       </form>

      </td>
    </tr>
 @endif
 @endforeach

      @endif
         </tbody>
         </table>

        </div>
      </div>
    </div>
  </div>
</div>
@endsection
