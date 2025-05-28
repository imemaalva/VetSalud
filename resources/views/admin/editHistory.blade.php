<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Mascota tratada: {{$pet->nombre}}
        </h2>
    </x-slot>
        <form class="px-24 my-4" method="GET" action="{{ route('admin.updateHistory', $history->id) }}">
            @csrf
            <div class="mt-2">
                <label for="fecha" class="text-sm text-gray-500">Fecha</label>
                <input name="fecha" id="fecha" type="date" value="{{$history->fecha}}" required
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm sm:w-full sm:border-t-0 sm:border-b-2 sm:border-indigo-300">
            </div>
            <label for="pet_id" class="text-sm text-gray-500">Nombre de la mascota</label>
            <select name="pet_id"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option value="{{$history->pet_id}}">Seleccione la mascota</option>
                @foreach ($pets as $pet)
                    <option value="{{ $pet->_id }}">{{ $pet->nombre }} (Dueño: {{$pet->owner->nombre ?? 'Sin dueño'}})</option>
                @endforeach
            </select>
            <div class="mt-2">
                <label for="diagnostico" class="text-sm text-gray-500">Diagnóstico</label>
                <input id="diagnostico" name="diagnostico" type="text" placeholder="Dx: Vacuna contra rabia" value="{{$history->diagnostico}}" required
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm sm:w-full sm:border-t-0 sm:border-b-2 sm:border-indigo-300">
            </div>
            <div class="mt-2">
                <label for="descripcion" class="text-sm text-gray-500">Descripcion</label>
                <input id="descripcion" name="descripcion" type="text" placeholder="Se administró dosis anual" value="{{$history->descripcion}}" required
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm sm:w-full sm:border-t-0 sm:border-b-2 sm:border-indigo-300">
            </div>
            <div class="mt-2">
                <label for="tratamiento" class="text-sm text-gray-500">Tratamiento</label>
                <input id="tratamiento" name="tratamiento" type="text" placeholder="Vacuna" value="{{$history->tratamiento}}" required
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm sm:w-full sm:border-t-0 sm:border-b-2 sm:border-indigo-300">
            </div>
            <div
                class="flex items-center md:py-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                <button data-modal-hide="default-modal" type="submit"
                class="py-2.5 px-5 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                    Actualizar</button>
                <button data-modal-hide="default-modal" type="button"
                class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">
                <a href="{{route ('admin.indexHistories')}}">Cancelar</a>
                </button>
            </div>
        </form>
</x-app-layout>