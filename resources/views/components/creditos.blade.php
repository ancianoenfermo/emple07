<div>
    <span class="italic text-xs pt-10">Fuentes consultadas:</span>
    @php
        $fuentes = explode('|', $slot);
    @endphp
     @foreach ($fuentes as $fuente)
     <span class="text-xs pl-10 block">{{$fuente}}</span>
     @endforeach
</div>
