<?php

use App\Http\Controllers\FlightController;
use App\Http\Controllers\TicketController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/*
- /flights: untuk menampilkan daftar penerbangan
- /flights/ticket/{flight:id}: untuk menampilkan daftar detail tiket-tiket dari penerbangan tertentu
- /flights/book/{flight:id}: untuk menampilkan form pemesanan tiket pada penerbangan tertentu
- /ticket/submit: untuk memproses pemesanan tiket (menggunakan method POST)
- /ticket/board/{ticket:id}: untuk melakukan boarding penumpang dan mengubah is_boarding menjadi 1 dan boarding_time
    sesuai jam konfirmasi saat button di click (menggunakan method PUT)
- /ticket/delete/{ticket:id}: untuk menghapus tiket tertentu (menggunakan method DELETE)
*/
Route::get('/', function () {
    return redirect('/flights');
});

Route::get('/flights', [FlightController::class, 'index'])->name('flights');
Route::get('/flights/tickets/{flight:id}', [FlightController::class, 'showTickets'])->name('flights.tickets');
Route::get('/movies/book/{flight:id}', [FlightController::class, 'showBookFlight'])->name('flights.book');

Route::post('/ticket/submit', [TicketController::class, 'submitTicket'])->name('ticket.submit');
Route::put('/ticket/board/{ticket:id}', [TicketController::class, 'board'])->name('ticket.board');
Route::delete('/ticket/delete/{ticket:id}', [TicketController::class, 'deleteTicket'])->name('ticket.delete');

