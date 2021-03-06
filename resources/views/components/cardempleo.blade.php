<div class=" pt-4 mx-24 bg-white shadow-lg rounded-lg my-10  border-b-4 border-pink-500">

    @php
        $tipos =[];
        if (strlen($empleo->tipos)>2) {
            $tipos = explode(',', $empleo->tipos);
        }
    @endphp
    {{--Linea 1--}}
    <div class="pt-2 ml-4 flex">
        <div class="flex flex-1">
            <!-- Localidad -->
            <div class="flex">
                <i class="fas fa-map-marker-alt fill-current text-gray-500 my-auto"></i>
                <p class="font-semibold ml-1 text-red-900 text-base">{{ $empleo->localidad }}</p>
            </div>

            <span class="mx-3">|</span>

            <!-- Fecha de Publicación -->
            <div class="flex">
                <i class="fas fa-calendar-week fill-current text-gray-500 my-auto"></i>
                <p class="text-base ml-1">{{ \Carbon\Carbon::parse($empleo->datePosted)->diffForHumans() }}</p>
            </div>

            <span class="mx-3">|</span>

            <!-- Web editor -->
            <div class="flex" >
                <i class="fab fa-internet-explorer fill-current text-gray-500 my-auto"></i>
                <span class="text-base ml-1">{{$empleo->JobFuente}}</span>
            </div>
        </div>




        @if (count($tipos) > 0)
            <div class=" flex ml-4 items-end" >

                @foreach ($tipos as $tipo)

                    <span class=" px-2  mr-5 text-sm  font-semibold rounded-full bg-pink-400 text-white">
                            {{ $tipo }}
                    </span>

                @endforeach

            </div>
        @endif



    </div>
    <hr class="mt-1"/>
    {{--Linea 2--}}
    <div class="flex">
        <div class="flex my-auto mt-2" >
            <h2 class="ml-4 text-gray-800 text-2xl font-semibold">
                {{$empleo->title}}
            </h2>
        </div>
    </div>
    {{--Linea 3--}}
    <div class=" inline-flex items-baseline mr-2">
        <p class=" mt-2 ml-4  text-gray-600">{{$empleo->excerptCorto}}...
        <a id="{{$index}}" onclick="leermas({{$index}})" class="italic text-pink-600 cursor-pointer font-semibold" wire:click="showExceprt({{$empleo}})">Leer más
        </a>
        </p>
    </div>

    {{--Linea 4--}}
    <div class="flex pt-6 pb-2 ml-4">

        @if(!@empty($empleo->contrato))
            <span class="mr-4 items-center text-sm leading-none text-black">
                Contrato:
                <strong>{{ $empleo->contrato }}</strong>
            </span>
        @endif


        @if(!@empty($empleo->jornada))
            <span class="mr-4 items-center  text-sm leading-none text-black ">
                Jornada:
                <strong class="px-1">{{ $empleo->jornada }}</strong>
            </span>
        @endif
        @if(!@empty($empleo->salario))
            <span class="mr-4 items-center  px-2  text-sm leading-none text-black">
                Salario:
                <strong class="px-1">{{ $empleo->salario }}</strong>
            </span>

        @endif

        @if(!@empty($empleo->vacantes))
            <span class="mr-4 items-center  px-2  text-sm  leading-none text-black">
                Vacantes:
                <strong class="px-1 ">{{ $empleo->vacantes }}</strong>
            </span>
        @endif
        @if(!@empty($empleo->Texperiencia))
            <span class="mr-4 items-center  px-2  text-sm  leading-none text-black ">
                Experiencia:
                <strong class="px-1 ">Requerida</strong>
            </span>
        @endif

    </div>
    <hr class=""/>
    <div class="hover:bg-pink-200 h-16 flex flex-col-2  justify-center items-center ">
        <div class="flex-1">
            <a href="{{ $empleo->JobUrl }}" target="_blank" class="ml-4  text-xl font-semibold text-pink-800">Ver la oferta en {{$empleo->JobFuente}}</a>
        </div>
        <div>
            {{--<span class="text-6xl mr-8 text-pink-600">&#8594;</span>--}}
            <a class="text-6xl mr-8 text-pink-600" href="{{ $empleo->JobUrl }}" target="_blank" class="ml-4  text-xl font-semibold text-pink-800">&#8594;</a>
        </div>
    </div>



</div>

