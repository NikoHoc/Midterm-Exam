@extends('base.base')

@section('content')

<div class="container mx-auto px-4 mt-5">
    <div class="border-b-2 flex justify-between">
        <h1 class="text-2xl font-bold">Ticket Booking for </h1>
        <h1 class="text-2xl font-bold">{{ $flight->flight_code }}</h1>
    </div>
    <div class="flex justify-between">
        <p>{{ $flight->origin }}→{{ $flight->destination }}</p>
        <p>Departure - {{ \Carbon\Carbon::parse($flight->departure_time)->format('D, d M Y, h:i') }}</p>
        <p>Arrived - {{ \Carbon\Carbon::parse($flight->arrival_time)->format('D, d M Y, h:i') }}</p>
    </div>    
</div>

@if (Session::has('message') && Session::get('alert-class') == 'success')
    <div class="alert alert-success mt-4" role="alert">
        {{ Session::get('message') }}
    </div>
@elseif(Session::has('message') && Session::get('alert-class') == 'failed')
    <div class="alert alert-error mt-4" role="alert">
        {{ Session::get('message') }}
    </div>
@endif

<div class="container mx-auto px-4 mt-2">
    <form action="{{ route('ticket.submit', $flight->id) }}" method="POST" class="mt-10">
        @csrf
        <input type="hidden" name="flight_id" value="{{ $flight->id }}">
        <div class="mt-2 flex items-center ">
            <p class="w-40">Passenger Name</p>
            <input required name="passenger_name" type="text" placeholder="Nama Passenger" class="input input-bordered w-full max-w-xs" />
        </div>
        <div class="mt-2 flex items-center ">
            <p class="w-40">Passenger Phone</p>
            <input maxlength="14" required name="passenger_phone" type="text" placeholder="No HP Passenger" class="input input-bordered w-full max-w-xs" />
        </div>
        <div class="mt-2 flex items-center ">
            <p class="w-40">Seat Number</p>
            <input maxlength="3" required name="seat_number" type="text" placeholder="Seat Number" class="input input-bordered w-full max-w-xs" />
        </div>

        <div class="flex justify-end gap-4">
            <a href="{{ route('flights') }}" class="btn btn-error">Cancel</a>
            <button type="submit" class="btn btn-info">Book Ticket</button>
        </div>
    </form>
</div>
@endsection

@section('library-js')

@endsection
