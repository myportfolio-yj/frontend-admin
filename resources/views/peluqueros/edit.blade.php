@extends('adminlte::page')
@section('title', 'Editar Peluquero')
@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Editar Peluquero</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('peluqueros.update', $peluquero['id']) }}" role="form"
                              enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('peluqueros.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
