<table class="table table-responsive" id="states-table">
    <thead>
        <th>Name</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($states as $states)
        <tr>
            <td>{!! $states->name !!}</td>
            <td>
                {!! Form::open(['route' => ['states.destroy', $states->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('states.show', [$states->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('states.edit', [$states->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>