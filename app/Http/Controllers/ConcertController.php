<?php

namespace App\Http\Controllers;

use App\Models\Concert;
use Illuminate\Http\Request;

class ConcertController extends Controller
{
    public function index()
    {
        $data = Concert::orderBy('id','desc')->get();
        return view('concert.index', compact('data'));
    }

    public function create()
    {
        return view('concert.create');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'venue' => 'required',
            'start_time' => 'required',
            'price' => 'required',
        ]);

        $data = new Concert();
        $data->name = $request->name;
        $data->venue = $request->venue;
        $data->start_time = $request->start_time;
        $data->price = $request->price;

        $data->save();
        return redirect(route('admin.concert.index'))->with('message', 'Konser berhasil ditambahkan');
    }

    public function destroy($id)
    {
        $data = Concert::find($id);
        $data->delete();
        return redirect(route('admin.concert.index'))->with('message', 'Konser berhasil dihapus');
    }
}
