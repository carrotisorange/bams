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
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Service</th>
                                <th scope="col">Price</th>
                                <th scope="col">Description</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($services as $service)
                            <tr>
                                <th scope="row">{{ $service->id }}</th>
                                <td><a href="/service/{{ $service->id }}">{{ $service->service }}</a></td>
                                <td>{{ number_format($service->price, 2) }}</td>
                                <td>{{ $service->description }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

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
