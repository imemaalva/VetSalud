<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           Veterinario: {{ $veterinario->name }}  {{ $veterinario->surname }}
        </h2>
    </x-slot>
    <form class="px-24 my-4" method="GET" action="{{ route('admin.updateVet', $veterinario->id) }}">
        @csrf
        <div class="mt-2">
            <label for="name" class="text-sm text-gray-500">Nombre</label>
            <input id="name" name="name" type="text" value="{{ $veterinario->name }}" required
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm sm:w-full sm:border-t-0 sm:border-b-2 sm:border-indigo-300">
        </div>
        <div class="mt-2">
            <label for="surname" class="text-sm text-gray-500">Apellido</label>
            <input id="surname" name="surname" type="text" value="{{ $veterinario->surname }}" required
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm sm:w-full sm:border-t-0 sm:border-b-2 sm:border-indigo-300">
        </div>
        <div class="mt-2">
            <label for="email" class="text-sm text-gray-500">Email</label>
            <input id="email" name="email" type="text" value="{{ $veterinario->email }}" required
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm sm:w-full sm:border-t-0 sm:border-b-2 sm:border-indigo-300">
        </div>
        <div class="mt-2">
            <label for="password" class="text-sm text-gray-500">Contraseña</label>
            <input name="password" id="password" type="text" value="{{ $veterinario->password }}" required
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm sm:w-full sm:border-t-0 sm:border-b-2 sm:border-indigo-300">
        </div>
        <div class="flex items-center md:py-5 border-t border-gray-200 rounded-b dark:border-gray-600">
            <button data-modal-hide="default-modal" type="submit"
                class="py-2.5 px-5 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                Actualizar</button>
            <button data-modal-hide="default-modal" type="button"
                class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">
                <a href="{{ route('admin.indexVets') }}">Cancelar</a>
            </button>
        </div>
    </form>
</x-app-layout>
