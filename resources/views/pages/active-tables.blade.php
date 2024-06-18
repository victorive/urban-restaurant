@extends('index')
@section('title', 'Active Tables')
@section('tables')
    <div class="sm:px-6 w-full">
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
                                            class="py-3 px-3 text-sm focus:outline-none leading-none text-red-700 bg-red-100 rounded {{ $activeTable->active? 'text-green-700 bg-green-100' : 'text-red-700 bg-red-100' }} ">
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

    @push('scripts')
        <script src="{{'js/filterActiveTables.js'}}"></script>
    @endpush

@endsection
