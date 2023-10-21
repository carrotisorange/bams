@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="mb-3">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8">
                            <form id="searchForm" action="/services/search/" method="POST">
                                @csrf
                                <input type="text" class="form-control" name="search" id="exampleFormControlInput1"
                                    placeholder="Search for service...">

                                {{-- <a href="https://kodego.ph/" target="_blank">click me!</a> --}}
                            </form>
                        </div>
                        <div class="col-md-4">
                            <button form="searchForm" type="submit" class="btn btn-primary">Search</button>
                        </div>
                    </div>
                </div>

            </div>
            <p>
                {{ $services->links() }}
                Showing {{ $services->count() }} results...
            </p>
            <div class="card">

                {{-- <div class="card-header">{{ __('Services') }}</div> --}}

                <div class="card-body">
                    @if(Auth::user()->role_id==1)
                    <p class="text-right">
                        <button type="button" class="btn btn-primary" onclick='window.location.href = "/service"'>Create new service</button>
                    </p>
                    @endif


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
                            <div class="col-md-4">
                                <br><br>
                                <div class="card" style="width: 100%; height: 500px">
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

                 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

