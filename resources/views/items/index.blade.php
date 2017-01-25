@extends('layouts.index')
@section('content')
    <section class="wrapper">
        @include('Element.Flash.general')
        @include('Element.Flash.success')
        @include('Element.Flash.warning')
        <section class="panel">
            <header class="panel-heading">
                Image Galley
            </header>
            <div class="panel-body">
                <ul class="grid cs-style-3">

                    @if($items->count() > 0)
                        @foreach($items as $key => $item)
                            <li>
                                <figure>
                                    <img src="/img/gallery/4.jpg" alt="img04">
                                    <figcaption>
                                        <h3>{{ $item->name }}</h3>
                                        <span>{{$item->description}}</span><br>
                                        <span>{{$item->price}}</span>
                                        <a href="#updateMyItem{{$key}}" data-toggle="modal" class="fancybox" rel="group">Edit Item</a>
                                    </figcaption>
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
                                </figure>
                            </li>
                        @endforeach
                    @else
                        <p>No Data... You Dont Have Item</p>
                    @endif
                </ul>
            </div>
        </section>
    </section>
@endsection
@push('scripts')
<script>
//    $(function () {
//        jQuery(".fancybox").fancybox();
//    });
</script>
@endpush
