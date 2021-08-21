<div>
    <div wire:init="loadEmpleos" class="pt-3 mx-10 rounded-lg relative">
        <div class=" border-gray-200 border-opacity-50 rounded-lg


        @if (!$showSearch) hidden @endif relative">
            @livewire('filter-jobs')


        </div>

        @if (count($jobs))
            <div class="mx-5 mt-10">
                <x-job-table>
                    <div class="px-6 py-3 flex">
                        <x-jet-input class="w-full mx-4" placeholder="Escriba que está buscando y pulse ENTER" type=text
                            name="pp" wire:model.defer="search" wire:keydown.enter="search" />

                    </div>
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Fecha
                                </th>
                                <th scope="col"
                                    class="border-l-2 px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Trabajo
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($jobs as $job)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap ">
                                        <div class="text-sm font-bold text-gray-900">
                                            {{ \Carbon\Carbon::parse($job->datePosted)->format('d-m-Y') }}
                                        </div>
                                        <div>
                                            <span class="text-right text-xs">
                                                Publicado en
                                            </span>
                                        </div>
                                        <div>
                                            <p class="text-right text-xs inline-block ">
                                                {{ $job->jobFuente }}
                                            </p>
                                        </div>
                                    </td>
                                    @php
                                        if (!is_null($job->listaTipos)) {
                                            $tipos = explode('|', $job->listaTipos);
                                        }
                                    @endphp
                                    <td class="py-2 pl-3 border-l-2 ">
                                        <div class="text-lg font-bold text-gray-900 whitespace-nowrap ">
                                            <p>{{ $job->title }}</p>
                                        </div>
                                        <div class="py-2 whitespace-nowrap text-lg">
                                            <span>
                                                {{ $job->localidad }}
                                                @if ($job->provincia != $job->localidad)
                                                    ({{ $job->provincia }})
                                                @endif

                                            </span>

                                        </div>

                                        <div class="overflow-auto h-32 whitespace-normal mx-4 text-base text-gray-900">{!! $job->excerpt !!}</div>

                                        <div class="text-xs text-gray-900 pt-4 whitespace-nowrap ">
                                            @isset($job->contrato)
                                                <span
                                                    class="mr-4 items-center justify-center py-2 text-xs font-bold leading-none text-black">
                                                    <strong>Contrato:</strong>
                                                    <span class="px-1 font-semibold">{{ $job->contrato }}</span>
                                                </span>
                                            @endisset
                                            @isset($job->jornada)
                                                <span
                                                    class="mr-4 items-center justify-center py-2 text-xs font-bold leading-none text-black">
                                                    <strong>Jornada:</strong>
                                                    <span class="px-1 font-semibold">{{ $job->jornada }}</span>
                                                </span>
                                            @endisset
                                            @isset($job->salario)
                                                <span
                                                    class="mr-4 items-center justify-center py-2 text-xs font-bold leading-none text-black">
                                                    <strong>Salario:</strong>
                                                    <span class="px-1 font-semibold">{{ $job->salario }}</span>
                                                </span>
                                            @endisset
                                            @isset($job->vacantes)
                                                <span
                                                    class="mr-4 items-center justify-center py-2 text-xs font-bold leading-none text-black">
                                                    <strong>Vacantes:</strong>
                                                    <span class="px-1 font-semibold">{{ $job->vacantes }}</span>
                                                </span>
                                            @endisset
                                            @isset($job->experiencia)
                                                <span
                                                    class="mr-4 items-center justify-center py-2 text-xs font-bold leading-none text-black">
                                                    <strong>Experiencia:</strong>
                                                    <span class="px-1 font-semibold">Requerida</span>
                                                </span>
                                            @endisset

                                            @isset($tipos)

                                                @foreach ($tipos as $tipo)
                                                    <span
                                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                        {{ $tipo }}
                                                    </span>
                                                @endforeach

                                            @endisset
                                        </div>
                                        <div class="h-6 mt-3 flex justify-items-end align-top ">
                                            <div>
                                            <button class="flex justify-items-end mr-10 bg-blue-500 hover:bg-blue-700 text-white font-bold  px-4 border border-blue-700 rounded" type="button" onclick="window.open('{{ $job->jobUrl }}')">Ir a la oferta
                                            </button>
                                        </div>
                                    </td>


                                </tr>
                            @endforeach
                            <!-- More people... -->
                        </tbody>
                    </table>


                </x-job-table>

                {{-- @foreach ($jobs as $job)
                  <x-jobCard :job=$job />
                   <x-job-table/> --}}
                @if ($jobs->hasPages())
                    <div
                        class="bg-gray-200 px-4 py-3 mt-5 mb-5 mr-2 items-center justify-between border-t border-gray-200 sm:px-6">
                        {{ $jobs->links() }}
                    </div>

                @endif
            </div>
        @else

                <div class="px-4 py-3 mt-5 ">
                    No existen registros
                </div>


        @endif
        <div wire:loading class="backdrop-filter backdrop-blur-sm absolute inset-x-0  top-0 h-full w-full">

            <div style="color: #283618" class="la-line-scale-pulse-out items-center absolute top-6 left-1/2">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>


        </div>
    </div>

</div>
{{--
<div class="mx-5 mt-10">
                <x-job-table>
                    <div class="px-6 py-3 flex">
                        <x-jet-input class="w-full mx-4" placeholder="Escriba que está buscando y pulse ENTER" type=text
                            name="pp" wire:model.defer="search" wire:keydown.enter="search" />

                    </div>
                </x-job-table>

                <div class="px-4 py-3 mt-5 ">
                    No existen registros
                </div>
            </div>
--}}
