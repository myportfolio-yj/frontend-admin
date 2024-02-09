<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('Cliente') }}
                    <select class="selectpicker form-control" data-live-search="true">
                        <option data-tokens="">Seleccione un cliente</option>
                        @foreach($clientes as $cliente)
                            <option value="{{ $cliente['nombres'] }}">{{ $cliente['nombres'] }} {{ $cliente['apellidos'] }}
                                - {{ $cliente['tipoDocumento']['tipoDocumento'] }} {{ $cliente['documento'] }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('Mascota') }}
                    <select class="selectpicker form-control" data-live-search="true">
                        <option data-tokens="">Seleccione un cliente</option>
                        @foreach($clientes as $cliente)
                            @foreach($cliente['mascotas'] as $mascota)
                                <option value="">{{ $mascota['nombre'] }} {{ $mascota['apellido'] }}
                                    - {{ $mascota['codIdentificacion'] }}</option>
                            @endforeach
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('Tipo de cita') }}
                    {{ Form::select('tipocita', $tiposCita, null, ['id' => 'tipocita' , 'class' => 'form-control' . ($errors->has('tipocita') ? ' is-invalid' : ''), 'placeholder' => 'Seleccionar el tipo de cita.']) }}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('Tipo de atencion') }}

                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('Veterinario') }}<br>
                    {{ Form::select('veterinarios', [], null, ['id' => 'veterinario' , 'class' => 'form-control' . ($errors->has('tipoSex') ? ' is-invalid' : ''), 'placeholder' => 'Seleccionar primero un tipo de cita.']) }}
                    {!! $errors->first('razas', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>

            <script>
                var veterinarios = new Array();
                @foreach($veterinarios as $key => $value)
                var aux = new Array();
                var i =0;
                @foreach($value as $dato)
                @foreach($dato as $id => $info)
                var aux2 = new Array();
                aux2['id'] = '{{ $id }}';
                aux2['dato'] = '{{ $info }}';
                aux[i++] = aux2;
                @endforeach
                @endforeach
                    veterinarios['{{ $key }}'] = aux;
                @endforeach
                document.getElementById('tipocita').addEventListener('change', function() {
                    var especieId = this.value;
                    console.log(especieId);
                    var selectRaza = document.getElementById('veterinario');
                    selectRaza.innerHTML = '<option value="">Seleccionar la raza.</option>';
                    console.log(veterinarios[especieId]);
                    veterinarios[especieId].forEach((value, key) => {
                        console.log(value, key);
                        var option = new Option(value['dato'], value['id']);
                        selectRaza.add(option);
                    });
                });
            </script>

            {{ dd($tiposCita, $veterinarios, $turnos) }}
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('Fechas disponibles') }}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('Turnos disponibles') }}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('Observaciones') }}
                    {{ Form::text('observaciones', $cliente['observaciones'] ?? '', ['class' => 'form-control' . ($errors->has('observaciones') ? ' is-invalid' : ''), 'placeholder' => 'Fijo']) }}
                    {!! $errors->first('observaciones', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Enviar</button>
    </div>
</div>
