@extends('layouts.app')

@section('content')
<div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                     ItemCategories
                </header>
                <div class="panel-body">
                    <div class="row">
                       {!! Form::model($itemCategories, ['route' => ['item_categories.update', $itemCategories->id], 'method' => 'patch']) !!}

                        @include('item_categories.fields')

                       {!! Form::close() !!}
                   </div>
                </div>
            </section>
        </div>
    </div>
@endsection