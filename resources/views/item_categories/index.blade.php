@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    ItemCategories
                    <a class="btn btn-primary pull-right" href="{!! route('item_categories.create') !!}">Add New</a>
                    <br><br>
                </header>
                <div class="panel-body">
                    @include('flash::message')
                   @include('item_categories.table')
                </div>
            </section>
        </div>
    </div>
@endsection

