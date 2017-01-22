@extends('layouts.app')

@section('content')
<div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                     Types
                </header>
                <div class="panel-body">
                    <div class="row">
                       {!! Form::model($types, ['route' => ['types.update', $types->id], 'method' => 'patch']) !!}

                        @include('types.fields')

                       {!! Form::close() !!}
                   </div>
                </div>
            </section>
        </div>
    </div>
@endsection