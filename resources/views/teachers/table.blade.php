<div class="table-responsive">
    <table class="table" id="admissions-table">
        <thead>
            <tr>
                <th>Firstname</th>
        <th>Lastname</th>
        <th>Address</th>
        <th>Gender</th>
        <th>Telephone</th>
        <th>Email</th>
        <th>Image</th>
        <th>Dob</th>
        <th>Status</th>
        <th>Date Registered</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($teachers as $teacher)
            <tr>
            <td>{{ $teacher->firstname }}</td>
            <td>{{ $teacher->lastname }}</td>
            <td>{{ $teacher->address }}</td>
            <td>{{ $teacher->gender }}</td>
            <td>{{ $teacher->telephone }}</td>
            <td>{{ $teacher->user->email }}</td>

            @if($teacher->img_filename != null)
            <td><img src="{{url('storage/teachers/'.$teacher->user_id.'/'.$teacher->img_filename)}}" style="width: 50px;height:50px;"></td>
            @else
            <td><img src="{{url('storage/user')}}" style="width: 50px;height:50px;"></td>
            @endif
            <td>{{ $teacher->dob }}</td>
            @if($teacher->status==1)
            <td><button class="btn-success">Active</button></td>
            @else
            <td><button class="btn-danger">NotActive</button></td>
            @endif
            <td>{{ $teacher->date_registered }}</td>
                <td>
                {!! Form::open(['route' => ['teachers.destroy', $teacher->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{route('teachers.show', [$teacher->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{route('teachers.edit', [$teacher->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
