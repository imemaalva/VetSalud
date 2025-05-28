<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use App\Models\Pet;
use Illuminate\Http\Request;

class MascotaController extends Controller
{
    public function index()
    {
        $mascotas = Pet::with('owner')->get();
        $duenos = Owner::all();
        return view('admin.indexPets', compact('mascotas','duenos'));
    }

    public function create(Request $request)
    {
       
        $request->validate([
            'nombre' => 'required',
            'especie' => 'required',
            'raza' => 'required',
            'edad' => 'required|numeric',
            'owner_id' => 'required',
        ]);

        Pet::create($request->all());

        return redirect()->back();
    }

    public function edit($id)
    {
        $mascota = Pet::findOrFail($id);
        $duenos = Owner::all();
        return view('admin.editPet', compact('mascota', 'duenos'));
    }

    public function update(Request $request, $id)
    {
        $mascota = Pet::findOrFail($id);
        $mascota->update($request->all());

        return redirect()->route('admin.indexPets');
    }

    public function destroy($id)
    {
        $mascota = Pet::findOrFail($id);
        $mascota->delete();

        return redirect()->route('admin.indexPets')->with('success', 'Mascota eliminada');
    }
}
