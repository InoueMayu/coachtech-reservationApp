<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favorite;
use App\Models\Store;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function store(Request $request) {

        $favorite = new Favorite();
        $favorite->store_id = $request->store_id;
        $favorite->user_id = Auth::user()->id;
        $favorite->save();

        return redirect()->route('stores.index');
    }

    public function destroy($id) {

        $store = Store::findOrFail($id);

        $store->favorites()->delete();

        return redirect()->route('stores.index');
    }

    public function delete($id) {

        $store = Store::findOrFail($id);

        $store->favorites()->delete();

        return redirect()->route('mypage');
    }
}
