@extends('master')
@section('page')
    <!-- Loading Container -->
    @include('layouts.loading')
    <!--  /Loading Container -->
    <!-- Main Container -->
    <div class="main-container" id="main-container">
            <div class="main-content">
                <div class="main-content-inner">
                    <!-- Page Body -->
                    @yield('content')
                    <!-- /Page Body -->
                    <!-- Main Container -->
                </div>
            </div>
        <!-- Page Footer -->
        @include('layouts.footer')
        <!-- /Page Footer -->
    </div>  
@stop