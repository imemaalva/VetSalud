<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use App\Models\Pet;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function showOwners()
    {
        $owners = Owner::all();
        return view('admin.indexOwners', compact('owners'));
    }

    public function indexPets()
    {
        $mascotas = Pet::with('dueno')->get();
        return view('admin.indexPets', compact('mascotas'));
    }

    public function createPet()
    {
        $duenos = Owner::all();
        return view('mascotas.create', compact('duenos'));
    }

    public function storePet(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'especie' => 'required',
            'raza' => 'required',
            'edad' => 'required|numeric',
            'owner_id' => 'required',
        ]);

        Pet::create($request->all());

        return redirect()->route('mascotas.index')->with('success', 'Mascota registrada correctamente');
    }

    public function editPet($id)
    {
        $mascota = Pet::findOrFail($id);
        $duenos = Owner::all();
        return view('mascotas.edit', compact('mascota', 'duenos'));
    }

    public function updatePet(Request $request, $id)
    {
        $mascota = Pet::findOrFail($id);
        $mascota->update($request->all());

        return redirect()->route('mascotas.index')->with('success', 'Mascota actualizada');
    }

    public function destroPet($id)
    {
        $mascota = Pet::findOrFail($id);
        $mascota->delete();

        return redirect()->route('mascotas.index')->with('success', 'Mascota eliminada');
    }

}
