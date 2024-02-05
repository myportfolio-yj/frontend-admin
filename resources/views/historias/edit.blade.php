@extends('adminlte::page')
@section('title', 'Editar Historia')
@section('template_title')
    Actualizar Historia
@endsection
@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">
                @includeif('partials.errors')
                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Editar Historia</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('historias.update', $historia['id']) }}" role="form"
                              enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf
                            @include('historias.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
