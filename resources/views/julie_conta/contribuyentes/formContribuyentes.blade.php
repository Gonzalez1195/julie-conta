{{-- Extends layout --}}
@extends('layout.default')



{{-- Content --}}
@section('content')

            @if (isset($contribuyentes))

                <div class="container-fluid">
                    <div class="row page-titles mx-0">
                        <div class="col-sm-6 p-md-0">
                            <div class="welcome-text">
                                <h4>Editar Contribuyente</h4>
                            </div>
                        </div>
                        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Editar</a></li>
                                <li class="breadcrumb-item active"><a href="javascript:void(0)">Contribuyente</a></li>
                            </ol>
                        </div>
                    </div>
                    <!-- row -->
                    <div class="row">
                        <div class="col-xl-12 col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Editar Contribuyente</h4>
                                </div>
                                <div class="card-body">
                                    <div class="basic-form form-validation">

                                        @foreach ($contribuyentes as $contribuyente)
                                            <form class="form-contribuyentes-edit" method="POST">
                                                @csrf
                                                <input type="hidden" value="{{ $contribuyente->id }}" id="id-contribuyente">
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label for="name">Nombre del contribuyente <span class="text-danger">*</span></label>
                                                        <div>
                                                            <input type="text" class="form-control" name="name" id="name" value="{{ $contribuyente->nombre }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="nrc_nit">NRC o NIT</label>
                                                        <div>
                                                            <input type="text" class="form-control" name="nrc_nit" id="nrc_nit" value="{{ $contribuyente->nrc_nit }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="dui">DUI</label>
                                                        <div>
                                                            <input type="text" class="form-control" name="dui" id="dui" value="{{ $contribuyente->dui }}">
                                                        </div>
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
                <div class="container-fluid">
                    <div class="row page-titles mx-0">
                        <div class="col-sm-6 p-md-0">
                            <div class="welcome-text">
                                <h4>Nuevo Contribuyente</h4>
                            </div>
                        </div>
                        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Registrar</a></li>
                                <li class="breadcrumb-item active"><a href="javascript:void(0)">Contribuyente</a></li>
                            </ol>
                        </div>
                    </div>
                    <!-- row -->
                    <div class="row">
                        <div class="col-xl-12 col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Crear Contribuyente</h4>
                                </div>
                                <div class="card-body">
                                    <div class="basic-form form-validation">
                                        <form class="form-contribuyentes" method="POST">
                                            @csrf
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="name">Nombre del contribuyente <span class="text-danger">*</span></label>
                                                    <div>
                                                        <input type="text" class="form-control" name="name" id="name">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="nrc_nit">NRC o NIT</label>
                                                    <div>
                                                        <input type="text" class="form-control" name="nrc_nit" id="nrc_nit">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="dui">DUI</label>
                                                    <div>
                                                        <input type="text" class="form-control" name="dui" id="dui" placeholder="000000000">
                                                    </div>
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

        $( ".form-contribuyentes" ).submit(function( event ) {
            event.preventDefault();
            var form = $(this);
            $.ajax({
                type: 'POST',
                url: "{{ url('add-contribuyente') }}",
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

        $( ".form-contribuyentes-edit" ).submit(function( event ) {
            event.preventDefault();
            var form = $(this);
            let id = $("#id-contribuyente").val();
            $.ajax({
                type: 'POST',
                url: "{{ url('update-contribuyente') }}/"+id,
                data: form.serialize()
            }).done(function(data) {
                if (data === true) {

                    Swal.fire({
                        title: 'Datos guardados correctamente!!',
                        icon: 'success',
                        confirmButtonText: 'OK',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location = "../contribuyentes";
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


