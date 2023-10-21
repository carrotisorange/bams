@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Date</th>
            <th scope="col">Service</th>
            <th scope="col">Amount</th>
            <th scope="col">Pet</th>
            <th scope="col">Location</th>
            <th scope="col"></th>  
        </tr>
    </thead>
    <tbody>
       @foreach($transactions as $index => $transaction)
        <tr>
            <th scope="row">{{ $index+1 }}</th>
            <td>{{ Carbon\Carbon::parse($transaction->date)->format('M d, Y') }}</td>
            <td>{{ $transaction->service->service }}</td>
            <td>{{ $transaction->amount }}</td>
            <td>{{ $transaction->pet->name }}</td>
            <td>{{ $transaction->location->address }}</td>
             <td><a href="/transaction/{{$transaction->id}}">View</a>  </td>
        </tr>
       @endforeach
    </tbody>
</table>
        </div>
    </div>
</div>
@endsection
