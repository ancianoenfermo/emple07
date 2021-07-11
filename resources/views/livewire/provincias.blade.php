<div>
    <!-- Dropdown Provincias -->
    <div class="relative mb-2 z-30" x-data="{open:false}">
        <button class="
    @empty($provincias)
            cursor-not-allowed
    @endempty
 px-4 w-60 text-gray-700  h-12  rounded-lg overflow-hidden focus:outline-none bg-white shadow mr-6"
            x-on:click="open = !open">
            @if (@isset($elegidaProvincia))
                <span>{{ $elegidaProvincia }}</span>
            @else
                <span>Todas las Provincias</span>
            @endif
            <i class="fas fa-angle-down"></i>
        </button>

        <!-- Dropdown Body -->
        @isset($provincias)
            <div class="absolute right-0 w-60 mt-2 py-2 bg-white border rounded shadow-xl" x-show="open"
                x-on:click.away="open = false">

                <a class="cursor-pointer transition-colors duration-200 block px-4 py-2 text-normal text-gray-900 rounded hover:bg-blue-500 hover:text-white"
                    wire:click="provinciaTodasClick()" x-on:click="open = false">Todos
                    las Provincias</a>
                @foreach ($provincias as $eachProvincia)
                    <a class="cursor-pointer transition-colors duration-200 block px-4 py-2 text-normal text-gray-900 rounded hover:bg-blue-500 hover:text-white"
                        wire:click="provinciaClick({{ $eachProvincia }})"
                        x-on:click="open = false">{{ $eachProvincia->name }}</a>
                @endforeach
            </div>
        @endisset
    </div>

</div>