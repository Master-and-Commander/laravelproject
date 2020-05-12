@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
      <div class = "col-md-12 flag"> hello <h1> hello </h1> </div>

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Hello build</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
