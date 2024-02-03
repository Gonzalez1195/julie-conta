{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')

    @if ( isset($retenciones) )
        {{-- Formulario para editar --}}
        <div class="container-fluid">
            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>Retención de IVA del 1% efectuada al declarante</h4>
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Anexos</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Casilla 162</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Editar anexo casilla 162</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form form-validation">
                                @foreach ($retenciones as $retencion)
                                    <form class="form-casilla162-edit" method="POST">
                                        @csrf
                                        <input type="hidden" name="id_casilla162" id="id_casilla162" value="{{ $retencion->id }}">
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="nit_agente">NIT agente <span class="text-danger">*</span></label>
                                                <div>
                                                    <input type="text" name="nit_agente" class="form-control" value="{{ $retencion->nit_agente }}">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="fecha_emision">Fecha de emisión <span class="text-danger">*</span></label>
                                                <div>
                                                    <input type="date" name="fecha_emision" class="form-control" value="{{ $retencion->fecha_emision }}">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Tipo de documento <span class="text-danger">*</span></label>
                                                <select class="form-control" name="tipo_documento">
                                                    <option selected>Seleccione...</option>
                                                    <option value="05 Nota de credito" {{ ($retencion->tipo_documento) == "05 Nota de credito" ? "selected" : "" }}>05. Nota de credito</option>
                                                    <option value="06 Nota de debito" {{ ($retencion->tipo_documento) == "06 Nota de debito" ? "selected" : "" }}>06. Nota de debito</option>
                                                    <option value="07 Comprobante de retención" {{ ($retencion->tipo_documento) == "07 Comprobante de retención" ? "selected" : "" }}>07. Comprobante de retención</option>
                                                </select>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="serie_documento">Serie de documento <span class="text-danger">*</span></label>
                                                <div>
                                                    <input type="text" name="serie_documento" class="form-control" value="{{ $retencion->serie_documento }}">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="numero_documento">Número de documento <span class="text-danger">*</span></label>
                                                <div>
                                                    <input type="text" name="numero_documento" class="form-control" value="{{ $retencion->numero_documento }}">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="monto_sujeto">Monto sujeto <span class="text-danger">*</span></label>
                                                <div>
                                                    <input type="text" name="monto_sujeto" class="form-control monto_sujeto" value="{{ $retencion->monto_sujeto }}">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="monto_retencion">Monto de la retención 1%<span class="text-danger">*</span></label>
                                                <div>
                                                    <input type="text" name="" class="form-control monto_retencion" value="{{ $retencion->monto_retencion }}" disabled>
                                                    <input type="hidden" name="monto_retencion" class="form-control monto_retencion_hidden" value="{{ $retencion->monto_retencion }}">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="dui_agente">DUI del agente <span class="text-danger">*</span></label>
                                                <div>
                                                    <input type="text" name="dui_agente" class="form-control" value="{{ $retencion->dui_agente }}">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Número del anexo <span class="text-danger">*</span></label>
                                                <select id="numero_anexo" class="form-control" name="numero_anexo">
                                                    <option value="7">7</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Cliente</label>
                                                <select id="select-usuario" class="form-control" name="user_id" disabled>
                                                    <option value="null">Seleccione un usuario...</option>
                                                    @foreach ($usuarios as $usuario)
                                                        @if ( $usuario->id == $retencion->user_id )
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
                        <h4>Retención de IVA del 1% efectuada al declarante</h4>
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Anexos</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Casilla 162</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Crear anexo casilla 162</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form form-validation">
                                <form class="form-casilla162" method="POST">
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="nit_agente">NIT agente <span class="text-danger">*</span></label>
                                            <div>
                                                <input type="text" name="nit_agente" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="fecha_emision">Fecha de emisión <span class="text-danger">*</span></label>
                                            <div>
                                                <input type="date" name="fecha_emision" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Tipo de documento <span class="text-danger">*</span></label>
                                            <select class="form-control" name="tipo_documento">
                                                <option selected>Seleccione...</option>
                                                <option value="05 Nota de credito">05. Nota de credito</option>
                                                <option value="06 Nota de debito">06. Nota de debito</option>
                                                <option value="07 Comprobante de retención">07. Comprobante de retención</option>
                                            </select>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="serie_documento">Serie de documento <span class="text-danger">*</span></label>
                                            <div>
                                                <input type="text" name="serie_documento" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="numero_documento">Número de documento <span class="text-danger">*</span></label>
                                            <div>
                                                <input type="text" name="numero_documento" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="monto_sujeto">Monto sujeto <span class="text-danger">*</span></label>
                                            <div>
                                                <input type="text" name="monto_sujeto" class="form-control monto_sujeto">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="monto_retencion">Monto de la retención 1%<span class="text-danger">*</span></label>
                                            <div>
                                                <input type="text" name="" class="form-control monto_retencion" disabled>
                                                <input type="hidden" name="monto_retencion" class="form-control monto_retencion_hidden">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="dui_agente">DUI del agente <span class="text-danger">*</span></label>
                                            <div>
                                                <input type="text" name="dui_agente" class="form-control">
                                            </div>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>Número del anexo <span class="text-danger">*</span></label>
                                            <select id="numero_anexo" class="form-control" name="numero_anexo">
                                                <option value="7">7</option>
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
            $(".monto_retencion").val(ivaOp.toFixed(2));
            $(".monto_retencion_hidden").val(ivaOp.toFixed(2));
        });

        $( ".form-casilla162" ).submit(function( event ) {
            event.preventDefault();
            var form = $(this);
            $.ajax({
                type: 'POST',
                url: "{{ url('add-casilla162') }}",
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

        $( ".form-casilla162-edit" ).submit(function( event ) {
            event.preventDefault();
            var form = $(this);
            let id = $("#id_casilla162").val();
            $.ajax({
                type: 'POST',
                url: "{{ url('update-casilla162') }}/"+id,
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
