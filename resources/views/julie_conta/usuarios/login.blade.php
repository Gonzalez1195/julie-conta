{{-- Extends layout --}}
@extends('layout.fullwidth')



{{-- Content --}}
@section('content')
    <div class="col-md-5">
        <div class="authincation-content">
            <div class="row no-gutters">
                <div class="col-xl-12">
                    <div class="auth-form">
                        <h4 class="text-center mb-4">Login</h4>
                        <form action="{{ url('/autenticacion'); }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label class="mb-1">
                                    <strong>Correo</strong>
                                </label>
                                <input type="email" class="form-control" name="email">
                            </div>
                            <div class="form-group">
                                <label class="mb-1">
                                    <strong>Contraseña</strong>
                                </label>
                                <input type="password" class="form-control" name="password">
                            </div>
                            {{-- <div class="form-row d-flex justify-content-between mt-4 mb-2">
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox ml-1">
                                        <input type="checkbox" class="custom-control-input" id="basic_checkbox_1">
                                        <label class="custom-control-label" for="basic_checkbox_1">Remember my preference</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <a href="{!! url('page-forgot-password'); !!}" page-forgot-password>Forgot Password?</a>
                                </div>
                            </div> --}}
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary btn-block">Ingresar</button>
                            </div>
                        </form>
                        @if (count($errors) > 0)
                            <div class="alert alert-danger" role="alert" style="margin-top: 10px;">
                                @error('email')
                                    {{$message}}
                                @enderror
                            </div>
                        @endif
                        {{-- <div class="new-account mt-3">
                            <p>Don't have an account? <a class="text-primary" href="{!! url('page-register'); !!}">Sign up</a>
                            </p>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
