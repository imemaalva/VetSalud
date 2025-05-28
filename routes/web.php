<?php

use App\Http\Controllers\HistoryController;
use App\Http\Controllers\MascotaController;
use App\Http\Controllers\DuenoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VeterinarioController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/duenos', [DuenoController::class, 'index'])->name('admin.showOwners');
    Route::post('/duenos/crear',[DuenoController::class, 'create'])->name('admin.addOwner');
    Route::get('/dueno/edit/{id}', [DuenoController::class, 'edit'])->name('admin.editOwner');
    Route::get('/duenos/update/{id}', [DuenoController::class, 'update'])->name('admin.updateOwner');
    Route::delete('/duenos/destroy/{id}', [DuenoController::class, 'destroy'])->name('admin.destroyOwner');

    Route::get('/mascotas', [MascotaController::class, 'index'])->name('admin.indexPets');
    Route::post('/mascotas/crear',[MascotaController::class, 'create'])->name('admin.addPet');
    Route::get('/mascotas/edit/{id}', [MascotaController::class, 'edit'])->name('admin.editPet');
    Route::get('/mascotas/update/{id}', [MascotaController::class, 'update'])->name('admin.updatePet');
    Route::delete('/mascotas/destroy/{id}', [MascotaController::class, 'destroy'])->name('admin.destroyPet');
    
    Route::get('/historiales', [HistoryController::class, 'index'])->name('admin.indexHistories');
    Route::post('/historiales/crear',[HistoryController::class, 'create'])->name('admin.addHistory');
    Route::get('/historiales/edit/{history}/mascota/{pet}', [HistoryController::class, 'edit'])->name('admin.editHistory');
    Route::get('/historiales/update/{id}', [HistoryController::class, 'update'])->name('admin.updateHistory');
    Route::delete('/historiales/destroy/{id}', [HistoryController::class, 'destroy'])->name('admin.destroyHistory');

    Route::get('/veterinarios', [VeterinarioController::class, 'index'])->name('admin.indexVets');
    Route::post('/veterinarios/crear',[VeterinarioController::class, 'create'])->name('admin.addVet');
    Route::get('/veterinarios/edit/{id}', [VeterinarioController::class, 'edit'])->name('admin.editVet');
    Route::get('/veterinarios/update/{id}', [VeterinarioController::class, 'update'])->name('admin.updateVet');
    Route::delete('/veterinarios/destroy/{id}', [VeterinarioController::class, 'destroy'])->name('admin.destroyVet');

    Route::get('/historial/{id}', [HistoryController::class, 'fullHistory'])->name('vet.fullHistory');
    Route::get('/historiales/mascota/{id}/pdf', [HistoryController::class, 'exportByPetPDF'])->name('history.export.pdf');

    
});

require __DIR__.'/auth.php';
