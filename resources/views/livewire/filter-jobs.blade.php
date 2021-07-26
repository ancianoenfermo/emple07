<div>
    <div class="sm:block bg-gray-50 py-3 lg:flex lg:justify-around rounded-lg ">
        {{-- Tipos de Trabajo --}}
        <div>

            <label class="block font-bold ">Tipo de Trabajo</label>
            <select wire:model="selectedTipoTrabajo" class="cursor-pointer select-nuevo">
                @foreach ($tiposTrabajos as $item)
                    <option value="{{ $item }}">{{ $item }}</option>
                @endforeach
            </select>

        </div>


        {{-- Autonomias --}}
        <div>
            <label class="block font-bold">Autonomía</label>
            <select wire:model="selectedAutonomia"
            wire:loading.class="animate-pulse cursor-wait"
            wire:target="selectedTipoTrabajo"
            class="select-nuevo cursor-pointer">
                <option value="todas">Todas las Autonomias</option>
                @foreach ($autonomias as $item)
                    <option value="{{ $item->id}}">{{ $item->name }}</option>
                @endforeach
            </select>
        </div>


        {{-- Provincias --}}
        <div>
            <label class="block font-bold ">Provincia</label>
            <select wire:model="selectedProvincia"
            wire:loading.class="animate-pulse cursor-wait"
            wire:target="selectedAutonomia"
            @if (is_null($provincias))
            class="select-nuevo cursor-not-allowed"
            disabled>
            @else
            class="select-nuevo cursor-pointer">
            @endif

                <option value="todas">Todas las Provincias</option>
                @if (!is_null($provincias))
                    @foreach ($provincias as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                @endif
            </select>
        </div>


        {{-- Localidades --}}

        <div>
            <label class="block font-bold">Localidad</label>
            <select wire:model="selectedLocalidad"
             @if (is_null($localidades))
                disabled
                class ="select-nuevo cursor-not-allowed"
            @else
                class ="select-nuevo cursor-pointer"
            @endif
                wire:loading.class="animate-pulse cursor-wait" wire:target="selectedProvincia">
                <option value="todas">Todas las Localidades</option>
                @if (!is_null($localidades))
                    @foreach ($localidades as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                @endif
            </select>

        </div>

        <div class=" flex justify-center items-center">

            <button wire:click="clickBuscar" class="h-8 px-4 m-2 text-sm text-indigo-100 transition-colors duration-150 bg-indigo-700 rounded-lg focus:shadow-outline hover:bg-indigo-800">Buscar</button>
        </div>

    </div>

</div>

