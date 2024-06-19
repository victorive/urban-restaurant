@extends('layouts.app')
@section('title', 'Active Tables')
@section('tables')

    @include('layouts.nav')

    <div class="sm:px-6 w-full">
        <div class="bg-white py-4 md:py-7 px-4 md:px-8 xl:px-10">
            <a onclick="history.back()" class="cursor-pointer">
                <svg class="mb-4" xmlns="http://www.w3.org/2000/svg" version="1.0" width="25.000000pt"
                     height="25.000000pt" viewBox="0 0 50.000000 50.000000" preserveAspectRatio="xMidYMid meet">
                    <g transform="translate(0.000000,50.000000) scale(0.100000,-0.100000)" fill="#000000" stroke="none">
                        <path
                            d="M155 456 c-60 -28 -87 -56 -114 -116 -36 -79 -19 -183 42 -249 33 -36 115 -71 167 -71 52 0 134 35 167 71 34 37 63 110 63 159 0 52 -35 134 -71 167 -37 34 -110 63 -159 63 -27 0 -65 -10 -95 -24z m180 -15 c128 -58 164 -223 72 -328 -101 -115 -283 -88 -348 52 -79 171 104 354 276 276z"/>
                        <path
                            d="M160 295 l-44 -45 46 -47 c26 -26 51 -44 54 -40 4 4 -8 23 -26 42 l-34 35 112 0 c68 0 112 4 112 10 0 6 -44 10 -112 10 l-112 0 32 33 c18 18 32 36 32 40 0 16 -18 4 -60 -38z"/>
                    </g>
                </svg>
            </a>

            <div class="bg-white py-4 md:py-7 px-4 md:px-8 xl:px-10">
                @if($activeTablesByDiningArea->count())
                    <div class="sm:flex items-center justify-between">
                        <div class="flex items-center">
                            @foreach($activeTablesByDiningArea as $diningArea => $activeTables)
                                <a class="rounded-full focus:outline-none focus:ring-2  focus:bg-indigo-50 focus:ring-indigo-800"
                                   href="javascript:void(0)"
                                   data-dining-area="{{$diningArea}}"
                                   onclick="filterTables(this)"
                                   @if($loop->first) class="bg-indigo-100 text-indigo-700 rounded-full" @endif>
                                    <div
                                        class="py-2 px-8">
                                        <p>{{$diningArea}}</p>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                    <div class="mt-7 overflow-x-auto">
                        <table class="w-full whitespace-nowrap">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Restaurant</th>
                                <th>Table</th>
                                <th>Dining Area</th>
                                <th>Minimum Capacity</th>
                                <th>Maximum Capacity</th>
                                <th>Active</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($activeTablesByDiningArea as $diningArea => $activeTables)
                                @foreach($activeTables as $activeTable)
                                    <tr tabindex="0" class="focus:outline-none h-16 border border-gray-300 rounded"
                                        data-dining-area="{{$diningArea}}">
                                        <td>
                                            <div class="ml-5">
                                                <p>{{ $activeTable->id }}</p>
                                            </div>
                                        </td>
                                        <td class="">
                                            <div class="flex items-center pl-5">
                                                <p class="text-base font-medium leading-none text-gray-700 mr-2">{{ $activeTable->restaurant->name }}</p>
                                            </div>
                                        </td>
                                        <td class="">
                                            <div class="flex items-center pl-5">
                                                <p class="text-base font-medium leading-none text-gray-700 mr-2">{{ $activeTable->name }}</p>
                                            </div>
                                        </td>
                                        <td class="">
                                            <div class="flex items-center pl-5">
                                                <p class="text-base font-medium leading-none text-gray-700 mr-2">{{ $activeTable->diningArea->name }}</p>
                                            </div>
                                        </td>
                                        <td class="pl-24">
                                            <div class="flex items-center">
                                                <p class="text-sm leading-none text-gray-600 ml-2">{{ $activeTable->minimum_capacity }}</p>
                                            </div>
                                        </td>
                                        <td class="pl-5">
                                            <div class="flex items-center">
                                                <p class="text-sm leading-none text-gray-600 ml-2">{{ $activeTable->maximum_capacity }}</p>
                                            </div>
                                        </td>
                                        <td class="pl-5">
                                            <button
                                                class="py-3 px-3 text-sm focus:outline-none leading-none rounded {{ $activeTable->active? 'text-green-700 bg-green-100' : 'text-red-700 bg-red-100' }} ">
                                                {{ $activeTable->active ? 'Yes' : 'No' }}
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div>
                        <h2 class="text-lg font-medium text-center text-gray-500">Nothing here yet!</h2>
                    </div>
                @endif
            </div>
        </div>
    </div>

    @push('scripts')
        <script src="{{'../../js/filterActiveTables.js'}}"></script>
    @endpush

@endsection
