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
                            <img src="" alt="">
                        </a>
                        <h1>{!! $users->name !!}</h1>
                        <p>{!! $users->email !!}</p>
                    </div>

                    <ul class="nav nav-pills nav-stacked">
                        <li class="active"><a href="#profileEdit" data-toggle="modal"><i class="icon-user"></i> Edit Profile</a></li>
                        <li class="active"><a href="#"> <i class="icon-user"></i> My Items</a></li>
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
                        <div class="col-lg-6">
                            <div class="panel">
                                <div class="panel-body">
                                    <div class="bio-chart">
                                        <div style="display:inline;width:100px;height:100px;"><canvas width="100" height="100px"></canvas><input class="knob" data-width="100" data-height="100" data-displayprevious="true" data-thickness=".2" value="35" data-fgcolor="#e06b7d" data-bgcolor="#e8e8e8" style="width: 54px; height: 33px; position: absolute; vertical-align: middle; margin-top: 33px; margin-left: -77px; border: 0px; background: none; font-style: normal; font-variant: normal; font-weight: bold; font-stretch: normal; font-size: 20px; line-height: normal; font-family: Arial; text-align: center; color: rgb(224, 107, 125); padding: 0px; -webkit-appearance: none;"></div>
                                    </div>
                                    <div class="bio-desk">
                                        <h4 class="red">Envato Website</h4>
                                        <p>Started : 15 July</p>
                                        <p>Deadline : 15 August</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="panel">
                                <div class="panel-body">
                                    <div class="bio-chart">
                                        <div style="display:inline;width:100px;height:100px;"><canvas width="100" height="100px"></canvas><input class="knob" data-width="100" data-height="100" data-displayprevious="true" data-thickness=".2" value="63" data-fgcolor="#4CC5CD" data-bgcolor="#e8e8e8" style="width: 54px; height: 33px; position: absolute; vertical-align: middle; margin-top: 33px; margin-left: -77px; border: 0px; background: none; font-style: normal; font-variant: normal; font-weight: bold; font-stretch: normal; font-size: 20px; line-height: normal; font-family: Arial; text-align: center; color: rgb(76, 197, 205); padding: 0px; -webkit-appearance: none;"></div>
                                    </div>
                                    <div class="bio-desk">
                                        <h4 class="terques">ThemeForest CMS </h4>
                                        <p>Started : 15 July</p>
                                        <p>Deadline : 15 August</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </aside>
        </div>
    </section>
@endsection
