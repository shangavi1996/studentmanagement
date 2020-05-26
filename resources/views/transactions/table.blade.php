<div class="table-responsive">
    <table class="table" id="transactions-table">
        <thead>
            <tr>
                <th>Student Id</th>
        <th>Fee Id</th>
        <th>Use Id</th>
        <th>Paid</th>
        <th>Remark</th>
        <th>Description</th>
        <th>Trabsaction Date</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($transactions as $transaction)
            <tr>
                <td>{{ $transaction->student_id }}</td>
            <td>{{ $transaction->fee_id }}</td>
            <td>{{ $transaction->use_id }}</td>
            <td>{{ $transaction->paid }}</td>
            <td>{{ $transaction->remark }}</td>
            <td>{{ $transaction->description }}</td>
            <td>{{ $transaction->trabsaction_date }}</td>
                <td>
                    {!! Form::open(['route' => ['transactions.destroy', $transaction->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('transactions.show', [$transaction->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('transactions.edit', [$transaction->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
