@extends('app')
@section('app-content')
    <div id="page" class="flex h-screen text-lg overflow-x-hidden">

        @yield('sidebar')

        <div class="flex-1 p-3  max-h-min ">
            @yield('content')
        </div>
        {{-- <div class="content">
            @yield('options')
        </div> --}}
    </div>
@endsection
