<div>

    <div class="text-center text-lg w-full text-pink-900 pb-2">
        <x-jet-button
        wire:click="$emit('clickUbicacionBuscar',leerValoresFiltro())"
        >
            Buscar
        </x-jet-button>
    </div>
    <hr class="block bg-gradient-to-b from-pink-200 via-pink-300 to-pink-600 h-2 border-none">
    <div id="filtros">
        <div class="flex items-center pt-2">
            <label class="w-24 text-xs mr-2">Autonomia</label>

            <select id="selectAutonomia" class="items-end block w-full text-xs h-8 border-pink-600 focus:border-pink-300 focus:ring focus:ring-pink-200 focus:ring-opacity-50 rounded-md shadow-sm"
                wire:model="selectedAutonomia"
                wire:loading.class="cursor-wait">
                <option value="">Todas</option>
                @foreach ($autonomias as $item)
                    <option value="{{ $item->id}}">{{ $item->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="flex items-center pt-2">
            <label class="w-24 text-xs mr-2">Provincia</label>
            <select id="selectProvincia" class="items-end block w-full text-xs h-8  border-pink-600 focus:border-pink-300 focus:ring focus:ring-pink-200 focus:ring-opacity-50 rounded-md shadow-sm"
            wire:model="selectedProvincia"
            wire:loading.class="cursor-wait"
            >
                <option value="">Todas</option>
                @if (!is_null($provincias))
                    @foreach ($provincias as $item)
                        <option value="{{ $item->id}}">{{ $item->name }}</option>
                    @endforeach
                @endif
            </select>
        </div>

        <div class="flex items-center pt-2">
            <label class="w-24 text-xs mr-2">Localidad</label>
            <select id="selectLocalidad" class="block w-full   text-xs h-8 border-pink-600 focus:border-pink-300 focus:ring focus:ring-pink-200 focus:ring-opacity-50 rounded-md shadow-sm"
            wire:model="selectedLocalidad"
            wire:loading.class="cursor-wait">
                <option value="">Todas</option>
                @if (!is_null($localidades))
                    @foreach ($localidades as $item)
                        <option value="{{ $item->id}}">{{ $item->name }}</option>
                    @endforeach
                @endif
            </select>
        </div>

        <div class="flex items-center pt-2">
            <label class="w-24 text-xs block mr-2">Contrato</label>
            <select id="selectedContrato" class="block w-full text-xs h-8  border-pink-600 focus:border-pink-300 focus:ring focus:ring-pink-200 focus:ring-opacity-50 rounded-md shadow-sm"
            wire:model="selectedContrato">
                <option value="">Todos</option>
                @if (!is_null($contratos))
                    @foreach ($contratos as $item)
                        <option value="{{ $item->id}}">{{ $item->name }}</option>
                    @endforeach
                @endif
            </select>
        </div>

        <div class="flex items-center pt-2">
            <label class="w-24 text-xs block mr-2">Jornada</label>
            <select id="selectedJornada" class="block w-full text-xs h-8 border-pink-600 focus:border-pink-300 focus:ring focus:ring-pink-200 focus:ring-opacity-50 rounded-md shadow-sm"
            wire:model="selectedJornada">
            >
                <option value="">Todas</option>
                @if (!is_null($jornadas))
                    @foreach ($jornadas as $item)
                        <option value="{{ $item->id}}">{{ $item->name }}</option>
                    @endforeach
                @endif
            </select>
        </div>

        <div class="flex items-center pt-2">
            <label class="w-24 text-xs block mr-2">Experiencia</label>
            <select id="selectedExperiencia" class="block w-full text-xs  h-8 border-pink-600 focus:border-pink-300 focus:ring focus:ring-pink-200 focus:ring-opacity-50 rounded-md shadow-sm">
                <option value="">Todas</option>
                @if (!is_null($experiencias))
                    @foreach ($experiencias as $item)
                        <option value="{{ $item}}">{{ $item }}</option>
                    @endforeach
                @endif
            </select>
        </div>


    </div>
</div>

