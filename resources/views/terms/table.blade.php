<div class="table-responsive">
    <table class="table" id="terms-table">
        <thead>
            <tr>
                <th>Term Name</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($terms as $term)
            <tr>
                <td>{{ $term->term_name }}</td>
                <td>
                    {!! Form::open(['route' => ['terms.destroy', $term->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('terms.show', [$term->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('terms.edit', [$term->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
