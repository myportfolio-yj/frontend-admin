@extends('adminlte::page')

@section('template_title')
    Añadir Nuevo Peluquero
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Añadir Nuevo Peluquero</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('Peluqueros.store') }}" role="form"
                              enctype="multipart/form-data">
                            @csrf

                            @include('peluqueros.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
