<main class="flex flex-col h-screen">
    <div class="flex flex-1 overflow-hidden">
        <div class="flex flex-1 flex-col mt-16">

            <div  class=" bg-pink-400 h-16 p-4 inline-flex">
                <div id="totalEmpleos">{{$totalEmpleos}}&ensp;</div>
                <div id="divFiltros" class="pb-2">{{$h1Title}}</div>
            </div>

            <div  class="mx-auto p-4 border-2 border-pink-600">
                <div class="inline-flex py-4 " >
                    
                    @foreach ($filters as $filter )
                        @if ($loop->first)
                            <i class="fas fa-filter"></i>
                        @endif

                     <span class="px-2 py-1 ml-5 text-xs items-center font-semibold border-2 border-pink-600 rounded-full  text-pink-700">{{$filter}}</span>
                    @endforeach
                </div>
            </div>


            <div class=" bg-white overflow-y-auto paragraph px-4">

                    <div id="blur">
                    @foreach ($empleos as $empleo )
                        
                        <x-cardempleo :empleo=$empleo index="{{$loop->iteration}}"/>
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

