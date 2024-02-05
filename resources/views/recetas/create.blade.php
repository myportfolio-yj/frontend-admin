@extends('adminlte::page')

@section('template_title')
        Añadir Medicamento a la receta
@endsection

@section('content')
    <style>
        #block-print {
            display: none;
        }
        @media print {
            #omit-print {
                display: none;
            }
            #block-print {
                display: block;
            }
        }
    </style>
    <h1 id="block-print">AppoMVS</h1>
    <h2 id="block-print" class="text-center">RECETA MEDICA VETERINARIA</h2>
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title" id="omit-print">Añadir Medicamento a la receta</span>
                    </div>
                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                <tr>
                                    <th>#</th>
                                    <th>Medicamento</th>
                                    <th>Dosis</th>
                                    <th>Cantidad</th>
                                    <th>Indicaciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i = 0; ?>
                                @foreach ($recetas as $rs)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $rs['medicamento']['medicamento'] }}</td>
                                        <td>{{ $rs['dosis'] }}</td>
                                        <td>{{ $rs['cantidad'] }}</td>
                                        <td>{{ $rs['indicaciones'] ?? ''}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                        <form method="POST" action="{{ route('recetas.store') }}" role="form"
                              enctype="multipart/form-data" id="omit-print">
                            @csrf

                            @include('recetas.form')

                        </form>
                        <div id="block-print" class="text-right">
                            <br><br><br><p>__________________________<br>Firma/Sello</p>
                        </div>
                        <div class="row" id="omit-print">
                            <div class="col-md-12 text-right">
                                <input type="button" value="Imprimir" class="printbutton btn btn-info">

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        document.querySelectorAll('.printbutton').forEach(function (element) {
            element.addEventListener('click', function () {
                document.getElementById('omit-print').style.display = 'none';
                document.getElementById('block-print').style.display = 'block';
                print();
                document.getElementById('omit-print').style.display = 'block';
                document.getElementById('block-print').style.display = 'none';
            });
        });
    </script>
@endsection
