<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use Illuminate\Http\Request;

class DuenoController extends Controller
{
    public function index()
    {
        $duenos = Owner::all();
        return view('admin.indexOwners', compact('duenos'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'direccion' => 'required',
            'email' => 'required|email',
            'telefono' => 'required|min:10',
        ]);

        Owner::create($request->all());

        return redirect()->back();
    }

    public function edit($id)
    {
        $dueno = Owner::findOrFail($id);
        return view('admin.editOwner', compact('dueno'));
    }

    public function update(Request $request, $id)
    {
        $dueno = Owner::findOrFail($id);
        $dueno->update($request->all());

        return redirect()->route('admin.showOwners');
    }

    public function destroy($id)
    {
        $dueno = Owner::findOrFail($id);
        $dueno->delete();

        return redirect()->route('admin.showOwners')->with('success', 'Dueño eliminado');
    }
}
