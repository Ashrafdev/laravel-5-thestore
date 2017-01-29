@extends('layouts.index')
@section('content')

    <div aria-hidden="true" aria-labelledby="profileEdit" role="dialog" tabindex="-1" id="profileEdit"
         class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                    <h4 class="modal-title">Edit Profile</h4>
                </div>
                <div class="modal-body">@include('profile.edit')</div>
            </div>
        </div>
    </div>

    <section class="wrapper">
    @include('Element.Flash.general')
    @include('Element.Flash.success')
    @include('Element.Flash.warning')
        <!-- page start-->
        <div class="row">
            <aside class="profile-nav col-lg-3">
                <section class="panel">
                    <div class="user-heading round">
                        <a href="#">
                            {{--<img src="" alt="">--}}
                        </a>
                        <h1>{!! $users->name !!}</h1>
                        <p>{!! $users->email !!}</p>
                    </div>

                    <ul class="nav nav-pills nav-stacked">
                        <li class="active"><a href="#profileEdit" data-toggle="modal"><i class="icon-user"></i> Edit Profile</a></li>
                        <li class="active"><a href="{!! url('/my/items')!!}"> <i class="icon-user"></i> My Items</a></li>
                    </ul>

                </section>
            </aside>
            <aside class="profile-info col-lg-9">
                <section class="panel">
                    <div class="bio-graph-heading">
                        My Profile
                    </div>
                    <div class="panel-body bio-graph-info">
                        <h1>Profile</h1>
                        <div class="row">
                            <div class="bio-row">
                                <p><span>Name </span>: {!! $users->name !!}</p>
                            </div>
                            <div class="bio-row">
                                <p><span>Country </span>: {!! !empty($users->countries)? $users->countries->name : 'Others'!!}</p>
                            </div>
                            <div class="bio-row">
                                <p><span>Birthday</span>: {!! date('d M Y', strtotime($users->dob)) !!}</p>
                            </div>
                            <div class="bio-row">
                                <p><span>Email </span>: {!! $users->email !!}</p>
                            </div>
                            <div class="bio-row">
                                <p><span>Gender </span>: {!! $users->gender !!}</p>
                            </div>
                            <div class="bio-row">
                                <p><span>Mobile </span>: {!! $users->mobile !!}</p>
                            </div>
                        </div>
                    </div>
                </section>
                <section>
                    <div class="row">
                    </div>
                </section>
            </aside>
        </div>
    </section>
@endsection
