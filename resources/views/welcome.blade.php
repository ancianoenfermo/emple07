<x-app-layout>

    <header class="cabecera" itemscope itemtype="http://schema.org/WPHeader">

        <div class="mx-auto px-4 sm:px-6 lg:px-8 pt-5 pb-5">
            <div class="flex">
                <div class=flex-1>
                    <h1 itemprop="name" class="pb-6 tituloH1">¿Estás buscando empleo?</h1>
                    <p class="nivelp text-2xl italic leading-relaxed text-justify ">Para que tu proceso de búsqueda de empleo pueda obtener mejores frutos, es preciso que te prepares y aproveches cualquier oportunidad para venderte en el mercado laboral y encontrar trabajo con éxito.</p>
                </div>
                <div class="flex items-center ml-10">
                    <div class="bg-white border-2 border-pink-400  rounded-lg shadow-lg">
                        <div class="container mx-auto text-center px-4 py-6 text-white ">
                            <h2 itemprop="description" class="text-2xl md:text-4xl font-medium text-pink-600">Ofertas de trabajo</h2>
                            <p class="mt-3 text-pink-600">Ofertas publicadas en España en los últimos treinta días</p>


                            <aside class="flex items-center justify-center mt-4">
                                <a itemprop="url" class="animate-pulse text-mx text-center font-extrabold text-white transition-colors duration-150 bg-pink-400 rounded-lg focus:shadow-outline hover:bg-pink-600"
                                href="{{Route('ofertas')}}"><span class=" flex mx-5 py-1 ">Ver todas las ofertas</span>
                                </a>
                            </aside>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </header>
    <x-separadorCabecera/>

    <section class="bg-white pb-4">
        <h1 class="text-pink-800 text-center font-bold text-3xl mb-10 pt-10 ">RECURSOS PARA LA BÚSQUEDA DE EMPLEO</h1>
        <div class="mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8">
            {{-- ¿Donde puedo buscar empleo?--}}
            <article class="max-w-sm rounded overflow-hidden shadow-lg border-2" itemscope itemtype="http://schema.org/Article">
                <a itemprop="url" href="{{ route('buscarEmpleo') }}">
                <header class="px-6 py-4">
                  <h1 itemprop="name" class="h-14 text-pink-600 font-bold text-xl mb-2 text-center">¿Dónde puedo buscar trabajo?</h1>
                  <hr class="bg-pink-600 h-1 border-none">
                  <p itemprop="articleBody" class="text-gray-700 text-base text-justify" >
                    Durante la búsqueda de empleo, tu objetivo es ponerte en contacto con las empresas y convencerlas de tus idoneidad para el puesto de trabajo.
                  </p>
                </header>
                </a>
            </article>
            {{-- La entrevista de trabajo--}}
            <article class="max-w-sm rounded overflow-hidden shadow-lg border-2" itemscope itemtype="http://schema.org/Article">
                <a itemprop="url" href="{{ route('entrevista') }}">
                <header class="px-6 py-4">
                  <h1 itemprop="name" class=" h-14 text-pink-600 font-bold text-xl mb-2 text-center">¿Cómo realizar una entrevista de trabajo</h1>
                  <hr class="bg-pink-600 h-1 border-none">
                  <p itemprop="articleBody" class="text-gray-700 text-base text-justify" >
                    La entrevista es la técnica más utilizada en los procesos de selección de personal.
                  </p>
                </header>
                </a>
            </article>
            {{-- El Curriculum vita--}}
            <article class="max-w-sm rounded overflow-hidden shadow-lg border-2" itemscope itemtype="http://schema.org/Article">
                <a itemprop="url" href="{{ route('curriculum') }}">
                <header class="px-6 py-4">
                <h1 itemprop="name" class=" h-14 text-pink-600 font-bold text-xl mb-2 text-center">¿Cómo realizar el curriculum vitae</h1>
                <hr class="bg-pink-600 h-1 border-none">
                <p itemprop="articleBody" class="text-gray-700 text-base text-justify" >
                    El curriculum es el instrumento para presentarte a las instituciones o empresas; es tu tarjeta de presentación
                </p>
                </header>
                </a>
            </article>
            {{-- La Carta de presentación--}}
            <article class="max-w-sm rounded overflow-hidden shadow-lg border-2" itemscope itemtype="http://schema.org/Article">
                <a itemprop="url" href="{{ route('carta') }}">
                <header class="px-6 py-4">
                <h1 itemprop="name" class=" h-14 text-pink-600 font-bold text-xl mb-2 text-center">¿Qué es la carta de presentación?</h1>
                <hr class="bg-pink-600 h-1 border-none">
                <p itemprop="articleBody" class="text-gray-700 text-base text-justify" >
                    Es la carta que acompaña al CV y pretende atraer la atención del responsable de selección
                </p>
                </header>
                </a>
            </article>

           {{-- Formación gratuita--}}
           <article class="max-w-sm rounded overflow-hidden shadow-lg border-2" itemscope itemtype="http://schema.org/Article">
                <a itemprop="url" href="#">
                <header class="px-6 py-4">
                    <h1 itemprop="name" class=" h-14 text-pink-600 font-bold text-xl mb-2 text-center">Formación gratuita</h1>
                    <hr class="bg-pink-600 h-1 border-none">
                    <p itemprop="articleBody" class="text-gray-700 text-base text-justify" >
                        100% Subvencionados por el Ministerio de Trabajo, Migraciones y Seguridad Social
                    </p>
                </header>
                </a>
            </article>

            {{-- El contrato de formación y apredizaje--}}
            <article class="max-w-sm rounded overflow-hidden shadow-lg border-2" itemscope itemtype="http://schema.org/Article">
                <a itemprop="url" href="#">
                <header class="px-6 py-4">
                    <h1 itemprop="name" class=" h-14 text-pink-600 font-bold text-xl mb-2 text-center">El contrato de formación y apredizaje</h1>
                    <hr class="bg-pink-600 h-1 border-none">
                    <p itemprop="articleBody" class="text-gray-700 text-base text-justify" >
                        Destinado a favorecer la inserción laboral y la formación de las personas jóvenes
                    </p>
                </header>
                </a>
            </article>
            {{-- El contrato en prácticas --}}
            <article class="max-w-sm rounded overflow-hidden shadow-lg border-2" itemscope itemtype="http://schema.org/Article">
                <a itemprop="url" href="#">
                <header class="px-6 py-4">
                    <h1 itemprop="name" class=" h-14 text-pink-600 font-bold text-xl mb-2 text-center">El contrato en prácticas</h1>
                    <hr class="bg-pink-600 h-1 border-none">
                    <p itemprop="articleBody" class="text-gray-700 text-base text-justify" >
                        Tiene por objeto la obtención por el trabajador de la práctica profesional adecuada al nivel de estudios cursados
                    </p>
                </header>
                </a>
            </article>

        </div>
    </section>
    <x-separadorFooter/>
    <x-footer/>
</x-app-layout>
