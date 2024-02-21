<div class="box box-info padding-1">
    <div class="box-body">

        {{ Form::hidden('n_atencion', $id) }}

        <div class="form-group">
            {{ Form::label('Motivo de la consulta') }}
            {{ Form::textarea('v_motivo', $historia->v_motivo, ['class' => 'form-control' . ($errors->has('v_motivo') ? ' is-invalid' : ''), 'placeholder' => 'Motivo de la consulta']) }}
            {!! $errors->first('v_motivo', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    {{ Form::label('Peso del paciente') }}
                    <div class="input-group mb-3">
                        {{ Form::text('n_peso', $historia->n_peso, ['class' => 'form-control' . ($errors->has('n_peso') ? ' is-invalid' : ''), 'placeholder' => 'Max: 999.9', 'maxlength' => '5', 'pattern' => '^\d{1,3}(\.\d)?$']) }}
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">
                                kg
                            </span>
                        </div>
                    </div>
                    {!! $errors->first('n_peso', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    {{ Form::label('Temperatura del paciente') }}
                    <div class="input-group mb-3">
                    {{ Form::text('n_temp', $historia->n_temp, ['class' => 'form-control' . ($errors->has('n_temp') ? ' is-invalid' : ''), 'placeholder' => 'Max:99.9', 'maxlength' => '4', 'pattern' => '^\d{1,2}(\.\d)?$']) }}
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">
                                °C
                            </span>
                        </div>
                    </div>
                    {!! $errors->first('n_temp', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    {{ Form::label('Frecuencia respiratoria del paciente') }}
                    <div class="input-group mb-3">
                    {{ Form::text('n_frecresp', $historia->n_frecresp, ['class' => 'form-control' . ($errors->has('n_frecresp') ? ' is-invalid' : ''), 'placeholder' => 'Max:99','maxlength' => '2']) }}
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">
                                FR
                            </span>
                        </div>
                    </div>
                    {!! $errors->first('n_frecresp', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    {{ Form::label('Frecuencia cardiaca del paciente') }}
                    <div class="input-group mb-3">
                    {{ Form::text('n_freccard', $historia->n_freccard, ['class' => 'form-control' . ($errors->has('n_freccard') ? ' is-invalid' : ''), 'placeholder' => 'Max:999','maxlength' => '3']) }}
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">
                                FC
                            </span>
                        </div>
                    </div>
                    {!! $errors->first('n_freccard', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('Diagnostico del paciente ') }}
                    {{ Form::select('n_diagnos',$diagnostico, $historia->n_diagnos, ['class' => 'form-control' . ($errors->has('n_diagnos') ? ' is-invalid' : ''), 'placeholder' => 'Diagnostico del Paciente']) }}
                    {!! $errors->first('n_diagnos', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('Procedimiento Realizado') }}
                    {{ Form::select('n_procedimiento',$procedimiento, $historia->v_nombre, ['class' => 'form-control' . ($errors->has('n_procedimiento') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione Procedimiento realizado']) }}
                    {!! $errors->first('n_procedimiento', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('Detalle del diagnostico del paciente') }}
                    {{ Form::textarea('v_detdiagnos', $historia->v_detdiagnos, ['class' => 'form-control' . ($errors->has('v_detdiagnos') ? ' is-invalid' : ''), 'placeholder' => 'Detalle del diagnostico del paciente']) }}
                    {!! $errors->first('v_detdiagnos', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('Detalle del Procedimiento del paciente') }}
                    {{ Form::textarea('v_detproced', $historia->v_detproced, ['class' => 'form-control' . ($errors->has('v_detproced') ? ' is-invalid' : ''), 'placeholder' => 'Detalle del procedimiento del paciente']) }}
                    {!! $errors->first('v_detproced', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Enviar</button>
    </div>
</div>
