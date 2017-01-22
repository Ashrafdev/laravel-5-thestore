@extends('layouts.app')

@section('content')
<div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                     States
                </header>
                <div class="panel-body">
                    <div class="row">
                       {!! Form::model($states, ['route' => ['states.update', $states->id], 'method' => 'patch']) !!}

                        @include('states.fields')

                       {!! Form::close() !!}
                   </div>
                </div>
            </section>
        </div>
    </div>
@endsection