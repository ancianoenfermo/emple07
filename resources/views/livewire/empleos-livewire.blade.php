<main class="flex flex-col h-screen">
    <div class="flex flex-1 overflow-hidden">
        <div class="flex flex-1 flex-col mt-16">
           <div class="bg-pink-400 h-24 pt-4 pb-4 ">
                <div  class="flex w-full justify-center text-2xl items-center">
                    <div id="totalEmpleos">{{$totalEmpleos}}&ensp;</div>
                    <div id="divFiltros" class="ml-2">{{$h1Title}}</div>
                </div>



                @empty($filters)

                @else
                    <div id="filtrosB" class="mx-auto p-4 ">
                        <div class="inline-flex items-center" >

                            @foreach ($filters as $filter )
                                @if ($loop->first)
                                    <i class="fas fa-filter text-pink-100"></i>
                                @endif

                            <span class="bg-pink-100 px-2 py-1 ml-5 text-xs items-center font-semibold  rounded-full  text-pink-700">{{$filter}}</span>
                            @endforeach
                        </div>
                    </div>
                @endempty
            </div>

            <div class="bg-slate-200  overflow-y-auto paragraph px-4 ">
                <div  >

                        <button id="spinner" type="button"  class="invisible z-50 absolute top-1/2 left-1/4 inline-flex items-center px-4 py-2 font-semibold leading-6 text-sm shadow rounded-md text-white bg-pink-500 hover:bg-pink-400 transition ease-in-out duration-150 cursor-not-allowed" disabled="">
                            <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                            <span id="textSpinner">Processing...</span>
                        </button>

                    <div id="blur" >
                        @foreach ($empleos as $empleo )

                            <x-cardempleo :empleo=$empleo index="{{$loop->iteration}}"/>
                        @endforeach
                    </div>
                </div>

                {{ $empleos->links()}}

                <x-separadorFooter/>
                <x-footer/>
            </div>

        </div>
        <div class=" bg-pink-100 w-64 p-2 mt-16">


            {{--TIPO DE TRABAJO Y OTROS--}}
            <div class=" mx-1 px-1 pb-2 ">
                @livewire('ubicacion')
                <hr class="h-1 bg-pink-400 mt-2">
            </div>



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

