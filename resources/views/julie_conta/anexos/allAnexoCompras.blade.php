{{-- Extends layout --}}
@extends('layout.default')



{{-- Content --}}
@section('content')

			<div class="container-fluid">
                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>Anexo de compras </h4>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Anexo</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Compras</a></li>
                        </ol>
                    </div>
                </div>
                <!-- row -->


                <div class="row">
					<div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Anexo de Compras</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="card">
                                            <div class="card-body border-5 pb-5">
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label>Usuario</label>
                                                        <select id="select-usuario" class="form-control">
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
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="table-responsive">
                                    <table id="example3" class="display" style="min-width: 845px; font-size: 13px;">
                                        <thead>
                                            <tr>
                                                <th>Fecha de Emisión del documento</th>
                                                <th>Clase de documento</th>
                                                <th>Tipo de documento</th>
                                                <th>Número de documento</th>
                                                <th>NIT o NRC del proveedor</th>
                                                <th>Nombre del proveedor</th>
                                                <th>Compras internas exentas</th>
                                                <th>Internaciones exentas y/o no sujetas</th>
                                                <th>Importaciones exentas y/o no sujetas</th>
                                                <th>Compras internas gravadas</th>
                                                <th>Internaciones gravadas de bienes</th>
                                                <th>Importaciones gravadas de bienes</th>
                                                <th>Importaciones gravadas de servicio</th>
                                                <th>Crédito Fiscal</th>
                                                <th>Total de compras</th>
                                                <th>DUI del proveedor</th>
                                                <th>Numero del anexo</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody class="cf-table">

                                            @if (isset($compras))
                                                @foreach ($compras as $compra)

                                                    <tr>
                                                        <td>{{ $compra->fecha_emision }}</td>
                                                        <td>{{ $compra->clase_documento }}</td>
                                                        <td>{{ $compra->tipo_documento }}</td>
                                                        <td>{{ $compra->numero_documento }}</td>
                                                        <td>{{ $compra->nit_nrc_proveedor }}</td>
                                                        <td>{{ $compra->nombre_proveedor }}</td>
                                                        <td>{{ number_format($compra->compras_internas_exentas, 2, '.', ',') }}</td>
                                                        <td>{{ number_format($compra->internaciones_exentas_no_sujetas, 2, '.', ',') }}</td>
                                                        <td>{{ number_format($compra->importaciones_exentas_no_sujetas, 2, '.', ',') }}</td>
                                                        <td>{{ number_format($compra->compras_internas_gravadas, 2, '.', ',') }}</td>
                                                        <td>{{ number_format($compra->internaciones_gravadas_bienes, 2, '.', ',') }}</td>
                                                        <td>{{ number_format($compra->importaciones_gravadas_bienes, 2, '.', ',') }}</td>
                                                        <td>{{ number_format($compra->importaciones_gravadas_servicios, 2, '.', ',') }}</td>
                                                        <td>{{ number_format($compra->credito_fiscal, 2, '.', ',') }}</td>
                                                        <td>{{ number_format($compra->total_compras, 2, '.', ',') }}</td>
                                                        <td>{{ $compra->dui_proveedor }}</td>
                                                        <td>{{ $compra->numero_anexo }}</td>

                                                        <td>
                                                            <div class="d-flex">
                                                                <a href="{{ url('/anexo-compras-editar/'.$compra->id) }}" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                                                                <a href="#" onclick="eliminar({{ $compra->id }})" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                                                            </div>
                                                        </td>
                                                    </tr>

                                                @endforeach
                                            @else
                                                <tr>
                                                    <td colspan='22' class='text-center'>No se encontraron registros...<td>
                                                </tr>
                                            @endif

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

            $( "#select-usuario" ).change(function() {
                let idUsu = $( this ).val();
                let dateHasta = document.getElementById( "filterHasta" );
                let dateDesde = document.getElementById( "filterDesde" );
                let table = document.querySelector(".cf-table");
                let conten = "";

                dateHasta.value = "";
                dateDesde.value = "";
                if (dateHasta.type === 'date') {
                    dateHasta.type = 'text';
                    dateHasta.type = 'date';
                }

                if (dateDesde.type === 'date') {
                    dateDesde.type = 'text';
                    dateDesde.type = 'date';
                }

                $.ajax({
                    type: 'GET',
                    url: '{{ url("buscar-ac-usuario") }}',
                    data: { 'id': idUsu },
                }).done(function(data) {

                    const url = "<?php echo url('/editar-cf/'); ?>";
                    table.innerHTML = "";
                    if (data.length > 0) {
                        data.forEach(element => {

                            let nitProveedor = "";
                            let duiProveedor = "";
                            if ( element.nit_nrc_proveedor != null && element.nit_nrc_proveedor != "" ) {
                                nitProveedor = element.nit_nrc_proveedor;
                            }

                            if ( element.dui_proveedor != null && element.dui_proveedor != "" ) {
                                duiProveedor = element.dui_proveedor;
                            }

                            conten += "<tr>"
                            conten += "<td>"+element.fecha_emision+"</td>"
                            conten += "<td>"+element.clase_documento+"</td>"
                            conten += "<td>"+element.tipo_documento+"</td>"
                            conten += "<td>"+element.numero_documento+"</td>"
                            conten += "<td>"+nitProveedor+"</td>"
                            conten += "<td>"+element.nombre_proveedor+"</td>"
                            conten += "<td>"+Number(element.compras_internas_exentas).toFixed(2)+"</td>"
                            conten += "<td>"+Number(element.internaciones_exentas_no_sujetas).toFixed(2)+"</td>"
                            conten += "<td>"+Number(element.importaciones_exentas_no_sujetas).toFixed(2)+"</td>"
                            conten += "<td>"+Number(element.compras_internas_gravadas).toFixed(2)+"</td>"
                            conten += "<td>"+Number(element.internaciones_gravadas_bienes).toFixed(2)+"</td>"
                            conten += "<td>"+Number(element.importaciones_gravadas_bienes).toFixed(2)+"</td>"
                            conten += "<td>"+Number(element.importaciones_gravadas_servicios).toFixed(2)+"</td>"
                            conten += "<td>"+Number(element.credito_fiscal).toFixed(2)+"</td>"
                            conten += "<td>"+Number(element.total_compras).toFixed(2)+"</td>"
                            conten += "<td>"+duiProveedor+"</td>"
                            conten += "<td>"+element.numero_anexo+"</td>"
                            conten += `<td><div class='d-flex'>
                                            <a href="${url+"/"+element.id}" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                                            <a href="#" onclick="eliminar(${element.id})" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                                        </div></td>`
                            conten += "</tr>"
                        });

                    }else{
                        conten += "<tr>"
                        conten += "<td colspan='22' class='text-center'>No se encontraron registros...<td>"
                        conten += "</tr>"
                    }

                    table.insertAdjacentHTML("beforeend", conten);

                }).fail(function(data) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: data
                    })
                });

            });

            $("#filterHasta").change(function() {
                let dateHasta = $( this ).val();
                let dateDesde = $( "#filterDesde" ).val();
                let usuario = $("#select-usuario").val();
                let table = document.querySelector(".cf-table");
                let conten = "";
                table.innerHTML = "";

                let d = new Date(dateDesde);
                let h = new Date(dateHasta);

                let d2 = new Date(d.getFullYear(), d.getMonth(), d.getDate());
                let h2 = new Date(h.getFullYear(), h.getMonth(), h.getDate());

                if ( d2 <= h2 ) {

                    $.ajax({
                        type: 'GET',
                        url: '{{ url("buscar-ac-fechas") }}',
                        data: { 'fecha1': dateDesde, 'fecha2': dateHasta, 'usuario': usuario },
                    }).done(function(data) {

                        const url = "<?php echo url('/editar-cf/'); ?>";
                        table.innerHTML = "";
                        if (data.length > 0) {
                            data.forEach(element => {

                                let nitProveedor = "";
                                let duiProveedor = "";
                                if ( element.nit_nrc_proveedor != null && element.nit_nrc_proveedor != "" ) {
                                    nitProveedor = element.nit_nrc_proveedor;
                                }

                                if ( element.dui_proveedor != null && element.dui_proveedor != "" ) {
                                    duiProveedor = element.dui_proveedor;
                                }

                                conten += "<tr>"
                                conten += "<td>"+element.fecha_emision+"</td>"
                                conten += "<td>"+element.clase_documento+"</td>"
                                conten += "<td>"+element.tipo_documento+"</td>"
                                conten += "<td>"+element.numero_documento+"</td>"
                                conten += "<td>"+nitProveedor+"</td>"
                                conten += "<td>"+element.nombre_proveedor+"</td>"
                                conten += "<td>"+Number(element.compras_internas_exentas).toFixed(2)+"</td>"
                                conten += "<td>"+Number(element.internaciones_exentas_no_sujetas).toFixed(2)+"</td>"
                                conten += "<td>"+Number(element.importaciones_exentas_no_sujetas).toFixed(2)+"</td>"
                                conten += "<td>"+Number(element.compras_internas_gravadas).toFixed(2)+"</td>"
                                conten += "<td>"+Number(element.internaciones_gravadas_bienes).toFixed(2)+"</td>"
                                conten += "<td>"+Number(element.importaciones_gravadas_bienes).toFixed(2)+"</td>"
                                conten += "<td>"+Number(element.importaciones_gravadas_servicios).toFixed(2)+"</td>"
                                conten += "<td>"+Number(element.credito_fiscal).toFixed(2)+"</td>"
                                conten += "<td>"+Number(element.total_compras).toFixed(2)+"</td>"
                                conten += "<td>"+duiProveedor+"</td>"
                                conten += "<td>"+element.numero_anexo+"</td>"
                                conten += `<td><div class='d-flex'>
                                                <a href="${url+"/"+element.id}" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                                                <a href="#" onclick="eliminar(${element.id})" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                                            </div></td>`
                                conten += "</tr>"
                            });

                        }else{
                            conten += "<tr>"
                            conten += "<td colspan='22' class='text-center'>No se encontraron registros...<td>"
                            conten += "</tr>"
                        }

                        table.insertAdjacentHTML("beforeend", conten);

                    }).fail(function(data) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: data
                        })
                    });

                }else{
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'El campo "Hasta" debe ser mayor que el campo "Desde"'
                    })
                }

            });





        </script>

@endsection
