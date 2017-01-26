<form class="form-horizontal" role="form" method="POST" action="{{ url("/my/item/create") }}" accept-charset="UTF-8" enctype="multipart/form-data">
    {{ csrf_field() }}

    <fieldset title="Step1" class="step" id="default-step-0" style="display: block;">
        <legend>Item Details</legend>
        <!-- Name Field -->
        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            <label class="col-xs-2 control-label">Name</label>
            <div class="col-xs-10">
                <input type="text" name="name" class="form-control" placeholder="Name" required>
                @if ($errors->has('name'))
                    <span class="help-block">
                      <strong>{{ $errors->first('name') }}</strong>
                   </span>
                @endif
            </div>
        </div>

        <!-- Description Field -->
        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
            <label class="col-xs-2 control-label">Description</label>
            <div class="col-xs-10">
                <textarea type="text" name="description" class="form-control" placeholder="description" required></textarea>
                @if ($errors->has('description'))
                    <span class="help-block">
                      <strong>{{ $errors->first('description') }}</strong>
                   </span>
                @endif
            </div>
        </div>

        <!-- Price Field -->
        <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
            <label class="col-xs-2 control-label">Price</label>
            <div class="col-xs-10 input-group">
                <span class="input-group-addon">RM</span>
                <input type="number" name="price" class="form-control" placeholder="Price" required>
                @if ($errors->has('price'))
                    <span class="help-block">
                      <strong>{{ $errors->first('price') }}</strong>
                   </span>
                @endif
            </div>
        </div>

        <!-- Img  -->
        <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
            <label class="col-xs-2 control-label">Image</label>
            <div class="col-lg-4">
                <input type="file" name="image" class="form-control-file btn btn-white btn-file" placeholder="" required>
                @if ($errors->has('image'))
                    <span class="help-block">
                      <strong>{{ $errors->first('image') }}</strong>
                   </span>
                @endif
            </div>
        </div>

        <!-- Item Categories Id Field -->
        <div class="form-group{{ $errors->has('item_categories_id') ? ' has-error' : '' }}">
            <label class="col-xs-2 control-label">Item Categories</label>
            <div class="col-xs-10">
                <select name="item_categories_id" class="form-control" required>
                    <option value="1">Watchs</option>
                    <option value="2">Watchs</option>
                    <option value="3">Others</option>
                </select>
                @if ($errors->has('item_categories_id'))
                    <span class="help-block">
                      <strong>{{ $errors->first('item_categories_id') }}</strong>
                   </span>
                @endif
            </div>
        </div>

    </fieldset>

    <div class="form-group">
        <div class="col-md-6 col-md-offset-4">
            <button type="submit" class="btn btn-primary">
                Submit
            </button>
        </div>
    </div>
</form>