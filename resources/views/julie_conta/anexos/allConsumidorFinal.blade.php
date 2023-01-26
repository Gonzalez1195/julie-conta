{{-- Extends layout --}}
@extends('layout.default')



{{-- Content --}}
@section('content')

			<div class="container-fluid">
                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>Anexo de Ventas a Consumidor Final </h4>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Anexo</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Consumidor Final</a></li>
                        </ol>
                    </div>
                </div>
                <!-- row -->


                <div class="row">
					<div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Anexo Consumidor Final</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example3" class="display" style="min-width: 845px">
                                        <thead>
                                            <tr>
                                                <th>Fecha de Emisión</th>
                                                <th>Clase de documento</th>
                                                <th>Tipo de documento</th>
                                                <th>Número de resolución</th>
                                                <th>Serie del documento</th>
                                                <th>Número de control interno DEL</th>
                                                <th>Número de control interno AL</th>
                                                <th>Número de documento (DEL)</th>
                                                <th>Número de documento (AL)</th>
                                                <th>Número de maquina registradora</th>
                                                <th>Ventas exentas</th>
                                                <th>Ventas internas exentas no sujetas a proporcionalidad</th>
                                                <th>Ventas no sujetas</th>
                                                <th>Ventas gravadas locales</th>
                                                <th>Exportaciones dentro del área de Centroamérica</th>
                                                <th>Exportaciones fuera del área de Centroamérica</th>
                                                <th>Exportaciones de servicio</th>
                                                <th>Ventas a zonas francas y DPA (Tasa cero)</th>
                                                <th>Ventas a cuenta de terceros no domiciliados</th>
                                                <th>Total de ventas</th>
                                                <th>Numero del anexo</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($consumidores as $consumidor)

                                                <tr>
                                                    <td>{{ $consumidor->fecha_emision }}</td>
                                                    <td>{{ $consumidor->clase_documento }}</td>
                                                    <td>{{ $consumidor->tipo_documento }}</td>
                                                    <td>{{ $consumidor->numero_resolucion }}</td>
                                                    <td>{{ $consumidor->serie_documento }}</td>
                                                    <td>{{ $consumidor->num_cont_int_del }}</td>
                                                    <td>{{ $consumidor->num_cont_int_al }}</td>
                                                    <td>{{ $consumidor->num_documento_del }}</td>
                                                    <td>{{ $consumidor->num_documento_al }}</td>
                                                    <td>{{ $consumidor->num_maquina_registradora }}</td>
                                                    <td>{{ number_format($consumidor->ventas_exentas, 2, '.', ',') }}</td>
                                                    <td>{{ number_format($consumidor->ventas_int_exentas_no_suj_proporcionalidad, 2, '.', ',') }}</td>
                                                    <td>{{ number_format($consumidor->ventas_no_sujetas, 2, '.', ',') }}</td>
                                                    <td>{{ number_format($consumidor->ventas_gravadas_locales, 2, '.', ',') }}</td>
                                                    <td>{{ number_format($consumidor->exp_adentro_area_ca, 2, '.', ',') }}</td>
                                                    <td>{{ number_format($consumidor->exp_fuera_area_ca, 2, '.', ',') }}</td>
                                                    <td>{{ number_format($consumidor->exp_servicio, 2, '.', ',') }}</td>
                                                    <td>{{ number_format($consumidor->ventas_zonas_francas_dpa, 2, '.', ',') }}</td>
                                                    <td>{{ number_format($consumidor->ventas_cuenta_terc_no_domiciliados, 2, '.', ',') }}</td>
                                                    <td>{{ number_format($consumidor->total_ventas, 2, '.', ',') }}</td>
                                                    <td>{{ $consumidor->numero_anexo }}</td>

                                                    <td>
                                                        <div class="d-flex">
                                                            <a href="{{ url('/editar-cf/'.$consumidor->id) }}" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                                                            <a href="#" onclick="eliminar({{ $consumidor->id }})" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>

                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

@endsection
@section('scripts')

        <script>
            function eliminar(id) {
                Swal.fire({
                    title: '¿Seguro que desea eliminar el registro?',
                    text: "No habra marcha atras",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, eliminar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: 'GET',
                            url: "{{ url('eliminar-cf') }}/"+id,
                        }).done(function(data) {
                            if (data === true) {
                                Swal.fire({
                                    title: 'Registro eliminado correctamente!!',
                                    icon: 'success',
                                    confirmButtonText: 'OK',
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        window.location = "consumidor-final";
                                    }
                                })
                            }
                        }).fail(function(data) {
                                sweetAlert("Oops...", "Ocurrio un error intentelo de nuevo!!", "error")
                        });
                    }
                })
            }
        </script>

@endsection
