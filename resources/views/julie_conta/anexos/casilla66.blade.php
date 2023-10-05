{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')

    @if ( isset($compras) )
        {{-- Formulario para editar --}}
        <div class="container-fluid">
            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>Editar Anexo Casilla 66</h4>
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Editar</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Anexo Casilla 66</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Editar Casilla 66</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form form-validation">
                                @foreach ($compras as $compra)
                                    <form class="form-casilla66-edit" method="POST">
                                        @csrf
                                        <input type="hidden" name="id_casilla66" id="id_casilla66" value="{{ $compra->id }}">
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Tipo de documento <span class="text-danger">*</span></label>
                                                <input type="hidden" name="" value="{{ $compra->tipo_documento }}">
                                                <select id="tipo_documento" class="form-control" name="tipo_documento">
                                                    <option selected>Seleccione...</option>
                                                    <option value="DUI" {{ ($compra->tipo_documento) == "DUI" ? "selected" : "" }} >1. DUI</option>
                                                    <option value="NIT" {{ ($compra->tipo_documento) == "NIT" ? "selected" : "" }} >2. NIT</option>
                                                    <option value="Otro documento" {{ ($compra->tipo_documento) == "Otro documento" ? "selected" : "" }} >3. Otro documento</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="numero_nit_dui_otro">Número de NIT, DUI u otro Documento<span class="text-danger">*</span></label>
                                                <div>
                                                    <input type="text" name="numero_nit_dui_otro" class="form-control" id="numero_nit_dui_otro" value="{{ $compra->numero_nit_dui_otro }}">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="nombre_razonsocial_denominacion">Nombre, Razón Social o Denominación <span class="text-danger">*</span></label>
                                                <div>
                                                    <input type="text" name="nombre_razonsocial_denominacion" class="form-control" id="nombre_razonsocial_denominacion" value="{{ $compra->nombre_razonsocial_denominacion }}">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="fecha_emision_documento">Fecha de emisión del Documento <span class="text-danger">*</span></label>
                                                <div>
                                                    <input type="date" name="fecha_emision_documento" class="form-control" id="fecha_emision_documento"  value="{{ $compra->fecha_emision_documento }}">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="numero_serie_documento">Número de Serie del Documento <span class="text-danger">*</span></label>
                                                <div>
                                                    <input type="text" name="numero_serie_documento" class="form-control" id="numero_serie_documento" value="{{ $compra->numero_serie_documento }}">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="numero_documento">Número de Documento <span class="text-danger">*</span></label>
                                                <div>
                                                    <input type="text" name="numero_documento" class="form-control" id="numero_documento" value="{{ $compra->numero_documento }}">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="monto_operacion">Monto de la Operación <span class="text-danger">*</span></label>
                                                <div>
                                                    <input type="text" name="monto_operacion" class="form-control monto_operacion" value="{{ $compra->monto_operacion }}">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="monto_retencion_iva">Monto de la Retención del IVA 13% <span class="text-danger">*</span></label>
                                                <div>
                                                    <input type="text" name="" class="form-control monto_retencion_iva" value="{{ $compra->monto_retencion_iva }}" disabled>
                                                    <input type="hidden" name="monto_retencion_iva" class="form-control monto_retencion_iva_hidden" value="{{ $compra->monto_retencion_iva }}">
                                                </div>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label>Número del anexo <span class="text-danger">*</span></label>
                                                <select id="numero_anexo" class="form-control" name="numero_anexo">
                                                    <option value="5">5</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Cliente</label>
                                                <select id="select-usuario" class="form-control" name="user_id" disabled>
                                                    <option value="null">Seleccione un usuario...</option>
                                                    @foreach ($usuarios as $usuario)
                                                        @if ( $usuario->id == $compra->user_id )
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
                        <h4>Compras a Sujetos Excluídos</h4>
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Anexos</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Compras a Sujetos Excluídos</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Crear anexo Compras a Sujetos Excluídos</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form form-validation">
                                <form class="form-compras-sujetos" method="POST">
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label>Tipo de documento <span class="text-danger">*</span></label>
                                            <select id="tipo_documento" class="form-control" name="tipo_documento">
                                                <option selected>Seleccione...</option>
                                                <option value="DUI">1. DUI</option>
                                                <option value="NIT">2. NIT</option>
                                                <option value="Otro documento">3. Otro documento</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="numero_nit_dui_otro">Número de NIT, DUI u otro Documento<span class="text-danger">*</span></label>
                                            <div>
                                                <input type="text" name="numero_nit_dui_otro" class="form-control" id="numero_nit_dui_otro">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="nombre_razonsocial_denominacion">Nombre, Razón Social o Denominación <span class="text-danger">*</span></label>
                                            <div>
                                                <input type="text" name="nombre_razonsocial_denominacion" class="form-control" id="nombre_razonsocial_denominacion">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="fecha_emision_documento">Fecha de emisión del Documento <span class="text-danger">*</span></label>
                                            <div>
                                                <input type="date" name="fecha_emision_documento" class="form-control" id="fecha_emision_documento">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="numero_serie_documento">Número de Serie del Documento <span class="text-danger">*</span></label>
                                            <div>
                                                <input type="text" name="numero_serie_documento" class="form-control" id="numero_serie_documento">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="numero_documento">Número de Documento <span class="text-danger">*</span></label>
                                            <div>
                                                <input type="text" name="numero_documento" class="form-control" id="numero_documento">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="monto_operacion">Monto de la Operación <span class="text-danger">*</span></label>
                                            <div>
                                                <input type="text" name="monto_operacion" class="form-control monto_operacion">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="monto_retencion_iva">Monto de la Retención del IVA 13% <span class="text-danger">*</span></label>
                                            <div>
                                                <input type="text" name="" class="form-control monto_retencion_iva" disabled>
                                                <input type="hidden" name="monto_retencion_iva" class="form-control monto_retencion_iva_hidden">
                                            </div>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>Número del anexo <span class="text-danger">*</span></label>
                                            <select id="numero_anexo" class="form-control" name="numero_anexo">
                                                <option value="5">5</option>
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

        $(".monto_operacion").keyup(function(){
            let montoOp = parseFloat($(this).val());
            let ivaOp = 0;

            if (!isNaN(montoOp)) {
                ivaOp = montoOp*0.13;
            }
            $(".monto_retencion_iva").val(ivaOp.toFixed(2));
            $(".monto_retencion_iva_hidden").val(ivaOp.toFixed(2));
        });

        $( ".form-compras-sujetos" ).submit(function( event ) {
            event.preventDefault();
            var form = $(this);
            $.ajax({
                type: 'POST',
                url: "{{ url('add-casilla66') }}",
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

        $( ".form-casilla66-edit" ).submit(function( event ) {
            event.preventDefault();
            var form = $(this);
            let id = $("#id_casilla66").val();
            $.ajax({
                type: 'POST',
                url: "{{ url('update-casilla66') }}/"+id,
                data: form.serialize()
            }).done(function(data) {
                if (data === true) {

                    Swal.fire({
                        title: 'Datos guardados correctamente!!',
                        icon: 'success',
                        confirmButtonText: 'OK',
                    }).then((result) => {
                        console.log(result);
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
