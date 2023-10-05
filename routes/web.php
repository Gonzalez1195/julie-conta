<?php

use App\Http\Controllers\AnexoCompraController;
use App\Http\Controllers\AnexoContribuyentesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MediquadminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ConsumidorFinalController;
use App\Http\Controllers\ContribuyenteController;
use App\Http\Controllers\LibroCompraController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LibroContribuyenteController;
use App\Http\Controllers\LibroConsumidorFinalController;
use App\Http\Controllers\Casilla108Controller;
use App\Http\Controllers\Casilla66Controller;
use App\Http\Controllers\Casilla161Controller;
use App\Http\Controllers\Casilla162Controller;
use App\Http\Controllers\Casilla163Controller;
use Illuminate\Routing\Router;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* Route::get('/', function () {
    return view('welcome');
});

 */
// Route::get('/', 'App\Http\Controllers\MediquadminController@dashboard_1');
// Route::get('/index', 'App\Http\Controllers\MediquadminController@dashboard_1');
Route::get('/doctors', 'App\Http\Controllers\MediquadminController@doctor_index');
Route::get('/doctors-details', 'App\Http\Controllers\MediquadminController@doctors_details');
Route::get('/doctors-review', 'App\Http\Controllers\MediquadminController@doctors_review');
Route::get('/patient-details', 'App\Http\Controllers\MediquadminController@patient_details');

Route::get('/app-calender', 'App\Http\Controllers\MediquadminController@app_calender');
Route::get('/app-profile', 'App\Http\Controllers\MediquadminController@app_profile');
Route::get('/chart-chartist', 'App\Http\Controllers\MediquadminController@chart_chartist');
Route::get('/chart-chartjs', 'App\Http\Controllers\MediquadminController@chart_chartjs');
Route::get('/chart-flot', 'App\Http\Controllers\MediquadminController@chart_flot');
Route::get('/chart-morris', 'App\Http\Controllers\MediquadminController@chart_morris');
Route::get('/chart-peity', 'App\Http\Controllers\MediquadminController@chart_peity');
Route::get('/chart-sparkline', 'App\Http\Controllers\MediquadminController@chart_sparkline');
Route::get('/ecom-checkout', 'App\Http\Controllers\MediquadminController@ecom_checkout');
Route::get('/ecom-customers', 'App\Http\Controllers\MediquadminController@ecom_customers');
Route::get('/ecom-invoice', 'App\Http\Controllers\MediquadminController@ecom_invoice');
Route::get('/ecom-product-detail', 'App\Http\Controllers\MediquadminController@ecom_product_detail');
Route::get('/ecom-product-grid', 'App\Http\Controllers\MediquadminController@ecom_product_grid');
Route::get('/ecom-product-list', 'App\Http\Controllers\MediquadminController@ecom_product_list');
Route::get('/ecom-product-order', 'App\Http\Controllers\MediquadminController@ecom_product_order');
Route::get('/email-compose', 'App\Http\Controllers\MediquadminController@email_compose');
Route::get('/email-inbox', 'App\Http\Controllers\MediquadminController@email_inbox');
Route::get('/email-read', 'App\Http\Controllers\MediquadminController@email_read');
Route::get('/form-editor-summernote', 'App\Http\Controllers\MediquadminController@form_editor_summernote');
Route::get('/form-element', 'App\Http\Controllers\MediquadminController@form_element');
Route::get('/form-pickers', 'App\Http\Controllers\MediquadminController@form_pickers');
Route::get('/form-validation-jquery', 'App\Http\Controllers\MediquadminController@form_validation_jquery');
Route::get('/form-wizard', 'App\Http\Controllers\MediquadminController@form_wizard');
Route::get('/map-jqvmap', 'App\Http\Controllers\MediquadminController@map_jqvmap');
Route::get('/page-error-400', 'App\Http\Controllers\MediquadminController@page_error_400');
Route::get('/page-error-403', 'App\Http\Controllers\MediquadminController@page_error_403');
Route::get('/page-error-404', 'App\Http\Controllers\MediquadminController@page_error_404');
Route::get('/page-error-500', 'App\Http\Controllers\MediquadminController@page_error_500');
Route::get('/page-error-503', 'App\Http\Controllers\MediquadminController@page_error_503');
Route::get('/page-forgot-password', 'App\Http\Controllers\MediquadminController@page_forgot_password');
Route::get('/page-lock-screen', 'App\Http\Controllers\MediquadminController@page_lock_screen');
Route::get('/page-login', 'App\Http\Controllers\MediquadminController@page_login');
Route::get('/page-register', 'App\Http\Controllers\MediquadminController@page_register');
Route::get('/table-bootstrap-basic', 'App\Http\Controllers\MediquadminController@table_bootstrap_basic');
Route::get('/table-datatable-basic', 'App\Http\Controllers\MediquadminController@table_datatable_basic');
Route::get('/uc-nestable', 'App\Http\Controllers\MediquadminController@uc_nestable');
Route::get('/uc-noui-slider', 'App\Http\Controllers\MediquadminController@uc_noui_slider');
Route::get('/uc-select2', 'App\Http\Controllers\MediquadminController@uc_select2');
Route::get('/uc-sweetalert', 'App\Http\Controllers\MediquadminController@uc_sweetalert');
Route::get('/uc-toastr', 'App\Http\Controllers\MediquadminController@uc_toastr');
Route::get('/ui-accordion', 'App\Http\Controllers\MediquadminController@ui_accordion');
Route::get('/ui-alert', 'App\Http\Controllers\MediquadminController@ui_alert');
Route::get('/ui-badge', 'App\Http\Controllers\MediquadminController@ui_badge');
Route::get('/ui-button', 'App\Http\Controllers\MediquadminController@ui_button');
Route::get('/ui-button-group', 'App\Http\Controllers\MediquadminController@ui_button_group');
Route::get('/ui-card', 'App\Http\Controllers\MediquadminController@ui_card');
Route::get('/ui-carousel', 'App\Http\Controllers\MediquadminController@ui_carousel');
Route::get('/ui-dropdown', 'App\Http\Controllers\MediquadminController@ui_dropdown');
Route::get('/ui-grid', 'App\Http\Controllers\MediquadminController@ui_grid');
Route::get('/ui-list-group', 'App\Http\Controllers\MediquadminController@ui_list_group');
Route::get('/ui-media-object', 'App\Http\Controllers\MediquadminController@ui_media_object');
Route::get('/ui-modal', 'App\Http\Controllers\MediquadminController@ui_modal');
Route::get('/ui-pagination', 'App\Http\Controllers\MediquadminController@ui_pagination');
Route::get('/ui-popover', 'App\Http\Controllers\MediquadminController@ui_popover');
Route::get('/ui-progressbar', 'App\Http\Controllers\MediquadminController@ui_progressbar');
Route::get('/ui-tab', 'App\Http\Controllers\MediquadminController@ui_tab');
Route::get('/ui-typography', 'App\Http\Controllers\MediquadminController@ui_typography');
Route::get('/widget-basic', 'App\Http\Controllers\MediquadminController@widget_basic');



// Rutas de Julie-conta

Route::controller(MediquadminController::class)->group(function() {
    Route::middleware(['auth', 'prevent'])->group(function () {
        Route::get('/usuarios', 'view_usuarios');
        Route::get('/agregar-usuario', 'form_usuarios');
        Route::get('/editar-usuario/{id}', 'editar_usuarios');
        Route::get('/anexo-consumidor-final', 'view_consumidorFinal');
        Route::get('/anexo-consumidor-final-agregar', 'form_consumidor_final');
        Route::get('/anexo-consumidor-final-editar/{id}', 'form_consumidor_final_edit');
        Route::get('/anexo-contribuyentes', 'viewAnexoContribuyentes');
        Route::get('/anexo-contribuyentes-agregar', 'form_anexo_contribuyentes');
        Route::get('/anexo-contribuyentes-editar/{id}', 'form_anexo_contribuyentes_edit');
        Route::get('/anexo-compras', 'viewAnexoCompras');
        Route::get('/anexo-compras-agregar', 'form_anexo_compras');
        Route::get('/anexo-compras-editar/{id}', 'form_anexo_compras_edit');
        Route::get('/anexo-casilla-108', 'viewCasilla108');
        Route::get('/anexo-casilla-108-agregar', 'form_casilla_108');
        Route::get('/anexo-casilla-108-editar/{id}', 'form_casilla_108_edit');
        Route::get('/anexo-casilla-66', 'viewCasilla66');
        Route::get('/anexo-casilla-66-agregar', 'form_casilla_66');
        Route::get('/anexo-casilla-66-editar/{id}', 'form_casilla_66_edit');
        Route::get('/anexo-casilla-161', 'viewCasilla161');
        Route::get('/anexo-casilla-161-agregar', 'form_casilla_161');
        Route::get('/anexo-casilla-161-editar/{id}', 'form_casilla_161_edit');
        Route::get('/anexo-casilla-162', 'viewCasilla162');
        Route::get('/anexo-casilla-162-agregar', 'form_casilla_162');
        Route::get('/anexo-casilla-162-editar/{id}', 'form_casilla_162_edit');
        Route::get('/anexo-casilla-163', 'viewCasilla163');
        Route::get('/anexo-casilla-163-agregar', 'form_casilla_163');
        Route::get('/anexo-casilla-163-editar/{id}', 'form_casilla_163_edit');

        Route::get('/anexo-casilla-169-agregar', 'form_casilla_169');
        Route::get('/anexo-casilla-169-editar/{id}', 'form_casilla_169_edit');

        Route::get('/anexo-casilla-170-agregar', 'form_casilla_170');
        Route::get('/anexo-casilla-170-editar/{id}', 'form_casilla_170_edit');

        Route::get('/anexo-casilla-171-agregar', 'form_casilla_171');
        Route::get('/anexo-casilla-171-editar/{id}', 'form_casilla_171_edit');

        Route::get('/anexo-casilla-172-agregar', 'form_casilla_172');
        Route::get('/anexo-casilla-172-editar/{id}', 'form_casilla_172_edit');

        Route::get('/libro-compra', 'viewLibroCompras');
        Route::get('/libro-ventas-contribuyentes', 'viewLibroContribuyentes');
        Route::get('/libro-ventas-consumidores', 'viewLibroCF');
        Route::get('/contribuyentes-agregar', 'form_contribuyentes');
        Route::get('/contribuyentes-editar/{id}', 'form_contribuyentes_edit');
        Route::get('/contribuyentes', 'viewContribuyentes');


        Route::get('/inicio', 'inicio');
    });
    Route::get('/index', 'Login')->name('index');
});

Route::controller(UserController::class)->group(function() {
    Route::middleware('auth')->group(function () {
        Route::post('/add-usuario', 'addUser');
        Route::post('/edit-usuario/{id}', 'updateUser');
        Route::get('/delete-usuario/{id}', 'deleteUser');
    });
});

Route::controller(ConsumidorFinalController::class)->group(function() {
    Route::middleware('auth')->group(function () {
        Route::post('/add-consumidor-final', 'addConsumidorFinal');
        Route::post('/edit-consumidor-final/{id}', 'updateConsumidorFinal');
        Route::get('/delete-consumidor-final/{id}', 'deleteConsumidorFinal');
        Route::get('/search-usuario-consumidor-final', 'busquedaUsuarioCf');
        Route::get('/search-date-consumidor-final', 'BusquedaFechaUsu');
    });
});

Route::controller(AnexoCompraController::class)->group(function(){
    Route::middleware('auth')->group(function () {
        Route::post('/add-compras', 'addAnexoCompra');
        Route::post('/edit-compras/{id}', 'updateAnexoCompra');
        Route::get('/delete-compras/{id}', 'deleteAnexoCompra');
        Route::get('/search-usuario-compras', 'busquedaUsuario');
        Route::get('/search-date-compras', 'BusquedaFechaUsu');
    });
});

Route::controller(LibroCompraController::class)->group(function () {
    Route::middleware('auth')->group(function () {
        Route::post('/libro-compra-agregar', 'generarRegistros');
    });
});

Route::controller(AnexoContribuyentesController::class)->group(function () {
    Route::middleware('auth')->group(function () {
        Route::post('/add-anexo-contribuyentes', 'addAnexoContribuyentes');
        Route::post('/edit-anexo-contribuyentes/{id}', 'updateAnexoContribuyentes');
        Route::get('/delete-contribuyentes/{id}', 'deleteAnexoContribuyentes');
        Route::get('/search-usuario-contribuyentes', 'busquedaUsuario');
        Route::get('/search-date-contribuyentes', 'BusquedaFechaUsu');
    });
});

Route::controller(LibroContribuyenteController::class)->group(function () {
    Route::middleware('auth')->group(function () {
        Route::post('/libro-contribuyentes-agregar', 'crearLibroContribuyente');
    });
});

Route::controller(LibroConsumidorFinalController::class)->group(function () {
    Route::middleware('auth')->group(function () {
        Route::post('/libro-cf-agregar', 'crearLibroCF');
    });
});

Route::controller(ContribuyenteController::class)->group(function () {
    Route::middleware('auth')->group(function () {
        Route::post('/add-contribuyente', 'contribuyentesAdd');
        Route::post('/update-contribuyente/{id}', 'contribuyentesUpdate');
        Route::get('/delete-contribuyente/{id}', 'contribuyenteDelete');
        Route::get('/search-contribuyente', 'searchContribuyente');
    });
});

Route::controller(Casilla108Controller::class)->group(function () {
    Route::middleware('auth')->group(function () {
        Route::post('/add-casilla108', 'addCasilla108s');
        Route::post('/update-casilla108/{id}', 'updateCasilla108s');
        Route::get('/delete-casilla108/{id}', 'deleteCasilla108s');
        Route::get('/search-usuario-casillla108', 'busquedaUsuario');
        Route::get('/search-date-casillla108', 'BusquedaFechaUsu');
    });
});

Route::controller(Casilla66Controller::class)->group(function () {
    Route::middleware('auth')->group(function () {
        Route::post('/add-casilla66', 'addCasilla66s');
        Route::post('/update-casilla66/{id}', 'updateCasilla66s');
        Route::get('/delete-casilla66/{id}', 'deleteCasilla66s');
        Route::get('/search-usuario-casillla66', 'busquedaUsuario');
        Route::get('/search-date-casillla66', 'BusquedaFechaUsu');
    });
});

Route::controller(Casilla161Controller::class)->group(function () {
    Route::middleware('auth')->group(function () {
        Route::post('/add-casilla161', 'addCasilla161s');
        Route::post('/update-casilla161/{id}', 'updateCasilla161s');
        Route::get('/delete-casilla161/{id}', 'deleteCasilla161s');
        Route::get('/search-usuario-casillla161', 'busquedaUsuario');
        Route::get('/search-date-casillla161', 'BusquedaFechaUsu');
    });
});

Route::controller(Casilla162Controller::class)->group(function () {
    Route::middleware('auth')->group(function () {
        Route::post('/add-casilla162', 'addCasilla162s');
        Route::post('/update-casilla162/{id}', 'updateCasilla162s');
        Route::get('/delete-casilla162/{id}', 'deleteCasilla162s');
        Route::get('/search-usuario-casillla162', 'busquedaUsuario');
        Route::get('/search-date-casillla162', 'BusquedaFechaUsu');
    });
});

Route::controller(Casilla163Controller::class)->group(function () {
    Route::middleware('auth')->group(function () {
        Route::post('/add-casilla163', 'addCasilla163s');
        Route::post('/update-casilla163/{id}', 'updateCasilla163s');
        Route::get('/delete-casilla163/{id}', 'deleteCasilla163s');
        Route::get('/search-usuario-casillla163', 'busquedaUsuario');
        Route::get('/search-date-casillla163', 'BusquedaFechaUsu');
    });
});

Route::post('/autenticacion', [LoginController::class, 'authenticate']);
Route::get('/logout', [LoginController::class, 'logout']);
