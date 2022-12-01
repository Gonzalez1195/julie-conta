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
                        <div class="card-title">Agregar Citas</div>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Nombre</label>
                                <div class="col-sm-9">
                                    <select class="form-control paciente" name="paciente">
                                        <option selected="selected" value="null">Seleccione o ingrese el nombre...</option>
                                        @foreach ($datosGenerales as $datosGeneral)
                                            <option value="{{ $datosGeneral->id }}">{{ $datosGeneral->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Fecha de cita</label>
                                <div class="col-sm-9">
                                    <input type="text" name="fecha_cita" class="datepicker-default form-control" placeholder="Fecha de Nacimiento" id="datepicker">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Teléfono</label>
                                <div class="col-sm-9">
                                    <input type="text" name="tel" class="form-control" placeholder="Teléfono">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Correo Electronico</label>
                                <div class="col-sm-9">
                                    <input type="email" name="email" class="form-control" placeholder="Correo Electronico">
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Crear</button>
    </form>
    <!-- /row y form -->


</div>

@endsection
@section('scripts')
<script>
    $(".paciente").select2({
        tags: true
    });
</script>
@endsection
