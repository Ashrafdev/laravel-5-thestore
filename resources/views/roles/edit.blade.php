@extends('layouts.app')

@section('content')
<div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                     Roles
                </header>
                <div class="panel-body">
                    <div class="row">
                       {!! Form::model($roles, ['route' => ['roles.update', $roles->id], 'method' => 'patch']) !!}

                        @include('roles.fields')

                       {!! Form::close() !!}
                   </div>
                </div>
            </section>
        </div>
    </div>
@endsection