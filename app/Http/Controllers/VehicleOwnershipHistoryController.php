<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VehicleOwnershipHistory;

class VehicleOwnershipHistoryController extends Controller
{
    public function index(){
        $historys = VehicleOwnershipHistory::all();
        return view('vehicleOwnershipHistorys.index', ['historys' => $historys]);
    }
}
