@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Enter Pet Details</div>

                <div class="card-body">

                    <form action="/service/{{ $service->id }}/pet" method="POST">
                        @csrf
                        {{-- CSRF - CROSS SITE REQUEST FORGERY --}}
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Selected Service</label>
                            <input type="text" class="form-control" name="service" value={{ $service->service }} readonly>
                            <input type="hidden" class="form-control" name="service_id" value={{ $service->id }}>
                            <br>
                            @error('service_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                        </div>

                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Pet Name</label>
                            <input type="text" class="form-control" name="name" value={{ old('name') }}>
                            <br>
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Select Pet Category</label>
                            <select class="form-control" name="pet_category_id" id="pet_category_id">
                                <option value="">Select one</option>
                                @foreach ($petCategories as $item)
                                <option value="{{ $item->id }}">{{ $item->type }}</option>
                                @endforeach
                            </select>
                            <br>
                            @error('pet_category_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Date of Death</label>
                           <input type="date" class="form-control" name="date_of_death" value={{ old('date_of_death') }}>
                            <br>
                            @error('date_of_death')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        @if($service->id == 1)
                         <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Funeral Location</label>
                            <select class="form-control" name="location_id" id="location_id">
                                <option value="">Select one</option>
                                @foreach ($funeralLocations as $item)
                                <option value="{{ $item->id }}">{{ $item->address }}</option>
                                @endforeach
                            </select>
                            <br>
                            @error('location_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                        </div>
                        @endif

                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Mode of Payment</label>
                            <select class="form-control" name="mode_of_payment_id" id="mode_of_payment_id">
                                <option value="">Select one</option>
                                @foreach ($modeOfPayments as $item)
                                <option value="{{ $item->id }}">{{ $item->mode_of_payment }}</option>
                                @endforeach
                            </select>
                            <br>
                            @error('mode_of_payment_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                        </div>

                        <div class="mb-3">
                            <p class="text-right">
                                <button type="button" onclick='window.location.href = "/service/{{$service->id}}"'
                                    class="btn btn-danger">Cancel</button>
                                <button type="submit" class="btn btn-primary">Confirm</button>
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
