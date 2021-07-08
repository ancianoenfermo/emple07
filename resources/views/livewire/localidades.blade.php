<div>
    <!-- Dropdown Localidades -->
    <div class="relative mb-2  z-20" x-data="{open:false}">
        <button class="
        @empty($localidades)
                                    cursor-not-allowed
        @endempty
     px-4 w-60 text-gray-700  h-12  rounded-lg overflow-hidden focus:outline-none bg-white shadow mr-6"
            x-on:click="open = !open">
            @if (@isset($elegidaLocalidad))
                <span>{{ $elegidaLocalidad }}</span>
            @else
                <span>Todas las Localidades</span>
            @endif
            <i class="fas fa-angle-down"></i>
        </button>
        <!-- Dropdown Body -->
        @isset($localidades)


            <div class="absolute right-0 w-60 mt-2 py-2 bg-white border rounded shadow-xl" x-show="open"
                x-on:click.away="open = false">
                {{-- <a class="cursor-pointer transition-colors duration-200 block px-4 py-2 text-normal text-gray-900 rounded hover:bg-blue-500 hover:text-white"
                    wire:click="$set('elegidaProvincia','Todas las Provincias')" x-on:click="open = false">Todas
                    las Localidades</a> --}}
                <a class="cursor-pointer transition-colors duration-200 block px-4 py-2 text-normal text-gray-900 rounded hover:bg-blue-500 hover:text-white"
                    wire:click="localidadClick({{ null }})" x-on:click="open = false">Todas
                    las Localidades</a>
                @foreach ($localidades as $localidad)
                    <a class="cursor-pointer transition-colors duration-200 block px-4 py-2 text-normal text-gray-900 rounded hover:bg-blue-500 hover:text-white"
                        wire:click="localidadClick({{ $localidad }})"
                        x-on:click="open = false">{{ $localidad->name }}</a>
                @endforeach
            </div>
        @endisset
    </div>
    <p class="text-center" wire:loading>Cargando ...</p>
</div>
