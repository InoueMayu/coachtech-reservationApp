<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Store;

class StoreController extends Controller
{
    public function index () {

        $stores = Store::all();
        return view('stores.index')->with('stores', $stores);

    }


    public function show ($id) {

        $store = Store::find($id);

        return view('stores.show', compact('store'));

    }


    public function search(Request $request) {

        $name = $request->input('name');

        $query = Store::query();

        if (!empty($name)) {
            $query->where('name', 'LIKE', "%$name%")
                ->get();
        }

        return view('stores.index');
    }

}
