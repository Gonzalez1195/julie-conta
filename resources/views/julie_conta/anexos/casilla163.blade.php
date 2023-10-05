{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')

    @if ( isset($percepciones) )
        {{-- Formulario para editar --}}
        <div class="container-fluid">
            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>Editar Retención de IVA del 1% efectuada al declarante</h4>
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Editar</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Anexo Casilla 162</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Editar Anexo Casilla 162</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form form-validation">
                                @foreach ($percepciones as $percepcion)
                                    <form class="form-casilla163-edit" method="POST">
                                        @csrf
                                        <input type="hidden" name="id_casilla163" id="id_casilla163" value="{{ $percepcion->id }}">
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="nit_agente">NIT Agente <span class="text-danger">*</span></label>
                                                <div>
                                                    <input type="text" name="nit_agente" class="form-control" value="{{ $percepcion->nit_agente }}">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="fecha_emision">Fecha de Emisión <span class="text-danger">*</span></label>
                                                <div>
                                                    <input type="date" name="fecha_emision" class="form-control" value="{{ $percepcion->fecha_emision }}">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Tipo de documento <span class="text-danger">*</span></label>
                                                <select class="form-control" name="tipo_documento">
                                                    <option selected>Seleccione...</option>
                                                    <option value="03 Comprobante de crédito fiscal" {{ ($percepcion->tipo_documento) == "03 Comprobante de crédito fiscal" ? "selected" : "" }}>03. Comprobante de crédito fiscal</option>
                                                    <option value="05 Nota de crédito" {{ ($percepcion->tipo_documento) == "05 Nota de crédito" ? "selected" : "" }}>05. Nota de crédito</option>
                                                    <option value="06 Nota de débito" {{ ($percepcion->tipo_documento) == "06 Nota de débito" ? "selected" : "" }}>06. Nota de débito</option>
                                                    <option value="12 Declaración de mercancía" {{ ($percepcion->tipo_documento) == "12 Declaración de mercancía" ? "selected" : "" }}>12. Declaración de mercancía</option>
                                                </select>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="serie_documento">Serie de Documento <span class="text-danger">*</span></label>
                                                <div>
                                                    <input type="text" name="serie_documento" class="form-control" value="{{ $percepcion->serie_documento }}">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="numero_documento">Número de Documento <span class="text-danger">*</span></label>
                                                <div>
                                                    <input type="text" name="numero_documento" class="form-control" value="{{ $percepcion->numero_documento }}">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="monto_sujeto">Monto Sujeto <span class="text-danger">*</span></label>
                                                <div>
                                                    <input type="text" name="monto_sujeto" class="form-control monto_sujeto" value="{{ $percepcion->monto_sujeto }}">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="monto_percepcion">Monto de la Percepción 1%<span class="text-danger">*</span></label>
                                                <div>
                                                    <input type="text" name="" class="form-control monto_percepcion" value="{{ $percepcion->monto_percepcion }}" disabled>
                                                    <input type="hidden" name="monto_percepcion" class="form-control monto_percepcion_hidden" value="{{ $percepcion->monto_percepcion }}">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="dui_agente">DUI del Agente <span class="text-danger">*</span></label>
                                                <div>
                                                    <input type="text" name="dui_agente" class="form-control" value="{{ $percepcion->dui_agente }}">
                                                </div>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label>Número del anexo <span class="text-danger">*</span></label>
                                                <select id="numero_anexo" class="form-control" name="numero_anexo">
                                                    <option value="8">8</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Cliente</label>
                                                <select id="select-usuario" class="form-control" name="user_id" disabled>
                                                    <option value="null">Seleccione un usuario...</option>
                                                    @foreach ($usuarios as $usuario)
                                                        @if ( $usuario->id == $percepcion->user_id )
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
                        <h4>Percepción de IVA 1% efectuada al declarante</h4>
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Anexos</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Casilla 163</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Crear anexo Casilla 163</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form form-validation">
                                <form class="form-casilla163" method="POST">
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="nit_agente">NIT Agente <span class="text-danger">*</span></label>
                                            <div>
                                                <input type="text" name="nit_agente" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="fecha_emision">Fecha de Emisión <span class="text-danger">*</span></label>
                                            <div>
                                                <input type="date" name="fecha_emision" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Tipo de documento <span class="text-danger">*</span></label>
                                            <select class="form-control" name="tipo_documento">
                                                <option selected>Seleccione...</option>
                                                <option value="03 Comprobante de crédito fiscal">03. Comprobante de crédito fiscal</option>
                                                <option value="05 Nota de crédito">05. Nota de crédito</option>
                                                <option value="06 Nota de débito">06. Nota de débito</option>
                                                <option value="12 Declaración de mercancía">12. Declaración de mercancía</option>
                                            </select>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="serie_documento">Serie de Documento <span class="text-danger">*</span></label>
                                            <div>
                                                <input type="text" name="serie_documento" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="numero_documento">Número de Documento <span class="text-danger">*</span></label>
                                            <div>
                                                <input type="text" name="numero_documento" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="monto_sujeto">Monto Sujeto <span class="text-danger">*</span></label>
                                            <div>
                                                <input type="text" name="monto_sujeto" class="form-control monto_sujeto">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="monto_percepcion">Monto de la Percepción 1%<span class="text-danger">*</span></label>
                                            <div>
                                                <input type="text" name="" class="form-control monto_percepcion" disabled>
                                                <input type="hidden" name="monto_percepcion" class="form-control monto_percepcion_hidden">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="dui_agente">DUI del Agente <span class="text-danger">*</span></label>
                                            <div>
                                                <input type="text" name="dui_agente" class="form-control">
                                            </div>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>Número del anexo <span class="text-danger">*</span></label>
                                            <select id="numero_anexo" class="form-control" name="numero_anexo">
                                                <option value="8">8</option>
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
                ivaOp = montoOp*0.01;
            }
            $(".monto_percepcion").val(ivaOp.toFixed(2));
            $(".monto_percepcion_hidden").val(ivaOp.toFixed(2));
        });

        $( ".form-casilla163" ).submit(function( event ) {
            event.preventDefault();
            var form = $(this);
            $.ajax({
                type: 'POST',
                url: "{{ url('add-casilla163') }}",
                data: form.serialize()
            }).done(function(data) {
                if (data === true) {
                    Swal.fire("Exito!!", "Datos guardados correctamente!!", "success")
                    form[0].reset();
                }
            }).fail(function(data) {
                Swal.fire("Oops...", "Ocurrio un error intentelo de nuevo!!", "error")
            });
            return this;
        });

        $( ".form-casilla163-edit" ).submit(function( event ) {
            event.preventDefault();
            var form = $(this);
            let id = $("#id_casilla163").val();
            $.ajax({
                type: 'POST',
                url: "{{ url('update-casilla163') }}/"+id,
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
                    Swal.fire("Oops...", "Ocurrio un error intentelo de nuevo!!", "error")
            });
            return this;
        });

    </script>

@endsection
