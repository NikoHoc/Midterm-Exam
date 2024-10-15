@extends('base.base')

@section('content')

<div class="container mx-auto px-4 mt-5">
    <div class="border-b-2 flex justify-between">
        <h1 class="text-2xl font-bold">Ticket Detail for {{ $flight->flight_code }}</h1>
        <h1 class="text-2xl font-bold">{{ $flight->tickets->count() }} passengers ● {{ $boarded }} boardings</h1>
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


<div class="container mx-auto px-4 mt-5">
    <h1 class="text-2xl font-bold">Passengers list</h1>
    
    <div class="overflow-x-auto"> 
        <table class="bg-neutral rounded-lg stripe hover"  id="flightTicketsTable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Passenger Name</th>
                    <th>Passenger Phone</th>
                    <th>Seat Number</th>
                    <th>Boarding</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tickets as $ticket)
                <tr>
                    <th>{{ $loop->iteration }}</th>
                    <td>
                        <p>{{ $ticket->passenger_name }}</p>
                    </td>
                    <td>
                        <p>{{ $ticket->passenger_phone }}</p>
                    </td>
                    <td>
                        <p>{{ $ticket->seat_number }}</p>
                    </td>
                    <td>
                        @if( $ticket->is_boarding == true)
                         <p>{{ \Carbon\Carbon::parse($ticket->boarding_time)->format('d-m-Y, h:i') }}</p>
                        @else
                        <form action="{{ url('ticket/board/' . $ticket->id) }}" method="POST" id="delete-form-{{ $ticket->id }}">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-info">Confirm</button>
                        </form>
                        @endif
                    </td>
                    <td>
                        @if($ticket->is_boarding == true)
                        <button disabled class="btn btn-error">Can't delete</button>
                        @else
                        <form action="{{ url('ticket/delete/' . $ticket->id) }}" method="POST" id="delete-form-{{ $ticket->id }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-error">Delete</button>
                        </form>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection

@section('library-js')
<script>
    $(document).ready(function() {
        $('#flightTicketsTable').DataTable({
            language: {
                searchPlaceholder: "Cari Passenger", 
            }
        });
    });
</script>

@endsection
