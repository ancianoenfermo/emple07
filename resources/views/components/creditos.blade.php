<div>
    <hr class="bg-pink-600 h-0.5 mt-10 border-none bg-opacity-25">
    <span class="italic text-xs pt-4 font-semibold">Fuentes consultadas:</span>
    @php
        $fuentes = explode('|', $slot);
    @endphp
    @foreach ($fuentes as $fuente)
        @php
            $todo = explode('#', $fuente);
        @endphp

        <a class="text-xs pl-10 block" href="{{$todo[1]}}" target="_blank">
        {{$todo[0]}}
        </a>

     @endforeach
     <hr class="bg-pink-600 h-0.5 mt-4 border-none bg-opacity-25">
</div>
