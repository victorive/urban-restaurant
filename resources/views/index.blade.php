@extends('layouts.app')
@section('title', 'Home')
@section('content')
    <div class="space-y-5">
        <div class="overflow-hidden rounded-xl border border-gray-100 bg-gray-200 p-1">
            <ul class="flex items-center gap-2 text-sm font-medium">
                <li class="flex-1">
                    <a id="tables-link" href="{{ route('tables') }}"
                       class="{{ request()->routeIs('tables') ? 'text-blue-700 relative flex items-center justify-center gap-2 rounded-lg bg-white px-3 py-2 shadow' : 'flex items-center justify-center gap-2 rounded-lg px-3 py-2 text-gray-500 hover:bg-white hover:text-blue-700 hover:shadow' }}">
                        Tables
                    </a>
                </li>
                <li class="flex-1">
                    <a id="active-tables-link" href="{{ route('active-tables') }}"
                       class="{{ request()->routeIs('active-tables') ? 'text-blue-700 relative flex items-center justify-center gap-2 rounded-lg bg-white px-3 py-2 shadow' : 'flex items-center justify-center gap-2 rounded-lg px-3 py-2 text-gray-500 hover:bg-white hover:text-blue-700 hover:shadow' }}">
                        Active Tables
                    </a>
                </li>
            </ul>
        </div>
    </div>

    @yield('tables')
    
@endsection
