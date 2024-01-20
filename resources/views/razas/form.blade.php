<div class="box box-info padding-1">
    <div class="box-body">
        <div class="form-group">
            {{ Form::label('Especie') }}
            {{ Form::select('tipoEsp', $tipoEsp, ['class' => 'form-control' . ($errors->has('tipoEsp') ? ' is-invalid' : ''), 'placeholder' => 'Especie']) }}
            {!! $errors->first('tipoEsp', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Nombre de la raza') }}
            {{ Form::text('raza', $raza['raza'] ?? '', ['class' => 'form-control' . ($errors->has('raza') ? ' is-invalid' : ''), 'placeholder' => 'Nombre de la raza']) }}
            {!! $errors->first('raza', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Enviar</button>
    </div>
</div>
