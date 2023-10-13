@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create A new service') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <form action="/service" method="POST">
                        @csrf
                        {{-- CSRF - CROSS SITE REQUEST FORGERY --}}

                   <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Service</label>
                    <input type="text" class="form-control" name="service" value={{ old('service') }}>
                    <br>
                        @error('service')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Price</label>
                    <input type="number" class="form-control" name="price" value={{ old('price') }}>
                    <br>
                        @error('price')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                    <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3">{{ old('description') }}</textarea>
                    <br>
                        @error('description')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                </div>
                <div class="mb-3">
                  <p class="text-right">
                    <button type="button" onclick='window.location.href = "/services"' class="btn btn-danger">Cancel</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
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
