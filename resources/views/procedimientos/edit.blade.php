@extends('adminlte::page')
@section('title', 'Editar Procedimiento')
@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Editar Procedimiento</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('procedimientos.update', $procedimiento['id']) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf
                            @include('procedimientos.form')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
