@extends('layouts.app')

@section('content')
 <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Types
                </header>
                <div class="panel-body">
                    @include('flatlab-templates::common.errors')
                    <div class="row">
                        {!! Form::open(['route' => 'types.store']) !!}

                                  @include('types.fields')

                        {!! Form::close() !!}
                    </div>

                </div>
            </section>
        </div>
    </div>
@endsection
