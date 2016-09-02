@extends('layouts.inventory.app')
@section('title')
    Pagina de inicio
@stop
@section('title_head')
    Pagina Principal
@stop
@section('content')   
    <!-- Page Content -->
    <div class="page-content">
        <!-- Your Content Goes Here -->
        <div class="row">
            <div class="col-xs-12">
            funciono
            </div>
        </div>
    </div>
@stop

@section('scripts')
    <!--Page Related Scripts-->
    <script src="{{ URL::asset('assets/js/charts/morris/raphael-2.0.2.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/charts/morris/morris.js') }}"></script>
    <script src="{{ URL::asset('assets/js/charts/morris/morris-init.js') }}"></script>
    <script type="text/javascript">
        $(window).bind("load", function () {

            InitiateAreaChart.init();
            InitiateBarChart.init();
        });
    </script>
@stop