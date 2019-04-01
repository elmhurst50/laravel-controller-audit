@extends('dev::layouts.noSidebar')


@section('content')
    <div class="row">
        <div class="col-xs-12">
            @include('laravel-controller-audit::common.form')
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            @include('laravel-controller-audit::common.table')
        </div>
    </div>

    <div class="row space-xs-1">
        <div class="col-xs-12">
            {!! $audit_controllers->links() !!}
        </div>
    </div>
@stop
