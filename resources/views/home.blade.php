@extends('layouts.app')

@section('content')
<div class="container mt-5 pt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

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
    <div class="container py-4">
    @if (count($moves) > 0)
        <ul class="list-group text-center">
        @foreach ($moves as $move) 
            <li class="list-group-item">I am moving from <mark>{{$move->origin}}</mark> to <mark>{{$move->destination}}</mark> on <small>{{$move->depature}}</small>.</li>
        @endforeach
        </ul>
    @else
        <ul class="list-group">
            <li class="list-group-item">You haven't made any move request.</li>
        </ul>
    @endif
    <p class="text-center pt-3"><img src="/images/truck_loading.png" height="150px" width="60%"></p>
    {{$moves->links()}}
    </div>
</div>
@endsection
