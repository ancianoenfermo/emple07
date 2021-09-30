<x-app-layout>
    <div class="bg-gradient-to-r from-green-100 via-green-200 to-green-500 mx-auto px-4 sm:px-6 lg:px-8 pt-10 pb-10">
        <div class="grid grid-cols-2">
            <div class=flex-1>
                <h1 class="pb-6  text-3xl md:text-4xl lg:text-6xl font-extrabold text-black tracking-wider leading-loose ">
                    La carta de presentación
                </h1>
                <p class="nivelp text-2xl italic leading-relaxed ">Es la carta que acompaña al CV y pretende atraer la atención del responsable de selección </p>
            </div>
            <div class="items-center ml-10">
                <div class="bg-gray-100 border-2 rounded-lg shadow-lg ">

                        <div class="youtube-player max-w-7xl " data-id="3kyVcTQTU1I"></div>

                </div>

            </div>
        </div>
    </div>

    <div class="container mx-auto text-xl leading-normal text-justify px-10 bg-white ">
        <div class="pt-10">
            <a class="text-2xl px-4 py-2 items-center font-semibold rounded-full bg-green-900 text-white" href="https://www.todofp.es/" target="_blank"><span class=" font-extrabold text-green-100">
                <i class="fas fa-pen"></i>
                Fuente: </span>TodoFP
            </a>
        </div>


        <p class="nivelp pt-10">
            La carta de presentación es un documento de carácter personal que acompaña al curriculum vitae y que determinará la primera impresión que tengan los empresarios de ti . De ésta, dependerá si sigues en el proceso de selección o no.
        </p>
        <p class="nivelp">
            Con una buena carta de presentación, conseguirás llegar a la empresa de una forma más cercana, persuadir para que te den la oportunidad de una entrevista, diferenciarte de otros candidatos, personalizar tu presentación, mostrar tus habilidades y tu motivación.
        </p>
        <h3 class="nivel3">Consejos para una buena carta de presentación</h3>
        <ul class="ml-10 pt-1" >
            <li class="linivel">Dirige la carta a un responsable de la organización.</li>
            <li class="linivel">Menciona datos sobre la empresa y la oferta en particular, si la hubiera.</li>
            <li class="linivel">Utiliza frases cortas y claras.</li>
            <li class="linivel">Menciona tus logros, capacidades y habilidades en ámbitos relacionados con el puesto.</li>
            <li class="linivel">Describe las características del puesto y justifica por qué eres adecuado.</li>
            <li class="linivel">No menciones habilidades o informaciones innecesarias que no tengan relación con el puesto.</li>
            <li class="linivel">Propón una cita con la empresa e indica tu disponibilidad.</li>
            <li class="linivel">A pesar de seguir unas normas comunes, las cartas de presentación deben ser distintas para cada puesto/empresa al que optes.</li>
            <li class="linivel">Sé breve y conciso.</li>
            <li class="linivel">Escríbela a ordenador siempre y cuando no contravenga alguna condición impuesta por la empresa.</li>
            <li class="linivel">Utiliza papel de calidad y evita las fotocopias.</li>
            <li class="linivel">Deja márgenes y espacios entre párrafos para facilitar la lectura.</li>
            <li class="linivel">Utiliza distintos tipos y estilos de letra para resaltar la información más importante.</li>
            <li class="linivel">Utiliza lenguaje claro y correcto, sin faltas de ortografía ni expresiones vulgares.</li>
        </ul>

        <h3 class="nivel3">¿Cuándo enviar la carta de presentación?</h3>
        <p class="nivelp">Al buscar trabajo por cuenta ajena, la carta de presentación se convierte en un elemento esencial en dos situaciones:</p>
        <ul class="ml-10 pt-1" >
            <li class="linivel">Respuesta a un anuncio concreto. La carta de presentación acompaña a tu curriculum, que enviarás para responder a un anuncio. Es importante que tengas en cuenta los datos que aparecen en el anuncio y los incorpores a tu carta. Destaca lo interesante de tu candidatura, menciona los requisitos del anuncio y por qué eres un buen candidato.</li>
            <li class="linivel">Autocandidatura. Al igual que en el punto anterior, la carta de presentación acompaña siempre tu curriculum. En esta ocasión, lo enviarás de forma espontánea para que te tengan en cuenta en futuras selecciones. Deberás dejar claro tu motivación y qué es lo que puedes aportar.</li>
        </ul>
        <h3 class="nivel3">Estructura de la carta de presentación</h3>
        <p class="nivelp">Básicamente existen dos tipos de cartas, una convencional y otra libre.</p>
        <p class="nivelp">Si optas por el tipo libre debes ser original y creativo. En este caso, tu objetivo será sorprender y atraer por ser diferente. Podrás utilizar colores, imágenes, logos, soportes innovadores u otras técnicas. Utilízalo solo cuando el tipo de empresa y de puesto te haga pensar que puede aumentar tus opciones.</p>
        <p class="nivelp">El formato de carta de presentación convencional suele estar formado por cuatro párrafos.</p>
        <ul class="ml-10 pt-1" >
             <li class="linivel">Después del destinatario (datos de la empresa), datos del emisor (tus datos), fecha y saludo, se suele comenzar con una referencia a la oferta o convocatoria a la que quieres optar.</li>
             <li class="linivel">En el segundo párrafo, se mencionan los datos más significativos de tu currículum respecto al puesto que solicitas.</li>
             <li class="linivel">El tercero se destina a explicar el objetivo de la carta, es decir, si quieres formar parte de la selección o solicitar una entrevista.</li>
             <li class="linivel">La carta termina con una despedida en un estilo formal y de cortesía, y ,por último, tu firma original, siempre que sea posible.</li>
        </ul>
    </div>



    @push('js')
    <script>
        /*
         * Light YouTube Embeds by @labnol
         * Credit: https://www.labnol.org/
         */

        function labnolIframe(div) {
          var iframe = document.createElement('iframe');
          iframe.setAttribute(
            'src',
            'https://www.youtube.com/embed/' + div.dataset.id + '?autoplay=1&rel=0'
          );
          iframe.setAttribute('frameborder', '0');
          iframe.setAttribute('allowfullscreen', '1');
          iframe.setAttribute(
            'allow',
            'accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture'
          );
          div.parentNode.replaceChild(iframe, div);
        }

        function initYouTubeVideos() {
          var playerElements = document.getElementsByClassName('youtube-player');
          for (var n = 0; n < playerElements.length; n++) {
            var videoId = playerElements[n].dataset.id;
            var div = document.createElement('div');
            div.setAttribute('data-id', videoId);
            var thumbNode = document.createElement('img');
            thumbNode.src = '//i.ytimg.com/vi/ID/hqdefault.jpg'.replace(
              'ID',
              videoId
            );
            div.appendChild(thumbNode);
            var playButton = document.createElement('div');
            playButton.setAttribute('class', 'play');
            div.appendChild(playButton);
            div.onclick = function () {
              labnolIframe(this);
            };
            playerElements[n].appendChild(div);
          }
        }

        document.addEventListener('DOMContentLoaded', initYouTubeVideos);
      </script>
    @endpush

    <x-footer/>
</x-app-layout>
