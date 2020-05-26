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
        @foreach($admissions as $admission)
            <tr>
            <td>{{ $admission->firstname }}</td>
            <td>{{ $admission->lastname }}</td>
            <td>{{ $admission->address }}</td>
            <td>{{ $admission->gender }}</td>
            <td>{{ $admission->telephone }}</td>
            <td>{{ $admission->email }}</td>

            @if($admission->image != null)
            <td><img src="{{url('storage/students/'.$admission->user_id.'/'.$admission->image)}}" style="width: 50px;height:50px;"></td>
            @else
            <td><img src="{{url('storage/user')}}" style="width: 50px;height:50px;"></td>
            @endif
            <td>{{ $admission->dob }}</td>
            @if($admission->status==1)
            <td><button class="btn-success">Active</button></td>
            @else
            <td><button class="btn-danger">NotActive</button></td>
            @endif
            <td>{{ $admission->date_registered }}</td>
                <td>
                {!! Form::open(['route' => ['admissions.destroy', $admission->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{route('admissions.show', [$admission->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{route('admissions.edit', [$admission->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{$admissions->links()}}
</div>
