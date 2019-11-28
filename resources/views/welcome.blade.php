
    @extends('layouts.app')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Welcome</div>

                <div class="card-body">
                  Welcome to Gradr!! <a href="{{route('admin.questions.index')}}">Questions</a>
                <br> Learn more <a href="{{route('about')}}">About us</a>
                <br> Admin Delete Question <a href="{{route('admin.questions.deleteRequests')}}">requests</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
