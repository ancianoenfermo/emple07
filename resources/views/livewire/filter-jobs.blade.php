<div>
    <div class="sm:block bg-gray-500 py-3 lg:flex lg:justify-around">
        {{-- Tipos de Trabajo--}}
        <div>
            <label class="block font-bold">Tipo de Trabajo</label>
            <select wire:model="selectedTipoTrabajo" class="cursor-pointer">

                @foreach ($tiposTrabajos as $tiposTrabajo)
                    <option value="{{ $tiposTrabajo->id }}">{{ $tiposTrabajo->name }}</option>
                @endforeach
            </select>

        </div>



        {{-- Autonomias--}}
        <div>
            <label class="block font-bold">Autonomía</label>
            <select wire:model="selectedAutonomia" class="cursor-pointer">
                <option value="">Todas las Autonomias</option>
                @foreach ($autonomias as $autonomia)
                    <option value="{{ $autonomia }}">{{ $autonomia->name }}</option>
                @endforeach
            </select>

        </div>

        {{-- Provincias--}}
        <div >
            <label class="block font-bold ">Provincia</label>
            <select wire:model="selectedProvincia"
             @if (is_null($provincias)) disabled
                class ="cursor-not-allowed"
            @else
                class = "cursor-pointer"
            @endif
                wire:loading.class="animate-bounce" wire:target="selectedAutonomia"
            >
                <option value="">Todas las Provincias</option>
                @if (!is_null($provincias))
                    @foreach ($provincias as $provincia)
                        <option value="{{ $provincia }}">{{ $provincia->name }}</option>
                    @endforeach
                @endif
            </select>

        </div>

        {{-- Localidades--}}
        <div>
            <label class="block font-bold">Localidad</label>
            <select wire:model="selectedLocalidad"
            @if (is_null($localidades)) disabled
                class ="cursor-not-allowed"
            @endif
                wire:loading.class="animate-bounce" wire:target="selectedProvincia"
            >
                <option value="">Todas las Localidades</option>
                @if (!is_null($localidades))
                    @foreach ($localidades as $localidad)
                        <option value="{{ $localidad }}">{{ $localidad->name }}</option>
                    @endforeach
                @endif
            </select>

        </div>



    </div>
    HHHHH{{ $contador }}
</div>
