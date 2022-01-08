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
            document.getElementById("blur").classList.add("blur");
            document.getElementById("spinner").classList.remove("invisible")
            document.getElementById('textSpinner').innerHTML = "buscando "+ datos['h1'];


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
            else if (datos['experiencia']=="Con experiencia") {datos['experiencia']=1;}
            else {datos['experiencia']=0;}

            var e = document.getElementById("selectedTiposalario");
            var value = e.options[e.selectedIndex].value;
            var text = e.options[e.selectedIndex].text;

            switch (text) {
                case "Todos":
                    datos['solo salario anual'] = null;
                    datos['solo salario mensual'] = null;
                    datos['solo salario por hora'] = null;
                    datos['solo salario según convenio'] = null;
                    datos['solo con salario'] = null;
                    break;
                case "Salario anual":
                    datos['solo salario anual'] = 1;
                    datos['solo salario mensual'] = null;
                    datos['solo salario por hora'] = null;
                    datos['solo salario según convenio'] = null;
                    datos['solo con salario'] = null;
                    break;
                case "Salario mensual":
                    datos['solo salario anual'] = null;
                    datos['solo salario mensual'] = 1;
                    datos['solo salario por hora'] = null;
                    datos['solo salario según convenio'] = null;
                    datos['solo con salario'] = null;
                    break;
                case "Salario por horas":
                    datos['solo salario anual'] = null;
                    datos['solo salario mensual'] = null;
                    datos['solo salario por hora'] = 1;
                    datos['solo salario según convenio'] = null;
                    datos['solo con salario'] = null;
                    break;
                case "Según convenio":
                    datos['solo salario anual'] = null;
                    datos['solo salario mensual'] = null;
                    datos['solo salario por hora'] = null
                    datos['solo salario según convenio'] = 1;
                    datos['solo con salario'] = null;
                    break;
                case "Con Salario":
                    datos['solo salario anual'] = null;
                    datos['solo salario mensual'] = null;
                    datos['solo salario por hora'] = null;
                    datos['solo salario según convenio'] = null;
                    datos['solo con salario'] = 1;
                    break;

            }

            var e = document.getElementById("selectedTipoempleo");
            var value = e.options[e.selectedIndex].value;
            var text = e.options[e.selectedIndex].text;

            switch (text) {
                case "Todos":
                    datos['solo discapacidad'] = null;
                    datos['solo prácticas'] = null;
                    datos['solo ett'] = null;
                    datos['solo teletrabajo'] = null;
                    datos['solo 100% teletrabajo'] = null;
                    datos['solo sin tipo'] = null;
                    break;
                case "Discapacidad":
                    datos['solo discapacidad'] = 1;
                    datos['solo prácticas'] = null;
                    datos['solo ett'] = null;
                    datos['solo teletrabajo'] = null;
                    datos['solo 100% teletrabajo'] = null;
                    datos['solo sin tipo'] = null;
                    break;
                case "Prácticas":
                    datos['solo discapacidad'] = null;
                    datos['solo prácticas'] = 1;
                    datos['solo ett'] = null;
                    datos['solo teletrabajo'] = null;
                    datos['solo 100% teletrabajo'] = null;
                    datos['solo sin tipo'] = null;
                    break;
                case "Ett":
                    datos['solo discapacidad'] = null;
                    datos['solo prácticas'] = null;
                    datos['solo ett'] = 1;
                    datos['solo teletrabajo'] = null;
                    datos['solo 100% teletrabajo'] = null;
                    datos['solo sin tipo'] = null;
                    break;


                case "Teletrabajo":
                    datos['solo discapacidad'] = null;
                    datos['solo prácticas'] = null;
                    datos['solo ett'] = null;
                    datos['solo teletrabajo'] = 1;
                    datos['solo 100% teletrabajo'] = null;
                    datos['solo sin tipo'] = null;
                    break;
                case "100% Teletrabajo":
                    datos['solo discapacidad'] = null;
                    datos['solo prácticas'] = null;
                    datos['solo ett'] = null;
                    datos['solo teletrabajo'] = null;
                    datos['solo 100% teletrabajo'] = 1;
                    datos['solo sin tipo'] = null;
                    break;
                case "Sin tipo":
                    datos['solo discapacidad'] = null;
                    datos['solo prácticas'] = null;
                    datos['solo ett'] = null;
                    datos['solo teletrabajo'] = null;
                    datos['solo 100% teletrabajo'] = null;
                    datos['solo sin tipo'] = 1;
                    break;

            }
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

