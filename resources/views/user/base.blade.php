@extends('layouts.appUser')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">@foreach ($modules as $module) @if($module->id === $bid) {{ $module->module_name }} @endif  @endforeach Questions <a href="{{ route('user.questions.create')}}" class="btn btn-primary float-right">Ask Question</a></div>


                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table id="table-questions" class="table table-hover">
                      <thead>
                        <th>Title</th>
                        <th>Info</th>
                        <th>Category</th>
                      </thead>
                      <tbody>
                        @foreach ($questionsModules as $questionsModule)
                        @if($questionsModule->module_id === $bid)
                        <tr data-id="{{$questionsModule->id}}">
                          <td>{{ substr($questionsModule->title,'0','20') }}</td>
                          <td>{{ substr($questionsModule->info,'0','40') }}</td>
                          <td>{{ substr($questionsModule->module->module_name,'0','40') }}</td>
                          <td>
                            <a href="{{ route('user.questions.showModule', $questionsModule->id )}}" class="btn btn-primary">View</a>
                          </td>
                        </tr>
                        @endif
                     @endforeach
                      </tbody>
                    </table>


                  </br>
                <br />

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
