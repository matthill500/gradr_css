
@extends('layouts.app')

<link rel="stylesheet" href="{{ URL::asset('css/welcome.css') }}" />

@section('content')
<div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-12">
          <div class="card-header title">GRADR!</div>
          <div class ="headline-slogan">
          The student to student Learning App!
        </div>
      </div>
        <div class="col-md-12 col-lg-4">
            <div class="card">
                <div class="card-header"><H1>Ask</H1></div>
                <div class="card-body">
                    <p>Ask the questions you need answered.
                      GRADR is the go to place to get clear and concise answer that you need to gain the best grade you can.
                      Aimed for students who need specific questions answered, the app puts you in contact with students who have completed the same modules these questions relate to recently. </p>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-lg-4">
            <div class="card">
                <div class="card-header"><H1>Answer</H1></div>
                <div class="card-body">
                  <p>Express your knowledge. Show the world what you know. Impress potential employers and help out fellow students by answering the questions that you know the answer to.
                   Never forget the knowledge you gained in college. Keep your skills up to date.
                   Helping other people has never been more rewarding.  It’s the best way to revise.</p>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-lg-4">
            <div class="card">
                <div class="card-header"><H1>Progress</H1></div>
                <div class="card-body">
                  <p>By using GRADR you gain the ability to maximize your college results.
                    You will no longer have to trawl the web for the specific answer your looking for.
                    There’s not need to bother the lecturer whose dealing with hundreds of other students.
                    No need not to raise your hand with questions you fear asking in case they are deemed stupid or silly. </p>
              </div>
            </div>
        </div>
    </div>
</div>
@endsection
