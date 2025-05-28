<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Termwind\Components\Raw;
use Illuminate\Support\Facades\Hash; 

class VeterinarioController extends Controller
{
    //
    public function index()
    {

        $veterinarios = User::where('role', 'veterinario')->get();
        // $veterinarios = User::all();
        
        return view('admin.indexVets', compact('veterinarios'));
    }

    public function create(Request $request){
        $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);

        User::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'email' => $request->email,
            'role' => 'veterinario',
            'password' => Hash::make($request->password),
        ]);

    
        return redirect()->back()->with('success', 'Veterinario creado correctamente.');
    }

    public function edit($id)
    {
        $veterinario = User::findOrFail($id);
        return view('admin.editVet', compact('veterinario'));
    }

    public function update(Request $request, $id)
    {
        $veterinario = User::findOrFail($id);;
        $veterinario->update($request->all());

        return redirect()->route('admin.indexVets');
    }

    public function destroy($id)
    {
        $veterinario = User::findOrFail($id);;
        $veterinario->delete();

        return redirect()->route('admin.indexVets')->with('success', 'Veterinario eliminado');
    }

}
