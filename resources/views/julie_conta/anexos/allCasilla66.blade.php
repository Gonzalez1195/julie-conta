{{-- Extends layout --}}
@extends('layout.default')



{{-- Content --}}
@section('content')

			<div class="container-fluid">
                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>Anexo </h4>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Anexo</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Casilla 66</a></li>
                        </ol>
                    </div>
                </div>
                <!-- row -->


                <div class="row">
					<div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Compras a Sujetos excluídos</h4>
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
                                                <th>Tipo de documento</th>
                                                <th>Número de NIT, DUI u Otro documento</th>
                                                <th>Nombre, Razón social o Denominación</th>
                                                <th>Fecha de emisión del documento</th>
                                                <th>Número de serie del documento</th>
                                                <th>Número de documento</th>
                                                <th>Monto de la operación</th>
                                                <th>Monto de la retención del IVA 13%</th>
                                                <th>Número del anexo</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody class="cf-table">

                                            @if (isset($compras))
                                                @foreach ($compras as $compra)

                                                    <tr>
                                                        <td>{{ $compra->tipo_documento }}</td>
                                                        <td>{{ $compra->numero_nit_dui_otro }}</td>
                                                        <td>{{ $compra->nombre_razonsocial_denominacion }}</td>
                                                        <td>{{ $compra->fecha_emision_documento }}</td>
                                                        <td>{{ $compra->numero_serie_documento }}</td>
                                                        <td>{{ $compra->numero_documento }}</td>
                                                        <td>{{ number_format($compra->monto_operacion, 2, '.', ',') }}</td>
                                                        <td>{{ number_format($compra->monto_retencion_iva, 2, '.', ',') }}</td>
                                                        <td>{{ $compra->numero_anexo }}</td>

                                                        <td>
                                                            <div class="d-flex">
                                                                <a href="{{ url('/anexo-casilla-66-editar/'.$compra->id) }}" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
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
                            url: "{{ url('delete-casilla66') }}/"+id,
                        }).done(function(data) {
                            if (data === true) {
                                Swal.fire({
                                    title: 'Registro eliminado correctamente!!',
                                    icon: 'success',
                                    confirmButtonText: 'OK',
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        window.location = "../anexo-casilla-66";
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
                    url: '{{ url("search-usuario-casillla66") }}',
                    data: { 'id': idUsu },
                }).done(function(data) {

                    const url = "<?php echo url('/anexo-casilla-66-editar/'); ?>";
                    table.innerHTML = "";
                    if (data.length > 0) {
                        data.forEach(element => {

                            let numDocumento = "";
                            if ( element.numero_serie_documento != null && element.numero_serie_documento != "" ) {
                                numDocumento = element.numero_serie_documento;
                            }

                            conten += "<tr>"
                            conten += "<td>"+element.tipo_documento+"</td>"
                            conten += "<td>"+element.numero_nit_dui_otro+"</td>"
                            conten += "<td>"+element.nombre_razonsocial_denominacion+"</td>"
                            conten += "<td>"+element.fecha_emision_documento+"</td>"
                            conten += "<td>"+numDocumento+"</td>"
                            conten += "<td>"+element.numero_documento+"</td>"
                            conten += "<td>"+Number(element.monto_operacion).toFixed(2)+"</td>"
                            conten += "<td>"+Number(element.monto_retencion_iva).toFixed(2)+"</td>"
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
                        url: '{{ url("search-date-casillla66") }}',
                        data: { 'fecha1': dateDesde, 'fecha2': dateHasta, 'usuario': usuario },
                    }).done(function(data) {

                        const url = "<?php echo url('/anexo-casilla-66-editar/'); ?>";
                    table.innerHTML = "";
                    if (data.length > 0) {
                        data.forEach(element => {

                            let numDocumento = "";
                            if ( element.numero_serie_documento != null && element.numero_serie_documento != "" ) {
                                numDocumento = element.numero_serie_documento;
                            }

                            conten += "<tr>"
                            conten += "<td>"+element.tipo_documento+"</td>"
                            conten += "<td>"+element.numero_nit_dui_otro+"</td>"
                            conten += "<td>"+element.nombre_razonsocial_denominacion+"</td>"
                            conten += "<td>"+element.fecha_emision_documento+"</td>"
                            conten += "<td>"+numDocumento+"</td>"
                            conten += "<td>"+element.numero_documento+"</td>"
                            conten += "<td>"+Number(element.monto_operacion).toFixed(2)+"</td>"
                            conten += "<td>"+Number(element.monto_retencion_iva).toFixed(2)+"</td>"
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
