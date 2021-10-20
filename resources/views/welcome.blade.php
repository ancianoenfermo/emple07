<x-app-layout>

    <header class="cabecera" itemscope itemtype="http://schema.org/WPHeader">

        <div class="mx-auto px-4 sm:px-6 lg:px-8 pt-5 pb-5">
            <div class="flex">
                <div class=flex-1>
                    <h1 itemprop="name" class="pb-6 tituloH1">¿Estás buscando empleo?</h1>
                    <p class="h2parrafo">iuando buscas empleo es muy frustrante que tras enviar tu curriculum a todas partes no recibas ninguna respuesta. Si es tu caso debes cambiar de estrategia identificando todos los pasos necesarios para la búsqueda de empleo.</p>
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

    <section class="container mx-auto text-xl leading-normal text-justify px-16 bg-pink-50 ">

        <hr class="bg-pink-600 h-0.5 mt-4 border-none bg-opacity-25">
        <h1 class="text-pink-800 text-center font-bold text-2xl py-1">LO QUE DEBES CONOCER PARA UNA BÙSQUEDA EFICAZ DE EMPLEO</h1>
        <hr class="bg-pink-600 h-0.5 mb-4 border-none bg-opacity-25">
        <p class="h2parrafo">Conoce las diferentes técnicas y herramientas para la  búsqueda de empleo que te ayudarán a definir una estrategia para que no te frustres si estás buscando empleo</p>


        <div class="mx-auto grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8 pt-10">
            {{-- ¿Donde puedo buscar empleo?--}}
            <article class="max-w-sm rounded overflow-hidden shadow-lg border-2 bg-white" itemscope itemtype="http://schema.org/Article">
                <a itemprop="url" href="{{ route('buscarEmpleo') }}">
                <header class="px-6 py-4">
                  <h1 itemprop="name" class="h-14 text-pink-600 text-base mb-2 text-center">¿Dónde puedo <strong>buscar trabajo</strong>?</h1>
                  <hr class="bg-pink-600 h-1 border-none">
                  <p itemprop="articleBody" class="text-gray-700 text-base text-justify" >
                    Durante la búsqueda de empleo, tu objetivo es ponerte en contacto con las empresas y convencerlas de tus idoneidad para el puesto de trabajo.
                  </p>
                </header>
                </a>
            </article>
            {{-- La entrevista de trabajo--}}
            <article class="max-w-sm rounded overflow-hidden shadow-lg border-2 bg-white" itemscope itemtype="http://schema.org/Article">
                <a itemprop="url" href="{{ route('entrevista') }}">
                <header class="px-6 py-4">
                  <h1 itemprop="name" class=" h-14 text-pink-600 text-base mb-2 text-center">¿Cómo realizar una <strong>entrevista de trabajo</strong> </h1>
                  <hr class="bg-pink-600 h-1 border-none">
                  <p itemprop="articleBody" class="text-gray-700 text-base text-justify" >
                    La entrevista es la técnica más utilizada en los procesos de selección de personal.
                  </p>
                </header>
                </a>
            </article>
            {{-- El Curriculum vita--}}
            <article class="max-w-sm rounded overflow-hidden shadow-lg border-2 bg-white" itemscope itemtype="http://schema.org/Article">
                <a itemprop="url" href="{{ route('curriculum') }}">
                <header class="px-6 py-4">
                <h1 itemprop="name" class=" h-14 text-pink-600 text-base mb-2 text-center">¿Cómo realizar el <strong>curriculum vitae</strong></h1>
                <hr class="bg-pink-600 h-1 border-none">
                <p itemprop="articleBody" class="text-gray-700 text-base text-justify" >
                    El curriculum es el instrumento para presentarte a las instituciones o empresas; es tu tarjeta de presentación
                </p>
                </header>
                </a>
            </article>
            {{-- La Carta de presentación--}}
            <article class="max-w-sm rounded overflow-hidden shadow-lg border-2 bg-white" itemscope itemtype="http://schema.org/Article">
                <a itemprop="url" href="{{ route('carta') }}">
                <header class="px-6 py-4">
                <h1 itemprop="name" class=" h-14 text-pink-600 text-base mb-2 text-center">¿Qué es la <strong>carta de presentación</strong>?</h1>
                <hr class="bg-pink-600 h-1 border-none">
                <p itemprop="articleBody" class="text-gray-700 text-base text-justify" >
                    Es la carta que acompaña al CV y pretende atraer la atención del responsable de selección
                </p>
                </header>
                </a>
            </article>
            {{-- Ofertas de trabajo--}}
            <article class="max-w-sm rounded overflow-hidden shadow-lg border-2 bg-white" itemscope itemtype="http://schema.org/Article">
                <a itemprop="url" href="{{ route('ofertas') }}">
                <header class="px-6 py-4">
                <h1 itemprop="name" class=" h-14 text-pink-600 text-base mb-2 text-center">Ofertas de trabajo</h1>
                <hr class="bg-pink-600 h-1 border-none">
                <p itemprop="articleBody" class="text-gray-700 text-base text-justify" >
                    Ofertas publicadas en España en los últimos treinta días
                </p>
                </header>
                </a>
            </article>


           {{-- Formación gratuita--}}
           <article class="max-w-sm rounded overflow-hidden shadow-lg border-2 bg-white" itemscope itemtype="http://schema.org/Article">
                <a itemprop="url" href="#">
                <header class="px-6 py-4">
                    <h1 itemprop="name" class=" h-14 text-pink-600 text-base mb-2 text-center">Formación gratuita</h1>
                    <hr class="bg-pink-600 h-1 border-none">
                    <p itemprop="articleBody" class="text-gray-700 text-base text-justify" >
                        100% Subvencionados por el Ministerio de Trabajo, Migraciones y Seguridad Social
                    </p>
                </header>
                </a>
            </article>

            {{-- El contrato de formación y apredizaje--}}
            <article class="max-w-sm rounded overflow-hidden shadow-lg border-2 bg-white " itemscope itemtype="http://schema.org/Article">
                <a itemprop="url" href="#">
                <header class="px-6 py-4">
                    <h1 itemprop="name" class=" h-14 text-pink-600 text-base mb-2 text-center">El contrato de formación y apredizaje</h1>
                    <hr class="bg-pink-600 h-1 border-none">
                    <p itemprop="articleBody" class="text-gray-700 text-base text-justify" >
                        Destinado a favorecer la inserción laboral y la formación de las personas jóvenes
                    </p>
                </header>
                </a>
            </article>
            {{-- El contrato en prácticas --}}
            <article class="max-w-sm rounded overflow-hidden shadow-lg border-2 bg-white " itemscope itemtype="http://schema.org/Article">
                <a itemprop="url" href="#">
                <header class="px-6 py-4">
                    <h1 itemprop="name" class=" h-14 text-pink-600 text-base mb-2 text-center">El contrato en prácticas</h1>
                    <hr class="bg-pink-600 h-1 border-none">
                    <p itemprop="articleBody" class="text-gray-700 text-base text-justify" >
                        Tiene por objeto la obtención por el trabajador de la práctica profesional adecuada al nivel de estudios cursados
                    </p>
                </header>
                </a>
            </article>

            <article class="max-w-sm rounded overflow-hidden shadow-lg border-2 bg-white " itemscope itemtype="http://schema.org/Article">
                <a itemprop="url" href="#">
                <header class="px-6 py-4">
                    <h1 itemprop="name" class=" h-14 text-pink-600 text-base mb-2 text-center">¿Qué una empresa de <strong>trabajo temporal?</strong></h1>
                    <hr class="bg-pink-600 h-1 border-none">
                    <p itemprop="articleBody" class="text-gray-700 text-base text-justify" >
                        Empresa cuya actividad fundamental consiste en poner a disposición de otra empresa usuaria, con carácter temporal, trabajadores que ella ha contratado
                    </p>
                </header>
                </a>
            </article>
        </div>
        <hr class="bg-pink-600 h-0.5 mt-8 border-none bg-opacity-25">
        <h1 class="text-pink-800 text-center font-bold text-2xl py-1">Organiza tu búsqueda de trabajo</h1>
        <hr class="bg-pink-600 h-0.5 mb-4 border-none bg-opacity-25">
        <p class="h2parrafo py-1">Frecuentemente el único objetivo de las personas que <strong>buscan empleo</strong> es mandar el curriculum a cuantos más sitios mejor y esperar una respuesta. Esta es una estrategia errónea por varios motivos:</p>
        <ul class="h2ul2 list-disc list-inside ">
            <li class="h2li2">El 80% de las ofertas de trabajo no se publican en portales de empleo ni aparecen en las webs de las empresas. La forma para acceder a estas ofertas es a través de la red de contactos o el networking. También con la autocandidatura podemos acceder a estas ofertas siempre cuando despertemos en interés de la empresa.</li>
            <li class="h2li2">El envío de una gran cantidad de curriculums por si «suena la flauta», puede resultar desesperante si no consigues ninguna respuesta.</li>
        </ul>
        <x-posth3>
            ¿Qué busca la empresa para cubrir un puesto de trabajo?
        </x-posth3>


        <p class="h3parrafo">En una selección se persiguen dos objetivos: Encontrar a la persona más idónea para el puesto de trabajo y satisfacer las necesidades de la empresa y de la persona. Date cuenta de que hemos mencionado dos conceptos: más idóneo y satisfacer las necesidades. </p>
        <p class="h3parrafo">El objetivo final del proceso de selección no es elegir al mejor profesional del mercado, sino elegir a aquel que reúna en mayor grado los requisitos que exige el puesto, NO EXISTE EL CONCEPTO DE MEJOR, sino el de MÁS IDÓNEO.</p>
        <p class="h3parrafo">Son tres los requisitos necesarios para que una persona tenga un desempeño adecuado en su puesto de trabajo:</p>
        <ul class="h3ul list-decimal list-inside ">
            <li class="h3li"><strong>Que sepa hacer.</strong> Es decir, que el candidato cuente con la formación y experiencia necesaria para desempeñar dichas funciones. Que se sienta competente para el desarrollo de su trabajo.</li>
            <li class="h3li"><strong>Que quiera hacerlo.</strong> Con esto nos referimos a la actitud. Motivación por las tareas y funciones del puesto.</li>
            <li class="h3li"><strong>Que se identifique con la organización.</strong> Con sus valores, su visión y misión principalmente.</li>
        </ul>
        <x-posth3>
            Organiza tu búsqueda de trabajo
        </x-posth3>
        <p class="h3parrafo">Buscar trabajo es un trabajo en sí mismo. Es una tarea muy exigente en la que debes ser persistente y que requiere organización y, sobre todo, estrategia. Los expertos lo resumen así: la estrategia de empleo debe ser como un plan de marketing en el que el producto eres tú mismo. Lo importante será que tengas claro dónde quieres ir y cuál es tu target.</p>
        <ul class="h3ul list-decimal list-inside ">
            <li class="h3li">Define tu objetivo.</li>
            <p class="h3liparrafo">¿Estás buscando trabajo porque estás desempleado? ¿Lo estás buscando porque quieres mejorar tu puesto actual? ¿O quieres dar un giro a tu carrera profesional? La respuesta a esas preguntas te ayudará a definir cuál es el objetivo que quieres conseguir con el proceso de búsqueda de trabajo.</p>
            <li class="h3li">Defínete.</li>
            <p class="h3liparrafo">Si tú eres el producto que debes vender en el proceso de búsqueda, es muy importante que tengas muy claro cuáles son tus puntos fuertes y débiles, tus amenazas y tus oportunidades. ¿Cuál es la formación que tienes? ¿Qué puertas te puede abrir tu experiencia? Una buena manera de hacerlo es, por ejemplo, a través de un DAFO.</p>
            <li class="h3li">Define tu target.</li>
            <p class="h3liparrafo">En este punto se trata de establecer qué tipo de ofertas de empleo son las que buscamos y a qué tipos de empresas aspiramos acceder. Si tienes claro qué puedes ofrecer, te será fácil también detectar aquellas empresas y sectores a los que te podrás dirigir. Dedica también un tiempo a conocer esas empresas: visita su página web, sigue sus perfiles en redes sociales y estate al tanto de sus noticias.</p>
            <li class="h3li">Conecta.</li>
            <p class="h3liparrafo">La estrategia de networking será fundamental en este punto para poder contactar con aquellas empresas o personas que crees que pueden ofrecerte una oportunidad laboral. Si mantienes el contacto y cultivas esa relación, te será más fácil enterarte de esas nuevas ofertas.</p>
            <li class="h3li">Prepara un currículum atractivo.</li>
            <p class="h3liparrafo">Tu currículum (y tu carta de presentación) debe ser capaz de captar la atención de los empleadores en menos de 20 segundos. Invierte un tiempo en poder preparar el mejor currículum posible. Prepara también las cartas de presentación adecuadas para cada una de las empresas que te interesan.</p>
            <li class="h3li">Envía tu currículum.</li>
            <p class="h3liparrafo">Uno de los siguientes pasos es enviar tu currículum a las empresas que has detectado como tus targets. Si hay un proceso de selección abierto, puedes presentarte a él. Y si no, puedes presentar una autocandidatura.</p>
            <li class="h3li">Haz seguimiento.</li>
            <p class="h3liparrafo">Una buena estrategia de marketing siempre analiza los resultados conseguidos y se modifica dependiendo de dichas conclusiones. Así que no olvides nunca hacer seguimiento de cómo evolucionan tus candidaturas y analiza cómo han ido tus entrevistas. En todo el proceso, puede que detectes algo, como si te falta formación de algún tipo o si debes mejorar alguna de tus competencias.</p>
        </ul>



        <x-creditos>
            www.todofp.es#https://www.todofp.es/orientacion-profesional/busca-empleo-entrenate/asalariado/entrevista.html
            |www.educaweb.com#https://www.educaweb.com/contenidos/laborales/como-buscar-empleo/proceso-seleccion/entrevista-trabajo/
            |www.cef.es#https://www.cef.es/files-cef/estrategia_busqueda_empleo.pdf
            |www.adecco.com#https://www.adeccorientaempleo.com/estrategia-de-empleo-organiza-tu-busqueda/
        </x-creditos>

    </section>
    <x-separadorFooter/>
    <x-footer/>
</x-app-layout>
