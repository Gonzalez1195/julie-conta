{{-- Extends layout --}}
@extends('layout.default')



{{-- Content --}}
@section('content')

			<div class="container-fluid">
                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>Libro de ventas a consumidores </h4>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Libro</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">consumidores</a></li>
                        </ol>
                    </div>
                </div>
                <!-- row -->


                <div class="row">
					<div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Libro de ventas a consumidores</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="card">
                                            <div class="card-body border-5 pb-5">
                                                <form id="libro-consumidores-add" method="POST">
                                                    @csrf
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label>Usuario</label>
                                                            <select id="select-usuario" class="form-control" name="usuario">
                                                                <option value="null">Seleccione un usuario...</option>
                                                                @foreach ($usuarios as $usuario)
                                                                    <option value="{{ $usuario->id }}">{{ $usuario->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label>Desde</label>
                                                            <input type="date" name="filterDesde" id="filterDesde" class="form-control">
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label>Hasta</label>
                                                            <input type="date" name="filterHasta" id="filterHasta" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group">
                                                            <button type="submit" class="btn btn-primary">Generar Libro de ventas a contribuyentes</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="table-responsive">
                                    <table id="example3" class="display" style="min-width: 845px; font-size: 13px;">
                                        <thead>
                                            <tr>
                                                <th>Día</th>
                                                <th>Documento emitido (DEL)</th>
                                                <th>Documento emitido (AL)</th>
                                                <th>N° de caja o sistema computarizado</th>
                                                <th>Ventas Exentas</th>
                                                <th>Ventas Internas Gravadas</th>
                                                <th>Exportaciones</th>
                                                <th>Total de ventas diarias Propias</th>
                                                <th>Ventas a cuentas de Terceros</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody class="contribuyentes-table">

                                            <tr>
                                                <td colspan='22' class='text-center'>Genere el Libro de ventas a contribuyentes...<td>
                                            </tr>

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
            // function eliminar(id) {
            //     Swal.fire({
            //         title: '¿Seguro que desea eliminar el registro?',
            //         text: "No habra marcha atras",
            //         icon: 'warning',
            //         showCancelButton: true,
            //         confirmButtonColor: '#3085d6',
            //         cancelButtonColor: '#d33',
            //         confirmButtonText: 'Si, eliminar'
            //     }).then((result) => {
            //         if (result.isConfirmed) {
            //             $.ajax({
            //                 type: 'GET',
            //                 url: "{{ url('eliminar-contribuyentes') }}/"+id,
            //             }).done(function(data) {
            //                 if (data === true) {
            //                     Swal.fire({
            //                         title: 'Registro eliminado correctamente!!',
            //                         icon: 'success',
            //                         confirmButtonText: 'OK',
            //                     }).then((result) => {
            //                         if (result.isConfirmed) {
            //                             window.location = "anexo-contribuyentes";
            //                         }
            //                     })
            //                 }
            //             }).fail(function(data) {
            //                     sweetAlert("Oops...", "Ocurrio un error intentelo de nuevo!!", "error")
            //             });
            //         }
            //     })
            // }

            $( "#libro-consumidores-add" ).submit(function(event) {
                event.preventDefault();
                let form = $(this);
                let table = document.querySelector(".contribuyentes-table");
                let conten = "";
                table.innerHTML = "";

                $.ajax({
                    type: 'post',
                    url: "{{ url('/libro-cf-agregar') }}",
                    data: form.serialize(),
                }).done(function(data) {

                    if (data.length > 0) {
                        data.forEach(element => {

                            let num_registradora = "";
                            let exportaciones = (element.exp_adentro_area_ca + element.exp_fuera_area_ca + element.exp_servicio);

                            if ( element.num_maquina_registradora != null && element.num_maquina_registradora != "" ) {
                                num_registradora = element.num_maquina_registradora;
                            }

                            conten += "<tr>"
                            conten += "<td>"+element.fecha_emision+"</td>"
                            conten += "<td>"+element.num_documento_del+"</td>"
                            conten += "<td>"+element.num_documento_al+"</td>"
                            conten += "<td>"+num_registradora+"</td>"
                            conten += "<td>"+Number(element.ventas_exentas).toFixed(2)+"</td>"
                            conten += "<td>"+Number(element.ventas_gravadas_locales).toFixed(2)+"</td>"
                            conten += "<td>"+Number(exportaciones).toFixed(2)+"</td>"
                            conten += "<td>"+Number(element.total_ventas).toFixed(2)+"</td>"
                            conten += "<td>"+Number(element.ventas_cuenta_terc_no_domiciliados).toFixed(2)+"</td>"

                            conten += "</tr>"
                        });
                    }else{
                        conten += "<tr>"
                            conten += "<td colspan='22' class='text-center'>No se encontraron registros...</td>"
                        conten += "</tr>"
                    }
                    table.insertAdjacentHTML("beforeend", conten);

                }).fail(function(data) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Vuelve a intentarlo...'
                    })
                });


            });





        </script>

@endsection
