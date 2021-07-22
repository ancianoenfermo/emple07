<div>
   <div>
       <select wire:model="selectedAutonomia" class="select-nuevo">
           <option value="">Autonomia</option>
           @foreach ($autonomias as $item)
              <option value="{{$item->id}}">{{$item->name}}</option>
           @endforeach
       </select>
   </div>

   @if(!is_null($provincias))
        <div>
            <select wire:model="selectedProvincia" class="select-nuevo">
                <option value="">Provincias</option>
                @foreach ($provincias as $item)
                <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
        </div>
    @endif

    @if(!is_null($localidades))
    <div>
        <select wire:model="selectedLocalidad" class="select-nuevo">
            <option value="">localidades</option>
            @foreach ($localidades as $item)
            <option value="{{$item->id}}">{{$item->name}}</option>
            @endforeach
        </select>
    </div>
@endif
</div>
