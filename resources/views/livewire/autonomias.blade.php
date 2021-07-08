<div>

    {{-- Dropwdown Autonomias --}}
    <div class="relative mb-2 z-40" x-data="{open:false}">
        <button
            class="px-4 w-60 text-gray-700  h-12  rounded-lg overflow-hidden focus:outline-none bg-white shadow mr-6"
            x-on:click="open = !open">
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
                wire:click="autonomiaTodasClick()" x-on:click="open = false">Tod000s
                las Autonomías</a>
            @foreach ($autonomias as $autonomia)
                <a class="cursor-pointer transition-colors duration-200 block px-4 py-2 text-normal text-gray-900 rounded hover:bg-blue-500 hover:text-white"
                    wire:click="autonomiaClick({{ $autonomia }})"
                    x-on:click="open = false">{{ $autonomia->name }}</a>
            @endforeach

        </div>
        <!-- // Dropdown Body  -->


        <!-- // Dropdown Body -->

    </div>

</div>
