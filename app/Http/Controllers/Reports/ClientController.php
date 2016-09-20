<?php

namespace App\Http\Controllers\Reports;

use App\Area;
use App\AreaType;
use App\ReservedPlotsStatusView;
use App\UserDetail;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;


class ClientController extends Controller
{
    public function index(Request $request)
    {

        $locations = Area::all();
        $landuses = AreaType::all();
        $i = 1;

        $userdetails = new UserDetail();
        $userdetails = $userdetails->newQuery();

        $clients = $this->search($userdetails, $request);

        if (isset($_POST['export_excel_button'])) {
            PrintController::index($clients, 'xlsx');
        }
        if (isset($_POST['export_pdf_button'])) {
            PrintController::index($clients, 'pdf');
        }

        return view('reports.clients.index', compact('clients', 'locations', 'landuses', 'i'));

    }

    public function search($userdetails, $request)
    {
        if ($request->has('particular') && $request->input('particular') != '') {
            if ($request->has('particular_value') && $request->input('particular_value') != '') {
                if ($request->input('particular_symbol') == '=') {
                    $userdetails->where($request->input('particular'), $request->input('particular_value'));
                } else {
                    $userdetails->where($request->input('particular'), 'LIKE', '%' . $request->input('particular_value') . '%');
                }
            }
        }

        if ($request->has('region') && $request->input('region') != '') {
            $userdetails->orWhere('region', $request->input('region'));
        }

        return $userdetails->get();
    }

    public function show($user_detail_id)
    {
        $user = UserDetail::findOrFail($user_detail_id);

        $user_reservations = ReservedPlotsStatusView::getClientReservations($user->user_detail_id);

        return view('reports.clients.show', compact('user', 'user_reservations'));
    }
}
