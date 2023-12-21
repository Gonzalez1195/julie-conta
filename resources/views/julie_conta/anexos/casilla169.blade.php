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
                        <h4>Percepción de IVA del 1% efectuada por el declarante</h4>
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Anexos</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Casilla 169</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Editar anexo casilla 169</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form form-validation">
                                @foreach ($percepciones as $percepcion)
                                    <form class="form-casilla169-edit" method="POST">
                                        @csrf
                                        <input type="hidden" name="id_casilla169" id="id_casilla169" value="{{ $percepcion->id }}">
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="nit_sujeto">NIT sujeto <span class="text-danger">*</span></label>
                                                <div>
                                                    <input type="text" name="nit_sujeto" class="form-control" value="{{ $percepcion->nit_sujeto }}">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="fecha_emision">Fecha de emisión <span class="text-danger">*</span></label>
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
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="numero_resolucion">Número de resolución <span class="text-danger">*</span></label>
                                                <div>
                                                    <input type="text" name="numero_resolucion" class="form-control" value="{{ $percepcion->numero_resolucion }}">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="serie_documento">Serie de documento <span class="text-danger">*</span></label>
                                                <div>
                                                    <input type="text" name="serie_documento" class="form-control" value="{{ $percepcion->serie_documento }}">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="numero_documento">Número de documento <span class="text-danger">*</span></label>
                                                <div>
                                                    <input type="text" name="numero_documento" class="form-control" value="{{ $percepcion->numero_documento }}">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="monto_sujeto">Monto sujeto <span class="text-danger">*</span></label>
                                                <div>
                                                    <input type="text" name="monto_sujeto" class="form-control monto_sujeto" value="{{ $percepcion->monto_sujeto }}">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="monto_percepcion">Monto de la percepción 1% de IVA<span class="text-danger">*</span></label>
                                                <div>
                                                    <input type="text" name="" class="form-control monto_percepcion" value="{{ $percepcion->monto_percepcion }}" disabled>
                                                    <input type="hidden" name="monto_percepcion" class="form-control monto_percepcion_hidden" value="{{ $percepcion->monto_percepcion }}">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="dui_agente">DUI sujeto <span class="text-danger">*</span></label>
                                                <div>
                                                    <input type="text" name="dui_agente" class="form-control" value="{{ $percepcion->dui_agente }}">
                                                </div>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label>Número del anexo <span class="text-danger">*</span></label>
                                                <select id="numero_anexo" class="form-control" name="numero_anexo">
                                                    <option value="9">9</option>
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
                        <h4>Percepción de IVA del 1% efectuada por el declarante</h4>
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Anexos</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Casilla 169</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Crear anexo casilla 169</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form form-validation">
                                <form class="form-casilla169" method="POST">
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="nit_sujeto">NIT sujeto <span class="text-danger">*</span></label>
                                            <div>
                                                <input type="text" name="nit_sujeto" class="form-control">
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
                                                <option value="03 Comprobante de crédito fiscal">03. Comprobante de crédito fiscal</option>
                                                <option value="05 Nota de crédito">05. Nota de crédito</option>
                                                <option value="06 Nota de débito">06. Nota de débito</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="numero_resolucion">Número de resolución <span class="text-danger">*</span></label>
                                            <div>
                                                <input type="text" name="numero_resolucion" class="form-control">
                                            </div>
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
                                            <label for="monto_percepcion">Monto de la percepción 1% de IVA<span class="text-danger">*</span></label>
                                            <div>
                                                <input type="text" name="" class="form-control monto_percepcion" disabled>
                                                <input type="hidden" name="monto_percepcion" class="form-control monto_percepcion_hidden">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="dui_agente">DUI sujeto <span class="text-danger">*</span></label>
                                            <div>
                                                <input type="text" name="dui_agente" class="form-control">
                                            </div>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>Número del anexo <span class="text-danger">*</span></label>
                                            <select id="numero_anexo" class="form-control" name="numero_anexo">
                                                <option value="9">9</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Cliente</label>
                                            <select id="select-usuario" class="form-control" name="user_id">
                                                <option value="null">Seleccione un usuario...</option>
                                                @foreach ($usuario)
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

        $( "." ).submit(function( event ) {
            event.preventDefault();
            var form = $(this);
            $.ajax({
                type: 'POST',
                url: "{{ url('') }}",
                data: form.serialize()
            }).done(function(data) {
                console.log(data);
                if (data === true) {
                    swal("Exito!!", "Datos guardados correctamente!!", "success")
                    form[0].reset();
                }
            }).fail(function(data) {
                    sweetAlert("Oops...", "Ocurrio un error intentelo de nuevo!!", "error")
            });
            return this;
        });

        $( "." ).submit(function( event ) {
            event.preventDefault();
            var form = $(this);
            let id = $("#").val();
            $.ajax({
                type: 'POST',
                url: "{{ url('') }}/"+id,
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
