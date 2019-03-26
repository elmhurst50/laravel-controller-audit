<table class="table" data-toggle="table">
    <thead>
    <tr>
        <th data-sortable="true">Created At</th>
        <th data-sortable="true">URL</th>
        <th data-sortable="true">Request Object</th>
        <th data-sortable="true">Method</th>
        <th data-sortable="true">IP Address</th>
        <th data-sortable="true">User</th>
    </tr>
    </thead>
    <tbody>
    @foreach($audit_controllers as $audit_controller)
        <tr>
            <td>{!! $audit_controller->created_at !!}</td>
            <td title="Controller: {!! $audit_controller->controller !!}">{!! $audit_controller->url !!}</td>
            <td>{!! $audit_controller->request_object !!}</td>
            <td>{!! $audit_controller->method !!}</td>
            <td>{!! $audit_controller->ip_address !!}</td>
            <td>@if(isset($audit_controller->user)) {!! $audit_controller->user->name !!} @else none @endif</td>
        </tr>
    @endforeach
    </tbody>
</table>