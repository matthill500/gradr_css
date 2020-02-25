@extends('layouts.appUser')
<link rel="stylesheet" href="{{ URL::asset('css/createQuestionForm.css') }}" />

@section('content')

  <div class="container">
    <div class="row">
      <div class ="col-md-12 col-md-offset-2">
        <div class="card">
          <div class="card-header">
            Add new question
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
            <form method="POST" action="{{route('user.questions.store')}}">

                <div class="form-group">
                  <input type="hidden" name="_token">
                        {{ csrf_field() }}
                  <label for="title">Question Title</label>
                  <input type="text" class="form-control" id="title" name="title" value="{{old('title')}}"/>
                </div>

                <div class="form-group">
                  <label for="info">Question Body</label>
                  <textarea class="form-control" rows="5" id="info" name="info" value="{{old('info')}}"></textarea>
                </div>


                <div class="form-group">
      				    <label for="category">What is your question related to?</label>
      				    <select name="category" class="form-control" id="category">
      				    	<option value="none">-- select category --</option>
      				    		<option value="colleges">Colleges</option>
                      <option value="courses">Courses</option>
                      <option value="modules">Modules</option>
                      <option value="general">General</option>
      				    </select>
				       </div>

              <div class="form-group" id="college">
    				    <label for="colleges">Which College?</label>
    				    <select name="college" class="form-control">
                  <option value="none">Select</option>
                  @foreach($colleges as $college)
                  <option value="{{$college->id}}" id="collegeValue" {{ (old('college_id') == $college->id) ? "selected" : "" }} >
                    {{$college->name}}
                  </option>
                  @endforeach
    				    </select>
    				 </div>

             <div class="form-group" id="course">
              <label for="courses">Which Course?</label>
              <select name="course" class="form-control">
                <option value="none">Select</option>
                  @foreach($courses as $course)
                  <option value="{{$course->id}}" id="courseValue" {{ (old('course_id') == $course->id) ? "selected" : "" }} >
                    {{$course->course_name}}
                  </option>
                  @endforeach
              </select>
            </div>

           <div class="form-group module" id="module">
            <label for="modules">Which Module?</label>
            <select name="module" class="form-control">
              <option value="none" id="moduleValue">Select</option>
              @foreach($modules as $module)
              <option value="{{$module->id}}" {{ (old('module_id') == $module->id) ? "selected" : "" }} >
                {{$module->module_name}}
              </option>
              @endforeach
            </select>
          </div>









                <a href="{{route('user.questions.index')}}" class="btn btn-link">Cancel</a>
                <button type="submit" class="btn btn-primary float-right">Submit</button>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script type="text/javascript" src="{{ URL::asset('js/createQuestionForm.js') }}"></script>
@endsection
