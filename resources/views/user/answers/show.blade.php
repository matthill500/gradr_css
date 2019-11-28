@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12 col-md-offset-2">
      <div class="card">
        <div class="card-header">
          Answer
        </div>
        <div class="card-body">
          <table class="table table-hover">
            <tbody>
              <tr>
                <td>{{ $answer->answer }}</td>
              </tr>
           </tbody>
         </table>

         <a href="{{ route('user.answers.index', $question->id )}}" class="btn btn-default">Back</a>



        </div>
      </div>
    </div>
  </div>
</div>
@endsection
