<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Store;

class StoreController extends Controller
{
    public function index(Request $request) {

        $name = $request->input('name');
        $genre = $request->input('genre');
        $area = $request->input('area');

        $query = Store::query();


        if (!empty($name)) {
            $query->where('name', 'LIKE', "%$name%")
                ->get();
        }

        if ($request->has('genre') && $genre != ('All')) {
            $query->whereHas('genre', function($query) use($genre){
                $query->where('name', $genre);
            })->get();
        }

        if ($request->has('area') && $area != ('All')) {
            $query->whereHas('area', function($query) use($area){
                $query->where('name', $area);
            })->get();
        }

        $data = $query->paginate(20);

        return view('stores.index',
        [
            'data' => $data,
        ]
    );

    }


    public function show ($id) {

        $store = Store::find($id);

        return view('stores.show', compact('store'));

    }


}
