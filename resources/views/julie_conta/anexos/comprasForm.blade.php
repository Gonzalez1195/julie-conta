{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')

    @if ( isset($anexoCompras) )
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
                                        @foreach ($anexoCompras as $compras)
                                            <form class="form-anexo-compral-edit" method="POST">
                                                @csrf
                                                <input type="hidden" name="id_anexo_compra" id="id_anexo_compra" value="{{ $compras->id }}">
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label for="fecha_emision">Fecha de emisión del documento<span class="text-danger">*</span></label>
                                                        <div>
                                                            <input type="date" name="fecha_emision" class="form-control" id="fecha_emision" value="{{ $compras->fecha_emision }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>Clase de documento <span class="text-danger">*</span></label>
                                                        <select id="clase_documento" class="form-control" name="clase_documento">
                                                            <option {{ ($compras->clase_documento) == "" ? "selected" : "" }} >Seleccione...</option>
                                                            <option value="Impreso por imprenta o tiquetes" {{ ($compras->clase_documento) == "Impreso por imprenta o tiquetes" ? "selected" : "" }} >1. IMPRESO POR IMPRENTA O TIQUETES</option>
                                                            <option value="Formulario unico" {{ ($compras->clase_documento) == "" ? "selected" : "Formulario unico" }} >2. FORMULARIO UNICO</option>
                                                            <option value="Otros" {{ ($compras->clase_documento) == "" ? "selected" : "Otros" }} >3. OTROS</option>
                                                            <option value="Documento Tributario electronico (DTE)" {{ ($compras->clase_documento) == "Documento Tributario electronico (DTE)" ? "selected" : "" }} > 4. DOCUMENTO TRIBUTARIO ELECTRONICO (DTE)/option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>Tipo de documento <span class="text-danger">*</span></label>
                                                        <select id="tipo_documento" class="form-control" name="tipo_documento">
                                                            <option {{ ($compras->tipo_documento) == "" ? "selected" : "" }} >Seleccione...</option>
                                                            <option value="Comprobante de crédito fiscal" {{ ($compras->tipo_documento) == "Comprobante de crédito fiscal" ? "selected" : "" }} >03. COMPROBANTE DE CRÉDITO FISCAL</option>
                                                            <option value="Nota de crédito" {{ ($compras->tipo_documento) == "Nota de crédito" ? "selected" : "" }} >05. NOTA DE CRÉDITO</option>
                                                            <option value="Nota de débito" {{ ($compras->tipo_documento) == "Nota de débito" ? "selected" : "" }} >06. NOTA DE DÉBITO</option>
                                                            <option value="Factura de exportacion" {{ ($compras->tipo_documento) == "Factura de exportacion" ? "selected" : "" }} >11. FACTURA DE EXPORTACIÓN</option>
                                                            <option value="Declaracion de mercancias" {{ ($compras->tipo_documento) == "Declaracion de mercancias" ? "selected" : "" }} >12. DECLARACIÓN DE MERCANCÍAS</option>
                                                            <option value="Mandamiento de ingreso" {{ ($compras->tipo_documento) == "Mandamiento de ingreso" ? "selected" : "" }} >13. MANDAMIENTO DE INGRESO</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="numero_documento">Número de documento <span class="text-danger">*</span></label>
                                                        <div>
                                                            <input type="text" name="numero_documento" class="form-control" id="numero_documento" value="{{ $compras->numero_documento }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="nit_nrc_proveedor">NIT o NRC del proveedor </label>
                                                        <div>
                                                            <input type="text" name="nit_nrc_proveedor" class="form-control" id="nit_nrc_proveedor" value="{{ $compras->nit_nrc_proveedor }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="nombre_proveedor">Nombre del proveedor </label>
                                                        <div>
                                                            <input type="text" name="nombre_proveedor" class="form-control" id="nombre_proveedor" value="{{ $compras->nombre_proveedor }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="compras_internas_exentas">Compras internas exentas </label>
                                                        <div>
                                                            <input type="text" name="compras_internas_exentas" class="form-control" id="compras_internas_exentas" value="{{ $compras->compras_internas_exentas }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="internaciones_exentas_no_sujetas">Internaciones exentas y/o no sujetas </label>
                                                        <div>
                                                            <input type="text" name="internaciones_exentas_no_sujetas" class="form-control" id="internaciones_exentas_no_sujetas" value="{{ $compras->internaciones_exentas_no_sujetas }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="importaciones_exentas_no_sujetas">Importaciones exentas y/o no sujestas </label>
                                                        <div>
                                                            <input type="text" name="importaciones_exentas_no_sujetas" class="form-control" id="importaciones_exentas_no_sujetas" value="{{ $compras->importaciones_exentas_no_sujetas }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="compras_internas_gravadas">Compras internas gravadas </label>
                                                        <div>
                                                            <input type="text" name="compras_internas_gravadas" class="form-control" id="compras_internas_gravadas" value="{{ $compras->compras_internas_gravadas }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="internaciones_gravadas_bienes">Internacioes gravadas de bienes </label>
                                                        <div>
                                                            <input type="text" name="internaciones_gravadas_bienes" class="form-control" id="internaciones_gravadas_bienes" value="{{ $compras->internaciones_gravadas_bienes }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="importaciones_gravadas_bienes">Importaciones gravadas de bienes </label>
                                                        <div>
                                                            <input type="text" name="importaciones_gravadas_bienes" class="form-control" id="importaciones_gravadas_bienes" value="{{ $compras->importaciones_gravadas_bienes }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="importaciones_gravadas_servicios">Importaciones gravadas de servicios </label>
                                                        <div>
                                                            <input type="text" name="importaciones_gravadas_servicios" class="form-control" id="importaciones_gravadas_servicios" value="{{ $compras->importaciones_gravadas_servicioscredito_fiscal }}">
                                                        </div>
                                                    </div>
                                                    {{-- <div class="form-group col-md-6">
                                                        <label for="credito_fiscal">Crédito fiscal </label>
                                                        <div>
                                                            <input type="text" name="credito_fiscal" class="form-control" id="credito_fiscal" value="{{ $compras->credito_fiscal }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="total_compras">Total de compras </label>
                                                        <div>
                                                            <input type="text" name="total_compras" class="form-control" id="total_compras" value="{{ $compras->total_compras }}">
                                                        </div>
                                                    </div> --}}
                                                    <div class="form-group col-md-6">
                                                        <label for="dui_proveedor">DUI del proveedor </label>
                                                        <div>
                                                            <input type="text" name="dui_proveedor" class="form-control" id="dui_proveedor" value="{{ $compras->dui_proveedor }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>Número del Anexo <span class="text-danger">*</span></label>
                                                        <select id="numero_anexo" class="form-control" name="numero_anexo">
                                                            <option value="3" selected>3</option>
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
                                <h4>Nuevo anexo compras</h4>
                            </div>
                        </div>
                        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Anexos</a></li>
                                <li class="breadcrumb-item active"><a href="javascript:void(0)">Agregar anexo de compra</a></li>
                            </ol>
                        </div>
                    </div>
                    <!-- row -->
                    <div class="row">
                        <div class="col-xl-12 col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Crear anexo de compra</h4>
                                </div>
                                <div class="card-body">
                                    <div class="basic-form form-validation">
                                        <form class="form-anexocompra" method="POST">
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
                                                        <option value="Otros">3. OTROS </option>
                                                        <option value="Documento tributario electronico (DTE)">4. DOCUMENTO TRIBUTARIO ELECTRONICO (DTE)</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Tipo de documento <span class="text-danger">*</span></label>
                                                    <select id="tipo_documento" class="form-control" name="tipo_documento">
                                                        <option selected>Seleccione...</option>
                                                        <option value="Comprobante de crédito fiscal">03. COMPROBANTE DE CRÉDITO FISCAL</option>
                                                        <option value="Nota de crédito">05 NOTA DE CRÉDITO</option>
                                                        <option value="Nota de débito">06. NOTA DE DÉBITO</option>
                                                        <option value="Factura de exportacion">11. FACTURA DE EXPORTACIÓN</option>
                                                        <option value="Declaracion de mercancias">12. DECLARACIÓN DE MERCANCÍAS</option>
                                                        <option value="Mandamiento de ingreso">13. MANDAMIENTO DE INGRESO</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="numero_documento">Número de documento <span class="text-danger">*</span></label>
                                                    <div>
                                                        <input type="text" name="numero_documento" class="form-control" id="numero_documento">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="nit_nrc_proveedor">NIT o NRC del proveedor <span class="text-danger">*</span></label>
                                                    <div>
                                                        <input type="text" name="nit_nrc_proveedor" class="form-control" id="nit_nrc_proveedor">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="nombre_proveedor">Nombre del proveedor <span class="text-danger">*</span></label>
                                                    <div>
                                                        <input type="text" name="nombre_proveedor" class="form-control" id="nombre_proveedor">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="compras_internas_exentas">Compras internas exentas </label>
                                                    <div>
                                                        <input type="text" name="compras_internas_exentas" class="form-control" id="compras_internas_exentas">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="internaciones_exentas_no_sujetas">Internaciones exentas y/o no sujetas </label>
                                                    <div>
                                                        <input type="text" name="internaciones_exentas_no_sujetas" class="form-control" id="internaciones_exentas_no_sujetas">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="importaciones_exentas_no_sujetas">Importaciones exentas y/o no sujetas </label>
                                                    <div>
                                                        <input type="text" name="importaciones_exentas_no_sujetas" class="form-control" id="importaciones_exentas_no_sujetas">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="compras_internas_gravadas">Compras internas gravadas </label>
                                                    <div>
                                                        <input type="text" name="compras_internas_gravadas" class="form-control" id="compras_internas_gravadas">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="internaciones_gravadas_bienes">Internaciones gravadas de bienes </label>
                                                    <div>
                                                        <input type="text" name="internaciones_gravadas_bienes" class="form-control" id="internaciones_gravadas_bienes">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="importaciones_gravadas_bienes">Importaciones gravadas de bienes </label>
                                                    <div>
                                                        <input type="text" name="importaciones_gravadas_bienes" class="form-control" id="importaciones_gravadas_bienes">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="importaciones_gravadas_servicios">Importaciones gravadas de servicios </label>
                                                    <div>
                                                        <input type="text" name="importaciones_gravadas_servicios" class="form-control" id="importaciones_gravadas_servicios">
                                                    </div>
                                                </div>
                                                {{-- <div class="form-group col-md-6">
                                                    <label for="credito_fiscal">Crédito fiscal</label>
                                                    <div>
                                                        <input type="text" name="credito_fiscal" class="form-control" id="credito_fiscal">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="total_compras">Total de compras </label>
                                                    <div>
                                                        <input type="text" name="total_compras" class="form-control" id="total_compras">
                                                    </div>
                                                </div> --}}

                                                <div class="form-group col-md-6">
                                                    <label for="dui_proveedor">DUI del proveedor </label>
                                                    <div>
                                                        <input type="text" name="dui_proveedor" class="form-control" id="dui_proveedor">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Número del anexo <span class="text-danger">*</span></label>
                                                    <select id="numero_anexo" class="form-control" name="numero_anexo">
                                                        <option value="3">1</option>
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

        $( ".form-anexocompra" ).submit(function( event ) {
            event.preventDefault();
            var form = $(this);
            $.ajax({
                type: 'POST',
                url: "{{ url('crear-anexo-compras') }}",
                data: form.serialize()
            }).done(function(data) {

                if (data === true) {
                    swal.fire("Exito!!", "Datos guardados correctamente!!", "success")
                    form[0].reset();
                }
            }).fail(function(data) {

                sweetAlert("Oops...", "Ocurrio un error intentelo de nuevo!!", "error")
            });
            return this;
        });

        $( ".form-anexo-compral-edit" ).submit(function( event ) {
            event.preventDefault();
            var form = $(this);
            let id = $("#id_anexo_compra").val();
            $.ajax({
                type: 'POST',
                url: "{{ url('edit-anexo-compras') }}/"+id,
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
                            window.location = "../anexo-compras-mostrar";
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
