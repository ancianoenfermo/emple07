<div class="flex">

    {{-- Dropwdown Autonomias --}}
    <div class="relative mb-2" x-data="{open:false}">
        <button
            class="px-4 w-60 text-gray-700  h-12  rounded-lg overflow-hidden focus:outline-none bg-white shadow mr-6"
            x-on:click="open = !open" wire:loading.attr="disabled">
            @if (@isset($elegidaAutonomia))
                <span>{{ $elegidaAutonomia }}</span>
            @else
                <span>Todas las Autonomías</span>
            @endif
            <i class="fas fa-angle-down"></i>
        </button>
        <!-- Dropdown Body -->
        <div class="absolute w-60 mt-2 py-2 bg-white border rounded shadow-xl" x-show="open"
            x-on:click.away="open = false">

            <a class="cursor-pointer transition-colors duration-200 block px-4 py-2 text-normal text-gray-900 rounded hover:bg-blue-500 hover:text-white"
                wire:click="autonomiaTodasClick()" x-on:click="open = false">Todas
                las Autonomías</a>
            @foreach ($autonomias as $autonomia)
                <a class="cursor-pointer transition-colors duration-200 block px-4 py-2 text-normal text-gray-900 rounded hover:bg-blue-500 hover:text-white"
                    wire:click="autonomiaClick({{ $autonomia }})"
                    x-on:click="open = false">{{ $autonomia->name }}</a>
            @endforeach

        </div>
        <!-- // Dropdown Body  -->

    </div>

    {{-- Dropwdown Provincias --}}
    <div class="relative mb-2" x-data="{open:false}">
        <button class="px-4 w-60 text-gray-700  h-12  rounded-lg overflow-hidden focus:outline-none bg-white shadow mr-6
            @empty($provincias)
                    cursor-not-allowed
            @endempty
            " x-on:click="open = !open" wire:loading.attr="disabled">
            @if (@isset($elegidaProvincia))
                <span>{{ $elegidaProvincia }}</span>
            @else
                <span>Todas las Provincias</span>
            @endif
            <i class="fas fa-angle-down"></i>
        </button>
        <!-- Dropdown Body -->
        @isset($provincias)
            <div class="absolute w-60 mt-2 py-2 bg-white border rounded shadow-xl" x-show="open"
                x-on:click.away="open = false">

                <a class="cursor-pointer transition-colors duration-200 block px-4 py-2 text-normal text-gray-900 rounded hover:bg-blue-500 hover:text-white"
                    wire:click="provinciaTodasClick()" x-on:click="open = false">Todas
                    las Provincias</a>
                @foreach ($provincias as $provincia)
                    <a class="cursor-pointer transition-colors duration-200 block px-4 py-2 text-normal text-gray-900 rounded hover:bg-blue-500 hover:text-white"
                        wire:click="provinciaClick({{ $provincia }})"
                        x-on:click="open = false">{{ $provincia->name }}</a>
                @endforeach

            </div>
        @endisset
        <!-- // Dropdown Body  -->

    </div>

    {{-- Dropwdown Localidades --}}
    <div class="relative mb-2" x-data="{open:false}">
        <button class="px-4 w-60 text-gray-700  h-12  rounded-lg overflow-hidden focus:outline-none bg-white shadow mr-6
            @empty($localidades)
                    cursor-not-allowed
            @endempty
            " x-on:click="open = !open" wire:loading.attr="disabled">
            @if (@isset($elegidaLocalidad))
                <span>{{ $elegidaLocalidad }}</span>
            @else
                <span>Todas las Localidades</span>
            @endif
            <i class="fas fa-angle-down"></i>
        </button>
        <!-- Dropdown Body -->
        @isset($localidades)
            <div class="absolute w-60 mt-2 py-2 bg-white border rounded shadow-xl" x-show="open"
                x-on:click.away="open = false">

                <a class="cursor-pointer transition-colors duration-200 block px-4 py-2 text-normal text-gray-900 rounded hover:bg-blue-500 hover:text-white"
                    wire:click="localidadTodasClick()" x-on:click="open = false">Todas
                    las Localidades</a>
                @foreach ($localidades as $localidad)
                    <a class="cursor-pointer transition-colors duration-200 block px-4 py-2 text-normal text-gray-900 rounded hover:bg-blue-500 hover:text-white"
                        wire:click="localidadClick({{ $localidad }})"
                        x-on:click="open = false">{{ $localidad->name }}</a>
                @endforeach

            </div>
        @endisset
        <!-- // Dropdown Body  -->

    </div>


    <!-- Dropdown Tipos de Trabajo -->
    <div class="relative mb-2 " x-data="{open:false}">

        <button
            class="px-4 w-60 text-gray-700  h-12  rounded-lg overflow-hidden focus:outline-none bg-white shadow mr-6"
            x-on:click="open = !open">
            <span>{{ $elegidaTiposTrabajo }}</span>

            <i class="fas fa-angle-down"></i>
        </button>
        <!-- Dropdown Body -->
        @isset($tiposTrabajo)


            <div class="absolute w-60 mt-2 py-2 bg-white border rounded shadow-xl" x-show="open"
                x-on:click.away="open = false">
                @foreach ($tiposTrabajo as $tipoTrabajo)
                    <a class="cursor-pointer transition-colors duration-200 block px-4 py-2 text-normal text-gray-900 rounded hover:bg-blue-500 hover:text-white"
                        wire:click="tipoTrabajoClick({{ $tipoTrabajo}})"
                        x-on:click="open = false">{{ $tipoTrabajo->name }}</a>
                @endforeach

            </div>
        @endisset
        <!-- // Dropdown Body  -->
    </div>
</div>
