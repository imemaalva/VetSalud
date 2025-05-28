<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Historiales Médicos') }}
        </h2>
    </x-slot>
    <div class="p-2  mx-24 my-3">
        <button data-modal-target="default-modal" data-modal-toggle="default-modal"
           class="text-gray-900 hover:text-white border border-gray-800 hover:bg-gray-900 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-gray-600 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-800"
            type="button">
            Crear nuevo historial
        </button>
        <div id="default-modal" tabindex="-1" aria-hidden="true"
            class="hidden  overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-2xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
                    <!-- Modal header -->
                    <div
                        class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Agregar
                        </h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-hide="default-modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <form class="p-4" method="POST" action="{{ route('admin.addHistory') }}">
                        @csrf
                        <div class="mt-2">
                            <label for="fecha" class="text-sm text-gray-500">Fecha</label>
                            <input name="fecha" id="fecha" type="date" required
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm sm:w-full sm:border-t-0 sm:border-b-2 sm:border-indigo-300">
                        </div>
                        <label for="pet_id" class="text-sm text-gray-500">Nombre de la mascota</label>
                        <select name="pet_id"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="">Seleccione la mascota</option>
                            @foreach ($pets as $pet)
                                <option value="{{ $pet->_id }}">{{ $pet->nombre }} (Dueño: {{$pet->owner->nombre ?? 'Sin dueño'}})</option>
                            @endforeach
                        </select>
                        <div class="mt-2">
                            <label for="diagnostico" class="text-sm text-gray-500">Diagnóstico</label>
                            <input id="diagnostico" name="diagnostico" type="text" placeholder="Dx: Vacuna contra rabia" required
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm sm:w-full sm:border-t-0 sm:border-b-2 sm:border-indigo-300">
                        </div>
                        <div class="mt-2">
                            <label for="descripcion" class="text-sm text-gray-500">Descripcion</label>
                            <input id="descripcion" name="descripcion" type="text" placeholder="Se administró dosis anual" required
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm sm:w-full sm:border-t-0 sm:border-b-2 sm:border-indigo-300">
                        </div>
                        <div class="mt-2">
                            <label for="tratamiento" class="text-sm text-gray-500">Tratamiento</label>
                            <input id="tratamiento" name="tratamiento" type="text" placeholder="Vacuna" required
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm sm:w-full sm:border-t-0 sm:border-b-2 sm:border-indigo-300">
                        </div>
                        <!-- Modal footer -->
                        <div
                            class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                            <button data-modal-hide="default-modal" type="submit"
                            class="py-2.5 px-5 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                                Agregar</button>
                            <button data-modal-hide="default-modal" type="button"
                            class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">Cancelar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="px-24 flex flex-wrap">
        @foreach ($histories as $history)
            <div
                class="w-96 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
                <div class="p-5">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                        Mascota tratada: {{ $history->pet->nombre ?? 'Sin asignar' }}</h5>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                        Dueño: {{ $history->pet->owner->nombre ?? 'Sin asignar' }}
                    </p>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                        Fecha: {{ $history->fecha }}
                    </p>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                        Diagnostico: {{ $history->diagnostico }}
                    </p>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                        Descripcion: {{ $history->descripcion }}
                    </p>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                        Tratamiento: {{ $history->tratamiento }}
                    </p>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                        Veterinario: {{ $history->veterinario->name ?? 'Desconocido' }}
                    </p>
                    <div class="mt-auto">
                        <a href="{{ route('admin.editHistory', [$history->id , $history->pet_id]) }}"
                            class="py-2.5 px-5 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                            Editar información
                        </a>
                        <form action="{{ route('admin.destroyHistory', $history->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                            class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">
                                Eliminar
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</x-app-layout>
