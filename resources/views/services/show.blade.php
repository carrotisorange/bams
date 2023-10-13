@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $service->service }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                   <div class="card">
                    {{-- <img src="{{ asset('/images/sample.png') }}" class="card-img-top" alt="image of the service"> --}}
                    <div class="card-body">
                        <h5 class="card-title">{{ number_format($service->price, 2) }}</h5>
                        <p class="card-text">{{$service->description}}</p>
                        <a href="#" class="btn btn-primary">Avail</a>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
