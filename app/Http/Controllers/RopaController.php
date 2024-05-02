<?php

namespace App\Http\Controllers;

use App\Models\Ropa;
use Illuminate\Http\Request;

class RopaController extends Controller
{
    public function create(Request $request) {
        Ropa::create($request->all());
        return back() -> with('mensaje', 'Proteina agregada exitosamente.');
    }

    public function read($id) {
        $ropa = Ropa::findOrFail($id);
        return view('??', compact('ropa'));
    }

    public function update(Request $request, $id) {
        Ropa::findOrFail($id)->update($request->all());
        return back() -> with('mensaje','Proteina actualizada exitosamente.');
    }

    public function delete($id) {
        Ropa::findOrFail($id)->delete();
        return back();
    }

    public function all() {
        $ropas = Ropa::all();
        return view('??', compact('ropas'));
    }
}
