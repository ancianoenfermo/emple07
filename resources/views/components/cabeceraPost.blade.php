@props(['video'=>null])
<header itemscope itemtype="http://schema.org/WPHeader" class="mx-auto px-4 sm:px-6 lg:px-8 pt-10 pb-5 cabecera">
    <div class="grid grid-cols-2 gap-8">
        <div class="">
            <h1 itemprop="name" class="pb-3 tituloH1 ">
                {{$slot}}
            </h1>
            <p itemprop="description" class="h2parrafo">
                {{$descripcion}}
             </p>
        </div>
        <aside class="grid grid-rows-1  items-center">
           <div class="grid grid-cols-2 gap-4">
                @if($video)
                <div>
                    <div class="youtube-player max-h-2xl " data-id={{$video}}></div>
                </div>
                @endif
                <div>
                    <x-ctaofertas/>
                </div>
           </div>

        </aside>

    </div>
</header>
<x-separadorCabecera/>
