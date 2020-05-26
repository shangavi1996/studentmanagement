<div class="table-responsive">
    <table class="table" id="batches-table">
        <thead>
            <tr>
                <th>Batch</th>
                <th>created_at</th>
                <th>updated_at</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($batches as $batch)
            <tr>
                <td>{{ $batch->batch }}</td>
                <td>{{ $batch->created_at }}</td>
                <td>{{ $batch->updated_at }}</td>
                <td>
                    {!! Form::open(['route' => ['batches.destroy', $batch->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('batches.show', [$batch->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('batches.edit', [$batch->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
