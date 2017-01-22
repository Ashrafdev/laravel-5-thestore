@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Users
                    <a class="btn btn-primary pull-right" href="{!! route('users.create') !!}">Add New</a>
                    <br><br>
                </header>
                <div class="panel-body">
                    @include('flash::message')
                   @include('users.table')
                </div>
            </section>
        </div>
    </div>
@endsection

