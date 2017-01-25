@extends('layouts.index')
@section('content')
    <div class="wrapper">
        <div class="col-md-8 col-md-offset-2">
            <section class="panel">
                <div class="panel-body">
                    <div class="col-md-6">
                        <div class="pro-img-details">
                            <img src="{!! url($items->img_path) !!}" alt="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h4 class="pro-d-title">
                            <a href="#" class="">
                                {!! $items->name !!}
                            </a>
                        </h4>
                        <p>
                            {!! $items->description !!}
                        </p>
                        <div class="product_meta">
                            <span class="posted_in"> <strong>Categories:</strong> <a rel="tag" href="#"> all</a></span>
                            <span class="tagged_as"><strong>Tags:</strong><a rel="tag" href="#"> all</a>.</span>
                        </div>
                        <div class="m-bot15"><strong>Price : </strong>
                            <span class="pro-price"> RM{!! $items->price !!}</span>
                        </div>
                        <div class="form-group">
                            <p>
                                Contact Seller: {!! $items->users->mobile !!}
                            </p>
                            <p>
                                <a href="mailto:{!! $items->users->email !!}" class="btn btn-round btn-danger" target="_blank">
                                    <i class="icon-shopping-cart"></i> Email Seller
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection