<div class="table-responsive">
    <table class="table" id="classSchedules-table">
        <thead>
            <tr>
                <th>Course Id</th>
        <th>Level </th>
        <th>Shift </th>
        <th>Classroom Code </th>
        <th>Batch </th>
        <th>Day </th>
        <th>Time </th>
        <th>Term </th>
        <th>StartDate</th>
        <th>Enddate</th>
        <th>Status</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($classschedules as $classSchedule)
            <tr>
                <td>{{ $classSchedule->course_name}}__{{ $classSchedule->course_code}}</td>
            <td>{{ $classSchedule->level_name }}</td>
            <td>{{ $classSchedule->shift }}</td>
            <td>{{ $classSchedule->classroom_code }}</td>
            <td>{{ $classSchedule->batch }}</td>
            <td>{{ $classSchedule->name }}</td>
            <td>{{ $classSchedule->time }}</td>
            <td>{{ $classSchedule->term_name }}</td>
            <td>{{ $classSchedule->starttime }}</td>
            <td>{{ $classSchedule->endtime }}</td>
            @if($classSchedule->status==1)
            <td><button class="btn-success">Active</button></td>
            @else
            <td><button class="btn-danger">NotActive</button></td>
            @endif
                <td>
                    {!! Form::open(['route' => ['classSchedules.destroy', $classSchedule->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('classSchedules.show', [$classSchedule->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('classSchedules.edit', [$classSchedule->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
