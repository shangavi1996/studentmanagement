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
        @foreach($datas as $data)
            <tr>
            <td>{{ $data->firstname }}</td>
            <td>{{ $data->lastname }}</td>
            <td>{{ $data->address }}</td>
            <td>{{ $data->gender }}</td>
            <td>{{ $data->telephone }}</td>
            <td>{{ $data->email }}</td>

            @if($data->image != null)
            <td><img src="{{url('storage/students/'.$data->user_id.'/'.$data->image)}}" style="width: 50px;height:50px;"></td>
            @else
            <td><img src="{{url('storage/user')}}" style="width: 50px;height:50px;"></td>
            @endif
            <td>{{ $data->dob }}</td>
            @if($data->status==1)
            <td><button class="btn-success">Active</button></td>
            @else
            <td><button class="btn-danger">NotActive</button></td>
            @endif
            <td>{{ $data->date_registered }}</td>
                <td>
                {!! Form::open(['route' => ['admissions.destroy', $data->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{route('admissions.show', [$data->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{route('admissions.edit', [$data->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
  
</div>
