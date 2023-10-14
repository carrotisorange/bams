@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <button type="button" class="btn btn-primary" onclick='window.location.href = "/service/{{ $service->id }}"'>Back
            </button>
            <br>
            <br>
            <div class="card">

                <div class="card-header">{{ __('Edit service') }}</div>

                <div class="card-body">

                    <form action="/service/{{ $service->id }}/edit" method="POST">
                        @csrf
                        @method('PUT')
                        {{-- CSRF - CROSS SITE REQUEST FORGERY --}}

                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Service</label>
                            <input type="text" class="form-control" name="service" value={{ old('service', $service->service) }}>
                            <br>
                            @error('service')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Price</label>
                            <input type="number" class="form-control" name="price" value={{ old('price', $service->price) }}>
                            <br>
                            @error('price')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                            <textarea class="form-control" name="description" id="exampleFormControlTextarea1"
                                rows="3">{{ old('description', $service->description) }}</textarea>
                            <br>
                            @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <p class="text-right">
                                <button type="button" onclick='window.location.href = "/services"'
                                    class="btn btn-danger">Cancel</button>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </p>
                        </div>
                    </form>
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
@endsection
