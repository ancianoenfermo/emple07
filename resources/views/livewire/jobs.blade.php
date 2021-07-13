<div>
    <div wire:init="loadEmpleos" class="container bg-gray-100 pt-3 mx-10 rounded-lg relative">
        <div class="mx-6 border-2 border-gray-200 border-opacity-50 rounded-lg
        @if (!$showSearch) hidden @endif relative">
            <div class="flex items-center mx-3 my-3">
                <span>Mostrar</span>
                <select wire:model="cant" class="mx-2 select-nuevo">
                    <option value="10">10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>
                <span>trabajos</span>
                <x-jet-input class="w-full mx-4" placeholder="Escriba que está buscando" type=text
                    wire:model="search" />
            </div>
        </div>

        @if (count($jobs))
            <div class="mx-5">
                @foreach ($jobs as $job)
                    <x-jobCard :job=$job />
                @endforeach
                @if ($jobs->hasPages())
                    <div
                        class="bg-gray-200 px-4 py-3 mt-5 mb-5 mr-2 items-center justify-between border-t border-gray-200 sm:px-6">
                        {{ $jobs->links() }}
                    </div>

                @endif
            </div>
        @else
            <div class="px-4 py-3 mt-5">
                No existen registros
            </div>
        @endif
        <div wire:loading class="backdrop-filter backdrop-blur-sm absolute inset-x-0  top-0 h-full w-full">
            <div class="la-line-scale-pulse-out la-dark la-2x">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
    </div>

</div>
