@extends('layouts.appUser')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">@foreach ($modules as $module) @if($module->id === $bid) {{ $module->module_name }} @endif  @endforeach</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                  </br>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
