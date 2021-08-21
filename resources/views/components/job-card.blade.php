<div>
    <!-- component -->

    <article class="my-5  px-6 rounded-lg shadow-md bg-gray-50 bg-opacity-50" x-ref="job">

        <div class="flex px-0 py-2 justify-left border-b-2">

            @php
                $publicado = 'Publicado ' . \Carbon\Carbon::parse($job->datePosted)->diffForHumans() . '  (' . $job->jobFuente.')';
            @endphp
                <span class="text-yellow-600">{{ $publicado }}</span>
                <p class="ml-36 font-semibold inline-block">{{ $job->localidad }}</p>
                @if ($job->provincia != $job->localidad)
                    <p class="ml-1 inline-block">( {{ $job->provincia }} )</p>
                @endif



            @php
                if (!is_null($job->listaTipos)) {
                    $tipos = explode('|', $job->listaTipos);
                }
             @endphp
            @isset($tipos)
                <div class="flex-1">
                    <div class="flex justify-end mr-10">
                        @foreach ($tipos as $tipo)
                            <span class="ml-5 px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                {{ $tipo }}
                            </span>
                        @endforeach
                    </div>
                </div>

            @endisset

        </div>

        <header class="mt-2 ml-2">

            <div class="flex">
                <div class="flex flex-1">
                    <h1 class=" mt-2 text-2xl font-bold" >{{ $job->title }}</h1>
                    @php
                        $hola = <<<EOD
$job->excerpt
EOD;
                    @endphp
                    <button class="focus:shadow-outline" wire:click="showModal({})">
                    {{-- <i class=" ml-5 text-gray-400 fas fa-search-plus"></i> --}}
                    pp
                    </button>

                </div>

                <button
                    class="h-8 px-4 mt-2 mb-3 text-sm text-indigo-100 transition-colors duration-150 bg-indigo-700 rounded-lg focus:shadow-outline hover:bg-indigo-800 justify-end"
                    onclick="window.open('{{ $job->jobUrl }}')">
                    <span class="ml-2 text-sm">Ir a la oferta</span>
                </button>
            </div>
        </header>



        <div class="pb-2">

            @isset($job->contrato)
                <span class="mr-4 items-center justify-center px-2  text-base font-bold leading-none text-black">
                    <strong>Contrato:</strong>
                    <span class="px-1 font-semibold">{{ $job->contrato }}</span>
                </span>
            @endisset
            @isset($job->jornada)
                <span class="mr-4 items-center justify-center px-2  text-base font-bold leading-none text-black ">
                    <strong>Jornada:</strong>
                    <span class="px-1 font-semibold">{{ $job->jornada }}</span>
                </span>
            @endisset
            @isset($job->salario)
                <span class="mr-4 items-center justify-center px-2  text-base font-bold leading-none text-black">
                    <strong>Salario:</strong>
                    <span class="px-1 font-semibold">{{ $job->salario }}</span>
                </span>
            @endisset
            @isset($job->vacantes)
                <span class="mr-4 items-center justify-center px-2  text-base font-bold leading-none text-black">
                    <strong>Vacantes:</strong>
                    <span class="px-1 font-semibold">{{ $job->vacantes }}</span>
                </span>
            @endisset
            @isset($job->experiencia)
                <span class="mr-4 items-center justify-center px-2  text-base font-bold leading-none text-black ">
                    <strong>Experiencia:</strong>
                    <span class="px-1 font-semibold">Requerida</span>
                </span>
            @endisset

        </div>

    </article>
</div>

