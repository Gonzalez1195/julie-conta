{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')

    @if ( isset($contribuyente) )
        {{-- Formulario para editar --}}
        <div class="container-fluid">
                    <div class="row page-titles mx-0">
                        <div class="col-sm-6 p-md-0">
                            <div class="welcome-text">
                                <h4>Editar contribuyente registro</h4>
                            </div>
                        </div>
                        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Editar</a></li>
                                <li class="breadcrumb-item active"><a href="javascript:void(0)">Contribuyente registro</a></li>
                            </ol>
                        </div>
                    </div>
                    <!-- row -->
                    <div class="row">
                        <div class="col-xl-12 col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Editar usuario</h4>
                                </div>
                                <div class="card-body">
                                    <div class="basic-form form-validation">
                                        @foreach ($contribuyente as $contri)
                                            <form class="form-contribuyente-edit" method="POST">
                                                @csrf
                                                <input type="hidden" name="id_contri" id="id_contri" value="{{ $contri->id }}">
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label for="fecha_emision">Fecha de emisión del documento<span class="text-danger">*</span></label>
                                                        <div>
                                                            <input type="date" name="fecha_emision" class="form-control" id="fecha_emision" value="{{ $contri->fecha_emision }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>Clase de documento <span class="text-danger">*</span></label>
                                                        <select id="clase_documento" class="form-control" name="clase_documento">
                                                            <option {{ ($contri->clase_documento) == "" ? "selected" : "" }} >Seleccione...</option>
                                                            <option value="Impreso por imprenta o tiquetes" {{ ($contri->clase_documento) == "Impreso por imprenta o tiquetes" ? "selected" : "" }} >1. IMPRESO POR IMPRENTA O TIQUETES</option>
                                                            <option value="Formulario unico" {{ ($contri->clase_documento) == "Formulario unico" ? "selected" : "" }} >2. FORMULARIO UNICO</option>
                                                            <option value="Documento tributario electronico (DTE)" {{ ($contri->clase_documento) == "Documento tributario electronico (DTE)" ? "selected" : "" }} >4. DOCUMENTO TRIBUTARIO ELECTRONICO (DTE)</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>Tipo de documento <span class="text-danger">*</span></label>
                                                        <select id="tipo_documento" class="form-control" name="tipo_documento">
                                                            <option {{ ($contri->tipo_documento) == "" ? "selected" : "" }} >Seleccione...</option>
                                                            <option value="Comprobante de crédito fiscal" {{ ($contri->tipo_documento) == "Comprobante de crédito fiscal" ? "selected" : "" }} >03. COMPROBANTE DE CRÉDITO FISCAL</option>
                                                            <option value="Nota de crédito" {{ ($contri->tipo_documento) == "Nota de crédito" ? "selected" : "" }} >05 NOTA DE CRÉDITO</option>
                                                            <option value="Nota de débito" {{ ($contri->tipo_documento) == "Nota de débito" ? "selected" : "" }} >06. NOTA DE DÉBITO</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="numero_resolucion">Número de Resolución <span class="text-danger">*</span></label>
                                                        <div>
                                                            <input type="text" name="numero_resolucion" class="form-control" id="numero_resolucion" value="{{ $contri->numero_resolucion }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="serie_documento">Serie del documento <span class="text-danger">*</span></label>
                                                        <div>
                                                            <input type="text" name="serie_documento" class="form-control" id="serie_documento" value="{{ $contri->serie_documento }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="num_cont_int_del">Número de documento <span class="text-danger">*</span></label>
                                                        <div>
                                                            <input type="text" name="num_cont_int_del" class="form-control" id="num_cont_int_del" value="{{ $contri->num_cont_int_del }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="num_cont_int_al">Número de control interno <span class="text-danger">*</span></label>
                                                        <div>
                                                            <input type="text" name="num_cont_int_al" class="form-control" id="num_cont_int_al" value="{{ $contri->num_cont_int_al }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="nit_nrc_cliente">NIT o NRC del cliente </label>
                                                        <div>
                                                            <input type="text" name="" class="form-control" value="{{ $contri->nit_nrc_cliente }}" disabled>
                                                            <input type="hidden" name="nit_nrc_cliente" class="form-control" id="nit_nrc_cliente" value="{{ $contri->nit_nrc_cliente }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="nombre_razonsocial_denominacion">Nombre razón social o denominación </label>
                                                        <div>
                                                            <input type="text" name="" class="form-control" value="{{ $contri->nombre_razonsocial_denominacion }}" disabled>
                                                            <input type="hidden" name="nombre_razonsocial_denominacion" class="form-control" id="nombre_razonsocial_denominacion" value="{{ $contri->nombre_razonsocial_denominacion }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="ventas_exentas">Ventas exentas </label>
                                                        <div>
                                                            <input type="text" name="ventas_exentas" class="form-control ventas_sum" id="ventas_exentas" value="{{ $contri->ventas_exentas }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="ventas_no_sujetas">Ventas no sujetas </label>
                                                        <div>
                                                            <input type="text" name="ventas_no_sujetas" class="form-control ventas_sum" id="ventas_no_sujetas" value="{{ $contri->ventas_no_sujetas }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="ventas_gravadas_locales">Ventas gravadas locales </label>
                                                        <div>
                                                            <input type="text" name="ventas_gravadas_locales" class="form-control ventas_sum" id="ventas_gravadas_locales" value="{{ $contri->ventas_gravadas_locales }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="debito_fiscal">Débito fiscal </label>
                                                        <div>
                                                            <input type="text" name="debito_fiscal" class="form-control" id="debito_fiscal" value="{{ $contri->debito_fiscal }}" disabled>
                                                            <input type="hidden" name="debito_fiscal" class="form-control ventas_sum" id="debito_fiscal2" value="{{ $contri->debito_fiscal }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="ventas_cuenta_terc_no_domiciliados">Ventas a cuenta de terceros no domiciliados </label>
                                                        <div>
                                                            <input type="text" name="ventas_cuenta_terc_no_domiciliados" class="form-control ventas_sum" id="ventas_cuenta_terc_no_domiciliados" value="{{ $contri->ventas_cuenta_terc_no_domiciliados }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="debito_fiscal_ventas_a_cuenta_terceros">Débito fiscal por ventas a cuentas de terceros </label>
                                                        <div>
                                                            <input type="text" name="debito_fiscal_ventas_a_cuenta_terceros" class="form-control" id="debito_fiscal_ventas_a_cuenta_terceros" value="{{ $contri->debito_fiscal_ventas_a_cuenta_terceros }}" disabled>
                                                            <input type="hidden" name="debito_fiscal_ventas_a_cuenta_terceros" class="form-control ventas_sum" id="debito_fiscal_ventas_a_cuenta_terceros2" value="{{ $contri->debito_fiscal_ventas_a_cuenta_terceros }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="total_ventas">Total de ventas </label>
                                                        <div>
                                                            <input type="text" name="" class="form-control total_ventas" value="{{ $contri->total_ventas }}" disabled>
                                                            <input type="hidden" name="total_ventas" class="form-control total_ventas_hidden">
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="dui_cliente">Número de DUI del cliente </label>
                                                        <div>
                                                            <input type="text" name="" class="form-control" value="{{ $contri->dui_cliente }}" disabled>
                                                            <input type="hidden" name="dui_cliente" class="form-control" id="dui_cliente" value="{{ $contri->dui_cliente }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>Número del Anexo <span class="text-danger">*</span></label>
                                                        <select id="numero_anexo" class="form-control" name="numero_anexo">
                                                            <option value="1" selected>1</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>Cliente</label>
                                                        <select id="select-usuario" class="form-control" name="user_id" disabled>
                                                            @foreach ($usuarios as $usuario)
                                                                @if ( $usuario->id == $contri->user_id )
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
                                <h4>Nuevo Contribuyente registro</h4>
                            </div>
                        </div>
                        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Anexos</a></li>
                                <li class="breadcrumb-item active"><a href="javascript:void(0)">Agregar Contribuyente</a></li>
                            </ol>
                        </div>
                    </div>
                    <!-- row -->
                    <div class="row">
                        <div class="col-xl-12 col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Crear Contribuyente</h4>
                                </div>
                                <div class="card-body">
                                    <div class="basic-form form-validation">
                                        <form class="form-contribuyente" method="POST">
                                            @csrf
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="fecha_emision">Fecha de emisión del documento <span class="text-danger">*</span></label>
                                                    <div>
                                                        <input type="date" name="fecha_emision" class="form-control" id="fecha_emision">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Clase de documento <span class="text-danger">*</span></label>
                                                    <select id="clase_documento" class="form-control" name="clase_documento">
                                                        <option selected>Seleccione...</option>
                                                        <option value="Impreso por imprenta o tiquetes">1. IMPRESO POR IMPRENTA O TIQUETES</option>
                                                        <option value="Formulario unico">2. FORMULARIO UNICO</option>
                                                        <option value="Documento tributario electronico (DTE)">4. DOCUMENTO TRIBUTARIO ELECTRONICO (DTE)</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Tipo de documento <span class="text-danger">*</span></label>
                                                    <select id="tipo_documento" class="form-control" name="tipo_documento">
                                                        <option selected>Seleccione...</option>
                                                        <option value="Comprobante de crédito fiscal">03. COMPROBANTE DE CRÉDITO FISCAL</option>
                                                        <option value="Nota de crédito">05 NOTA DE CRÉDITO</option>
                                                        <option value="Nota de Débito">06. NOTA DE DÉBITO</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="numero_resolucion">Número de resolución <span class="text-danger">*</span></label>
                                                    <div>
                                                        <input type="text" name="numero_resolucion" class="form-control" id="numero_resolucion">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="serie_documento">Serie del documento <span class="text-danger">*</span></label>
                                                    <div>
                                                        <input type="text" name="serie_documento" class="form-control" id="serie_documento">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="num_cont_int_del">Número de documento <span class="text-danger">*</span></label>
                                                    <div>
                                                        <input type="text" name="num_cont_int_del" class="form-control" id="num_cont_int_del">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="num_cont_int_al">Número de control interno </label>
                                                    <div>
                                                        <input type="text" name="num_cont_int_al" class="form-control" id="num_cont_int_al">
                                                    </div>
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label for="nit_nrc_cliente">NIT o NRC del cliente </label>
                                                    <div>
                                                        <select class="data_contribuyente form-control" name="nit_nrc_cliente" id="nit_nrc_cliente"></select>
                                                    </div>
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label for="nombre_razonsocial_denominacion">Nombre razón social o denominación </label>
                                                    <div>
                                                        <input type="text" name="" class="form-control" id="nombre_razonsocial_denominacion" disabled>
                                                        <input type="hidden" name="nombre_razonsocial_denominacion" class="form-control" id="nombre_razonsocial_denominacion_hidden">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="ventas_exentas">Ventas exentas </label>
                                                    <div>
                                                        <input type="text" name="ventas_exentas" class="form-control ventas_sum" id="ventas_exentas">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="ventas_no_sujetas">Ventas no sujetas </label>
                                                    <div>
                                                        <input type="text" name="ventas_no_sujetas" class="form-control ventas_sum" id="ventas_no_sujetas">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="ventas_gravadas_locales">Ventas gravadas locales </label>
                                                    <div>
                                                        <input type="text" name="ventas_gravadas_locales" class="form-control ventas_sum" id="ventas_gravadas_locales">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="debito_fiscal">Débito fiscal </label>
                                                    <div>
                                                        <input type="text" name="" class="form-control" id="debito_fiscal" disabled>
                                                        <input type="hidden" name="debito_fiscal" class="form-control ventas_sum" id="debito_fiscal2">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="ventas_cuenta_terc_no_domiciliados">Ventas a cuenta de terceros no domiciliados </label>
                                                    <div>
                                                        <input type="text" name="ventas_cuenta_terc_no_domiciliados" class="form-control ventas_sum" id="ventas_cuenta_terc_no_domiciliados">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="debito_fiscal_ventas_a_cuenta_terceros">Débito fiscal por ventas a cuenta de terceros </label>
                                                    <div>
                                                        <input type="text" name="" class="form-control" id="debito_fiscal_ventas_a_cuenta_terceros" disabled>
                                                        <input type="hidden" name="debito_fiscal_ventas_a_cuenta_terceros" class="form-control ventas_sum" id="debito_fiscal_ventas_a_cuenta_terceros2">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="total_ventas">Total de ventas </label>
                                                    <div>
                                                        <input type="text" name="" class="form-control total_ventas" disabled>
                                                        <input type="hidden" name="total_ventas" class="form-control total_ventas_hidden">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="dui_cliente">Número de DUI del cliente </label>
                                                    <div>
                                                        <select class="dui_contribuyente form-control" name="dui_cliente" id="dui_cliente"></select>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Número del anexo <span class="text-danger">*</span></label>
                                                    <select id="numero_anexo" class="form-control" name="numero_anexo">
                                                        <option value="1">1</option>
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

        $("#ventas_gravadas_locales").keyup(function(){
            let venta = $(this).val();
            let campoIva = $("#debito_fiscal");
            let campoIvaH = $("#debito_fiscal2");
            let iva = venta * 0.13;
            campoIva.val(iva.toFixed(2));
            campoIvaH.val(iva.toFixed(2));
        });

        $("#ventas_cuenta_terc_no_domiciliados").keyup(function(){
            let venta = $(this).val();
            let campoIva = $("#debito_fiscal_ventas_a_cuenta_terceros");
            let campoIvaH = $("#debito_fiscal_ventas_a_cuenta_terceros2");
            let iva = venta * 0.13;
            campoIva.val(iva.toFixed(2));
            campoIvaH.val(iva.toFixed(2));
        });

        $( ".form-contribuyente" ).submit(function( event ) {
            event.preventDefault();
            var form = $(this);
            $.ajax({
                type: 'POST',
                url: "{{ url('add-anexo-contribuyentes') }}",
                data: form.serialize()
            }).done(function(data) {
                console.log(data);
                if (data === true) {
                    swal.fire("Exito!!", "Datos guardados correctamente!!", "success")
                    form[0].reset();
                }
            }).fail(function(data) {
                    console.log(data);
                    sweetAlert("Oops...", "Ocurrio un error intentelo de nuevo!!", "error")
            });
            return this;
        });

        $( ".form-contribuyente-edit" ).submit(function( event ) {
            event.preventDefault();
            var form = $(this);
            let id = $("#id_contri").val();
            $.ajax({
                type: 'POST',
                url: "{{ url('edit-anexo-contribuyentes') }}/"+id,
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
                            window.location = "../anexo-contribuyentes";
                        }
                    })

                }
                }).fail(function(data) {
                    sweetAlert("Oops...", "Ocurrio un error intentelo de nuevo!!", "error")
            });
            return this;
        });

        $('.ventas_sum').on( "blur", function() {
            let suma = 0;
            $('.ventas_sum').each(function( index, element ){
                let num = parseFloat($( element ).val());
                if (!isNaN(num)) {
                    suma += num;
                }
            });

            $('.total_ventas').val(suma.toFixed(2));
            $('.total_ventas_hidden').val(suma.toFixed(2));
        });

        $('.data_contribuyente').select2({
            ajax: {
                url: "{{ url('search-contribuyente') }}",
                dataType: 'json',
                data: function (params) {
                    return {
                        num: params.term,
                        type: "nit"
                    };
                },
                processResults: function (data) {
                    return {
                        results: $.map(data, function (item) {
                            return {
                                text: item.nrc_nit + ' '+ item.nombre,
                                name: item.nombre,
                                number: item.nrc_nit,
                                id: item.nrc_nit
                            }
                        })
                    };
                },
                cache: true
            },
            minimumInputLength: 1,
            templateSelection: accionCon
        });

        function accionCon(obj) {
            $("#nombre_razonsocial_denominacion").val(obj.name);
            $("#nombre_razonsocial_denominacion_hidden").val(obj.name);
            $('.dui_contribuyente').attr("disabled", "disabled");
            return obj.number;
        }

        $('.dui_contribuyente').select2({
            width: "100%",
            ajax: {
                url: "{{ url('search-contribuyente') }}",
                dataType: 'json',
                data: function (params) {
                    return {
                        num: params.term,
                        type: "dui"
                    };
                },
                processResults: function (data) {
                    return {
                        results: $.map(data, function (item) {
                            return {
                                text: item.dui + ' '+ item.nombre,
                                name: item.nombre,
                                number: item.dui,
                                id: item.dui
                            }
                        })
                    };
                },
                cache: true
            },
            minimumInputLength: 1,
            templateSelection: accionConDui
        });

        function accionConDui(obj) {
            $("#nombre_razonsocial_denominacion").val(obj.name);
            $("#nombre_razonsocial_denominacion_hidden").val(obj.name);
            $('.data_contribuyente').attr("disabled", "disabled");
            return obj.number;
        }
    </script>

@endsection
