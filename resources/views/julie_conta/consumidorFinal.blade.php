{{-- Extends layout --}}
@extends('layout.default')



{{-- Content --}}
@section('content')

            {{-- @if (isset($usuarios)) --}}

                <div class="container-fluid">
                    <div class="row page-titles mx-0">
                        <div class="col-sm-6 p-md-0">
                            <div class="welcome-text">
                                <h4>Editar Usuario</h4>
                                <span>Formulario</span>
                            </div>
                        </div>
                        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Editar</a></li>
                                <li class="breadcrumb-item active"><a href="javascript:void(0)">Usuario</a></li>
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

                                        {{-- @foreach ($usuarios as $usu)
                                            <form class="form-usuarios-edit" method="POST">
                                                @csrf
                                                <input type="hidden" value="{{ $usu->usuario->id }}" id="id-usu">
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label for="name">Nombre <span class="text-danger">*</span></label>
                                                        <div>
                                                            <input type="text" class="form-control" name="name" id="name" value="{{ $usu->usuario->name }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="email">Email <span class="text-danger">*</span></label>
                                                        <div>
                                                            <input type="email" class="form-control" placeholder="example@hotmail.com" name="email" id="email" value="{{ $usu->usuario->email }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="password">Password <span class="text-danger">*</span></label>
                                                        <div>
                                                            <input type="password" class="form-control" name="password" id="password">
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="passwordConfi">Confirmar Password <span class="text-danger">*</span></label>
                                                        <div>
                                                            <input type="password" class="form-control" name="passwordConfi" id="passwordConfi">
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>Telefono</label>
                                                        <input type="text" class="form-control" name="telefono" id="tel" placeholder="00000000" value="{{ $usu->telefono }}">
                                                    </div>

                                                    <div class="form-group col-md-4">
                                                        <label>Tipo de usuario</label>
                                                        <select id="inputState" class="form-control" name="tipoUsu">
                                                            <option selected>Choose...</option>
                                                            <option>Option 1</option>
                                                            <option>Option 2</option>
                                                            <option>Option 3</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Agregar</button>
                                            </form>
                                    @endforeach --}}
                                </div>
                            </div>
                        </div>
					</div>
                </div>
            </div>
            {{-- @else --}}
                <div class="container-fluid">
                    <div class="row page-titles mx-0">
                        <div class="col-sm-6 p-md-0">
                            <div class="welcome-text">
                                <h4>Nuevo Consumidor Final</h4>
                                <span>Formulario</span>
                            </div>
                        </div>
                        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Agregar</a></li>
                                <li class="breadcrumb-item active"><a href="javascript:void(0)">Consumidor Final</a></li>
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
                                        <form class="form-usuarios" method="POST">
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
                                                        <option>Option 1</option>
                                                        <option>Option 2</option>
                                                        <option>Option 3</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Clase de documento <span class="text-danger">*</span></label>
                                                    <select id="tipo_documento" class="form-control" name="tipo_documento">
                                                        <option selected>Seleccione...</option>
                                                        <option>Option 1</option>
                                                        <option>Option 2</option>
                                                        <option>Option 3</option>
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
                                                    <label>Clase de documento <span class="text-danger">*</span></label>
                                                    <select id="numero_anexo" class="form-control" name="numero_anexo">
                                                        <option selected>Seleccione...</option>
                                                        <option>2</option>
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
            {{-- @endif --}}



@endsection
@section('scripts')

    <script>

        $( ".form-usuarios" ).submit(function( event ) {
            event.preventDefault();
            var form = $(this);
            $.ajax({
                type: 'POST',
                url: "{{ url('crear-usuario') }}",
                data: form.serialize()
            }).done(function(data) {
                if (data === true) {
                    swal("Exito!!", "Datos guardados correctamente!!", "success")
                    form[0].reset();
                }
            }).fail(function(data) {
                    sweetAlert("Oops...", "Ocurrio un error intentelo de nuevo!!", "error")
            });
            return this;
        });

        $( ".form-usuarios-edit" ).submit(function( event ) {
            event.preventDefault();
            var form = $(this);
            let id = $("#id-usu").val();
            $.ajax({
                type: 'POST',
                url: "{{ url('update-usuario') }}/"+id,
                data: form.serialize()
            }).done(function(data) {
                if (data === true) {

                    Swal.fire({
                        title: 'Datos guardados correctamente!!',
                        icon: 'success',
                        confirmButtonText: 'OK',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location = "../usuarios";
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


