<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Módulo Files -->
                <a href="{{ route('files.index') }}" class="block p-6 bg-white border rounded-lg shadow hover:bg-gray-100">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">Files</h5>
                    <p class="font-normal text-gray-700">Administrar operaciones portuarias.</p>
                </a>

                <!-- Módulo Clientes -->
                <a href="{{ route('clients.index') }}" class="block p-6 bg-white border rounded-lg shadow hover:bg-gray-100">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">Clientes</h5>
                    <p class="font-normal text-gray-700">Ver y registrar clientes.</p>
                </a>

                <!-- Módulo Buques -->
                <a href="{{ route('vessels.index') }}" class="block p-6 bg-white border rounded-lg shadow hover:bg-gray-100">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">Buques</h5>
                    <p class="font-normal text-gray-700">Ver y editar buques involucrados.</p>
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
