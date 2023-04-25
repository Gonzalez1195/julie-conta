{{-- Extends layout --}}
@extends('layout.default')



{{-- Content --}}
@section('content')

			<div class="container-fluid">
                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>Libro de ventas a contribuyentes </h4>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Libro</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Contribuyentes</a></li>
                        </ol>
                    </div>
                </div>
                <!-- row -->


                <div class="row">
					<div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Libro de ventas a contribuyentes</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="card">
                                            <div class="card-body border-5 pb-5">
                                                <form id="libro-contribuyentes-add" method="POST">
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
                                                <th>Fecha de Emisión del documento</th>
                                                <th>Número de correlativo preimpreso</th>
                                                <th>Número de control interno sistema formulario único</th>
                                                <th>Nombre del cliente mandante o mandatario</th>
                                                <th>NRC del cliente</th>
                                                <th>Ventas exentas</th>
                                                <th>Ventas internas gravadas</th>
                                                <th>Débito fiscal</th>
                                                <th>Ventas exentas a cuenta de terceros</th>
                                                <th>Ventas internas gravadas a cuenta de terceros</th>
                                                <th>Débito fiscal por cuenta de terceros</th>
                                                <th>IVA percibido</th>
                                                <th>Total</th>
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

            $( "#libro-contribuyentes-add" ).submit(function(event) {
                event.preventDefault();
                let form = $(this);
                let table = document.querySelector(".contribuyentes-table");
                let conten = "";
                table.innerHTML = "";

                $.ajax({
                    type: 'post',
                    url: "{{ url('/libro-contribuyentes-agregar') }}",
                    data: form.serialize(),
                }).done(function(data) {

                    if (data.length > 0) {
                        data.forEach(element => {

                            let nrc_cliente = "";

                            if ( element.nit_nrc_cliente != null && element.nit_nrc_cliente != "" ) {
                                nrc_cliente = element.nit_nrc_cliente;
                            }

                            conten += "<tr>"
                            conten += "<td>"+element.fecha_emision+"</td>"
                            conten += "<td>"+element.num_cont_int_del+"</td>"
                            conten += "<td>"+element.num_cont_int_al+"</td>"
                            conten += "<td>"+element.nombre_razonsocial_denominacion+"</td>"
                            conten += "<td>"+nrc_cliente+"</td>"
                            conten += "<td>"+Number(element.ventas_exentas).toFixed(2)+"</td>"
                            conten += "<td>"+Number(element.ventas_gravadas_locales).toFixed(2)+"</td>"
                            conten += "<td>"+Number(element.debito_fiscal).toFixed(2)+"</td>"
                            conten += "<td>"+Number(0).toFixed(2)+"</td>"
                            conten += "<td>"+Number(element.ventas_cuenta_terc_no_domiciliados).toFixed(2)+"</td>"
                            conten += "<td>"+Number(element.debito_fiscal_ventas_a_cuenta_terceros).toFixed(2)+"</td>"
                            conten += "<td>"+Number(0).toFixed(2)+"</td>"
                            conten += "<td>"+Number(element.total_ventas).toFixed(2)+"</td>"

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
