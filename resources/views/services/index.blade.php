@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="mb-3">
                <form action="/services/search/" method="POST">
                    @csrf
                    <input type="text" class="form-control" name="search" id="exampleFormControlInput1" placeholder="Search for service...">
                    <button type="submit" class="btn btn-primary">Search</button>
                    {{-- <a href="https://kodego.ph/" target="_blank">click me!</a> --}}
                </form>
            </div>
            <div class="card">

                <div class="card-header">{{ __('Services') }}</div>

                <div class="card-body">

                    <p class="text-right">
                        <button type="button" class="btn btn-primary" onclick='window.location.href = "/service"'>Create new service</button>
                    </p>

                    <p>
                        {{ $services->links() }}
                    </p>
                    {{-- <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Service</th>
                                <th scope="col">Price</th>
                                <th scope="col">Description</th>
                                <th scope="col">Image</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($services as $service)
                            <tr>
                                <th scope="row">{{ $service->id }}</th>
                                <td><a href="/service/{{ $service->id }}">{{ $service->service }}</a></td>
                                <td>{{ number_format($service->price, 2) }}</td>
                                <td>{{ $service->description }}</td>
                                <td> <img src="{{ asset('/images/'.$service->image) }}" alt=""> </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table> --}}
                    <div class="container">
                        <div class="row">
                            @foreach ($services as $service)
                            <br><br>
                            <div class="col-md-6">
                                <br><br>
                                <div class="card" style="width: 18rem;">
                                     <a href="/service/{{ $service->id }}"><img class="card-img-top" src="{{ asset('/storage/'.str_replace("public/","",$service->image)) }}" alt="Image of the service"></a>
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $service->service }}</h5>
                                        <p class="card-text">{{$service->description}}</p>
                                        <a class="btn btn-primary" href="/service/{{ $service->id }}">Avail Now</a>
                                    </div>
                                </div>
                            </div>

                            @endforeach

                        </div>
                    </div>

                    @if(session('success'))
                    <h6 class="alert alert-success">
                        {{ session('success') }}
                    </h6>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

