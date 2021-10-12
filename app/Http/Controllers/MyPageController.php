<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Reservation;
use App\Models\Favorite;


class MyPageController extends Controller
{
    public function index()
    {
        $id = Auth::user()->id;
        $user = DB::table('users')->find($id);
        $reservations = Reservation::where('user_id',$id)->get();
        $favorites = Favorite::where('user_id', $id)->get();

        return view('mypage', compact('user','reservations','favorites'));
    }

}
