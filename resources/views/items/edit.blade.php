@extends('layouts.app')

@section('content')
<div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                     Items
                </header>
                <div class="panel-body">
                    <div class="row">
                       {!! Form::model($items, ['route' => ['items.update', $items->id], 'method' => 'patch']) !!}

                        @include('items.fields')

                       {!! Form::close() !!}
                   </div>
                </div>
            </section>
        </div>
    </div>
@endsection