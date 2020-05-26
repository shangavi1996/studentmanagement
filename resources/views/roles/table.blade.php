<div class="table-responsive">
    <table class="table" id="roles-table">
        <thead>
            <tr>
                <th>Name</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($roles as $role)
            <tr>
                <td>{{ $role->name }}</td>
                <td>
                    {!! Form::open(['route' => ['roles.destroy', $role->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('roles.show', [$role->id]) }}" class='btn btn-success btn-default btn-xs'><i class="glyphicon glyphicon-eye-open "><b>View</b></i></a>&ensp;
                        <a href="{{ route('roles.edit', [$role->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"><b>Edit</b></i></a>&ensp;
                        {!! Form::button('<i class="glyphicon glyphicon-trash"><b>Delete</b></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
