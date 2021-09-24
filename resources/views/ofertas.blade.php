<x-app-layout>

    <div class=" mb-5 bg-gradient-to-r from-gray-300 via-gray-200 to-gray-100">
        <div class="pt-4 pb-4">
            <p class="text-4xl text-center">
                EMPLEO EN ESPAÑA
            </p>

        </div>
        <section>
            <div class="px-4 pb-4 sm:px-6 lg:px-8">

                @livewire('filter-jobs')
                <div class="flex items-center justify-center pt-4 pb-4">
                    <p class="rounded animate-spin ease duration-300 w-5 h-5 border-2 border-blue-600" id="totalOfertas"></p>
                    <h1 class="text-4xl pl-2 " id = "cabecerah1" >Ofertas de trabajo</h1>
                </div>
            </div>

        </section>
    </div>
    <section class="bg-gray-50">

            @livewire('jobs')

    </section>


</x-app-layout>

{{-- style="background-image: url({{asset('img/home/portada.jpg')}})"> --}}
{{-- Sacar y actiave en jobs-blade despues de prurbas
<div>
    @livewire('filter-jobs')

</div>
toltipPublicada.addEventListener('mouseleave',
            () =>{
                console.log("Sale Mouse")
            })


 --}}


 {{--
<div class="flex-1">

                <h1 class="">
                   @livewire('cabecera-ofertas')
                </h1>

            </div>



--}}
