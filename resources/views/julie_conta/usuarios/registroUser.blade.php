{{-- Extends layout --}}
@extends('layout.default')



{{-- Content --}}
@section('content')

            @if (isset($usuarios))

                <div class="container-fluid">
                    <div class="row page-titles mx-0">
                        <div class="col-sm-6 p-md-0">
                            <div class="welcome-text">
                                <h4>Editar Usuario</h4>
                            </div>
                        </div>
                        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Usuarios</a></li>
                                <li class="breadcrumb-item active"><a href="javascript:void(0)">Editar Usuario</a></li>
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

                                        @foreach ($usuarios as $usu)
                                            <form class="form-usuarios-edit" method="POST">
                                                @csrf
                                                <input type="hidden" value="{{ $usu->id }}" id="id-usu">
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label for="name">Nombre <span class="text-danger">*</span></label>
                                                        <div>
                                                            <input type="text" class="form-control" name="name" id="name" value="{{ $usu->name }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="email">Email <span class="text-danger">*</span></label>
                                                        <div>
                                                            <input type="email" class="form-control" placeholder="example@hotmail.com" name="email" id="email" value="{{ $usu->email }}">
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
                                                            <option selected>Seleccione...</option>
                                                            @foreach ($roles as $rol)
                                                                <option value="{{ $rol->id }}">{{ $rol->name }}</option>
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
                <div class="container-fluid">
                    <div class="row page-titles mx-0">
                        <div class="col-sm-6 p-md-0">
                            <div class="welcome-text">
                                <h4>Nuevo Usuario</h4>
                            </div>
                        </div>
                        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Usuarios</a></li>
                                <li class="breadcrumb-item active"><a href="javascript:void(0)">Registrar Usuario</a></li>
                            </ol>
                        </div>
                    </div>
                    <!-- row -->
                    <div class="row">
                        <div class="col-xl-12 col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Crear Usuario</h4>
                                </div>
                                <div class="card-body">
                                    <div class="basic-form form-validation">
                                        <form class="form-usuarios" method="POST">
                                            @csrf
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="name">Nombre <span class="text-danger">*</span></label>
                                                    <div>
                                                        <input type="text" class="form-control" name="name" id="name">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="email">Email <span class="text-danger">*</span></label>
                                                    <div>
                                                        <input type="email" class="form-control" placeholder="example@hotmail.com" name="email" id="email">
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
                                                    <input type="text" class="form-control" name="telefono" id="tel" placeholder="00000000">
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label>Tipo de usuario</label>
                                                    <select id="inputState" class="form-control" name="tipoUsu">
                                                        <option selected>Seleccione...</option>
                                                        @foreach ($roles as $rol)
                                                            <option value="{{ $rol->name }}">{{ $rol->name }}</option>
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


