@extends('dev::layouts.noSidebar')


@section('content')
    <div class="row">
        <div class="col-xs-12">
            @include('laravel-controller-audit::common.console-form')
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            @include('laravel-controller-audit::common.console-table')
        </div>
    </div>

    <div class="row space-xs-1">
        <div class="col-xs-12">
            {!! $audit_consoles->links() !!}
        </div>
    </div>
@stop
