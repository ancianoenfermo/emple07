<x-app-layout>
    @livewire('empleos-livewire')
@push('js')
    <script>
        function leermas(id) {
            console.log(id)
            var element = document.getElementById(id);
            element.classList.remove("mcursor-pointer");
            element.classList.add("cursor-wait");
        }
        
        function cambioSelect() {
            document.getElementById('selectAutonomia').disabled = true;
            document.getElementById('selectProvincia').disabled = true;
            document.getElementById('selectLocalidad').disabled = true;
        }
        


        function leerValoresFiltro() {
            document.getElementById("blur").classList.add("blur");

            datos ={};
            var e = document.getElementById("selectAutonomia");
            var value = e.options[e.selectedIndex].value;
            var text = e.options[e.selectedIndex].text;
            datos['autonomia'] = text;

            var e = document.getElementById("selectProvincia");
            var value = e.options[e.selectedIndex].value;
            var text = e.options[e.selectedIndex].text;
            datos['provincia'] = text;

            var e = document.getElementById("selectLocalidad");
            var value = e.options[e.selectedIndex].value;
            var text = e.options[e.selectedIndex].text;
            datos['localidad'] = text;

            if (datos['localidad'] != 'Todas') {
                datos['autonomia'] = null;
                datos['provincia'] = null;
                datos['h1'] = "Ofertas de trbajo en "+ datos['localidad'];
            } else if (datos['provincia'] != 'Todas') {
                datos['localidad'] = null;
                datos['autonomia'] = null;
                datos['h1'] = "Ofertas de trabajo en " + datos['provincia'];
            } else if (datos['autonomia'] != 'Todas') {
                datos['localidad'] = null;
                datos['provincia'] = null;
                datos['h1'] = "Ofertas de trabajo en " + datos['autonomia'];
            } else {
                datos['autonomia'] = null;
                datos['provincia'] = null;
                datos['localidad'] = null;
                datos['h1'] = "Ofertas de trabajo en España";
            }

            var e = document.getElementById("selectedContrato");
            var value = e.options[e.selectedIndex].value;
            var text = e.options[e.selectedIndex].text;
            datos['contrato'] = text;
            if (datos['contrato'] == 'Todos') {
                datos['contrato'] = null;
            }
            var e = document.getElementById("selectedJornada");
            var value = e.options[e.selectedIndex].value;
            var text = e.options[e.selectedIndex].text;
            datos['jornada'] = text;
            if (datos['jornada'] == 'Todas') {
                datos['jornada'] = null;
            }

            var e = document.getElementById("selectedExperiencia");
            var text = e.options[e.selectedIndex].text;
            datos['experiencia'] = text;


            if (datos['experiencia']=="Todas") {datos['experiencia']=null;}
            else if (datos['experiencia']=="Con experiencia") {datos['experiencia']='1';}
            else {datos['experiencia']='0';}


            makeDivFiltros(datos);
            return datos;
        }
        function makeDivFiltros(datos){
            document.getElementById("divFiltros").innerHTML = " "+datos['h1'];
            document.getElementById("totalEmpleos").innerHTML = '<div class="animate-spin rounded-full h-5 w-5 border-b-2 border-white"></div>'

        }

    </script>
@endpush
</x-app-layout>

