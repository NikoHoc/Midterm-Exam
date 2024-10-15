@extends('base.base')

@section('content')

<div class="container mx-auto px-4 mt-5">
    <h1 class="text-2xl font-bold">List Flights:</h1>
</div>

<div class="container mx-auto px-4 mt-4">
    <div class="grid grid-cols-3 gap-4">
        @foreach ($flights as $flight)
        <div class="card bg-base-100 shadow-xl border-2 border-info">    
            <div class="card-body">
                <h2 class="card-title flex justify-between">
                    <div class="font-bold text-3xl">
                        {{ $flight->flight_code }}
                    </div>
                    <div class="font-medium">
                        {{ $flight->origin}}->{{ $flight->destination}}
                    </div>
                </h2>
                <div class="mt-2">
                    <p>Departure</p>
                    <p class="font-bold">{{ \Carbon\Carbon::parse($flight->departure_time)->format('D, d M Y, h:i') }}</p>
                    <p>Arrived</p>
                    <p class="font-bold">{{ \Carbon\Carbon::parse($flight->arrival_time)->format('D, d M Y, h:i') }}</p>
                </div>
                <div class="flex justify-between mt-2">
                    <div class="">
                        <a href="{{ route('flights.book', $flight->id) }}" class="btn btn-accent">Book Ticket</a>
                    </div>
                    <div class="">
                        <a href="{{ route('flights.tickets', $flight->id) }}" class="btn btn-primary">View Details</a>
                    </div>
                </div>
                {{-- <p class="font-bold">{{ $event->date->format('D, M d Y') }} - {{ $event->start_time->format('h:i A') }}</p>
                <p>{{ $event->venue }}</p>
                <p>Free</p>
                <p>Organizer: {{ $event->organizer->name }}</p>
                <div class="card-actions justify-end">
                    <a href="{{ route('events.show', $event->id) }}" class="btn btn-primary">Details</a>
                </div> --}}
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection