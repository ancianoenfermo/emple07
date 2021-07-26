<div>
    <div wire:init="loadEmpleos" class="container bg-gray-100 pt-3 mx-10 rounded-lg relative">
        <div class="mx-6 border-2 border-gray-200 border-opacity-50 rounded-lg


        @if (!$showSearch) hidden @endif relative">
        @livewire('filter-jobs')

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
                <x-job-table>
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                      <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                          Fecha
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                          Title
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                          Status
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                          Role
                        </th>
                        <th scope="col" class="relative px-6 py-3">
                          <span class="sr-only">Edit</span>
                        </th>
                      </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($jobs as $job)


                      <tr>
                        <td class="px-6 py-4 ">
                          <div class="flex items-center">
                            <div class="text-xs font-medium text-gray-900">
                                {{ \Carbon\Carbon::parse($job->datePosted)->format('d-m-Y') }}
                            </div>
                            <div class="ml-4">
                              <div class="text-sm font-bold text-gray-900">
                                {{$job->title}}
                              </div>
                              <div class="text-sm text-gray-500">
                                Publicado por {{$job->jobFuente}}
                              </div>
                            </div>
                          </div>
                        </td>
                        <td class="px-6 py-4 ">
                          <div class="text-sm text-gray-900">Regional Paradigm Technician</div>
                          <div class="text-sm text-gray-500">Optimization</div>
                        </td>
                        <td class="px-6 py-4 ">
                          <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                            Active
                          </span>
                        </td>
                        <td class="px-6 py-4  text-sm text-gray-500">
                          Admin
                        </td>
                        <td class="px-6 py-4 text-right text-sm font-medium">
                          <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                        </td>
                      </tr>
                      @endforeach
                      <!-- More people... -->
                    </tbody>
                  </table>
                </x-job-table>
                {{--
                @foreach ($jobs as $job)
                  <x-jobCard :job=$job />
                   <x-job-table/>

                --}}
                @if ($jobs->hasPages())
                    <div
                        class="bg-gray-200 px-4 py-3 mt-5 mb-5 mr-2 items-center justify-between border-t border-gray-200 sm:px-6">
                        {{ $jobs->links() }}
                    </div>

                @endif
            </div>
        @else
            <div class="px-4 py-3 mt-5 ">
                No existen registros
            </div>


        @endif
        <div wire:loading class="backdrop-filter backdrop-blur-sm absolute inset-x-0  top-0 h-full w-full">

            <div style="color: #283618" class="la-line-scale-pulse-out items-center absolute top-6 left-1/2">
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
            </div>


        </div>
    </div>

</div>
