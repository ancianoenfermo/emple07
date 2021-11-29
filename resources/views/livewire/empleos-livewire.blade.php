<main class="flex flex-col h-screen">
    <div class="flex flex-1 overflow-hidden">
        <div class="flex flex-1 flex-col mt-16">

            <div  class=" bg-pink-400 h-16 p-4 inline-flex">
                <div id="totalEmpleos">{{$totalEmpleos}}&ensp;</div>
                <div id="divFiltros">{{$h1Title}}</div>
            </div>

            <div  class=" bg-pink-200 p-4">
                <div class="inline-flex">
                    <i class="fas fa-filter"></i>
                    @foreach ($filters as $filter )
                     <span class="px-2 py-1 text-xs items-center font-semibold rounded-full bg-pink-700 text-white">{{$filter}}</span>
                    @endforeach
                </div>
            </div>


            <div class=" bg-white overflow-y-auto paragraph px-4">

                    <div id="blur">
                    @foreach ($empleos as $empleo )
                    <x-cardempleo :empleo=$empleo/>
                    @endforeach
                    </div>

                <div>
                {{ $empleos->links()}}
                </div>
                <x-separadorFooter/>
                <x-footer/>
            </div>

        </div>
        <div class=" bg-pink-100 w-64 p-2 mt-16">


            {{--TIPO DE TRABAJO Y OTROS--}}
            <div class=" mx-1 px-1 pb-2 ">
                @livewire('ubicacion')
                <hr class="h-1 bg-pink-400 mt-2">
                <div class="grid grid-cols-2 gap-x-1 pt-4 px-1 pb-2">
                    <div>
                        <label class="inline-flex items-center mt-3 text-xs">
                            <input type="checkbox" class="form-checkbox h-5 w-5 text-pink-600" checked><span class="ml-2 text-gray-700">Discapacidad</span>
                        </label>
                    </div>
                    <div>
                        <label class="inline-flex items-center mt-3 text-xs ">
                            <input type="checkbox" class="form-checkbox h-5 w-5 text-pink-600" checked><span class="ml-2 text-gray-700">Prácticas</span>
                        </label>
                    </div>
                    <div>
                        <label class="inline-flex items-center mt-3 text-xs">
                            <input type="checkbox" class="form-checkbox h-5 w-5 text-pink-600" checked><span class="ml-2 text-gray-700">Teletrabajo</span>
                        </label>
                    </div>
                    <div>
                        <label class="inline-flex items-center mt-3 text-xs">
                            <input type="checkbox" class="form-checkbox h-5 w-5 text-pink-600" checked><span class="ml-2 text-gray-700">100% Teletrabajo</span>
                        </label>
                    </div>
                    <div>
                        <label class="inline-flex items-center mt-3 text-xs">
                            <input type="checkbox" class="form-checkbox h-4 w-4 text-pink-600" checked><span class="ml-2 text-gray-700">ETT</span>
                        </label>
                    </div>
                    <div>
                        <label class="inline-flex items-center text-xs">
                            <input type="checkbox" class="form-checkbox text-pink-600" checked>
                            <span class="ml-2">Option 1</span>
                          </label>
                    </div>



                </div>









                <div class="flex items-center pt-2">
                    <label class="w-24 text-xs block mr-2">Salario</label>
                    <select class="block w-full text-xs  border-pink-400 focus:border-pink-300 focus:ring focus:ring-pink-200 focus:ring-opacity-50 rounded-md shadow-sm">
                        <option value="">Todos</option>
                    </select>
                </div>
            </div>
            <hr class="block bg-gradient-to-b from-pink-200 via-pink-300 to-pink-600 h-2 border-none">


        </div>
        <x-jet-dialog-modal wire:model="open">
            <x-slot name="title">
               <strong>{{$title}}</strong>
            </x-slot>
            <x-slot name="content">
                {!!$excerpt!!}
            </x-slot>
            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$set('open', false)" >
                    Cerrar
                </x-jet-secondary-button>
            </x-slot>
        </x-jet-dialog-modal>
    </div>


   {{--
    @if ($empleos->hasPages())
            <div
                class="bg-transparent px-4 py-10  mr-2 items-center justify-between  sm:px-6">
                {{ $empleos->links()}}
            </div>

        @endif
    --}}


</main>

