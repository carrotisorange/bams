@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $service->service }}</div>

                <div class="card-body">
                <p class="text-right">
                    <div class="row g-3">
                           <div class="col-sm">
                          <button type="button" class="btn btn-primary" onclick='window.location.href = "/services"'>Back
                            </button>
                        </div>
                        @auth
                        <div class="col-sm">
                          <button type="button" class="btn btn-primary" onclick='window.location.href = "/service/{{ $service->id }}/edit"'>Edit
                            Service</button>
                        </div>
                        <div class="col-sm">
                           <!-- Button trigger modal -->
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Delete Service
                    </button>
                    @endauth

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Service</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Are you sure you want to delete service {{ $service->service }}?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                               <form action="/service/{{ $service->id }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" id="newId"
                                            onclick='window.location.href = "/service/{{ $service->id }}"'>Yes, I'm sure.</button>
                                    </form>
                            </div>
                        </div>
                    </div>
                </div>
                        </div>
                    </div>
                </p>

                   <div class="card">
                    <img src="{{ asset('/storage/'.str_replace("public/","",$service->image)) }}" alt="..." class="img-thumbnail">
                    <div class="card-body">
                        <h5 class="card-title">{{ number_format($service->price, 2) }}</h5>
                        <p class="card-text">{{$service->description}}</p>
                        <a href="#" class="btn btn-primary">Avail</a>
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
