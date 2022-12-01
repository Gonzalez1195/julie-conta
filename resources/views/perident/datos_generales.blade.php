{{-- Extends layout --}}
@extends('layout.default')



{{-- Content --}}
@section('content')

			<div class="container-fluid">
                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>Hi, welcome back!</h4>
                            <span>Element</span>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Form</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Element</a></li>
                        </ol>
                    </div>
                </div>
                <!-- row y form -->
                <form action="" id="datos-generales-form">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">Datos Generales</div>
                                </div>
                                <div class="card-body">
                                    <div class="basic-form">

                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Nombre</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="nombres" class="form-control" placeholder="Nombre">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Fecha de Nac.</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="date_nac" class="datepicker-default form-control" placeholder="Fecha de Nacimiento" id="datepicker">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Estado Civil</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="est_civil" class="form-control" placeholder="Estado Civil">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Direccion</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="dir" class="form-control" placeholder="Dirección">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Teléfono</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="tel" class="form-control" placeholder="Teléfono">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Profesion u Ocupación</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="prouocu" class="form-control" placeholder="Profesion U Ocupación">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Lugar de Trabajo</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="lug_trabajo" class="form-control" placeholder="Lugar de Trabajo">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Correo Electronico</label>
                                                <div class="col-sm-9">
                                                    <input type="email" name="email" class="form-control" placeholder="Correo Electronico">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">¿A quién podemos agradecerle su remisión?</label>
                                                <div class="col-sm-9">
                                                    <select class="form-control recomendante" name="recomendante">
                                                        <option selected="selected" value="null">Seleccione o ingrese el nombre...</option>
                                                        @foreach ($recomendantes as $recomendante)
                                                            <option value="{{ $recomendante->id }}">{{ $recomendante->nombre }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-12 col-md-6">
                                                    <div class="row">
                                                        <label class="col-sm-3 col-form-label">Odontólogo anterior</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" name="odo_ant" class="form-control" placeholder="Odontólogo anterior">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <div class="row">
                                                        <label class="col-sm-3 col-form-label">Teléfono</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" name="odo_ant_tel" class="form-control" placeholder="Teléfono de Odontólogo anterior">
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>
                                            <div class="form-group row">
                                                <div class="col-12  col-md-6">
                                                    <div class="row">
                                                        <label class="col-sm-3 col-form-label">Médico Personal</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" name="med_per" class="form-control" placeholder="Médico Personal">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <div class="row">
                                                        <label class="col-sm-3 col-form-label">Teléfono</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" name="med_per_tel" class="form-control" placeholder="Teléfono de Médico Personal">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-12  col-md-6">
                                                    <div class="row">
                                                        <label class="col-sm-3 col-form-label">¿Por cual medio se entero?</label>
                                                        <div class="col-sm-9">
                                                            <select id="single-select" name="medio_entero" class="form-control">
                                                                <option selected>Seleccione...</option>
                                                                <option value="facebook">Facebook</option>
                                                                <option value="instagram">Instragram</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- <div class="form-group row">
                                                <div class="col-12 col-md-6">
                                                    <div class="row">
                                                        <div class="form-group col-md-12">
                                                            <label>¿por cual medio se entero?</label>
                                                            <select id="single-select" name="medio_entero">
                                                                <option selected disabled>Seleccione</option>
                                                                <option value="facebook">Facebook</option>
                                                                <option value="instagram">Instragram</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <div class="row">
                                                        <div class="form-group col-md-12">
                                                            <label>Agregar Medio</label>
                                                            <input type="text" class="form-control" name="nuevo_medio">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> --}}

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">Historia Médica</div>
                                </div>
                                <div class="card-body">
                                    <div class="basic-form">

                                        <div class="form-group">
                                            <label>¿Ha estado hospitalizado en los útlimso 10 años?</label>
                                            <label class="radio-inline mr-3"><input type="radio" name="hospitalizado" id="hospitalizado_si" value="1"> Sí</label>
                                            <label class="radio-inline mr-3"><input type="radio" name="hospitalizado" id="hospitalizado_no" value="0" checked> No</label>
                                            <div id="motivo-hospitalizado" style="display: none">
                                                <label>¿Por qué ha estado hospitalizado?</label>
                                                <textarea class="form-control" name="motivo_hosp" rows="4" id="comment"></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>¿Esta bajo tratamiento medico actualmente?</label>
                                            <label class="radio-inline mr-3"><input type="radio" name="medicado" id="medicado_si" value="1"> Sí</label>
                                            <label class="radio-inline mr-3"><input type="radio" name="medicado" id="medicado_no" value="0" checked> No</label>
                                            <div id="motivo-medicado" style="display: none">
                                                <label>Explique el motivo y los medicamentos</label>
                                                <textarea class="form-control" name="motivo_medicado" rows="4" id="comment"></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <span>Seleccione todas las condiciones que padece o ha padecido</span>
                                            <br>

                                            <div class="form-row">
                                                <div class="form-check col-md-4">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input" name="enfermedades[]" value="Hipertension Arterial">Hipertensión Arterial
                                                    </label>
                                                </div>
                                                <div class="form-check col-md-4">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input" name="enfermedades[]" value="Anemia">Anemia
                                                    </label>
                                                </div>
                                                <div class="form-check col-md-4">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input" name="enfermedades[]" value="Agrandamiento de encias">Agrandamiento de encías
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-check col-md-4">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input" name="enfermedades[]" value="Diabetes Mellitus">Diabetes Mellitus
                                                    </label>
                                                </div>
                                                <div class="form-check col-md-4">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input" name="enfermedades[]" value="Tuberculosis">Tuberculosis
                                                    </label>
                                                </div>
                                                <div class="form-check col-md-4">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input" name="enfermedades[]" value="Muestra encía al sonreír">Muestra encía al sonreír
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-check col-sm-4">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input" name="enfermedades[]" value="Problemas cardíacos o circulatorios">Problemas cardíacos o circulatorios
                                                    </label>
                                                </div>
                                                <div class="form-check col-sm-4">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input" name="enfermedades[]" value="Epilepsia">Epilepsia
                                                    </label>
                                                </div>
                                                <div class="form-check col-sm-4">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input" name="enfermedades[]" value="Boca seca">Boca seca
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-check col-sm-4">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input" name="enfermedades[]" value="Osteoporosis u osteopenia">Osteoporosis u osteopenia
                                                    </label>
                                                </div>
                                                <div class="form-check col-sm-4">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input" name="enfermedades[]" value="Problemas renales">Problemas renales
                                                    </label>
                                                </div>
                                                <div class="form-check col-sm-4">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input" name="enfermedades[]" value="Encía enrojecida o agrandada">Encía enrojecida o agrandada
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-check col-sm-4">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input" name="enfermedades[]" value="Leucemia">Leucemia
                                                    </label>
                                                </div>
                                                <div class="form-check col-sm-4">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input" name="enfermedades[]" value="Estrés">Estrés
                                                    </label>
                                                </div>
                                                <div class="form-check col-sm-4">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input" name="enfermedades[]" value="Pus o exudado">Pus o exudado
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-check col-sm-4">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input" name="enfermedades[]" value="Fiebre reumática">Fiebre reumática
                                                    </label>
                                                </div>
                                                <div class="form-check col-sm-4">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input" name="enfermedades[]" value="Fumar">Fumar
                                                    </label>
                                                </div>
                                                <div class="form-check col-sm-4">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input" name="enfermedades[]" value="Presencia de espacios">Presencia de espacios
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-check col-sm-4">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input" name="enfermedades[]" value="Hemofilia o problemas de coagulación">Hemofilia o problemas de coagulación
                                                    </label>
                                                </div>
                                                <div class="form-check col-sm-4">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input" name="enfermedades[]" value="Sangrado de encías">Sangrado de encías
                                                    </label>
                                                </div>
                                                <div class="form-check col-sm-4">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input" name="enfermedades[]" value="Rechinado de dientes">Rechinado de dientes
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-check col-sm-4">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input" name="enfermedades[]" value="Alergias">Alergias
                                                    </label>
                                                </div>
                                                <div class="form-check col-sm-4">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input" name="enfermedades[]" value="Dolor o sensibilidad">Dolor o sensibilidad
                                                    </label>
                                                </div>
                                                <div class="form-check col-sm-4">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input" name="enfermedades[]" value="Hábitos de morder objetos">Hábitos de morder objetos
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-check col-sm-4">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input" name="enfermedades[]" value="Problemas hepáticos">Problemas hepáticos
                                                    </label>
                                                </div>
                                                <div class="form-check col-sm-4">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input" name="enfermedades[]" value="Movilidad dental">Movilidad dental
                                                    </label>
                                                </div>
                                                <div class="form-check col-sm-4">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input" name="enfermedades[]" value="Hábito de comer uñas">Hábito de comer uñas
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-check col-sm-4">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input" name="enfermedades[]" value="HIV/SIDA">HIV/SIDA
                                                    </label>
                                                </div>
                                                <div class="form-check col-sm-4">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input" name="enfermedades[]" value="Mal sabor/olor">Mal sabor/olor
                                                    </label>
                                                </div>
                                                <div class="form-check col-sm-4">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input" name="enfermedades[]" value="Respira por la boca">Respira por la boca
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-check col-sm-4">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input" name="enfermedades[]" value="Sífilis">Sífilis
                                                    </label>
                                                </div>
                                                <div class="form-check col-sm-4">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input" name="enfermedades[]" value="Desgaste dental">Desgaste dental
                                                    </label>
                                                </div>
                                                <div class="col-12 col-md-4">
                                                    <div class="row">
                                                        <label class="col-form-label">Otros</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" name="enfermedades[]" class="form-control" style="height: 30px;">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </form>
                <!-- /row y form -->


            </div>

@endsection

@section('scripts')
<script>

    $(document).ready(function(){

        $("#hospitalizado_no").click(function(){
            $("#motivo-hospitalizado").fadeOut();
        });
        $("#hospitalizado_si").click(function(){
            $("#motivo-hospitalizado").fadeIn();
        });
        $("#medicado_no").click(function(){
            $("#motivo-medicado").fadeOut();
        });
        $("#medicado_si").click(function(){
            $("#motivo-medicado").fadeIn();
        });



    });

    $(".recomendante").select2({
        tags: true
    });

    $( "#datos-generales-form" ).submit(function( event ) {
        event.preventDefault();
        var form = $(this);
        $.ajax({
            type: 'POST',
            url: "{{ url('agregar-datos-generales') }}",
            data: form.serialize()
        }).done(function(data) {
            if (data === true) {
                swal("Exito!!", "Datos guardados correctamente!!", "success")
                form[0].reset();
            }
        }).fail(function(data) {
            sweetAlert("Oops...", "Ocurrio un error intentelo de nuevo!!", "error")
        });
        return this;
    });

</script>
@endsection
