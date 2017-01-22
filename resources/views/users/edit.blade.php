@extends('layouts.app')

@section('content')
<div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                     Users
                </header>
                <div class="panel-body">
                    <div class="row">
                       {!! Form::model($users, ['route' => ['users.update', $users->id], 'method' => 'patch']) !!}

                        @include('users.fields')

                       {!! Form::close() !!}
                   </div>
                </div>
            </section>
        </div>
    </div>
@endsection