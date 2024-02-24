<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('Cliente') }}
                    {{ Form::select('cliente', $clientes, null, ['id' => 'clientes' , 'class' => 'form-control' . ($errors->has('clientes') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione un cliente.', 'required' => 'required']) }}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('Mascota') }}
                    {{ Form::select('mascotas', [], null, ['id' => 'mascotas' , 'class' => 'form-control' . ($errors->has('mascotas') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione un cliente.', 'required' => 'required']) }}
                    {!! $errors->first('mascotas', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('Tipo de cita') }}
                    {{ Form::select('tiposCita', $tiposCita, null, ['id' => 'tiposCita' , 'class' => 'form-control' . ($errors->has('tiposCita') ? ' is-invalid' : ''), 'placeholder' => 'Seleccionar el tipo de cita.', 'required' => 'required']) }}
                    {!! $errors->first('tiposCita', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('Empleado') }}<br>
                    {{ Form::select('empleados', [], null, ['id' => 'empleados' , 'class' => 'form-control' . ($errors->has('empleados') ? ' is-invalid' : ''), 'placeholder' => 'Seleccionar el tipo de cita.', 'required' => 'required']) }}
                    {!! $errors->first('empleados', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('Fechas disponibles') }}
                    {{ Form::select('fechas', [], null, ['id' => 'fechas' , 'class' => 'form-control' . ($errors->has('fechas') ? ' is-invalid' : ''), 'placeholder' => 'Seleccionar el empleado.', 'required' => 'required']) }}
                    {!! $errors->first('fechas', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('Turnos disponibles') }}
                    {{ Form::select('turnos', [], null, ['id' => 'turnos' , 'class' => 'form-control' . ($errors->has('turnos') ? ' is-invalid' : ''), 'placeholder' => 'Seleccionar la fecha.', 'required' => 'required']) }}
                    {!! $errors->first('turnos', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('Observaciones') }}
                    {{ Form::textarea('observaciones', $cliente['observaciones'] ?? '', ['class' => 'form-control' . ($errors->has('observaciones') ? ' is-invalid' : ''), 'placeholder' => 'Observaciones', 'required' => 'required']) }}
                    {!! $errors->first('observaciones', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group" id="atencionPeluqueriaDiv">
                </div>
            </div>
        </div>
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Enviar</button>
    </div>
</div>

<script>
    var mascotasData = @json($mascotas);
    var empleadosData = @json($empleados);
    var fechasData = @json($fechas);
    var turnosData = @json($turnos);
    var atencionPeluqueriaData = @json($atencionPeluqueria);
    document.getElementById('clientes').addEventListener('change', function() {
        var clienteId = this.value;
        var selectMascotas = document.getElementById('mascotas');
        selectMascotas.innerHTML = '<option value="">Seleccionar una mascota.</option>';

        // Usar Object.entries para iterar sobre las propiedades del objeto
        Object.entries(mascotasData[clienteId]).forEach(([key, value]) => {
            var option = new Option(value, key); // Aquí asumo que quieres usar el nombre de la mascota como texto visible en el option, y el ID de la mascota como el valor del option.
            selectMascotas.add(option);
        });
    });
    document.getElementById('tiposCita').addEventListener('change', function() {
        var tipoCitaId = this.value;
        var selectEmpleados = document.getElementById('empleados');
        selectEmpleados.innerHTML = '<option value="">Seleccionar un empleado.</option>';

        // Usar Object.entries para iterar sobre las propiedades del objeto
        Object.entries(empleadosData[tipoCitaId]).forEach(([key, value]) => {
            var option = new Option(value, key); // Aquí asumo que quieres usar el nombre de la mascota como texto visible en el option, y el ID de la mascota como el valor del option.
            selectEmpleados.add(option);
        });

        if(tipoCitaId in atencionPeluqueriaData)
        {
            var cadena = "";
            Object.entries(atencionPeluqueriaData[tipoCitaId]).forEach(([key, value]) => {
                cadena += '<input type="checkbox" id="' + key + '" name="atencionPeluqueria[]" value="' + key + '">';
                cadena += '<label for="' + key + '">' + value + '</label><br>'
            });
            document.getElementById('atencionPeluqueriaDiv').innerHTML = cadena;
        }
        else {
            document.getElementById('atencionPeluqueriaDiv').innerHTML = "";
        }
    });

    document.getElementById('empleados').addEventListener('change', function() {
        var empleadoId = this.value;
        var selectFechas = document.getElementById('fechas');
        selectFechas.innerHTML = '<option value="">Seleccionar una fecha.</option>';

        // Usar Object.entries para iterar sobre las propiedades del objeto
        Object.entries(fechasData[empleadoId]).forEach(([key, value]) => {
            var option = new Option(value, value); // Aquí asumo que quieres usar el nombre de la mascota como texto visible en el option, y el ID de la mascota como el valor del option.
            selectFechas.add(option);
        });
    });

    document.getElementById('fechas').addEventListener('change', function() {
        var fechasInfo = this.value;
        var empleadoId = document.getElementById('empleados').value;
        var selectTurnos = document.getElementById('turnos');
        console.log(fechasInfo);
        console.log(empleadoId);
        console.log(selectTurnos);
        console.log(turnosData);
        console.log(turnosData[empleadoId][fechasInfo]);
        selectTurnos.innerHTML = '<option value="">Seleccionar un turno.</option>';

        // Usar Object.entries para iterar sobre las propiedades del objeto
        Object.entries(turnosData[empleadoId][fechasInfo]).forEach(([key, value]) => {
            console.log(key, value);
            var option = new Option(value, value); // Aquí asumo que quieres usar el nombre de la mascota como texto visible en el option, y el ID de la mascota como el valor del option.
            console.log(option);
            selectTurnos.add(option);
            console.log(selectTurnos);
        });
    });
</script>
