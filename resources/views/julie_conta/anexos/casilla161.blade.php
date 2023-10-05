{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')

    @if ( isset($anticipos) )
        {{-- Formulario para editar --}}
        <div class="container-fluid">
            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>Editar Anexo Compras</h4>
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Editar</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Anexo Compras</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Editar Usuario</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form form-validation">
                                @foreach ($anticipos as $anticipo)
                                    <form class="form-casilla161-edit" method="POST">
                                        @csrf
                                        <input type="hidden" name="id_casilla161" id="id_casilla161" value="{{ $anticipo->id }}">
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="nit_agente_efectuo_anticipo_cuenta">NIT Agente que le Efectuó el Anticipo a Cuenta <span class="text-danger">*</span></label>
                                                <div>
                                                    <input type="text" name="nit_agente_efectuo_anticipo_cuenta" class="form-control" id="nit_agente_efectuo_anticipo_cuenta" value="{{ $anticipo->nit_agente_efectuo_anticipo_cuenta }}">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="fecha_emision_documento">Fecha de Emisión <span class="text-danger">*</span></label>
                                                <div>
                                                    <input type="date" name="fecha_emision_documento" class="form-control" id="fecha_emision_documento" value="{{ $anticipo->fecha_emision_documento }}">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="serie_documento">Serie de Documento <span class="text-danger">*</span></label>
                                                <div>
                                                    <input type="text" name="serie_documento" class="form-control" id="serie_documento" value="{{ $anticipo->serie_documento }}">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="numero_documento">Número de Documento <span class="text-danger">*</span></label>
                                                <div>
                                                    <input type="text" name="numero_documento" class="form-control" id="numero_documento" value="{{ $anticipo->numero_documento }}">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="monto_sujeto">Monto Sujeto <span class="text-danger">*</span></label>
                                                <div>
                                                    <input type="text" name="monto_sujeto" class="form-control monto_sujeto" value="{{ $anticipo->monto_sujeto }}">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="monto_anticipo_cuenta_iva">Monto del Anticipo a Cuenta de IVA 2% <span class="text-danger">*</span></label>
                                                <div>
                                                    <input type="text" name="" class="form-control monto_anticipo_cuenta_iva" value="{{ $anticipo->monto_anticipo_cuenta_iva }}" disabled>
                                                    <input type="hidden" name="monto_anticipo_cuenta_iva" class="form-control monto_anticipo_cuenta_iva_hidden" value="{{ $anticipo->monto_anticipo_cuenta_iva }}">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="dui_agente">DUI del Agente <span class="text-danger">*</span></label>
                                                <div>
                                                    <input type="text" name="dui_agente" class="form-control" id="dui_agente" value="{{ $anticipo->dui_agente }}">
                                                </div>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label>Número del anexo <span class="text-danger">*</span></label>
                                                <select id="numero_anexo" class="form-control" name="numero_anexo">
                                                    <option value="6">6</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Cliente</label>
                                                <select id="select-usuario" class="form-control" name="user_id" disabled>
                                                    <option value="null">Seleccione un usuario...</option>
                                                    @foreach ($usuarios as $usuario)
                                                        @if ( $usuario->id == $anticipo->user_id )
                                                            <option value="{{ $usuario->id }}" selected>{{ $usuario->name }}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>


                                        </div>
                                        <button type="submit" class="btn btn-primary">Agregar</button>
                                    </form>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        {{-- Formulario para crear --}}
        <div class="container-fluid">
            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>Anticipo a Cuenta de IVA 2% Efectuada al Declarante</h4>
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Anexos</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Casilla 161</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Crear anexo Casilla 161</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form form-validation">
                                <form class="form-casilla161" method="POST">
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="nit_agente_efectuo_anticipo_cuenta">NIT Agente que le Efectuó el Anticipo a Cuenta <span class="text-danger">*</span></label>
                                            <div>
                                                <input type="text" name="nit_agente_efectuo_anticipo_cuenta" class="form-control" id="nit_agente_efectuo_anticipo_cuenta">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="fecha_emision_documento">Fecha de Emisión <span class="text-danger">*</span></label>
                                            <div>
                                                <input type="date" name="fecha_emision_documento" class="form-control" id="fecha_emision_documento">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="serie_documento">Serie de Documento <span class="text-danger">*</span></label>
                                            <div>
                                                <input type="text" name="serie_documento" class="form-control" id="serie_documento">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="numero_documento">Número de Documento <span class="text-danger">*</span></label>
                                            <div>
                                                <input type="text" name="numero_documento" class="form-control" id="numero_documento">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="monto_sujeto">Monto Sujeto <span class="text-danger">*</span></label>
                                            <div>
                                                <input type="text" name="monto_sujeto" class="form-control monto_sujeto">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="monto_anticipo_cuenta_iva">Monto del Anticipo a Cuenta de IVA 2% <span class="text-danger">*</span></label>
                                            <div>
                                                <input type="text" name="" class="form-control monto_anticipo_cuenta_iva" disabled>
                                                <input type="hidden" name="monto_anticipo_cuenta_iva" class="form-control monto_anticipo_cuenta_iva_hidden">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="dui_agente">DUI del Agente <span class="text-danger">*</span></label>
                                            <div>
                                                <input type="text" name="dui_agente" class="form-control" id="dui_agente">
                                            </div>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>Número del anexo <span class="text-danger">*</span></label>
                                            <select id="numero_anexo" class="form-control" name="numero_anexo">
                                                <option value="6">6</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Cliente</label>
                                            <select id="select-usuario" class="form-control" name="user_id">
                                                <option value="null">Seleccione un usuario...</option>
                                                @foreach ($usuarios as $usuario)
                                                    <option value="{{ $usuario->id }}">{{ $usuario->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>


                                    </div>
                                    <button type="submit" class="btn btn-primary">Agregar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

@endsection
@section('scripts')

    <script>
        $(".monto_sujeto").keyup(function(){
            let montoOp = parseFloat($(this).val());
            let ivaOp = 0;

            if (!isNaN(montoOp)) {
                ivaOp = montoOp*0.02;
            }
            $(".monto_anticipo_cuenta_iva").val(ivaOp.toFixed(2));
            $(".monto_anticipo_cuenta_iva_hidden").val(ivaOp.toFixed(2));
        });

        $( ".form-casilla161" ).submit(function( event ) {
            event.preventDefault();
            var form = $(this);
            $.ajax({
                type: 'POST',
                url: "{{ url('add-casilla161') }}",
                data: form.serialize()
            }).done(function(data) {
                if (data === true) {
                    Swal.fire("Exito!!", "Datos guardados correctamente!!", "success")
                    form[0].reset();
                }
            }).fail(function(data) {
                    sweetAlert("Oops...", "Ocurrio un error intentelo de nuevo!!", "error")
            });
            return this;
        });

        $( ".form-casilla161-edit" ).submit(function( event ) {
            event.preventDefault();
            var form = $(this);
            let id = $("#id_casilla161").val();
            $.ajax({
                type: 'POST',
                url: "{{ url('update-casilla161') }}/"+id,
                data: form.serialize()
            }).done(function(data) {
                if (data === true) {

                    Swal.fire({
                        title: 'Datos guardados correctamente!!',
                        icon: 'success',
                        confirmButtonText: 'OK',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location = "../";
                        }
                    })

                }
                }).fail(function(data) {
                    sweetAlert("Oops...", "Ocurrio un error intentelo de nuevo!!", "error")
            });
            return this;
        });

    </script>

@endsection
