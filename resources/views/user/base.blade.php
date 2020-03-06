@extends('layouts.appUser')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">@foreach ($modules as $module) @if($module->id === $bid) {{ $module->module_name }} @endif  @endforeach Questions

                  <div class="float-right">

                    <form id="print" method="POST" action="{{route('user.questions.sortModule', $module->id)}}">
                     {{ csrf_field() }}
                     <div class="input-field">
                         <select name="orderBy" onchange="this.form.submit()">
                             <option value="" disabled selected>Order by</option>
                             <option value="votes desc">Popularity</option>
                             <option value="created_at desc">Newest to Oldest</option>
                             <option value="created_at asc">Oldest to Newest</option>
                         </select>
                    
                      </div>
                    </form>

                  </div>

                </div>


                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if (count($questionsModules) === 0)
                    <p> There are no questions </p>
                    @else

                    <table id="table-questions" class="table table-hover">
                      <thead>
                        <th>Title</th>
                        <th>Up votes</th>
                        <th>Category</th>
                        <th>User</th>
                        <th>Date</th>
                      </thead>
                      <tbody>
                        @foreach ($questionsModules as $questionsModule)
                        @if($questionsModule->module_id === $bid)
                        <tr data-id="{{$questionsModule->id}}">
                          <td>{{ substr($questionsModule->title,'0','45') }}</td>
                          <td>{{ $questionsModule->votes }}</td>
                          <td>{{ substr($questionsModule->module->module_name,'0','40') }}</td>
                          <td><a href="{{ route('user.profile', $questionsModule->student->user->name) }}">{{ $questionsModule->student->user->name }}</a></td>
                          <td>{{ substr($questionsModule->created_at,'0','10')}}</td>
                          <td>
                            <a href="{{ route('user.questions.showModule', $questionsModule->id )}}" class="btn btn-primary">View</a>

                            <a href="{{ route('user.answers.create', ['type' => $questionsModule->getTable(), 'id' => $questionsModule->id])}}" class="btn btn-success">Answer</a>

                              <a href="{{ route('user.answers.index', ['type' => $questionsModule->getTable(), 'id' => $questionsModule->id])}}" class="btn btn-info" style="color:white;">View Answers</a>
                          </td>
                        </tr>
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
