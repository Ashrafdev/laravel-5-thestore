@extends('layouts.index')
@section('content')
    <section class="wrapper">
        @include('Element.Flash.general')
        @include('Element.Flash.success')
        @include('Element.Flash.warning')

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <section class="panel">
                    <header class="panel-heading">
                        Item Lists
                        <div class="pull-right">
                            <a href="" class="label label-info label-mini" data-toggle="modal" data-target="#addMyItems">Add</a>
                        </div>
                    </header>
                    @if($items->count() > 0)
                    <table class="table table-striped table-advance table-hover">
                        <thead>
                        <tr>
                            <th><i class="fa fa-bullhorn"></i> Name</th>
                            <th class="hidden-phone"><i class="fa fa-question"></i> Description</th>
                            <th><i class="fa fa-bookmark"></i> Price</th>
                            <th><i class="fa fa-edit"></i> Image</th>
                            <th>Actions</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($items as $key => $item)
                                <tr>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->description }}</td>
                                    <td>RM{{ $item->price }}</td>
                                    <td><span class="label label-info label-mini" data-toggle="modal" data-target="#viewImage{{$key}}">Click For View</span></td>
                                    <td>
                                        <a class="btn btn-success btn-xs" href="/view/item/{!! $item->id !!}" title="View"><i class="fa fa-check"></i></a>
                                        <a class="btn btn-primary btn-xs" href="#" data-toggle="modal" data-target="#updateMyItem{{$key}}" title="Edit"><i class="fa fa-pencil"></i></a>
                                        <a class="btn btn-danger btn-xs" title="delete" href="#"
                                           onclick="if (confirm('Are you sure you want to delete?')) { document.{!! 'post_'.str_replace('-', '', $item->id) !!}.submit(); } event.returnValue = false; return false;">
                                            <i class="fa fa-trash "></i>
                                        </a>
                                        <form name="{!! 'post_'.str_replace('-', '', $item->id) !!}" action="{{ url("/my/item/$item->id") }}" method="POST" style="display: none;">
                                            {!! csrf_field() !!}
                                            {!! method_field('DELETE') !!}
                                        </form>
                                    </td>
                                    <td>
                                        <div aria-hidden="true" aria-labelledby="updateMyItem{{$key}}" role="dialog" tabindex="-1" id="updateMyItem{{$key}}"
                                             class="modal fade">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                                                        <h4 class="modal-title">Update Item</h4>
                                                    </div>
                                                    <div class="modal-body">@include('items.edit', ['id' => $item->id])</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div aria-hidden="true" aria-labelledby="viewImage{{$key}}" role="dialog" tabindex="-1" id="viewImage{{$key}}"
                                             class="modal fade">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                                                        <h4 class="modal-title">View Image</h4>
                                                    </div>
                                                    <div class="modal-body">@include('items.view_image', ['path' => $item->img_path])</div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                        <p>No Data... You Dont Have Item</p>
                    @endif
                    <div aria-hidden="true" aria-labelledby="addMyItems" role="dialog" tabindex="-1" id="addMyItems"
                         class="modal fade">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                                    <h4 class="modal-title">Create New</h4>
                                </div>
                                <div class="modal-body">@include('items.create')</div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>

    </section>
@endsection
@push('scripts')
<script>
//    $(function () {
//        jQuery(".fancybox").fancybox();
//    });
</script>
@endpush
