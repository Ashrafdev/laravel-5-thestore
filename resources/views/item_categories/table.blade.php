<table class="table table-responsive" id="itemCategories-table">
    <thead>
        <th>Name</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($itemCategories as $itemCategories)
        <tr>
            <td>{!! $itemCategories->name !!}</td>
            <td>
                {!! Form::open(['route' => ['item_categories.destroy', $itemCategories->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('item_categories.show', [$itemCategories->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('item_categories.edit', [$itemCategories->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>