@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Users
                </header>
                <div class="panel-body">
                    @include('flatlab-templates::common.errors')
                    <div class="row" style="padding-left: 20px">
                       @include('users.show_fields')
                        <a href="{!! route('users.index') !!}" class="btn btn-default">Back</a>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
