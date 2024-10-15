<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use App\Models\Ticket;
use Illuminate\Http\Request;

class FlightController extends Controller
{
    // Route::get('/flights', [FlightController::class, 'index'])->name('flights');
    // Route::get('/flights/tickets/{flight:id}', [FlightController::class, 'showTickets'])->name('flights.tickets');
    // Route::get('/movies/book/{flight:id}', [FlightController::class, 'showBookFlight'])->name('flights.book');

    public function index () {
        $flights = Flight::with('tickets')->get();
        return view('flights.index', [
            'flights' => $flights
        ]);
    }

    public function showTickets ($id) {
        $flight = Flight::find($id);
        $tickets = Ticket::where('flight_id', $id)->get();
        return view('flights.tickets.index', [
            'flight' => $flight,
            'tickets' => $tickets,
        ]);
    }

    public function showBookTicket ($id) {
        $flight = Flight::find($id);
        return view('flights.book.index', [
            'flight' => $flight
        ]);
    }
}
