@extends('layouts.app')

@section('content')
<div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                     Countries
                </header>
                <div class="panel-body">
                    <div class="row">
                       {!! Form::model($countries, ['route' => ['countries.update', $countries->id], 'method' => 'patch']) !!}

                        @include('countries.fields')

                       {!! Form::close() !!}
                   </div>
                </div>
            </section>
        </div>
    </div>
@endsection