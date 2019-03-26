<table class="table" data-toggle="table">
    <thead>
    <tr>
        <th data-sortable="true">Name</th>
        <th data-sortable="true">Description</th>
        <th data-sortable="true">Created At</th>
        <th data-sortable="true">Completed At</th>
        <th data-sortable="true">Time Taken</th>
        </th>
    </tr>
    </thead>
    <tbody>
    @foreach($audit_consoles as $audit_console)
        <tr>
            <td>{!! $audit_console->name !!}</td>
            <td>{!! $audit_console->description !!}</td>
            <td>{!! $audit_console->created_at !!}</td>
            <td>{!! $audit_console->completed_at !!}</td>
            <td>
                @if($audit_console->completed_at != '')
                    {!! \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $audit_console->completed_at)->diffInSeconds($audit_console->created_at) !!} sec(s)
                @endif
            </td>
        </tr>
    @endforeach
    </tbody>
</table>