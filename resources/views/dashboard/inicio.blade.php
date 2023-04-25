{{-- Extends layout --}}
@extends('layout.default')



{{-- Content --}}
@section('content')
            <!-- row -->
			<div class="container-fluid">
				<div class="form-head d-flex mb-3 mb-md-5 align-items-start">
					<div class="mr-auto d-none d-lg-block">
						<h3 class="text-primary font-w600">Bienvenido a Julie Conta</h3>
						<p class="mb-0">Sistema web de Contabilidad</p>
					</div>

				</div>
                <div class="row">
					<div class="col-xl-12 col-xxl-12" style="display: flex;justify-content: center;">
						<div class="row">
							<div class="col-xl-12 col-xxl-12 col-lg-12 col-md-12">
                                <img src="{{ url('/images/contable-06.gif') }}" alt="imagen-conta">
							</div>
						</div>
					</div>
			   </div>
            </div>

@endsection
