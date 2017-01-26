@extends('layouts.index')
@section('content')
    <section class="wrapper">
    @include('Element.Flash.general')
    @include('Element.Flash.success')
    @include('Element.Flash.warning')
        <!-- page start-->
        <div class="row">
            <div class="col-md-3">
                <section class="panel">
                    <div class="panel-body">
                        <input v-model="searchKeyword" type="text" placeholder="Keyword Search" class="form-control">
                    </div>
                </section>
                <section class="panel">
                    <header class="panel-heading">Category</header>
                    <div class="panel-body">
                        <ul class="nav prod-cat">
                            <li><a href="#"><i class=" icon-angle-right"></i>All</a></li>
                        </ul>
                    </div>
                </section>
            </div>
            <div class="col-md-9">
                <section class="panel">
                    <div class="panel-body">
                        <div class="pro-sort">
                            <label class="pro-lab">Sort By</label>
                            <select class="styled hasCustomSelect" style="-webkit-appearance: menulist-button; width: 130px; position: absolute; opacity: 0; height: 39px; font-size: 12px;">
                                <option>Default Sorting</option>
                                <option>Popularity</option>
                                <option>Average Rating</option>
                                <option>Newness</option>
                                <option>Price Low to High</option>
                                <option>Price High to Low</option>
                            </select>
                            <span class="customSelect styled" style="display: inline-block;">
                                <span class="customSelectInner" style="width: 108px; display: inline-block;">Default Sorting</span>
                            </span>
                        </div>
                        <div class="pro-sort">
                            <label class="pro-lab">Show</label>
                            <select class="styled hasCustomSelect" style="-webkit-appearance: menulist-button; width: 119px; position: absolute; opacity: 0; height: 39px; font-size: 12px;">
                                <option>Result Per Page</option>
                                <option>2 Per Page</option>
                                <option>4 Per Page</option>
                                <option>6 Per Page</option>
                                <option>8 Per Page</option>
                                <option>10 Per Page</option>
                            </select>
                            <span class="customSelect styled" style="display: inline-block;">
                                <span class="customSelectInner" style="width: 97px; display: inline-block;">Result Per Page</span>
                            </span>
                        </div>

                        <div class="pull-right">
                            <ul class="pagination pagination-sm pro-page-list">
                                <li v-for="(n, index) in items.last_page">
                                    <a href="javascript:void(0)" v-on:click="getHomePage(n)">@{{ n }}</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </section>

                <div class="row product-list">

                    <div class="col-md-4" v-for="item in items.data | filterBy searchKeyword" transition="staggered" stagger="100">
                        <section class="panel">
                            <div class="pro-img-box">
                                <img :src="'/'+item.img_path" alt="" width="312px" height="248px">
                                <a :href="'/view/item/'+item.id" class="adtocart">
                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                </a>
                            </div>
                            <div class="panel-body text-center">
                                <h4>
                                    <a :href="'/view/item/'+item.id" class="pro-title">
                                        @{{ item.name }}
                                    </a>
                                </h4>
                                <p class="price">RM@{{ item.price }}</p>
                            </div>
                        </section>
                    </div>

                </div>
            </div>
        </div>
        <!-- page end-->
    </section>
@endsection
@push('scripts')
<script>
//    var token = $('meta[name=csrf-token]').attr("content");
//
//    window.Laravel = {
//        csrfToken : token
//    }

//    Vue.config.delimiters = ['${', '}']
//    Vue.http.interceptors.push(function (request, next) {
//        request.headers['X-CSRF-TOKEN'] = Laravel.csrfToken;
//        next();
//    });
</script>
@endpush
