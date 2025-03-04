<?php

use App\Http\Controllers\AnexoCompraController;
use App\Http\Controllers\AnexoContribuyentesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MediquadminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ConsumidorFinalController;
use App\Http\Controllers\LibroCompraController;
use App\Http\Controllers\LoginController;
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
        Route::get('/agregar-consumidor-final', 'form_consumidor_final');
        Route::get('/consumidor-final', 'view_consumidorFinal');
        Route::get('/editar-cf/{id}', 'form_consumidor_final_edit');
        Route::get('/anexo-contribuyentes', 'form_anexo_contribuyentes');
        Route::get('/anexo-contribuyentes_editar/{id}', 'form_anexo_contribuyentes_edit');
        Route::get('/anexo-compras', 'form_anexo_compras');
        Route::get('/anexo-compras-editar/{id}', 'form_anexo_compras_edit');
        Route::get('/anexo-ventas-gctd', 'form_casilla_108');
        Route::get('/anexo-ventas-gctd-editar/{id}', 'form_casilla_108_edit');
        Route::get('/anexo-compras-se', 'form_casilla_66');
        Route::get('/anexo-compras-se-editar/{id}', 'form_casilla_66_edit');
        Route::get('/anexo-anticipo-ed', 'form_casilla_161');
        Route::get('/anexo-anticipo-ed-editar/{id}', 'form_casilla_161_edit');
        Route::get('/anexo-retencion-iva-ed', 'form_casilla_162');
        Route::get('/anexo-retencion-iva-ed-editar/{id}', 'form_casilla_162_edit');
        Route::get('/anexo-percepcion-iva-ed', 'form_casilla_163');
        Route::get('/anexo-percepcion-iva-ed-editar/{id}', 'form_casilla_163_edit');
        Route::get('/anexo-casilla-169', 'form_casilla_169');
        Route::get('/anexo-casilla-169-editar/{id}', 'form_casilla_169_edit');
        Route::get('/anexo-casilla-170', 'form_casilla_170');
        Route::get('/anexo-casilla-170-editar/{id}', 'form_casilla_170_edit');
        Route::get('/anexo-casilla-171', 'form_casilla_171');
        Route::get('/anexo-casilla-171-editar/{id}', 'form_casilla_171_edit');
        Route::get('/anexo-casilla-172', 'form_casilla_172');
        Route::get('/anexo-casilla-172-editar/{id}', 'form_casilla_172_edit');
        Route::get('/anexo-compras-mostrar', 'viewAnexoCompras');
        Route::get('/anexo-compras-editar/{id}', 'form_anexo_compras_edit');
        Route::get('/libro-compra', 'viewLibroCompras');
    });
    Route::get('/index', 'Login')->name('index');
});

Route::controller(UserController::class)->group(function() {
    Route::middleware('auth')->group(function () {
        Route::post('/crear-usuario', 'addUser');
        Route::post('/update-usuario/{id}', 'updateUser');
        Route::get('/eliminar-usuario/{id}', 'eliminarUser');
    });
});

Route::controller(ConsumidorFinalController::class)->group(function() {
    Route::middleware('auth')->group(function () {
        Route::post('/crear-consumidor-final', 'addConsumidorFinal');
        Route::post('/edit-consumidor-final/{id}', 'updateConsumidorFinal');
        Route::get('/eliminar-cf/{id}', 'deleteConsumidorFinal');
        Route::get('/buscar-cf-usuario', 'busquedaUsuarioCf');
        Route::get('/buscar-cf-fecha', 'BusquedaFechaUsu');
    });
});

Route::controller(AnexoCompraController::class)->group(function(){
    Route::middleware('auth')->group(function () {
        Route::post('/crear-anexo-compras', 'addAnexoCompra');
        Route::post('edit-anexo-compras/{id}', 'updateAnexoCompra');
    });
});

Route::controller(LibroCompraController::class)->group(function () {
    Route::middleware('auth')->group(function () {
        Route::post('/libro-compra-agregar', 'generarRegistros');
    });
});

Route::controller(AnexoContribuyentesController::class)->group(function () {
    Route::middleware('auth')->group(function () {
        Route::post('/add-anexo-contribuyente', 'addAnexoContribuyentes');
        Route::post('/update-anexo-contribuyente/{id}', 'updateAnexoContribuyentes');
    });
});

Route::post('/autenticacion', [LoginController::class, 'authenticate']);
Route::get('/logout', [LoginController::class, 'logout']);
