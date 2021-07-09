<div>
    <div class="sm:block bg-gray-500 py-3 lg:flex lg:justify-around">
        <div>
            <select wire:model="selectedTipoTrabajo"class = "cursor-pointer" >

                @foreach ($tiposTrabajos as $tiposTrabajo)
                    <option value="{{ $tiposTrabajo->id }}">{{ $tiposTrabajo->name }}</option>
                @endforeach
            </select>
        </div>




        <div>
            <select wire:model="selectedAutonomia" class = "cursor-pointer">
                <option value="">Todas las Autonomias</option>
                @foreach ($autonomias as $autonomia)
                    <option value="{{$autonomia}}">{{ $autonomia->name }}</option>
                @endforeach
            </select>
        </div>

        <div>

            <select wire:model="selectedProvincia"
            @if (is_null($provincias))
            disabled
            class ="cursor-not-allowed"
            @else
            class = "cursor-pointer"
            @endif
            >
                <option value="">Todas las Provincias</option>
                @if (!is_null($provincias))
                    @foreach ($provincias as $provincia)
                        <option value="{{$provincia}}">{{ $provincia->name }}</option>
                    @endforeach
                @endif
            </select>
        </div>

        <div>

            <select wire:model="selectedLocalidad"
            @if (is_null($localidades))
            disabled
            class ="cursor-not-allowed"
            @endif

            >
                <option value="">Todas las Localidades</option>
                @if (!is_null($localidades))
                    @foreach ($localidades as $localidad)
                        <option value="{{ $localidad }}">{{ $localidad->name }}</option>
                    @endforeach
                @endif
            </select>
        </div>
        HHHHH{{$contador}}
    </div>
</div>
