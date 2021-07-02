<div>
    <!-- component -->
    <article class=" ml-10 mr-10 px-10 my-10 py-6 rounded shadow-xl bg-white">
        <div class="lg:grid grid-cols-12"> {{-- class="flex justify-start"> --}}
            <div class="lg:col-span-5 flex-col items-start">
                <span class="font-bold">Publicado {{ $job->dateHumana }} en</span>
                <span class="ml-2 mr-2">{{ $job->fuente->JobFuente }}</span>
            </div>
            <div class="lg:col-span-7 flex-col">
                @foreach ($job->tipojobs as $tipoJob)
                    @if ($tipoJob->name != 'Todos los trabajos')
                        <span style="padding-top: 0.2em; padding-bottom: 0.2rem"
                            class="space-x-1 text-xs px-2  bg-red-200 border border-bg-red-900 text-red-800 rounded-full">
                            {{ $tipoJob->name }}
                        </span>
                    @endif
                @endforeach
            </div>
        </div>
        <div>
            <p class="font-semibold inline-block mt-1">{{ $job->localidad->name }}</p>
            @if ($job->provincia->name != $job->localidad->name)
                <p class="ml-1 inline-block">( {{ $job->provincia->name }} )</p>
            @endif
        </div>

        <hr class="mt-3 " color="bg-gray-200">
        <header class="mt-2">
            <h1 class="text-2xl font-bold">{{ $job->title }}</h1>
        </header>
        <div class="text-lg ml-5 mt-2">
            <p> {{ $job->excerpt }}</p>
        </div>
        <hr class="mt-2 " color="bg-gray-200">
        <div class="mt-2 mb-2">

            @isset($job->contrato->name)
                <span class="mr-4 items-center justify-center px-2 py-1 text-base font-bold leading-none text-black">
                    <strong>Contrato:</strong>
                    <span class="px-1 font-semibold">{{ $job->contrato->name }}</span>
                </span>
            @endisset
            @isset($job->jornada->name)
                <span class="mr-4 items-center justify-center px-2 py-1 text-base font-bold leading-none text-black ">
                    <strong>Jornada:</strong>
                    <span class="px-1 font-semibold">{{ $job->jornada->name }}</span>
                </span>
            @endisset
            @isset($job->salario)
                <span class="mr-4 items-center justify-center px-2 py-1 text-base font-bold leading-none text-black">
                    <strong>Salario:</strong>
                    <span class="px-1 font-semibold">{{ $job->salario }}</span>
                </span>
            @endisset
            @isset($job->vacantes)
                <span class="mr-4 items-center justify-center px-2 py-1 text-base font-bold leading-none text-black">
                    <strong>Vacantes:</strong>
                    <span class="px-1 font-semibold">{{ $job->vacantes }}</span>
                </span>
            @endisset
            @isset($job->experiencia->name)
                <span class="mr-4 items-center justify-center px-2 py-1 text-base font-bold leading-none text-black ">
                    <strong>Experiencia:</strong>
                    <span class="px-1 font-semibold">Requerida</span>
                </span>
            @endisset

        </div>






        <div class="flex justify-between items-center mt-4">
            <button
            class="bg-blue-500 hover:bg-blue-400 text-white font-bold px-2 mt-3 border-b-4 border-blue-700 hover:border-blue-500 rounded"
            onclick="window.open('{{ $job->fuente->jobUrl }}')">
            <i class="fas fa-glasses"></i>
            <span class="ml-2 text-sm">Ir a la oferta</span>
        </button>
        </div>




    </article>
</div>
