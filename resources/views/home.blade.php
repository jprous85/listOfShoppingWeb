@extends('layouts.app')

@section('content')
    <div class="row content-objects">
        <div class="home-content">
            @component('layouts/components/navbar')@endcomponent

            <div class="container">
                @yield('body')
            </div>
        </div>
    </div>
@endsection
