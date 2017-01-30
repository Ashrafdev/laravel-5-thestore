@extends('layouts.index')
@section('content')
    <section class="wrapper site-min-height">
        <!-- page start-->
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <section class="panel">
                    <header class="panel-heading">
                        Post Your Items
                    </header>
                    <div class="panel-body">

                        <div class="stepy-tab">
                            <ul id="default-titles" class="stepy-titles clearfix">
                                <li id="default-title-0" class="current-step">
                                    <div>Your Item</div>
                                    <span> </span>
                                </li>
                                <li id="default-title-1" class="">
                                    <div>Register</div>
                                    <span> </span>
                                </li>
                            </ul>

                        </div>
                        <form class="form-horizontal" id="defaults" action="{!! url('/post_item') !!}" method="post" enctype="multipart/form-data" accept-charset="UTF-8">
                            {{ csrf_field() }}
                            <fieldset title="Step1" class="step" id="default-step-0" style="display: block;">
                                <legend>Item Details</legend>
                                <!-- Name Field -->
                                <div class="form-group{{ $errors->has('item_name') ? ' has-error' : '' }}">
                                    <label class="col-lg-2 control-label">Name</label>
                                    <div class="col-lg-10">
                                        <input type="text" name="item_name" class="form-control" placeholder="Name" required>
                                        @if ($errors->has('item_name'))
                                            <span class="help-block">
                                              <strong>{{ $errors->first('item_name') }}</strong>
                                           </span>
                                        @endif
                                    </div>
                                </div>

                                <!-- Description Field -->
                                <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                    <label class="col-lg-2 control-label">Description</label>
                                    <div class="col-lg-10">
                                        <textarea type="text" name="item_description" class="form-control" placeholder="Description" required></textarea>
                                        @if ($errors->has('description'))
                                            <span class="help-block">
                                              <strong>{{ $errors->first('description') }}</strong>
                                           </span>
                                        @endif
                                    </div>
                                </div>

                                <!-- Price Field -->
                                <div class="form-group{{ $errors->has('item_price') ? ' has-error' : '' }}">
                                    <label class="col-lg-2 control-label">Price</label>
                                    <div class="col-lg-10 input-group">
                                        <span class="input-group-addon">RM</span>
                                        <input type="number" name="item_price" class="form-control" placeholder="Price" required>
                                        @if ($errors->has('item_price'))
                                            <span class="help-block">
                                              <strong>{{ $errors->first('item_price') }}</strong>
                                           </span>
                                        @endif
                                    </div>
                                </div>

                                <!-- Img  -->
                                <div class="form-group{{ $errors->has('item_image') ? ' has-error' : '' }}">
                                    <label class="col-lg-2 control-label">Image</label>
                                    <div class="col-lg-4">
                                        <input type="file" name="item_image" class="form-control-file btn btn-white btn-file" placeholder="" required>
                                        @if ($errors->has('item_image'))
                                            <span class="help-block">
                                              <strong>{{ $errors->first('item_image') }}</strong>
                                           </span>
                                        @endif
                                    </div>
                                </div>

                                <!-- Item Categories Id Field -->
                                <div class="form-group{{ $errors->has('item_categories_id') ? ' has-error' : '' }}">
                                    <label class="col-lg-2 control-label">Item Categories</label>
                                    <div class="col-lg-10">
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

                            <fieldset title="Step 2" class="step" id="default-step-1" style="display: none;">
                                <legend>My Details</legend>
                                @include('auth.register_step')
                                <button type="submit" id="defaults-next-0" class="button-next  btn btn-info">SUBMIT</button>
                            </fieldset>

                        </form>
                    </div>
                </section>
            </div>
        </div>
        <!-- page end-->
    </section>
@push('scripts')
<script>
    $(document).ready(function ($) {
        $('#defaults').stepy({
            backLabel: 'Previous',
            block: true,
            nextLabel: 'Next',
            titleClick: true,
            titleTarget: '.stepy-tab'
        });
    })
</script>
@endpush
@endsection
