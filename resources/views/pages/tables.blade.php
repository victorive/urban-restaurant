@extends('index')
@section('title', 'Tables')
@section('tables')
    <div class="sm:px-6 w-full">
        <div class="bg-white py-4 md:py-7 px-4 md:px-8 xl:px-10">
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
                    @foreach($tables as $table)
                        <tr tabindex="0" class="focus:outline-none h-16 border border-gray-300 rounded">
                            <td>
                                <div class="ml-5">
                                    <p>{{ $table->id }}</p>
                                </div>
                            </td>
                            <td class="">
                                <div class="flex items-center pl-5">
                                    <p class="text-base font-medium leading-none text-gray-700 mr-2">{{ $table->restaurant->name }}</p>
                                </div>
                            </td>
                            <td class="">
                                <div class="flex items-center pl-5">
                                    <p class="text-base font-medium leading-none text-gray-700 mr-2">{{ $table->name }}</p>
                                </div>
                            </td>
                            <td class="">
                                <div class="flex items-center pl-5">
                                    <p class="text-base font-medium leading-none text-gray-700 mr-2">{{ $table->diningArea->name }}</p>
                                </div>
                            </td>
                            <td class="pl-24">
                                <div class="flex items-center">
                                    <p class="text-sm leading-none text-gray-600 ml-2">{{ $table->minimum_capacity }}</p>
                                </div>
                            </td>
                            <td class="pl-5">
                                <div class="flex items-center">
                                    <p class="text-sm leading-none text-gray-600 ml-2">{{ $table->maximum_capacity }}</p>
                                </div>
                            </td>
                            <td class="pl-5">
                                <button
                                    class="py-3 px-3 text-sm focus:outline-none leading-none text-red-700 bg-red-100 rounded {{ $table->active? 'text-green-700 bg-green-100' : 'text-red-700 bg-red-100' }} ">
                                    {{ $table->active ? 'Yes' : 'No' }}
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
