<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control', 'rows' => '5']) !!}
</div>

<!-- Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('price', 'Price:') !!}
    {!! Form::number('price', null, ['class' => 'form-control']) !!}
</div>

<!-- Img Path Field -->
<div class="form-group col-sm-6">
    {!! Form::label('img_path', 'Img Path:') !!}
    {!! Form::text('img_path', null, ['class' => 'form-control']) !!}
</div>

<!-- File Mime Field -->
<div class="form-group col-sm-6">
    {!! Form::label('file_mime', 'File Mime:') !!}
    {!! Form::text('file_mime', null, ['class' => 'form-control']) !!}
</div>

<!-- Item Categories Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('item_categories_id', 'Item Categories Id:') !!}
    {!! Form::number('item_categories_id', null, ['class' => 'form-control']) !!}
</div>

<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', 'User Id:') !!}
    {!! Form::text('user_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! url('items.index') !!}" class="btn btn-default">Cancel</a>
</div>
