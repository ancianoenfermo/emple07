<x-blog-layout>
    @section('header')
        <x-cabeceraPost portada="entrevista.jpg">
            La entrevista de trabajo
        </x-cabeceraPost>
    @endsection
    @section('content')
        <article class="container mx-auto  px-32 ">
            <h1 class="blogH1">
                La entrevista de trabajo
            </h1>

            <p class="blogParrafo">
                Si te llaman para realizar una <strong>entrevista de trabajo</strong> es porque tu curriculum les ha
                gustado. Todos los pasos que has realizado para buscar empleo están obteniendo su fruto ya que su principal
                objetivo es llegar a una entrevista personal así que <strong>¡enhorabuena!</strong>
            </p>
            <p class="blogParrafo">
                La entrevista, ya sea presencial u online, es una herramienta fundamental de las empresas para seleccionar
                al candidato ideal. El o los entrevistadores analizan a fondo a los candidatos para comprobar su idoneidad
                para el puesto de trabajo ofertado.
            </p>
            <p class="blogParrafo">
                Si llevas mucho tiempo en paro puedes dudar de tus capacidades por lo que debes trabajar la autoestima. No
                te olvides que al llamarte para una entrevista es porque han creído en ti ya que nadie llama a un candidato
                si no le interesa. <strong>¡Confía en ti!</strong>
            </p>
            <p class="blogParrafo">
                Para que la entrevista sea un éxito es importante prepararla y ensayarla.
            </p>
            {{--INTRODUCCIÓN --}}
            <h2 class="blogH2">
                1.- Introducción
            </h2>
            <p class="blogParrafo">
                Pocas son las personas que son contratadas por una empresa sin haber pasado previamente por una entrevista de trabajo.
            </p>
            <p class="blogParrafo">
                En las entrevistas el entrevistador reunirá toda la información posible sobre ti para poder evaluarte. Además, te dará información sobre el puesto de trabajo ofertado. Tú como candidato deberás presentarte y venderte lo mejor posible.
            </p>

            <p class="blogParrafo">
                La entrevista como técnica de selección es subjetiva, y por lo tanto se pueden cometer errores contratando a candidatos no idóneos o rechazando a candidatos válidos para un determinado puesto de trabajo.
            </p>

            {{--TIPOS DE ENTREVISTA --}}
            <h2 class="blogH2">
                2.- Tipos de entrevistas
            </h2>
            <p class="blogParrafo">
                La mayoría de las veces te encontrarás con una entrevista individual. Es aquella en la que hay solo dos participantes tú y el entrevistador.
                Pero además de la entrevista individual existen otro tipo de entrevistas que las empresas pueden utilizar para conocer al candidato. Conocerlas hará que no te enfrentes a algo desconocido y te ayudará a preparalas y ensayarlas.
            </p>

            <p class="blogParrafo">
                Básicamente las podemos dividir en dos grupos: según el <strong>número de participantes</strong> y según el <strong>procedimiento</strong>.
            </p>

            <div class="blogCaja">
                <P class="py-2 text-2xl text-pink-800 text-center w-full font-bold">TIPOS DE ENTREVISTAS</P>
                <p class="bg-gray-200  py-2 text-pink-800 text-center w-full font-bold">Según el número de participantes</p>
                <ul class="">
                    <li class="p-2">
                        <h3 class="text-pink-700 font-bold">Entrevista indidual</h3>
                        <span class="text-gray-800 tracking-normal  text-justify text-lg ">
                            Es la más habitual de todas las entrevistas y posiblemente con la que te encontrarás.  Estáis solo el entrevistador y tú. El orden y los temas que se abordan dependen del entrevistador y el carácter confidencial permite alcanzar una gran profundidad en los temas.
                        </span>
                    </li>
                    <li class="p-2">
                        <h3 class="text-pink-700 font-bold">Entrevista en panel</h3>
                        <span class="text-gray-800 tracking-normal  text-justify text-lg ">
                            Similar a la entrevista individual, pero con varios entrevistadores. Los temas y orden dependen de cada entrevistador. Se debe superar la intimidación que supone responder a varios entrevistadores a la vez.
                        </span>
                    </li>
                    <li class="p-2">
                        <h3 class="text-pink-700 font-bold">Entrevista en grupo</h3>
                        <span class="text-gray-800 tracking-normal  text-justify text-lg ">
                            En la entrevista en grupo uno o varios entrevistadores, preguntan a la vez a varios candidatos. Al ser varios los entrevistados no te dejes intimidar por la desenvoltura de los demás y aprovecha al máximo tú tiempo de palabra.
                        </span>
                    </li>
                </ul>



                <p class="bg-gray-200 py-2 text-pink-800 text-center w-full font-bold">
                    Según el procedimiento
                    </p>
                <ul class="">
                    <li class="p-2">
                        <h3 class="text-pink-700 font-bold">Entrevista estructurada</h3>
                        <span class="text-gray-800 tracking-normal  text-justify text-lg ">
                            Las preguntas del entrevistador son exactamente las mismas para todos los candidatos al puesto. La entrevista estructurada, aunque es la más rígida de todas, facilita enormemente la valoración de candidatos. La suelen utilizar aquellas empresas que necesitan cubrir muchos puestos de trabajo.
                        </span>
                    </li>
                    <li class="p-2">
                        <h3 class="text-pink-700 font-bold">Entrevista no estructurada</h3>
                        <span class="text-gray-800 tracking-normal  text-justify text-lg ">
                            En este tipo de entrevista el entrevistador tiene una guía de las preguntas que va ha realizar realizando nuevas preguntas en función de las respuestas que el candidato le va dando.
                            Se aproxima más a una conversación entre entrevistador y candidato.

                        </span>
                    </li>
                    <li class="p-2">
                        <h3 class="text-pink-700 font-bold">Entrevista mixta</h3>
                        <span class="text-gray-800 tracking-normal  text-justify text-lg ">
                            Es una mezcla entre la entrevista estructurada y la no estructurada. Se puede decir que es la mejor para la empresa, ya que las preguntas fijas e iguales para todos los candidatos facilita la valoración entre candidatos y la parte libre permite profundizar en algunos aspectos específicos de un candidato.

                        </span>
                    </li>
                    <li class="p-2">
                        <h3 class="text-pink-700 font-bold">Entrevista de tensión</h3>
                        <span class="text-gray-800 tracking-normal  text-justify text-lg ">
                            En este tipo de entrevista el entrevistador emplea modos y actitudes para provocar tensión en el candidato y observar cómo reacciona el candidato.  Es utilizada frecuentemente para cubrir puestos que se desempeñan en condiciones de gran tensión
                        </span>
                        <span class="text-gray-800 tracking-normal  text-justify text-lg ">
                            Para crear tensión en el candidato el entrevistador usa diferentes técnicas. Las más frecuentes son:
                        </span>
                        <ul class="list-disc list-inside pl-4 text-base pb-4 pt-2">
                            <li class="">
                                Criticar las opiniones del aspirante acerca de algunos temas
                            </li>
                            <li class="">
                                Interrumpir al entrevistado
                            </li>
                            <li class="">
                                Guardar silencio durante un largo periodo de tiempo después de que el candidato
                            </li>
                            <li class="">
                                Guardar silencio durante un largo periodo de tiempo después de que el candidato haya acabado de hablar
                            </li>

                        </ul>
                    </li>
                </ul>
            </div>

            {{--FASES DE LA ENTREVISTA --}}
            <h2 class="blogH2">
                3.- Fases de la entrevista
            </h2>
            <p class="blogParrafo">
                Cualquier entrevista de trabajo la podemos dividir en tres grandes bloques: El <strong>inicio</strong> donde saludaremos al entrevistador y nos presentaremos, el <strong>desarrollo</strong> donde el entrevistador nos hará preguntas y el candidato consultará todas las dudas y el <strong>cierre</strong> de la entrevista.
            </p>

            <div class="blogCaja">
                <P class="py-2 text-2xl text-pink-800 text-center w-full font-bold">FASES DE LA ENTREVISTAS</P>
                <h3 class="blogCajaN1">inicio de la entrevista: saludo y presentación</h3>
                <p class="blogCajaParrafo">
                    Es la primera impresión que el entrevistador se formará del candidato.  Todo influye en este importante y primer contacto entre el entrevistador y el candidato: vestimenta, actitud, lenguaje corporal, tono de voz, pronunciación etc.
                </p>
                <p class="blogCajaParrafo">
                    Lo normal es que la entrevista comience con una breve presentación del entrevistador  y el propósito de la entrevista y a continuación le tocará responder al candidato una pregunta tipo “háblame de ti”
                </p>



                <div class="my-5 mx-36 px-5  ">
                    <div class="flex justify-center items-center" >
                        <img class="h-4" src="{{ asset('img/check.png') }}">
                        <p class="ml-2 font-semibold  text-green-800">Presentación correcta</p>

                    </div>
                    <div class="grid grid-cols-3" >

                        <div class="youtube-player max-w-7xl " data-id="Q_2FSs_w0N0"></div>
                        <div class="youtube-player max-w-7xl " data-id="ymTG9KUsRDE"></div>
                        <div class="youtube-player max-w-7xl " data-id="qt6FNc-0XXg"></div>
                    </div>

                    <div class="flex justify-center items-center pt-2" >
                        <img class="h-4" src="{{ asset('img/abort.png') }}">
                        <p class="ml-2 font-semibold text-red-800">Presentación incorrecta</p>
                    </div>
                    <div class="grid grid-cols-3 mb-4" >
                        <div class="youtube-player max-w-7xl " data-id="1iHHDvyOpgA"></div>
                        <div class="youtube-player max-w-7xl " data-id="yKqI3MMveVA"></div>
                        <div class="youtube-player max-w-7xl " data-id="8QtGzGQF4aw"></div>
                    </div>
                </div>


                <h3 class="blogCajaN1">
                    Desarrollo de la entrevista
                </h3>
                <p class="blogCajaParrafo ">
                    Una vez finalizado el saludo y la presentación, comienza el núcleo de la entrevista, donde tiene lugar las distintas preguntas tanto del entrevistador como del candidato.
                </p>
                <p class="blogCajaParrafo">
                    El entrevistador intentará generar un clima de confianza para que el candidato se pueda expresar libremente a las preguntas realizadas. Las preguntas se establecerán en bloques sobre formación, experiencia laboral, cualidades y habilidades.
                </p>

                <p class="blogCajaSubT">
                    Preguntas del entrevistador
                </p>
                <p class="blogCajaParrafo">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet corrupti, libero sequi rerum odit ea. Culpa repudiandae rem laboriosam, obcaecati, voluptatem ab reprehenderit incidunt doloribus, aliquam optio sit omnis nemo.
                </p>

                <ul class="list-decimal list-inside pl-10 text-base pb-4 pt-2 ">
                    <li class="">
                        <span class="blogCajaGrupo">Sobre la personalidad del candidato</span>
                         <p class="blogCajaQuestion">
                            Hábleme de una situación en la que no actuó apropiadamente. ¿Qué aprendiste de eso?
                        </p>
                         <p class="blogCajaQuestion">
                            ¿Cuáles son sus puntos fuertes?
                        </p>
                    </li>
                    <li class="pt-2">
                         <span class="blogCajaGrupo">
                        Sobre la educación y la formación del candidato
                    </span>
                         <p class="blogCajaQuestion">
                            ¿Por qué elegiste tus estudios?
                        </p>
                         <p class="blogCajaQuestion">
                            ¿En qué áreas crees que necesitas reciclarte?
                        </p>
                         <p class="blogCajaQuestion">
                            ¿Qué cursos has realizado últimamente?
                        </p>
                        <div class="my-5 mx-36 px-5  ">
                            <div class="flex justify-center items-center" >
                                <img class="h-4" src="{{ asset('img/check.png') }}">
                                <p class="ml-2 font-semibold  text-green-800">Formación correcta</p>

                            </div>
                            <div class="grid grid-cols-3" >

                                <div class="youtube-player max-w-7xl " data-id="B_bUBuQ-2lA"></div>
                                <div class="youtube-player max-w-7xl " data-id="txXCx58SWGw"></div>
                                <div class="youtube-player max-w-7xl " data-id="Rx3Hb3DfzpA"></div>
                            </div>

                            <div class="flex justify-center items-center pt-2" >
                                <img class="h-4" src="{{ asset('img/abort.png') }}">
                                <p class="ml-2 font-semibold text-red-800">Formación incorrecta</p>
                            </div>
                            <div class="grid grid-cols-3 mb-4" >
                                <div class="youtube-player max-w-7xl " data-id="js0jAwn9zxE"></div>
                                <div class="youtube-player max-w-7xl " data-id="DqoHlTpIAKg"></div>
                                <div class="youtube-player max-w-7xl " data-id="NTNrOAE1aBY"></div>
                            </div>
                        </div>
                    </li>
                    <li class="">
                         <span class="blogCajaGrupo">
                            Sobre la experiencia profesional y la actitud</span>

                         <p class="blogCajaQuestion">
                            ¿Cuál fue el trabajo más aburrido que has tenido? ¿Cómo lo hiciste?
                        </p>
                         <p class="blogCajaQuestion">
                            ¿Cómo se mejora a nivel profesional? Dime algo nuevo que hayas tenido que aprender recientemente.
                        </p>
                         <p class="blogCajaQuestion">
                            ¿Por qué dejaste la empresa o por qué te despidieron?
                         <p class="blogCajaQuestion">
                            ¿Cómo conseguiste tu último trabajo?
                        </p>
                         <p class="blogCajaQuestion">
                            ¿Por qué dejaste la empresa o por qué te despidieron?
                        </p>
                         <p class="blogCajaQuestion">
                            ¿Por qué te conformaste con un salario tan bajo a tu edad?
                        </p>
                        <div class="my-5 mx-36 px-5  ">
                            <div class="flex justify-center items-center" >
                                <img class="h-4" src="{{ asset('img/check.png') }}">
                                <p class="ml-2 font-semibold  text-green-800">Experiencia laboral</p>

                            </div>
                            <div class="grid grid-cols-3" >
                                <div class="youtube-player max-w-7xl " data-id="NTKWgQuVfyQ"></div>
                                <div class="youtube-player max-w-7xl " data-id="3RB9XqGCiHc"></div>
                                <div class="youtube-player max-w-7xl " data-id="ikqB13YQcaU"></div>

                            </div>

                            <div class="flex justify-center items-center pt-2" >
                                <img class="h-4" src="{{ asset('img/abort.png') }}">
                                <p class="ml-2 font-semibold text-red-800">Experiencia laboral</p>
                            </div>
                            <div class="grid grid-cols-3 mb-4" >
                                <div class="youtube-player max-w-7xl " data-id="kseqEDuS3f8"></div>
                                <div class="youtube-player max-w-7xl " data-id="U7pIhGe9Rbs"></div>
                                <div class="youtube-player max-w-7xl " data-id="R0JVs1OjHlg"></div>
                            </div>
                        </div>



                    </li>
                    <li class="">
                         <span class="blogCajaGrupo">
                            Sobre la empresa y el puesto que solicita</span>
                         <p class="blogCajaQuestion">
                            ¿Cuáles crees que serían tus deberes si te contratáramos?
                        </p>
                         <p class="blogCajaQuestion">
                            Si te seleccionamos para este puesto, ¿qué medidas tomarás durante la primera semana para mejorarte?
                        </p>
                         <p class="blogCajaQuestion">
                            ¿Cuáles son sus reclamaciones financieras?
                        </p>
                         <p class="blogCajaQuestion">
                            ¿Por qué quieres trabajar en esta empresa?
                        </p>
                        <p class="blogCajaQuestion">
                            ¿Cuál es su principal fuente de motivación? ¿Qué te motiva en un trabajo?
                        </p>
                         <p class="blogCajaQuestion">
                            ¿Por qué debería contratarte?
                        </p>
                        <div class="my-5 mx-36 px-5  ">
                            <div class="flex justify-center items-center" >
                                <img class="h-4" src="{{ asset('img/check.png') }}">
                                <p class="ml-2 font-semibold  text-green-800">Puesto de trabajo</p>

                            </div>
                            <div class="grid grid-cols-3" >
                                <div class="youtube-player max-w-7xl " data-id="1hTsvKZitk8"></div>
                                <div class="youtube-player max-w-7xl " data-id="va4nFaOJGo8"></div>
                                <div class="youtube-player max-w-7xl " data-id="iGQYv_4AfTE"></div>
                            </div>

                            <div class="flex justify-center items-center pt-2" >
                                <img class="h-4" src="{{ asset('img/abort.png') }}">
                                <p class="ml-2 font-semibold text-red-800">Puesto de trabajo</p>
                            </div>
                            <div class="grid grid-cols-3 mb-4" >
                                <div class="youtube-player max-w-7xl " data-id="6c2jOZo97Es"></div>
                                <div class="youtube-player max-w-7xl " data-id="C6GmW5FKL2c"></div>
                                <div class="youtube-player max-w-7xl " data-id="Tp2GXRZZCK4"></div>
                            </div>
                        </div>

                    </li>
                    <li class="">
                         <span class="blogCajaGrupo">
                            Sobre las habilidades personales del candidato</span>
                        <p class="">
                            Dependiendo del puesto buscarán unas u otras habilidades como orientación al cliente, liderazgo, proactividad, adaptabilidad etc.
                        </p>
                        <p class="blogCajaQuestion">
                            ¿Qué haces cuando hay que tomar una decisión y no hay un procedimiento para ello?
                        </p>
                        <p class="blogCajaQuestion">
                            Cuénteme los problemas diarios de su trabajo y lo que hace para resolverlos.
                        </p>
                        <p class="blogCajaQuestion">
                            ¿Cuántas horas extras ha trabajado recientemente?
                        </p>
                        <p class="blogCajaQuestion">
                            ¿Cuánto tiempo llevaría trabajar eficazmente en este nuevo puesto?
                        </p>
                        <p class="blogCajaQuestion">
                            ¿Alguna vez has tenido que trabajar con alguien que es difícil de manejar? ¿Cómo lidiaste con este problema?
                        </p>
                        <p class="blogCajaQuestion">
                            ¿Mentirías por tu compañía?
                        </p>
                        <p class="blogCajaQuestion">
                            ¿Qué haría si no estuviera de acuerdo con su supervisor?
                        </p>
                        <p class="blogCajaQuestion">
                            ¿Qué tipo de decisiones son las más difíciles de tomar para ti?
                        </p>
                    </li>

                </ul>
                <p class="blogCajaSubT">
                    Preguntas del entrvistado
                </p>
                <p class="blogCajaParrafo">
                    En algún momento el entrevistador te dará opción a realizarle preguntas sobre la empresa, el puesto o el proceso. Muestra inquietud y haz preguntas siempre relacionadas con la oportunidad laboral. Es una forma de mostrar interés por la oferta de trabajo. No es recomendado preguntar por horarios de entrada/salida o vacaciones, a no ser que el propio entrevistador te lo mencione.
                </p>
                <p class="blogCajaQuestion">
                    ¿Cuáles son las responsabilidades y tareas cotidianas que conlleva este puesto?
                </p>

                <p class="blogCajaQuestion">
                    ¿Qué perspectivas tiene la empresa a corto y medio plazo?
                </p>
                <p class="blogCajaQuestion">
                    ¿Qué es lo que debería tener el candidato ideal para este puesto?
                </p>
                <p class="blogCajaQuestion">
                    ¿Qué es lo mejor de trabajar en esta empresa?
                </p>
                <p class="blogCajaQuestion">
                    ¿Qué planes de formación o de educación ofrece la empresa?
                </p>
                <p class="blogCajaQuestion">
                    ¿Cuáles son los próximos pasos del proceso de selección?
                </p>
                <p class="blogCajaQuestion">

                </p>
            </div>







            <h2 class="blogH2">
                ¿Qué tipos de entrevista de trabajo puedes encontrarte?
            </h2>
            <p class="blogParrafo">
                Conocer los diferentes tipos de entrevistas a los que te puedes enfrentar, será de gran ayuda para que la
                puedas preparar y ensayar y cuando llegue el momento te ayudará a mostrarte tranquilo y seguro de ti mismo.
            </p>
            <ul class="pt-2 text-2xl list-disc list-inside text-pink-600">
                <li>
                    <h3 class="inline-block">
                        Entrevista individual
                    </h3>
                    <p class="blogParrafo3">
                        Es un dialogo entre tu y el entrevistador. Es la más habitual y con la que te encontrarás la mayoría
                        de las ocasiones
                    </p>
                </li>
                <li>
                    <h3 class="inline-block">
                        Entrevista en panel
                    </h3>

                    <p class="blogParrafo3">
                        Hay varios entrevistadores y tienes que responder a las preguntas de cada uno de ellos.
                    </p>
                </li>
                <li>
                    <h3 class="inline-block">
                        Entrevista en grupo
                    </h3>
                    <p class="blogParrafo3">
                        La entrevista la realiza una o varias personas con varios candidatos a la vez. Debes aprovechar al
                        máximo tu tiempo de palabra y no ponerte nervioso por las habilidades de otros candidatos.
                    </p>
                </li>
            </ul>

            <h2 class="blogH2">
                Contenido básico de la entrevista
            </h2>
            <p class="blogParrafo">
                Las entrevistas de trabajo suelen estructurarse de la siguiente forma:
            </p>
            <ul class="blogUl2 list-decimal ">
                <li>
                    <h3 class="inline-block">
                        Inicio de la entrevista: saludo y presentación
                    </h3>
                    <p class="blogParrafo3">
                        Es el primer contacto entre el entrevistador y el candidato. Se saludan y presentan de forma breve. La vestimenta, las palabras que utilizas, la pronunciación, el lenguaje corporal entre otros hacen que el entrevistador se forme una primera impresión del candidato.
                    </p>
                </li>

                <li>
                    <h3 class="inline-block">
                        Desarrollo de la entrevista
                    </h3>
                    <p class="blogParrafo3">
                        El entrevistador con sus preguntas quiere conocer aspectos básicos de tu personalidad y lo que
                        puedes ofrecer en el campo laboral a la empresa. Normalmente las preguntas serán sobre:
                    </p>
                </li>

                <li class="list-none">
                    <ul class="blogUl4">
                        <li class="">
                            Formación

                            <p class="blogParrafo4">
                                El entrevistador desea conocer en profundidad tu recorrido profesional para lo que hará
                                referencia a la información del curriculum vitae que has enviado a la empresa para solicitar
                                el puesto de trabajo.
                            </p>

                        </li>

                        <li class="">
                            Experiencia laboral

                            <p class="blogParrafo4">
                                El entrevistador desea conocer en profundidad tu recorrido profesional para lo que hará
                                referencia a la información del curriculum vitae que has enviado a la empresa para solicitar
                                el puesto de trabajo.
                            </p>
                            <p class="blogParrafo4">
                                Los temas más comunes que se abordan están relacionados con los motivos del aspirante para
                                optar por un nuevo empleo, sus responsabilidades en el anterior trabajo y cualquier otro
                                aspecto que sea necesario aclarar.
                            </p>
                        </li>
                        <li class="">
                            Razones para solicitar el puesto

                            <p class="blogParrafo4">
                                En entrevistador te preguntará sobre los motivos que te impulsaron a solicitar el puesto de
                                trabajo.
                            </p>
                        </li>
                        <li class="">
                            Habilidades laborales

                            <p class="blogParrafo4">
                                Normalmente esta información la obtiene el entrevistador haciéndote preguntas mientras
                                expones tu experiencia laboral. Pretende conocer cuestiones como si puedes trabajar bajo
                                presión, como organizas tu tiempo o si te consideras colaborativo o competitivo con tus
                                compañeros.

                            </p>
                        </li>
                        <li class="">
                            Habilidades sociales y personales

                            <p class="blogParrafo4">
                                Las habilidades sociales son capacidades o destrezas que permiten que una persona se
                                relacione de manera competente con los demás. La empresa es un mundo de relaciones en el que
                                se produce una interacción continua entre diferentes personas (escuchar, iniciar una
                                conversación, formular una pregunta, dar las gracias, presentar a otras personas etc.)

                            </p>
                        </li>
                        <li class="">
                            Presentación del puesto de trabajo

                            <p class="blogParrafo4">
                                Cuando el entrevistador tiene claro el aspecto laboral y la personalidad del candidato, hace
                                la presentación del puesto de trabajo. Explica en detalle el trabajo que tendrás que
                                realizar de ser contratado y las condiciones del puesto.

                            </p>
                        </li>

                        <li class="">
                            Expectativa salarial

                            <p class="blogParrafo4">
                                Normalmente el

                                entrevistador pregunta de manera directa al individuo cuál es su expectativa
                                salarial. Si no es así puedes plantearlo de forma directa y respetuosa.
                            </p>
                        </li>

                    </ul>
                </li>
                <li>
                    <h3 class="inline-block">
                        Preguntas abiertas.
                    </h3>
                    <p class="blogParrafo3">
                        Es el momento de aclarar todas tus dudas respecto a la empresa o al puesto. Todas las preguntas
                        deben estar relacionadas con el campo laboral y los valores de la compañía evitando cualquier
                        pregunta personal.
                    </p>
                </li>
                <li>
                    <h3 class="inline-block">
                        Próximos pasos
                    </h3>
                    <p class="blogParrafo3">
                        Cuando se acerca el cierre de la entrevista, se habla sobre cuáles son los próximos pasos en el
                        proceso de selección. También se puede preguntar acerca del lapso de tiempo que tendrá el candidato
                        para recibir una respuesta por parte de la empresa.
                    </p>
                </li>
                <li>
                    <h3 class="inline-block">
                        Cierre y Despedida
                    </h3>
                    <p class="blogParrafo3">
                        Es el momento en que el entrevistador da por finalizada la entrevista y os despedís.
                    </p>
                </li>
            </ul>
            <h2 class="blogH2">
                Prepara y ensaya la entrevista
            </h2>
            <p class="blogParrafo">
                Es muy recomendable que vayas lo mejor preparado posible a la entrevista ya que hará que sientas más seguridad en ti mismo y te ayudará a rebajar enormemente la tensión del momento.
            </p>
            <p class="blogParrafo">
                Para ensayar una entrevista de trabajo puedes hacerlo ante un espejo o ante un amigo que haga de entrevistador.
            </p>
            <p class="blogParrafo">
                Antes de comenzar a ver las distintas fases de la entrevista para que puedas comenzar a ensayar, toma notas de estas normas básicas para cualquier entrevista de trabajo.
            </p>


            <p class="blogParrafo">
                En toda entrevista de trabajo hay ciertos aspectos básicos que debes contemplar si quieres que tu entrevista tenga posibilidades de éxito:
            </p>
            <div class="border-2 border-pink-400 w-3/4 bg-gray-50 m-auto mb-5">
                <h3 class="py-2 text-2xl text-pink-800 text-center w-full font-bold">NORMAS BÁSICAS DE LA ENTREVISTA</h3>
                <p class="bg-gray-200  py-2 text-pink-800 text-center w-full font-bold">Cuando te llamen para la entrevista anota</p>
                <ul class="">
                    <li class="p-2">
                        <span class="text-gray-800 tracking-normal  text-justify text-lg ">
                            La hora exacta y el lugar de la entrevista, trayecto, parking y cuánto se tarda en llegar allí.
                        </span>
                    </li>
                    <li class="p-2">
                        <span class="text-gray-800 tracking-normal  text-justify text-lg ">
                            Nombre, apellidos y puesto de la persona que te va a entrevistar.
                        </span>
                    </li>
                </ul>



                <p class="bg-gray-200 py-2 text-pink-800 text-center w-full font-bold">Antes de la entrevista</p>
                <ul class="">
                    <li class="p-2">
                        <span class="text-gray-800 tracking-normal  text-justify text-lg ">
                            Cuida la indumentaria y la higiene personal.
                        </span>
                    </li>
                    <li class="p-2">
                        <span class="text-gray-800 tracking-normal  text-justify text-lg ">
                            Sé puntual. No llegues tarde ni demasiado pronto.
                        </span>
                    </li>
                    <li class="p-2">
                        <span class="text-gray-800 tracking-normal  text-justify text-lg ">
                            Recuerda todos los detalles de tu currículum.
                        </span>
                    </li>
                    <li class="p-2">
                        <span class="text-gray-800 tracking-normal  text-justify text-lg ">
                            Llevar toda la documentación necesaria. (certificado de estudios, referencias etc.)
                        </span>
                    </li>
                    <li class="p-2">
                        <span class="text-gray-800 tracking-normal  text-justify text-lg ">
                            Ten claro qué puedes ofrecer. Analiza tu proyecto y tus argumentos.
                        </span>
                    </li>
                    <li class="p-2">
                        <span class="text-gray-800 tracking-normal  text-justify text-lg ">
                            Identifica tus puntos fuertes y débiles.
                        </span>
                    </li>
                    <li class="p-2">
                        <span class="text-gray-800 tracking-normal  text-justify text-lg ">
                            Infórmate sobre la empresa y el puesto vacante.
                        </span>
                    </li>
                    <li class="p-2">
                        <span class="text-gray-800 tracking-normal  text-justify text-lg ">
                            Información de contacto, cifras y hechos sobre tu jefe anterior o actual. Haz memoria ya que se espera que tengas un gran conocimiento de la empresa para la que has trabajado previamente, o para la que trabajas en la actualidad.
                        </span>
                    </li>

                    <li class="p-2">
                        <span class="text-gray-800 tracking-normal  text-justify text-lg ">
                            Preparar preguntas para hacer al entrevistador.
                        </span>
                    </li>
                    <p class="bg-gray-200 py-2 text-pink-800 text-center w-full font-bold">Durante la entrevista</p>
                    <li class="p-2">
                        <span class="text-gray-800 tracking-normal  text-justify text-lg ">
                        Apaga el móvil.
                        </span>
                    </li>
                    <li class="p-2">
                        <span class="text-gray-800 tracking-normal  text-justify text-lg ">
                        Siéntate correctamente nunca en el borde de la silla.
                        </span>
                    </li>
                    <li class="p-2">
                        <span class="text-gray-800 tracking-normal  text-justify text-lg ">
                        Mantener contacto visual con el entrevistador.
                        </span>
                    </li>
                    <li class="p-2">
                        <span class="text-gray-800 tracking-normal  text-justify text-lg ">
                        Nunca lleves la iniciativa: deja que sea el entrevistador el que dirija la entrevista.
                        </span>
                    </li>
                    <li class="p-2" >
                        <span class="text-gray-800 tracking-normal  text-justify text-lg ">
                        Piensa tus respuestas antes de responder a las preguntas del entrevistador , se preciso y objetivo.
                        </span>
                    </li >

                </ul>
            </div>
            <h3 class="blogH3">
                Ensaya el Saludo y presentación.
            </h3>
            <p class="blogParrafo3">
                Es una fase muy breve de la entrevista, pero fundamentales para la idea que el entrevistador puede hacerse de ti. Deja siempre que sea el entrevistador quien tome la iniciativa: espera a que se dirija a ti si te da la mano dásela con firmeza, pero sin brusquedad. No te sientes hasta que él te lo indique.
            </p>
            <div class="mt-10 mx-24 px-5 border-2 shadow-lg ">
                <div class="flex justify-center items-center" >
                    <img class="h-8" src="{{ asset('img/check.png') }}">
                    <p class="ml-5 py-4">Presentación correcta</p>

                </div>
                <div class="grid grid-cols-3" >

                    <div class="youtube-player max-w-7xl " data-id="Q_2FSs_w0N0"></div>
                    <div class="youtube-player max-w-7xl " data-id="ymTG9KUsRDE"></div>
                    <div class="youtube-player max-w-7xl " data-id="qt6FNc-0XXg"></div>
                </div>

                <div class="flex justify-center py-5" >
                    <img class="h-8" src="{{ asset('img/abort.png') }}">
                    <p class="ml-5">Presentación incorrecta</p>
                </div>
                <div class="grid grid-cols-3 mb-4" >
                    <div class="youtube-player max-w-7xl " data-id="1iHHDvyOpgA"></div>
                    <div class="youtube-player max-w-7xl " data-id="yKqI3MMveVA"></div>
                    <div class="youtube-player max-w-7xl " data-id="8QtGzGQF4aw"></div>
                </div>
            </div>


        </article>
    @endsection
</x-blog-layout>

