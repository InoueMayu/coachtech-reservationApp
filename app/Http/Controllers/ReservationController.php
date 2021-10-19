<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Store;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ReservationRequest;

class ReservationController extends Controller
{
    public function store(ReservationRequest $request) {

        $reservation = new Reservation();

        $reservation->date = $request->date;
        $reservation->starts_at = $request->starts_at;
        $reservation->number_of_guests = $request->number_of_guests;
        $reservation->user_id = Auth::id();
        $reservation->store_id = $request->store_id;

        $reservation->save();

        $store = Store::find($request->store_id);

        return view('done',compact('store'));

    }

    public function show () {

        $reservations = Reservation::all();

        return view('mypage')->with('reservation', $reservations);

    }


    public function destroy($id) {

        $reservation = Reservation::find($id);

        $reservation->delete();

        return redirect()->route('mypage');
    }


}
