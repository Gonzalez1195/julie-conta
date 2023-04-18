{{-- Extends layout --}}
@extends('layout.default')



{{-- Content --}}
@section('content')

            @if (isset($consumidor))

                <div class="container-fluid">
                    <div class="row page-titles mx-0">
                        <div class="col-sm-6 p-md-0">
                            <div class="welcome-text">
                                <h4>Editar Consumidor Final</h4>
                            </div>
                        </div>
                        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Editar</a></li>
                                <li class="breadcrumb-item active"><a href="javascript:void(0)">Consumidor Final</a></li>
                            </ol>
                        </div>
                    </div>
                    <!-- row -->
                    <div class="row">
                        <div class="col-xl-12 col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Editar Consumidor Final</h4>
                                </div>
                                <div class="card-body">
                                    <div class="basic-form form-validation">
                                        @foreach ($consumidor as $consu)
                                            <form class="form-consumidor-final-edit" method="POST">
                                                @csrf
                                                <input type="hidden" name="id_cf" id="id_cf" value="{{ $consu->id }}">
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label for="fecha_emision">Fecha de emisión <span class="text-danger">*</span></label>
                                                        <div>
                                                            <input type="date" name="fecha_emision" class="form-control" id="fecha_emision" value="{{ $consu->fecha_emision }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>Clase de documento <span class="text-danger">*</span></label>
                                                        <select id="clase_documento" class="form-control" name="clase_documento">
                                                            <option {{ ($consu->clase_documento) == "" ? "selected" : "" }} >Seleccione...</option>
                                                            <option value="Impreso por imprenta o tiquetes" {{ ($consu->clase_documento) == "Impreso por imprenta o tiquetes" ? "selected" : "" }} >1. IMPRESO POR IMPRENTA O TIQUETES</option>
                                                            <option value="Formulario unico" {{ ($consu->clase_documento) == "Formulario unico" ? "selected" : "" }} >2. FORMULARIO UNICO</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>Clase de documento <span class="text-danger">*</span></label>
                                                        <select id="tipo_documento" class="form-control" name="tipo_documento">
                                                            <option {{ ($consu->tipo_documento) == "" ? "selected" : "" }} >Seleccione...</option>
                                                            <option value="Factura" {{ ($consu->tipo_documento) == "Factura" ? "selected" : "" }} >01. FACTURA</option>
                                                            <option value="Factura de venta simplificada" {{ ($consu->tipo_documento) == "Factura de venta simplificada" ? "selected" : "" }} >02. FACTURA DE VENTA SIMPLIFICADA</option>
                                                            <option value="Tiquetes de maquina registradora" {{ ($consu->tipo_documento) == "Tiquetes de maquina registradora" ? "selected" : "" }} >10. TIQUETES DE MAQUINA REGISTRADORA</option>
                                                            <option value="Factura de exportacion" {{ ($consu->tipo_documento) == "Factura de exportacion" ? "selected" : "" }} >11. FACTURA DE EXPORTACIÓN</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="numero_resolucion">Número de Resolución <span class="text-danger">*</span></label>
                                                        <div>
                                                            <input type="text" name="numero_resolucion" class="form-control" id="numero_resolucion" value="{{ $consu->numero_resolucion }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="serie_documento">Serie del documento <span class="text-danger">*</span></label>
                                                        <div>
                                                            <input type="text" name="serie_documento" class="form-control" id="serie_documento" value="{{ $consu->serie_documento }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="num_cont_int_del">Número de control interno DEL <span class="text-danger">*</span></label>
                                                        <div>
                                                            <input type="text" name="num_cont_int_del" class="form-control" id="num_cont_int_del" value="{{ $consu->num_cont_int_del }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="num_cont_int_al">Número de control interno AL <span class="text-danger">*</span></label>
                                                        <div>
                                                            <input type="text" name="num_cont_int_al" class="form-control" id="num_cont_int_al" value="{{ $consu->num_cont_int_al }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="num_documento_del">Número de documento (DEL) <span class="text-danger">*</span></label>
                                                        <div>
                                                            <input type="text" name="num_documento_del" class="form-control" id="num_documento_del" value="{{ $consu->num_documento_del }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="num_documento_al">Número de documento (AL) <span class="text-danger">*</span></label>
                                                        <div>
                                                            <input type="text" name="num_documento_al" class="form-control" id="num_documento_al" value="{{ $consu->num_documento_al }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="num_maquina_registradora">Número de maquina registradora </label>
                                                        <div>
                                                            <input type="text" name="num_maquina_registradora" class="form-control" id="num_maquina_registradora" value="{{ $consu->num_maquina_registradora }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="ventas_exentas">Ventas exentas </label>
                                                        <div>
                                                            <input type="text" name="ventas_exentas" class="form-control" id="ventas_exentas" value="{{ $consu->ventas_exentas }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="ventas_int_exentas_no_suj_proporcionalidad">Ventas internas exentas no sujetas a proporcionalidad </label>
                                                        <div>
                                                            <input type="text" name="ventas_int_exentas_no_suj_proporcionalidad" class="form-control" id="ventas_int_exentas_no_suj_proporcionalidad" value="{{ $consu->ventas_int_exentas_no_suj_proporcionalidad }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="ventas_no_sujetas">Ventas no sujetas </label>
                                                        <div>
                                                            <input type="text" name="ventas_no_sujetas" class="form-control" id="ventas_no_sujetas" value="{{ $consu->ventas_no_sujetas }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="ventas_gravadas_locales">Ventas gravadas locales </label>
                                                        <div>
                                                            <input type="text" name="ventas_gravadas_locales" class="form-control" id="ventas_gravadas_locales" value="{{ $consu->ventas_gravadas_locales }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="exp_adentro_area_ca">Exportaciones dentro del área de Centroamérica </label>
                                                        <div>
                                                            <input type="text" name="exp_adentro_area_ca" class="form-control" id="exp_adentro_area_ca" value="{{ $consu->exp_adentro_area_ca }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="exp_fuera_area_ca">Exportaciones fuera del área de Centroamérica </label>
                                                        <div>
                                                            <input type="text" name="exp_fuera_area_ca" class="form-control" id="exp_fuera_area_ca" value="{{ $consu->exp_fuera_area_ca }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="exp_servicio">Exportaciones de servicio </label>
                                                        <div>
                                                            <input type="text" name="exp_servicio" class="form-control" id="exp_servicio" value="{{ $consu->exp_servicio }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="ventas_zonas_francas_dpa">Ventas a zonas francas y DPA (Tasa Cero) </label>
                                                        <div>
                                                            <input type="text" name="ventas_zonas_francas_dpa" class="form-control" id="ventas_zonas_francas_dpa" value="{{ $consu->ventas_zonas_francas_dpa }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="ventas_cuenta_terc_no_domiciliados">Ventas a cuenta de terceros no domiciliados </label>
                                                        <div>
                                                            <input type="text" name="ventas_cuenta_terc_no_domiciliados" class="form-control" id="ventas_cuenta_terc_no_domiciliados" value="{{ $consu->ventas_cuenta_terc_no_domiciliados }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="total_ventas">Total de ventas </label>
                                                        <div>
                                                            <input type="text" name="total_ventas" class="form-control" id="total_ventas" value="{{ $consu->total_ventas }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>Número del Anexo <span class="text-danger">*</span></label>
                                                        <select id="numero_anexo" class="form-control" name="numero_anexo">
                                                            <option value="2" selected>2</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>Cliente</label>
                                                        <select id="select-usuario" class="form-control" name="user_id" disabled>
                                                            @foreach ($usuarios as $usuario)
                                                                @if ( $usuario->id == $consu->user_id )
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
                <div class="container-fluid">
                    <div class="row page-titles mx-0">
                        <div class="col-sm-6 p-md-0">
                            <div class="welcome-text">
                                <h4>Nuevo Consumidor Final</h4>
                            </div>
                        </div>
                        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Anexos</a></li>
                                <li class="breadcrumb-item active"><a href="javascript:void(0)">Agregar Consumidor Final</a></li>
                            </ol>
                        </div>
                    </div>
                    <!-- row -->
                    <div class="row">
                        <div class="col-xl-12 col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Crear Consumidor Final</h4>
                                </div>
                                <div class="card-body">
                                    <div class="basic-form form-validation">
                                        <form class="form-consumidor-final" method="POST">
                                            @csrf
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="fecha_emision">Fecha de emisión <span class="text-danger">*</span></label>
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
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Clase de documento <span class="text-danger">*</span></label>
                                                    <select id="tipo_documento" class="form-control" name="tipo_documento">
                                                        <option selected>Seleccione...</option>
                                                        <option value="Factura">01. FACTURA</option>
                                                        <option value="Factura de venta simplificada">02. FACTURA DE VENTA SIMPLIFICADA</option>
                                                        <option value="Tiquetes de maquina registradora">10. TIQUETES DE MAQUINA REGISTRADORA</option>
                                                        <option value="Factura de exportacion">11. FACTURA DE EXPORTACIÓN</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="numero_resolucion">Número de Resolución <span class="text-danger">*</span></label>
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
                                                    <label for="num_cont_int_del">Número de control interno DEL <span class="text-danger">*</span></label>
                                                    <div>
                                                        <input type="text" name="num_cont_int_del" class="form-control" id="num_cont_int_del">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="num_cont_int_al">Número de control interno AL <span class="text-danger">*</span></label>
                                                    <div>
                                                        <input type="text" name="num_cont_int_al" class="form-control" id="num_cont_int_al">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="num_documento_del">Número de documento (DEL) <span class="text-danger">*</span></label>
                                                    <div>
                                                        <input type="text" name="num_documento_del" class="form-control" id="num_documento_del">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="num_documento_al">Número de documento (AL) <span class="text-danger">*</span></label>
                                                    <div>
                                                        <input type="text" name="num_documento_al" class="form-control" id="num_documento_al">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="num_maquina_registradora">Número de maquina registradora </label>
                                                    <div>
                                                        <input type="text" name="num_maquina_registradora" class="form-control" id="num_maquina_registradora">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="ventas_exentas">Ventas exentas </label>
                                                    <div>
                                                        <input type="text" name="ventas_exentas" class="form-control" id="ventas_exentas">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="ventas_int_exentas_no_suj_proporcionalidad">Ventas internas exentas no sujetas a proporcionalidad </label>
                                                    <div>
                                                        <input type="text" name="ventas_int_exentas_no_suj_proporcionalidad" class="form-control" id="ventas_int_exentas_no_suj_proporcionalidad">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="ventas_no_sujetas">Ventas no sujetas </label>
                                                    <div>
                                                        <input type="text" name="ventas_no_sujetas" class="form-control" id="ventas_no_sujetas">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="ventas_gravadas_locales">Ventas gravadas locales </label>
                                                    <div>
                                                        <input type="text" name="ventas_gravadas_locales" class="form-control" id="ventas_gravadas_locales">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="exp_adentro_area_ca">Exportaciones dentro del área de Centroamérica </label>
                                                    <div>
                                                        <input type="text" name="exp_adentro_area_ca" class="form-control" id="exp_adentro_area_ca">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="exp_fuera_area_ca">Exportaciones fuera del área de Centroamérica </label>
                                                    <div>
                                                        <input type="text" name="exp_fuera_area_ca" class="form-control" id="exp_fuera_area_ca">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="exp_servicio">Exportaciones de servicio </label>
                                                    <div>
                                                        <input type="text" name="exp_servicio" class="form-control" id="exp_servicio">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="ventas_zonas_francas_dpa">Ventas a zonas francas y DPA (Tasa Cero) </label>
                                                    <div>
                                                        <input type="text" name="ventas_zonas_francas_dpa" class="form-control" id="ventas_zonas_francas_dpa">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="ventas_cuenta_terc_no_domiciliados">Ventas a cuenta de terceros no domiciliados </label>
                                                    <div>
                                                        <input type="text" name="ventas_cuenta_terc_no_domiciliados" class="form-control" id="ventas_cuenta_terc_no_domiciliados">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="total_ventas">Total de ventas </label>
                                                    <div>
                                                        <input type="text" name="total_ventas" class="form-control" id="total_ventas">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Número del Anexo <span class="text-danger">*</span></label>
                                                    <select id="numero_anexo" class="form-control" name="numero_anexo">
                                                        <option value="2">2</option>
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

        $( ".form-consumidor-final" ).submit(function( event ) {
            event.preventDefault();
            var form = $(this);
            $.ajax({
                type: 'POST',
                url: "{{ url('crear-consumidor-final') }}",
                data: form.serialize()
            }).done(function(data) {
                console.log(data);
                if (data === true) {
                    swal("Exito!!", "Datos guardados correctamente!!", "success")
                    form[0].reset();
                }
            }).fail(function(data) {
                console.log(data);
                    sweetAlert("Oops...", "Ocurrio un error intentelo de nuevo!!", "error")
            });
            return this;
        });

        $( ".form-consumidor-final-edit" ).submit(function( event ) {
            event.preventDefault();
            var form = $(this);
            let id = $("#id_cf").val();
            $.ajax({
                type: 'POST',
                url: "{{ url('edit-consumidor-final') }}/"+id,
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
                            window.location = "../consumidor-final";
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


