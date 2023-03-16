{{-- Extends layout --}}
@extends('layout.default')



{{-- Content --}}
@section('content')

			<div class="container-fluid">
                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>Libro de compras </h4>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Libro</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Compras</a></li>
                        </ol>
                    </div>
                </div>
                <!-- row -->


                <div class="row">
					<div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Generar Libro de Compras</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="card">
                                            <div class="card-body border-5 pb-5">
                                                <form id="libro-compra-add" method="POST">
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
                                                            <button type="submit" class="btn btn-primary">Generar Libro Compras</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="table-responsive">
                                    <table id="example3" class="display" style="min-width: 845px">
                                        <thead>
                                            <tr>
                                                <th>Fecha de Emisión del documento</th>
                                                <th>Número de Documento</th>
                                                <th>Número de Registro del Contribuyente</th>
                                                <th>Nombre del Proveedor</th>
                                                <th>Compras Exentas Internas</th>
                                                <th>Importaciones e Internaciones Exentas</th>
                                                <th>Compras Internas Gravadas</th>
                                                <th>Importaciones e Internaciones Gravadas</th>
                                                <th>Crédito Fiscal</th>
                                                <th>Anticipo a Cuenta IVA Percibido</th>
                                                <th>Total de Compras</th>
                                                <th>Compras AS Sujetos Excluidos</th>
                                            </tr>
                                        </thead>
                                        <tbody class="cf-table">

                                        <tr>
                                            <td colspan='22' class='text-center'>Genere el libro de Compras...<td>
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
            //                 url: "{{ url('eliminar-cf') }}/"+id,
            //             }).done(function(data) {
            //                 if (data === true) {
            //                     Swal.fire({
            //                         title: 'Registro eliminado correctamente!!',
            //                         icon: 'success',
            //                         confirmButtonText: 'OK',
            //                     }).then((result) => {
            //                         if (result.isConfirmed) {
            //                             window.location = "consumidor-final";
            //                         }
            //                     })
            //                 }
            //             }).fail(function(data) {
            //                     sweetAlert("Oops...", "Ocurrio un error intentelo de nuevo!!", "error")
            //             });
            //         }
            //     })
            // }

            $( "#libro-compra-add" ).submit(function(event) {
                event.preventDefault();
                let form = $(this);
                let table = document.querySelector(".cf-table");
                let conten = "";
                table.innerHTML = "";

                $.ajax({
                    type: 'post',
                    url: "{{ url('/libro-compra-agregar') }}",
                    data: form.serialize(),
                }).done(function(data) {
                    console.log(data);

                    if (data.length > 0) {
                        data.forEach(element => {
                            conten += "<tr>"
                            conten += "<td>"+element.fecha_emision+"</td>"
                            conten += "<td>"+element.numero_documento+"</td>"
                            conten += "<td>"+element.nit_nrc_proveedor+"</td>"
                            conten += "<td>"+element.nombre_proveedor+"</td>"
                            conten += "<td>"+element.compras_internas_exentas+"</td>"

                            let ImpIntExentas = (element.internaciones_exentas_no_sujetas + element.importaciones_exentas_no_sujetas)

                            conten += "<td>"+ImpIntExentas+"</td>"
                            conten += "<td>"+element.compras_internas_gravadas+"</td>"

                            let ImpIntGravadas = (element.internaciones_gravadas_bienes + element.importaciones_gravadas_bienes)

                            conten += "<td>"+ImpIntGravadas+"</td>"
                            conten += "<td>"+element.credito_fiscal+"</td>"
                            conten += "<td>"+0.00+"</td>"
                            conten += "<td>"+element.total_compras+"</td>"
                            conten += "<td>"+0.00+"</td>"
                            conten += "</tr>"
                        });
                        table.insertAdjacentHTML("beforeend", conten);
                    }

                }).fail(function(data) {
                    sweetAlert("Oops...", "Ocurrio un error intentelo de nuevo!!", "error")
                });


            });



        </script>

@endsection
