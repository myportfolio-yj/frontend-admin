<div class="box box-info padding-1">
    <div class="box-body">
        <div class="form-group">
            {{ Form::label('Nombre de la Alergia') }}
            {{ Form::text('alergia', $alergia['alergia'], ['class' => 'form-control' . ($errors->has('alergia') ? ' is-invalid' : ''), 'placeholder' => 'Nombre de la Alergia']) }}
            {!! $errors->first('alergia', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Enviar</button>
    </div>
</div>
