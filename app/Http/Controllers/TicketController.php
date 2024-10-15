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
