@extends('adminlte::page')
@section('title', 'Editar Cita')
@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Editar Cita</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('citas.update', $cita['id']) }}" role="form"
                              enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('citas.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
