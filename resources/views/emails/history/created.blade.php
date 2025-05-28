@component('mail::message')
Nuevo historial médico creado

Se ha registrado un nuevo historial médico para tu mascota **{{ $history->pet->nombre }}**.

Revisa el archivo adjunto para más detalles.

@if(isset($animalInfo))
---

**Dato curioso sobre {{ $animalInfo['name'] ?? 'un animal' }}:**  
{{ $animalInfo['characteristics'] ?? 'Información no disponible.' }}

@endif


Gracias,<br>
VetSalud
@endcomponent
