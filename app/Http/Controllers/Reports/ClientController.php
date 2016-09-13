<?php

namespace App\Http\Controllers\Reports;

use App\ReservedPlotsStatusView;
use App\UserDetail;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ClientController extends Controller
{
    public function index()
    {
        $clients = UserDetail::paginate(15);

        return view('reports.clients.index', compact('clients'));
    }

    public function show($user_detail_id)
    {
        $user = UserDetail::findOrFail($user_detail_id);

        $user_reservations = ReservedPlotsStatusView::getClientReservations($user->user_detail_id);

        return view('reports.clients.show', compact('user', 'user_reservations'));
    }
}
