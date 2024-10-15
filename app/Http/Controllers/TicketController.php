<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session as FacadesSession;

class TicketController extends Controller
{
    // Route::post('/ticket/submit', [TicketController::class, 'submitTicket'])->name('ticket.submit');
    // Route::put('/ticket/board/{ticket:id}', [TicketController::class, 'board'])->name('ticket.board');
    // Route::delete('/ticket/delete/{ticket:id}', [TicketController::class, 'deleteTicket'])->name('ticket.delete');

    public function submitTicket (Request $request) {
        $validatedData = $request->validate([
            'flight_id' => 'required|exists:flights,id',
            'passenger_name' => 'required|string',
            'passenger_phone' => 'required|string|max:14',
            'seat_number' => 'required|string|max:3',
        ]);

        if ($validatedData) {
            Ticket::create([
                'flight_id' => $validatedData['flight_id'],
                'passenger_name' => $validatedData['passenger_name'],
                'passenger_phone' => $validatedData['passenger_phone'],
                'seat_number' => $validatedData['seat_number']
            ]);

            FacadesSession::flash('message', 'Berhasil book tiket!');
            FacadesSession::flash('alert-class', 'success');
        } else {
            FacadesSession::flash('message', 'Book tiket gagal');
            FacadesSession::flash('alert-class', 'success');
        }
        return redirect()->back();
    }

    public function board ($id) {
        $ticket = Ticket::find($id);

        if ($ticket) {
            $ticket->is_boarding = true; 
            $ticket->boarding_time = now();

            $ticket->save();
            FacadesSession::flash('message', 'Berhasil boarding');
            FacadesSession::flash('alert-class', 'success');
        } else {
            FacadesSession::flash('message', 'Gagal boarding');
            FacadesSession::flash('alert-class', 'failed');
        }

        return redirect()->back();
    }


    public function deleteTicket ($id) {
        $ticket = Ticket::find($id);

        if ($ticket) {
            $ticket->delete();

            // Flash message sukses
            FacadesSession::flash('message', 'Berhasil menghapus tiket');
            FacadesSession::flash('alert-class', 'success');
        } else {
            // Flash message gagal
            FacadesSession::flash('message', 'Tiket gagal dihapus');
            FacadesSession::flash('alert-class', 'failed');
        }

        return redirect()->back();
    }

}
