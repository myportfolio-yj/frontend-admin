<div class="box box-info padding-1">
    <div class="box-body">

        {{ Form::hidden('paciente_id', $paciente['id']) }}

        <div class="form-group">
            {{ Form::label('Usuario') }}
            @foreach($clientes as $cliente)
                {{ Form::text('a_n_user', ($cliente['nombres'].' '.$cliente['apellidos']), ['readonly' => true, 'class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            @endforeach
        </div>
        <div class="form-group">
            {{ Form::label('Paciente') }}
            {{ Form::text('n_paciente', $paciente['nombre'].' '.$paciente['apellido'], ['readonly' => true, 'class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
        </div>

        <div class="form-group">
            {{ Form::label('Vacunas') }}
            {{ Form::select('vacuna', $vacunas, null, ['class' => 'form-control']) }}
        </div>
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Enviar</button>
    </div>
</div>
