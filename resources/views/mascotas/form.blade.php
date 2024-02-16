<div class="box box-info padding-1">
    <div class="box-body">

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('Dueño de la mascota') }}<br>
                    {{ Form::select('clientes', $clientes, $mascota['clientes'][0]['id'] ?? null, ['class' => 'form-control' . ($errors->has('clientes') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione el cliente']) }}
                    {!! $errors->first('clientes', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <hr>
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('Nombre de la mascota') }}
                    {{ Form::text('nombre', $mascota['nombre'] ?? '', ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombres Completos']) }}
                    {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('Apellido de la mascota') }}
                    {{ Form::text('apellido', $mascota['apellido'] ?? '', ['class' => 'form-control' . ($errors->has('apellido') ? ' is-invalid' : ''), 'placeholder' => 'Apellidos Completos']) }}
                    {!! $errors->first('apellido', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('Fecha de nacimiento') }}
                    {{ Form::text('fechaNacimiento', $mascota['fechaNacimiento'] ?? '', ['class' => 'form-control' . ($errors->has('fechaNacimiento') ? ' is-invalid' : ''), 'placeholder' => 'Fecha de nacimiento']) }}
                    {!! $errors->first('fechaNacimiento', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('Sexo') }}<br>
                    {{ Form::select('tipoSex', $tipoSex, $mascota['sexo']['id'] ?? null, ['class' => 'form-control' . ($errors->has('tipoSex') ? ' is-invalid' : ''), 'placeholder' => 'Seleccionar el sexo']) }}
                    {!! $errors->first('tipoSex', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('Especie') }}<br>
                    {{ Form::select('especies', $especies, $mascota['especie']['id'] ?? null, ['id' => 'especies' , 'class' => 'form-control' . ($errors->has('especies') ? ' is-invalid' : ''), 'placeholder' => 'Seleccionar la especie']) }}
                    {!! $errors->first('especies', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('Raza') }}<br>
                    {{ Form::select('razas', [], null, ['id' => 'razas' , 'class' => 'form-control' . ($errors->has('tipoSex') ? ' is-invalid' : ''), 'placeholder' => 'Seleccionar primero una especie.']) }}
                    {!! $errors->first('razas', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('esterilizado', 'Esterilizado') }}<br>
                    {{ Form::select('esterilizado', ['true' => 'Si', 'false' => 'No'], ($mascota['esterilizado'] == true) ? 'true' : 'false', ['class' => 'form-control' . ($errors->has('esterilizado') ? ' is-invalid' : ''), 'placeholder' => 'Selecciona una opción']) }}
                    {!! $errors->first('esterilizado', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>

        </div>
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Enviar</button>
    </div>
</div>

<script>
    var razas = new Array();
    @foreach($razas as $key => $value)
    var aux = new Array();
    var i =0;
    @foreach($value as $id => $dato)
    var aux2 = new Array();
    aux2['id'] = '{{ $id }}';
    aux2['dato'] = '{{ $dato }}';
    aux[i++] = aux2;
    @endforeach
        razas['{{ $key }}'] = aux;
    @endforeach

    document.addEventListener("DOMContentLoaded", function() {
        console.log("Hola mundo!!!");
        if(document.getElementById("especies").value){
            console.log("Adios mundo");
            var especieId = document.getElementById("especies").value;
            var selectRaza = document.getElementById('razas');
            selectRaza.innerHTML = '<option value="">Seleccionar la raza.</option>';
            razas[especieId].forEach((value, key) => {
                var option = new Option(value['dato'], value['id']);
                selectRaza.add(option);
            });
            for (var i = 0; i < selectRaza.options.length; i++) {
                var option = selectRaza.options[i];
                if (option.value === "{{ $mascota['raza']['id'] ?? null }}") {
                    option.selected = true;
                    break;
                }
            }
        }
    });
    document.getElementById('especies').addEventListener('change', function() {
        var especieId = this.value;
        var selectRaza = document.getElementById('razas');
        selectRaza.innerHTML = '<option value="">Seleccionar la raza.</option>';
        razas[especieId].forEach((value, key) => {
            var option = new Option(value['dato'], value['id']);
            selectRaza.add(option);
        });
    });
</script>
