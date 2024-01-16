@extends('adminlte::page')
@section('title', 'Editar razas')
@section('content_header')
@stop
@section('template_title')
    Actualizar Raza
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Editar Raza</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('razas.update', $raza->id) }}" role="form"
                              enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('razas.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
