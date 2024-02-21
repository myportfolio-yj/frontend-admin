<div class="box box-info padding-1">
    <div class="box-body">

        {{ Form::hidden('n_atencion', $id) }}

        <div class="form-group">
            {{ Form::label('Medicamento') }}
            {{ Form::select('n_medica', $medicamentos, $receta->n_medica, ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
            {{ Form::label('Dosis') }}
            <div class="input-group mb-3">
            {{ Form::text('v_dosis', $receta->v_dosis, ['class' => 'form-control' . ($errors->has('v_dosis') ? ' is-invalid' : ''), 'placeholder' => 'Max:9999', 'maxlength' => '4']) }}
                <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">
                                mg
                            </span>
                </div>
            </div>
            {!! $errors->first('v_dosis', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Cantidad') }}
            <div class="input-group mb-3">
            {{ Form::text('n_cantidad', $receta->n_cantidad, ['class' => 'form-control' . ($errors->has('n_cantidad') ? ' is-invalid' : ''), 'placeholder' => 'Max. 9.9', 'maxlength' => '3', 'pattern' => '^\d{1,1}(\.\d)?$']) }}
                <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">
                                Unidades
                            </span>
                </div>
            </div>
            {!! $errors->first('n_cantidad', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Indicaciones') }}
            {{ Form::textarea('v_indicaciones', $receta->v_indicaciones, ['class' => 'form-control' . ($errors->has('v_indicaciones') ? ' is-invalid' : ''), 'placeholder' => 'Indicaciones']) }}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Enviar</button>
    </div>
</div>
