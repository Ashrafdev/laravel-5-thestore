@extends('layouts.index')
@section('content')
<section class="panel">
    <div class="panel-body">
        <div class="col-md-6">
            <div class="pro-img-details">
                <img src="img/product-list/pro-thumb-big.jpg" alt="">
            </div>
            <div class="pro-img-list">
                <a href="#">
                    <img src="img/product-list/pro-thumb-1.jpg" alt="">
                </a>
                <a href="#">
                    <img src="img/product-list/pro-thumb-2.jpg" alt="">
                </a>
                <a href="#">
                    <img src="img/product-list/pro-thumb-3.jpg" alt="">
                </a>
                <a href="#">
                    <img src="img/product-list/pro-thumb-1.jpg" alt="">
                </a>
            </div>
        </div>
        <div class="col-md-6">
            <h4 class="pro-d-title">
                <a href="#" class="">
                    Leopard Shirt Dress
                </a>
            </h4>
            <p>
                Praesent ac condimentum felis. Nulla at nisl orci, at dignissim dolor, The best product descriptions address your ideal buyer directly and personally. The best product descriptions address your ideal buyer directly and personally.
            </p>
            <div class="product_meta">
                <span class="posted_in"> <strong>Categories:</strong> <a rel="tag" href="#">Jackets</a>, <a rel="tag" href="#">Men</a>, <a rel="tag" href="#">Shirts</a>, <a rel="tag" href="#">T-shirt</a>.</span>
                <span class="tagged_as"><strong>Tags:</strong> <a rel="tag" href="#">mens</a>, <a rel="tag" href="#">womens</a>.</span>
            </div>
            <div class="m-bot15"> <strong>Price : </strong> <span class="amount-old">$544</span>  <span class="pro-price"> $300.00</span></div>
            <div class="form-group">
                <label>Quantity</label>
                <input type="quantiy" placeholder="1" class="form-control quantity">
            </div>
            <p>
                <button class="btn btn-round btn-danger" type="button"><i class="icon-shopping-cart"></i> Add to Cart</button>
            </p>
        </div>
    </div>
</section>
@endsection