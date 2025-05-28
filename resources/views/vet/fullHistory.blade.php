<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Mascota: {{$pet->nombre}}
        </h2>
    </x-slot>
    <div class="p-2 mx-24 my-3">
        <button data-modal-target="default-modal" data-modal-toggle="default-modal"
            class="text-gray-900 hover:text-white border border-gray-800 hover:bg-gray-900 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-gray-600 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-800"
            type="button">
            <a href="{{route('history.export.pdf', $pet->id)}}">Descargar archivo PDF</a> 
        </button>
    </div>
    <div class="px-24 my-3 flex flex-wrap">
        @foreach ($histories as $history)
            <div
                class="max-w-sm  bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
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
                </div>
            </div>
        @endforeach
    </div>
</x-app-layout>
