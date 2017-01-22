@extends('layouts.app')

@section('content')
 <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    ItemCategories
                </header>
                <div class="panel-body">
                    @include('flatlab-templates::common.errors')
                    <div class="row">
                        {!! Form::open(['route' => 'item_categories.store']) !!}

                                  @include('item_categories.fields')

                        {!! Form::close() !!}
                    </div>

                </div>
            </section>
        </div>
    </div>
@endsection
