@extends('adminlte::page')

@section('template_title')
    Crear Cita
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Crear Cita</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('Citas.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf
                            @include('citas.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
