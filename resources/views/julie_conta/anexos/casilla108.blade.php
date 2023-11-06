{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')

    @if ( isset($ventas) )
        {{-- Formulario para editar --}}
        <div class="container-fluid">
            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>Ventas gravadas por cuenta de terceros domiciliados</h4>
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Editar</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Anexo casilla 108</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Editar anexo casilla 108</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form form-validation">
                                @foreach ($ventas as $venta)
                                    <form class="form-casilla108-edit" method="POST">
                                        @csrf
                                        <input type="hidden" name="id_casilla108" id="id_casilla108" value="{{ $venta->id }}">
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="nit_nrc_mandante">NIT o NRC del mandante <span class="text-danger">*</span></label>
                                                <div>
                                                    <input type="text" name="nit_nrc_mandante" class="form-control" id="nit_nrc_mandante" value="{{ $venta->nit_nrc_mandante }}">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="nombre_razon_social_denominacion">Nombre, Razón social o Denominación <span class="text-danger">*</span></label>
                                                <div>
                                                    <input type="text" name="nombre_razon_social_denominacion" class="form-control" id="nombre_razon_social_denominacion" value="{{ $venta->nombre_razon_social_denominacion }}">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="fecha_emision">Fecha de emisión <span class="text-danger">*</span></label>
                                                <div>
                                                    <input type="date" name="fecha_emision" class="form-control" id="fecha_emision" value="{{ $venta->fecha_emision }}">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Tipo de documento <span class="text-danger">*</span></label>
                                                <select id="tipo_documento" class="form-control" name="tipo_documento">
                                                    <option selected>Seleccione...</option>
                                                    <option value="Factura" {{ ($venta->tipo_documento) == "Factura" ? "selected" : "" }} >01. FACTURA</option>
                                                    <option value="Comprobante de crédito fiscal" {{ ($venta->tipo_documento) == "Comprobante de crédito fiscal" ? "selected" : "" }} >03. COMPROBANTE DE CRÉDITO FISCAL</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="serie_documento">Serie de documento <span class="text-danger">*</span></label>
                                                <div>
                                                    <input type="text" name="serie_documento" class="form-control" id="serie_documento" value="{{ $venta->serie_documento }}">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="numero_resolucion">Número de resolución <span class="text-danger">*</span></label>
                                                <div>
                                                    <input type="text" name="numero_resolucion" class="form-control" id="numero_resolucion" value="{{ $venta->numero_resolucion }}">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="numero_documento">Número de documento <span class="text-danger">*</span></label>
                                                <div>
                                                    <input type="text" name="numero_documento" class="form-control" id="numero_documento" value="{{ $venta->numero_documento }}">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="monto_operacion">Monto de la operación <span class="text-danger">*</span></label>
                                                <div>
                                                    <input type="text" name="monto_operacion" class="form-control monto_operacion" value="{{ $venta->monto_operacion }}">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="iva_operacion">IVA de la operación <span class="text-danger">*</span></label>
                                                <div>
                                                    <input type="text" name="" class="form-control iva_operacion" value="{{ $venta->iva_operacion }}" disabled>
                                                    <input type="hidden" name="iva_operacion" class="form-control iva_operacion_hidden" value="{{ $venta->iva_operacion }}">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="num_serie_comprobante_liquidacion">Numero de serie del comprobante de liquidación <span class="text-danger">*</span></label>
                                                <div>
                                                    <input type="text" name="num_serie_comprobante_liquidacion" class="form-control" id="num_serie_comprobante_liquidacion" value="{{ $venta->num_serie_comprobante_liquidacion }}">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="num_resolucion_comprobante_liquidacion">Numero de resolución del comprobante de liquidación <span class="text-danger">*</span></label>
                                                <div>
                                                    <input type="text" name="num_resolucion_comprobante_liquidacion" class="form-control" id="num_resolucion_comprobante_liquidacion" value="{{ $venta->num_resolucion_comprobante_liquidacion }}">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="num_comprobante_liquidacion">Numero del comprobante de liquidación <span class="text-danger">*</span></label>
                                                <div>
                                                    <input type="text" name="num_comprobante_liquidacion" class="form-control" id="num_comprobante_liquidacion" value="{{ $venta->num_comprobante_liquidacion }}">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="fecha_emision_comprobante_liquidacion">Fecha de emisión del comprobante de liquidación <span class="text-danger">*</span></label>
                                                <div>
                                                    <input type="date" name="fecha_emision_comprobante_liquidacion" class="form-control" id="fecha_emision_comprobante_liquidacion" value="{{ $venta->fecha_emision_comprobante_liquidacion }}">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="dui_cliente">DUI del mandante <span class="text-danger">*</span></label>
                                                <div>
                                                    <input type="text" name="dui_cliente" class="form-control" id="dui_cliente" value="{{ $venta->dui_cliente }}">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Número del anexo <span class="text-danger">*</span></label>
                                                <select id="numero_anexo" class="form-control" name="numero_anexo">
                                                    <option value="4">4</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Cliente</label>
                                                <select id="select-usuario" class="form-control" name="user_id" disabled>
                                                    <option value="null">Seleccione un usuario...</option>
                                                    @foreach ($usuarios as $usuario)
                                                        @if ( $usuario->id == $venta->user_id )
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
                        <h4>Ventas gravadas por cuenta de terceros domiciliados</h4>
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Anexos</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Casilla 108</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Crear anexo casilla 108</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form form-validation">
                                <form class="form-casilla108" method="POST">
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="nit_nrc_mandante">NIT o NRC del mandante <span class="text-danger">*</span></label>
                                            <div>
                                                <input type="text" name="nit_nrc_mandante" class="form-control" id="nit_nrc_mandante">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="nombre_razon_social_denominacion">Nombre, Razón social o Denominación <span class="text-danger">*</span></label>
                                            <div>
                                                <input type="text" name="nombre_razon_social_denominacion" class="form-control" id="nombre_razon_social_denominacion">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="fecha_emision">Fecha de emisión <span class="text-danger">*</span></label>
                                            <div>
                                                <input type="date" name="fecha_emision" class="form-control" id="fecha_emision">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Tipo de documento <span class="text-danger">*</span></label>
                                            <select id="tipo_documento" class="form-control" name="tipo_documento">
                                                <option selected>Seleccione...</option>
                                                <option value="Factura">01. FACTURA</option>
                                                <option value="Comprobante de crédito fiscal">03. COMPROBANTE DE CRÉDITO FISCAL</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="serie_documento">Serie de documento <span class="text-danger">*</span></label>
                                            <div>
                                                <input type="text" name="serie_documento" class="form-control" id="serie_documento">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="numero_resolucion">Número de resolución <span class="text-danger">*</span></label>
                                            <div>
                                                <input type="text" name="numero_resolucion" class="form-control" id="numero_resolucion">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="numero_documento">Número de documento <span class="text-danger">*</span></label>
                                            <div>
                                                <input type="text" name="numero_documento" class="form-control" id="numero_documento">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="monto_operacion">Monto de la operación <span class="text-danger">*</span></label>
                                            <div>
                                                <input type="text" name="monto_operacion" class="form-control monto_operacion">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="iva_operacion">IVA de la operación <span class="text-danger">*</span></label>
                                            <div>
                                                <input type="text" name="" class="form-control iva_operacion" disabled>
                                                <input type="hidden" name="iva_operacion" class="form-control iva_operacion_hidden">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="num_serie_comprobante_liquidacion">Numero de serie del comprobante de liquidación <span class="text-danger">*</span></label>
                                            <div>
                                                <input type="text" name="num_serie_comprobante_liquidacion" class="form-control" id="num_serie_comprobante_liquidacion">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="num_resolucion_comprobante_liquidacion">Numero de resolución del comprobante de liquidación <span class="text-danger">*</span></label>
                                            <div>
                                                <input type="text" name="num_resolucion_comprobante_liquidacion" class="form-control" id="num_resolucion_comprobante_liquidacion">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="num_comprobante_liquidacion">Numero del comprobante de liquidación <span class="text-danger">*</span></label>
                                            <div>
                                                <input type="text" name="num_comprobante_liquidacion" class="form-control" id="num_comprobante_liquidacion">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="fecha_emision_comprobante_liquidacion">Fecha de emisión del comprobante de liquidación <span class="text-danger">*</span></label>
                                            <div>
                                                <input type="date" name="fecha_emision_comprobante_liquidacion" class="form-control" id="fecha_emision_comprobante_liquidacion">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="dui_cliente">DUI del mandante <span class="text-danger">*</span></label>
                                            <div>
                                                <input type="text" name="dui_cliente" class="form-control" id="dui_cliente">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Número del anexo <span class="text-danger">*</span></label>
                                            <select id="numero_anexo" class="form-control" name="numero_anexo">
                                                <option value="4">4</option>
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
            $(".iva_operacion").val(ivaOp.toFixed(2));
            $(".iva_operacion_hidden").val(ivaOp.toFixed(2));
        });

        $( ".form-casilla108" ).submit(function( event ) {
            event.preventDefault();
            var form = $(this);
            $.ajax({
                type: 'POST',
                url: "{{ url('add-casilla108') }}",
                data: form.serialize()
            }).done(function(data) {
                console.log(data);
                if (data === true) {
                    Swal.fire("Exito!!", "Datos guardados correctamente!!", "success")
                    form[0].reset();
                }
            }).fail(function(data) {
                    sweetAlert("Oops...", "Ocurrio un error intentelo de nuevo!!", "error")
            });
            return this;
        });

        $( ".form-casilla108-edit" ).submit(function( event ) {
            event.preventDefault();
            var form = $(this);
            let id = $("#id_casilla108").val();
            $.ajax({
                type: 'POST',
                url: "{{ url('update-casilla108') }}/"+id,
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
                            window.location = "../anexo-casilla-108";
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
