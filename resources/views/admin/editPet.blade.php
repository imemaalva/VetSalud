<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Mascota: {{ $mascota->nombre }}
        </h2>
    </x-slot>
    <form class="px-24 my-4" method="GET" action="{{ route('admin.updatePet', $mascota->id) }}">
        @csrf
        <div class="mt-2">
            <label for="nombre" class="text-sm text-gray-500">Nombre</label>
            <input id="nombre" name="nombre" type="text" value="{{ $mascota->nombre }}" required
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm sm:w-full sm:border-t-0 sm:border-b-2 sm:border-indigo-300">
        </div>
        <div class="mt-2">
            <label for="especie" class="text-sm text-gray-500">Especie</label>
            <input id="especie" name="especie" type="text" value="{{ $mascota->especie }}" required
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm sm:w-full sm:border-t-0 sm:border-b-2 sm:border-indigo-300">
        </div>
        <div class="mt-2">
            <label for="raza" class="text-sm text-gray-500">Raza</label>
            <input id="raza" name="raza" type="text" value="{{ $mascota->raza }}" required
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm sm:w-full sm:border-t-0 sm:border-b-2 sm:border-indigo-300">
        </div>
        <div class="mt-2">
            <label for="edad" class="text-sm text-gray-500">Edad</label>
            <input name="edad" id="edad" type="float" value="{{ $mascota->edad }}" required
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm sm:w-full sm:border-t-0 sm:border-b-2 sm:border-indigo-300">
        </div>
        <label for="owner_id" class="text-sm text-gray-500">Seleccione un dueño</label>
        <select name="owner_id"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option value="{{ $mascota->owner_id }}">.</option>
            @foreach ($duenos as $dueno)
                <option value="{{ $dueno->_id }}">{{ $dueno->nombre }}</option>
            @endforeach
        </select>
        <div class="flex items-center md:py-5 border-t border-gray-200 rounded-b dark:border-gray-600">
            <button data-modal-hide="default-modal" type="submit"
                class="py-2.5 px-5 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                Actualizar</button>
            <button data-modal-hide="default-modal" type="button"
                class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">
                <a href="{{ route('admin.indexPets') }}">Cancelar</a>
            </button>
        </div>
    </form>
</x-app-layout>
