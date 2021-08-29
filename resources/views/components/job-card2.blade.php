<div>
    <!-- component -->
    @php
        if (!is_null($job->listaTipos)) {
            $tipos = explode('|', $job->listaTipos);
        }
    @endphp

    <article class="my-5  rounded-lg shadow-md bg-gray-50 bg-opacity-50">
        <div class="justify-left flex">
            <div class="flex-1 ">
                <div class="flex items-center">
                    <button  class="flex ml-4 h-6 w-6 items-center justify-center mt-3 px-3 text-xs text-indigo-100 transition-colors duration-150 bg-gray-500 rounded-full focus:shadow-outline hover:bg-gray-800"
                    x-on:click="openModal = true;
                    $refs.descripcionOferta.innerHTML = '{{addslashes($job->excerpt)}}';
                    $refs.titulo.innerHTML = '{{addslashes($job->title)}}'
                    "
                    >
                    <i class="fas fa-search-plus my-2"></i>
                   </button>



                    <h2 class="mt-3 ml-4 text-2xl font-semibold">
                        {{$job->title}}
                    </h2>


                    @isset($tipos)

                        <div class="flex justify-end mr-10 mt-3 items-center">
                            @foreach ($tipos as $tipo)
                                <span class="ml-5 px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                    {{ $tipo }}
                                </span>
                            @endforeach
                        </div>
                    @endisset
                </div>

                <div class="mt-3 ml-4 flex">
                    <p class="font-semibold mr-1 text-red-900 text-lg">{{ $job->localidad }}</p>
                    @if ($job->provincia != $job->localidad)
                        <p class="text-lg">({{ $job->provincia }})</p>
                     @endif

                </div>

                <div class="mt-3 ml-3 mb-3">

                    @isset($job->contrato)
                        <span class="mr-4 items-center justify-center text-base font-bold leading-none text-black">
                            <strong>Contrato:</strong>
                            <span class="font-semibold">{{ $job->contrato }}</span>
                        </span>
                    @endisset
                    @isset($job->jornada)
                        <span class="mr-4 items-center justify-center text-base font-bold leading-none text-black ">
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

            </div>
            <div class="flex items-center border-l-2 ">
                <div class="text-center bg-gray-50 px-2 items-center justify-center">
                    <span class="bg-gray-200 hover:bg-gray-300 rounded-full px-2 font-bold text-sm leading-loose mt-4" >
                        {{ \Carbon\Carbon::parse($job->datePosted)->diffForHumans() }}
                    </span>
                    <p class="mt-3 mb-3">
                        {{$job->jobFuente}}
                    </p>
                    <button
                        class="px-1 text-xs text-indigo-100 transition-colors duration-150 bg-indigo-700 rounded-lg focus:shadow-outline hover:bg-indigo-800 justify-end"
                        onclick="window.open('{{ $job->jobUrl }}')">
                        <span class="ml-2 text-sm">Ir a la oferta</span>
                    </button>
                </div>
            </div>
        </div>



    </article>
</div>

