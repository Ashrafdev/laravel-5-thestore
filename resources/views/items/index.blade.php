@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Items
                    <a class="btn btn-primary pull-right" href="{!! route('items.create') !!}">Add New</a>
                    <br><br>
                </header>
                <div class="panel-body">
                    @include('flash::message')
                   @include('items.table')
                </div>
            </section>
        </div>
    </div>
@endsection

