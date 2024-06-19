@extends('layouts.app')
@section('title', 'Home')
@section('content')

    <div class="sm:px-6 w-full">
        <div class="bg-white py-4 md:py-7 px-4 md:px-8 xl:px-10">
            <div class="mt-7 overflow-x-auto">
                @if($restaurants->count())
                    <table class="w-full whitespace-nowrap">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Restaurant</th>
                            <th>View</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($restaurants as $restaurant)
                            <tr tabindex="0" class="focus:outline-none h-16 border border-gray-300 rounded">
                                <td>
                                    <div class="ml-5">
                                        <p>{{ $restaurant->id }}</p>
                                    </div>
                                </td>
                                <td class="">
                                    <div class="flex items-center pl-5">
                                        <p class="text-base font-medium leading-none text-gray-700 mr-2">{{ $restaurant->name }}</p>
                                    </div>
                                </td>
                                <td class="pl-5">
                                    <a href="{{ route('restaurants.tables', ['restaurant' => $restaurant->id]) }}"
                                       class="py-2 px-3 text-sm focus:outline-none leading-none rounded bg-black text-white">
                                        Tables
                                    </a>
                                </td>
                                <td class="pl-5">
                                    <a href="{{ route('restaurants.active-tables', ['restaurant' => $restaurant->id]) }}"
                                       class="py-2 px-3 text-sm focus:outline-none leading-none rounded bg-black text-white">
                                        Active Tables
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @else
                    <div>
                        <h2 class="text-lg font-medium text-center text-gray-500">Nothing here yet!</h2>
                    </div>
                @endif
            </div>
        </div>
    </div>

    @yield('tables')

@endsection
