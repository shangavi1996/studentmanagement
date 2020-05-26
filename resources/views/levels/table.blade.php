<div class="table-responsive">
    <table class="table" id="levels-table">
        <thead>
            <tr>
                <th>Level Name</th>
        <th>Status</th>
        <th>Course</th>
        <th>Level Description</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($level_s as $level)
            <tr>
                <td>{{ $level->level_name }}</td>
                @if($level->status==1)
            <td><button class="btn-success">Active</button></td>
            @else
            <td><button class="btn-danger">NotActive</button></td>
            @endif
            <td>{{ $level->course_name}}</td>
            <td>{{ $level->level_description }}</td>
                <td>
                    {!! Form::open(['route' => ['levels.destroy', $level->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('levels.show', [$level->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('levels.edit', [$level->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
