<div>
    <div class="sm:block bg-gray-200 py-3 lg:flex lg:justify-around rounded-lg ">
        {{-- Tipos de Trabajo --}}
        <div>
            <label class="block font-bold ">Tipo de Trabajo</label>
            <select wire:model="selectedTipoTrabajo" class="cursor-pointer select-nuevo">

                @foreach ($tiposTrabajos as $tiposTrabajo)
                    <option value="{{ $tiposTrabajo->id }}">{{ $tiposTrabajo->name }}</option>
                @endforeach
            </select>

        </div>



        {{-- Autonomias --}}
        <div>
            <label class="block font-bold">Autonomía</label>
            <select wire:model="selectedAutonomia" class="select-nuevo">
                <option value="todas">Todas las Autonomias</option>
                @foreach ($autonomias as $autonomia)
                    <option value="{{ $autonomia->id }}">{{ $autonomia->name }}</option>
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
            disabled
            @else
            class="select-nuevo cursor-pointer"
            @endif
            >
                <option value="todas">Todas las Provincias</option>
                @if (!is_null($provincias))
                    @foreach ($provincias as $provincia)
                        <option value="{{ $provincia->id }}">{{ $provincia->name }}</option>
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
                    @foreach ($localidades as $localidad)
                        <option value="{{ $localidad }}">{{ $localidad->name }}</option>
                    @endforeach
                @endif
            </select>

        </div>


    </div>
    {{-- HHHHH{{ $contador }} --}}
</div>

{{-- <div>
            <label class="block font-bold ">Provincia {{$selectedProvincia}}</label>
            <select wire:model="selectedProvincia"
            @if (is_null($provincias)) disabled
                class ="cursor-not-allowed"
            @else
                class = "cursor-pointer"
            @endif
            wire:loading.class="animate-pulse cursor-wait" wire:target="selectedAutonomia">
            <option value="">Todas las Provincias</option>
                @if (!is_null($provincias))
                    @foreach ($provincias as $provincia)
                        <option value="{{ $provincia }}">{{ $provincia->name }}</option>
                    @endforeach
                @endif
            </select>

        </div> --}}
