<?php

namespace App\Http\Controllers;

use App\Models\History;
use App\Models\Owner;
use App\Models\Pet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Mail\HistoryCreated;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Http;

class HistoryController extends Controller
{
    public function index()
    {
        $histories = History::all();
        $pets = Pet::all();
        $owners = Owner::all();
        return view('admin.indexHistories', compact('histories', 'pets', 'owners'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'pet_id' => 'required',
            'diagnostico' => 'required',
            'descripcion' => 'required',
            'tratamiento' => 'required',
            'fecha' => 'required|date',

        ]);

        $history = new History();
        $history->pet_id = $request->pet_id;
        $history->diagnostico = $request->diagnostico;
        $history->descripcion = $request->descripcion;
        $history->fecha = $request->fecha;
        $history->vet_id = Auth::id();
        $history->save();


        $pet = Pet::find($request->pet_id);
        $owner = $pet->owner;

        $response = Http::withHeaders([
            'X-Api-Key' => config('services.ninjas.animals_api'),
        ])->get("https://api.api-ninjas.com/v1/animals");
        
        $animalInfo = null;
        
        if ($response->ok()) {
            $animales = $response->json();
            if (count($animales) > 0) {
                $animalInfo = $animales[array_rand($animales)]; // Uno aleatorio
                dd($animalInfo);
            }
        }
        
        // 📩 Enviar correo con PDF y dato adicional
        Mail::to($owner->email)->send(new HistoryCreated($history, $animalInfo));

        return redirect()->route('admin.indexHistories')->with('success', 'Historial creado y enviado por correo');
    }
    public function edit($id, $petId)
    {
        $history = History::findOrFail($id);
        $pet = Pet::findOrFail($petId);
        $pets = Pet::all();
        return view('admin.editHistory', compact('history', 'pets', 'pet'));
    }

    public function update(Request $request, $id)
    {
        $history = History::findOrFail($id);
        $history->update($request->all());

        return redirect()->route('admin.indexHistories')->with('success', 'Historial actualizado');
    }

    public function destroy($id)
    {
        $history = History::findOrFail($id);
        $history->delete();

        return redirect()->route('admin.indexHistories')->with('success', 'Historial eliminado');
    }

    public function fullHistory($idPet)
    {
        $pet = Pet::findOrFail($idPet);
        $histories = History::where('pet_id', $idPet)->get();

        return view('vet.fullHistory', compact('histories', 'pet'));
    }

    public function exportByPetPDF($petId)
    {
        $pet = Pet::findOrFail($petId);
        $histories = History::where('pet_id', $petId)->get();

        $pdf = Pdf::loadView('history.pdf', compact('pet', 'histories'));
        return $pdf->download('historial_' . $pet->nombre . '.pdf');
    }
}
