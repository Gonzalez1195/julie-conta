<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\ConsumidorFinal;
use App\Models\AnexoContribuyente;
use App\Models\AnexoCompra;
use App\Models\Casilla108;
use App\Models\Casilla66;
use App\Models\Casilla161;
use App\Models\Casilla162;
use App\Models\Casilla163;
use App\Models\Casilla169;
use App\Models\Casilla170;
use App\Models\Casilla171;
use App\Models\Casilla172;
use App\Models\Contribuyente;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;

class MediquadminController extends Controller
{

	    // Dashboard-1
    public function dashboard_1()
    {


        $page_title = 'Inicio';
        $page_description = 'Some description for the page';
        $logo = "images/logo.png";
        $logoText = "images/banner.png";
        $action = __FUNCTION__;

        return view('dashboard.index', compact('page_title', 'page_description','action','logo','logoText'));
    }

	    // Dashboard-2
    public function doctor_index()
    {
        $page_title = 'Doctors';
        $page_description = 'Some description for the page';
        $logo = "images/logo.png";
        $logoText = "images/logo-text.png";

        $action = __FUNCTION__;

        return view('doctor.index', compact('page_title', 'page_description','action','logo','logoText'));
    }

	    // Dashboard-3
    public function doctors_details()
    {
        $page_title = 'Dashboard-3';
        $page_description = 'Some description for the page';
        $logo = "images/logo.png";
        $logoText = "images/logo-text.png";

		$action = __FUNCTION__;

        return view('doctor.details', compact('page_title', 'page_description','action','logo','logoText'));
    }

	    // Doctors Review
    public function doctors_review()
    {

        $page_title = 'Doctors Review';
        $page_description = 'Some description for the page';
        $logo = "images/logo.png";
        $logoText = "images/logo-text.png";

		$action = __FUNCTION__;

        return view('doctor.review', compact('page_title', 'page_description','action','logo','logoText'));
    }

	    // Patient Details
    public function patient_details()
    {
        $page_title = 'Patient Details';
        $page_description = 'Some description for the page';
        $logo = "images/logo.png";
        $logoText = "images/logo-text.png";

		$action = __FUNCTION__;

        return view('doctor.pat_details', compact('page_title', 'page_description','action','logo','logoText'));
    }

	    // Calender
    public function app_calender()
    {
        $page_title = 'Calender';
        $page_description = 'Some description for the page';

		$action = __FUNCTION__;

        return view('app.calender', compact('page_title', 'page_description','action'));
    }

	    // Profile
    public function app_profile()
    {
        $page_title = 'Profile';
        $page_description = 'Some description for the page';

        $action = __FUNCTION__;

        return view('app.profile', compact('page_title', 'page_description','action'));
    }

	    // Chart Chartist
    public function chart_chartist()
    {
        $page_title = 'Chart Chartist';
        $page_description = 'Some description for the page';
        $action = __FUNCTION__;

        return view('chart.chartist', compact('page_title', 'page_description','action'));
    }

	    // Chart Chartjs
    public function chart_chartjs()
    {
        $page_title = 'Chart Chartjs';
        $page_description = 'Some description for the page';

		$action = __FUNCTION__;

        return view('chart.chartjs', compact('page_title', 'page_description','action'));
    }

	    // Chart Flot
    public function chart_flot()
    {
        $page_title = 'Chart Flot';
        $page_description = 'Some description for the page';

		$action = __FUNCTION__;

        return view('chart.flot', compact('page_title', 'page_description','action'));
    }

	    // Chart Morris
    public function chart_morris()
    {
        $page_title = 'Chart Morris';
        $page_description = 'Some description for the page';

		$action = __FUNCTION__;

        return view('chart.morris', compact('page_title', 'page_description','action'));
    }

	    // Chart Peity
    public function chart_peity()
    {
        $page_title = 'Chart Peity';
        $page_description = 'Some description for the page';

        $action = __FUNCTION__;

        return view('chart.peity', compact('page_title', 'page_description','action'));
    }

	    // Chart Sparkline
    public function chart_sparkline()
    {
        $page_title = 'Chart Sparkline';
        $page_description = 'Some description for the page';

        $action = __FUNCTION__;

        return view('chart.sparkline', compact('page_title', 'page_description','action'));
    }

	    // Ecommerce Checkout
    public function ecom_checkout()
    {
        $page_title = 'Ecommerce Checkout';
        $page_description = 'Some description for the page';

        $action = __FUNCTION__;

        return view('ecom.checkout', compact('page_title', 'page_description','action'));
    }

	    // Ecommerce Customers
    public function ecom_customers()
    {
        $page_title = 'Ecommerce Customers';
        $page_description = 'Some description for the page';

		$action = __FUNCTION__;

        return view('ecom.customers', compact('page_title', 'page_description','action'));
    }

	    // Ecommerce Invoice
    public function ecom_invoice()
    {
        $page_title = 'Ecommerce Invoice';
        $page_description = 'Some description for the page';

		$action = __FUNCTION__;

        return view('ecom.invoice', compact('page_title', 'page_description','action'));
    }

	    // Ecommerce Product Detail
    public function ecom_product_detail()
    {
        $page_title = 'Ecommerce Product Detail';
        $page_description = 'Some description for the page';

		$action = __FUNCTION__;

        return view('ecom.productdetail', compact('page_title', 'page_description','action'));
    }

	    // Ecommerce Product Grid
    public function ecom_product_grid()
    {
        $page_title = 'Ecommerce Product Grid';
        $page_description = 'Some description for the page';

		$action = __FUNCTION__;

        return view('ecom.productgrid', compact('page_title', 'page_description','action'));
    }

	    // Ecommerce Product List
    public function ecom_product_list()
    {
        $page_title = 'Ecommerce Product List';
        $page_description = 'Some description for the page';

		$action = __FUNCTION__;

        return view('ecom.productlist', compact('page_title', 'page_description','action'));
    }

	    // Ecommerce Product Order
    public function ecom_product_order()
    {
        $page_title = 'Ecommerce Product Order';
        $page_description = 'Some description for the page';

		$action = __FUNCTION__;

        return view('ecom.productorder', compact('page_title', 'page_description','action'));
    }

	    // Email Compose
    public function email_compose()
    {
        $page_title = 'Email Compose';
        $page_description = 'Some description for the page';

		$action = __FUNCTION__;

        return view('message.compose', compact('page_title', 'page_description','action'));
    }

	    // Email Inbox
    public function email_inbox()
    {
        $page_title = 'Email Inbox';
        $page_description = 'Some description for the page';

		$action = __FUNCTION__;

        return view('message.inbox', compact('page_title', 'page_description','action'));
    }

	    // Email Read
    public function email_read()
    {
        $page_title = 'Email read';
        $page_description = 'Some description for the page';

		$action = __FUNCTION__;

        return view('message.read', compact('page_title', 'page_description','action'));
    }

	    // Form Editor Summernote
    public function form_editor_summernote()
    {
        $page_title = 'From Editor Summernote';
        $page_description = 'Some description for the page';

        $action = __FUNCTION__;

        return view('form.editorsummernote', compact('page_title', 'page_description','action'));
	}

	    // Form Element
    public function form_element()
    {
        $page_title = 'From Element';
        $page_description = 'Some description for the page';

		$action = __FUNCTION__;

        return view('form.element', compact('page_title', 'page_description','action'));
    }

	// Form Pickers
    public function form_pickers()
    {
        $page_title = 'From Pickers';
        $page_description = 'Some description for the page';

		$action = __FUNCTION__;

        return view('form.pickers', compact('page_title', 'page_description','action'));
    }

	    // Form Validation Jquery
    public function form_validation_jquery()
    {
        $page_title = 'From Validation Jquery';
        $page_description = 'Some description for the page';

		$action = __FUNCTION__;

        return view('form.validationjquery', compact('page_title', 'page_description','action'));
    }

	    // Form Wizard
    public function form_wizard()
    {
        $page_title = 'From Wizard';
        $page_description = 'Some description for the page';

		$action = __FUNCTION__;

        return view('form.wizard', compact('page_title', 'page_description','action'));
    }


	    // Map Jqvmap
    public function map_jqvmap()
    {
        $page_title = 'Map Jqvmap';
        $page_description = 'Some description for the page';

        $action = __FUNCTION__;

        return view('map.jqvmap', compact('page_title', 'page_description','action'));
    }



	    // Layout Blank
    /* public function layout_blank()
    {
        $page_title = 'Layout Blank';
        $page_description = 'Some description for the page';

		$action = __FUNCTION__;

        return view('metrolayout.blank', compact('page_title', 'page_description','action'));
    }

	    // Layout Compact Nav
    public function layout_compact_nav()
    {
        $page_title = 'Layout Compact Nav';
        $page_description = 'Some description for the page';

		$action = __FUNCTION__;

        return view('metrolayout.compactnav', compact('page_title', 'page_description','action'));
    }

	    // Layout Dark
    public function layout_dark()
    {
        $page_title = 'Layout Dark';
        $page_description = 'Some description for the page';

		$action = __FUNCTION__;

        return view('metrolayout.dark', compact('page_title', 'page_description','action'));
    }

	    // Layout Fixed Header
    public function layout_fixed_header()
    {
        $page_title = 'Layout Fixed Header';
        $page_description = 'Some description for the page';

		$action = __FUNCTION__;

        return view('metrolayout.fixedheader', compact('page_title', 'page_description','action'));
    }

	    // Layout Fixed Nav
    public function layout_fixed_nav()
    {
        $page_title = 'Layout Fixed Nav';
        $page_description = 'Some description for the page';

		$action = __FUNCTION__;

        return view('metrolayout.fixednav', compact('page_title', 'page_description','action'));
    }

	    // Layout Full Nav
    public function layout_full_nav()
    {
        $page_title = 'Layout Full Nav';
        $page_description = 'Some description for the page';

		$action = __FUNCTION__;

        return view('metrolayout.fullnav', compact('page_title', 'page_description','action'));
    }

	    // Layout Light
    public function layout_light()
    {
        $page_title = 'Layout Light';
        $page_description = 'Some description for the page';

		$action = __FUNCTION__;

        return view('metrolayout.light', compact('page_title', 'page_description','action'));
    }

	    // Layout Mini Nav
    public function layout_mini_nav()
    {
        $page_title = 'Layout Mini Nav';
        $page_description = 'Some description for the page';

		$action = __FUNCTION__;

        return view('metrolayout.mininav', compact('page_title', 'page_description','action'));
    }

	    // Layout RTL
    public function layout_rtl()
    {
        $page_title = 'Layout RTL';
        $page_description = 'Some description for the page';

		$action = __FUNCTION__;

        return view('metrolayout.rtl', compact('page_title', 'page_description','action'));
    } */


	    // Page Error 400
    public function page_error_400()
    {
        $page_title = 'Page Error 400';
        $page_description = 'Some description for the page';

		$action = __FUNCTION__;

        return view('page.error400', compact('page_title', 'page_description','action'));
    }

	    // Page Error 403
    public function page_error_403()
    {
        $page_title = 'Page Error 403';
        $page_description = 'Some description for the page';

		$action = __FUNCTION__;

        return view('page.error403', compact('page_title', 'page_description','action'));
    }

	    // Page Error 404
    public function page_error_404()
    {
        $page_title = 'Page Error 404';
        $page_description = 'Some description for the page';

        $action = __FUNCTION__;

        return view('page.error404', compact('page_title', 'page_description','action'));
    }

	    // Page Error 500
    public function page_error_500()
    {
        $page_title = 'Page Error 500';
        $page_description = 'Some description for the page';

		$action = __FUNCTION__;

        return view('page.error500', compact('page_title', 'page_description','action'));
    }

	    // Page Error 503
    public function page_error_503()
    {
        $page_title = 'Page Error 503';
        $page_description = 'Some description for the page';

		$action = __FUNCTION__;

        return view('page.error503', compact('page_title', 'page_description','action'));
    }

	    // Page Forgot Password
    public function page_forgot_password()
    {
        $page_title = 'Page Forgot Password';
        $page_description = 'Some description for the page';

        $action = __FUNCTION__;

        return view('page.forgot_password', compact('page_title', 'page_description','action'));
    }

	    // Page Lock Screen
    public function page_lock_screen()
    {
        $page_title = 'Page Lock Screen';
        $page_description = 'Some description for the page';

        $action = __FUNCTION__;

        return view('page.lockscreen', compact('page_title', 'page_description','action'));
    }

	    // Page Login
    public function page_login()
    {
        $page_title = 'Page Login';
        $page_description = 'Some description for the page';

		$action = __FUNCTION__;

        return view('page.login', compact('page_title', 'page_description','action'));
    }

	    // Page Register
    public function page_register()
    {
        $page_title = 'Page Register';
        $page_description = 'Some description for the page';

		$action = __FUNCTION__;

        return view('page.register', compact('page_title', 'page_description','action'));
    }

	    // Table Bootstrap Basic
    public function table_bootstrap_basic()
    {
        $page_title = 'Table Bootstrap Basic';
        $page_description = 'Some description for the page';

		$action = __FUNCTION__;

        return view('table.bootstrapbasic', compact('page_title', 'page_description','action'));
    }

	    // Table Datatable Basic
    public function table_datatable_basic()
    {
        $page_title = 'Table Datatable Basic';
        $page_description = 'Some description for the page';

		$action = __FUNCTION__;

        return view('table.datatablebasic', compact('page_title', 'page_description','action'));
    }

	    // UC Nestable.
    public function uc_nestable()
    {
        $page_title = 'UC Nestable';
        $page_description = 'Some description for the page';

		$action = __FUNCTION__;

        return view('uc.nestable', compact('page_title', 'page_description','action'));
    }

	    // UC Noui Slider
    public function uc_noui_slider()
    {
        $page_title = 'UC Noui Slider';
        $page_description = 'Some description for the page';

		$action = __FUNCTION__;

        return view('uc.nouislider', compact('page_title', 'page_description','action'));
    }

	    // UC Select2
    public function uc_select2()
    {
        $page_title = 'UC Select2';
        $page_description = 'Some description for the page';

		$action = __FUNCTION__;

        return view('uc.select2', compact('page_title', 'page_description','action'));
    }

	    // UC Sweetalert
    public function uc_sweetalert()
    {
        $page_title = 'UC Sweetalert';
        $page_description = 'Some description for the page';

		$action = __FUNCTION__;

        return view('uc.sweetalert', compact('page_title', 'page_description','action'));
    }

	    // UC Toastr
    public function uc_toastr()
    {
        $page_title = 'UC toastr';
        $page_description = 'Some description for the page';

		$action = __FUNCTION__;

        return view('uc.toastr', compact('page_title', 'page_description','action'));
    }

	    // UI Accordion
    public function ui_accordion()
    {
        $page_title = 'UI Accordion';
        $page_description = 'Some description for the page';

		$action = __FUNCTION__;

        return view('ui.accordion', compact('page_title', 'page_description','action'));
    }

	    // UI Alert
    public function ui_alert()
    {
        $page_title = 'UI Alert';
        $page_description = 'Some description for the page';

		$action = __FUNCTION__;

        return view('ui.alert', compact('page_title', 'page_description','action'));
    }

	    // UI Badge
    public function ui_badge()
    {
        $page_title = 'UI Badge';
        $page_description = 'Some description for the page';

		$action = __FUNCTION__;

        return view('ui.badge', compact('page_title', 'page_description','action'));
    }

	    // UI Button
    public function ui_button()
    {
        $page_title = 'UI Button';
        $page_description = 'Some description for the page';

		$action = __FUNCTION__;

        return view('ui.button', compact('page_title', 'page_description','action'));
    }

	    // UI Button Group
    public function ui_button_group()
    {
        $page_title = 'UI Button Group';
        $page_description = 'Some description for the page';

		$action = __FUNCTION__;

        return view('ui.buttongroup', compact('page_title', 'page_description','action'));
    }

	    // UI Card
    public function ui_card()
    {
        $page_title = 'UI Card';
        $page_description = 'Some description for the page';

		$action = __FUNCTION__;

        return view('ui.card', compact('page_title', 'page_description','action'));
    }

	    // UI Carousel
    public function ui_carousel()
    {
        $page_title = 'UI Carousel';
        $page_description = 'Some description for the page';

		$action = __FUNCTION__;

        return view('ui.carousel', compact('page_title', 'page_description','action'));
    }

	    // UI Dropdown
    public function ui_dropdown()
    {
        $page_title = 'UI Dropdown';
        $page_description = 'Some description for the page';

		$action = __FUNCTION__;

        return view('ui.dropdown', compact('page_title', 'page_description','action'));
    }

	    // UI Grid
    public function ui_grid()
    {
        $page_title = 'UI Grid';
        $page_description = 'Some description for the page';

		$action = __FUNCTION__;

        return view('ui.grid', compact('page_title', 'page_description','action'));
    }

	    // UI List Group
    public function ui_list_group()
    {
        $page_title = 'UI List Group';
        $page_description = 'Some description for the page';

		$action = __FUNCTION__;

        return view('ui.listgroup', compact('page_title', 'page_description','action'));
    }

	    // UI Media Object
    public function ui_media_object()
    {
        $page_title = 'UI Media Object';
        $page_description = 'Some description for the page';

		$action = __FUNCTION__;

        return view('ui.mediaobject', compact('page_title', 'page_description','action'));
    }

	    // UI Modal
    public function ui_modal()
    {
        $page_title = 'UI Modal';
        $page_description = 'Some description for the page';

		$action = __FUNCTION__;

        return view('ui.modal', compact('page_title', 'page_description','action'));
    }

	    // UI Pagination
    public function ui_pagination()
    {
        $page_title = 'UI Pagination';
        $page_description = 'Some description for the page';

		$action = __FUNCTION__;

        return view('ui.pagination', compact('page_title', 'page_description','action'));
    }

	    // UI Popover
    public function ui_popover()
    {
        $page_title = 'UI Popover';
        $page_description = 'Some description for the page';

		$action = __FUNCTION__;

        return view('ui.popover', compact('page_title', 'page_description','action'));
    }

	    // UI Progressbar
    public function ui_progressbar()
    {
        $page_title = 'UI Progressbar';
        $page_description = 'Some description for the page';

		$action = __FUNCTION__;

        return view('ui.progressbar', compact('page_title', 'page_description','action'));
    }

	    // UI Tab
    public function ui_tab()
    {
        $page_title = 'UI Tab';
        $page_description = 'Some description for the page';

		$action = __FUNCTION__;

        return view('ui.tab', compact('page_title', 'page_description','action'));
    }


	    // UI Typography
    public function ui_typography()
    {
        $page_title = 'UI Typography';
        $page_description = 'Some description for the page';

		$action = __FUNCTION__;

        return view('ui.typography', compact('page_title', 'page_description','action'));
    }

	    // Widget Basic
    public function widget_basic()
    {
        $page_title = 'Widget Basic';
        $page_description = 'Some description for the page';

		$action = __FUNCTION__;

        return view('widget.metro_widget_basic', compact('page_title', 'page_description','action'));
    }

    // Elementos para Julie-Conta ------------------------------------------------------------------
    public function form_usuarios()
    {
        $page_title = 'Formulario Usuarios';
        $page_description = 'Formulario para crear un nuevo usuario.';
        $roles = Role::all();

		$action = __FUNCTION__;

        return view('julie_conta.usuarios.registroUser', compact('page_title', 'roles', 'page_description','action'));
    }

    public function view_usuarios()
    {
        $page_title = 'Usuarios';
        $page_description = 'Tabla de todos los usuarios registrados.';
        $usuarios = User::where('estado', '1')->get();

		$action = __FUNCTION__;

        return view('julie_conta.usuarios.viewUsers', compact('page_title', 'page_description', 'usuarios', 'action'));
    }

    public function editar_usuarios($id)
    {
        $page_title = 'Formulario Usuarios Editar';
        $page_description = 'Formulario para editar un usuario.';
        $usuarios = User::where('id', '=', $id)->get();
        $roles = Role::all();

		$action = __FUNCTION__;

        return view('julie_conta.usuarios.registroUser', compact('page_title', 'page_description', 'roles', 'usuarios', 'action'));
    }

    public function form_consumidor_final()
    {
        $page_title = 'Formulario Consumidor Final';
        $page_description = 'Formulario para crear un anexo de consumidor final.';
        $usuarios = User::where('estado', '1')->get();

		$action = __FUNCTION__;

        return view('julie_conta.anexos.consumidorFinal', compact('page_title', 'page_description', 'usuarios', 'action'));
    }

    public function view_consumidorFinal()
    {
        $page_title = 'Consumidor Final';
        $page_description = 'Tabla con los datos de la plantilla "Consumidor Final"';
        $consumidores = DB::table('consumidor_finals')
                        ->join('users', 'users.id', '=', 'consumidor_finals.user_id')
                        ->select('users.*', 'consumidor_finals.*')
                        ->where('users.estado', 1)->get();
        $usuarios = User::where('estado', '1')->get();

		$action = __FUNCTION__;

        return view('julie_conta.anexos.allConsumidorFinal', compact('page_title', 'page_description', 'consumidores', 'usuarios', 'action'));
    }

    public function form_consumidor_final_edit($id)
    {
        $page_title = 'Formulario Consumidor Final Editar';
        $page_description = 'Formulario para editar un anexo de "Consumidor Final"';
        $consumidor = ConsumidorFinal::where("id", "=", $id)->get();
        $usuarios = User::where('estado', '1')->get();

		$action = __FUNCTION__;

        return view('julie_conta.anexos.consumidorFinal', compact('page_title', 'page_description', 'consumidor', 'usuarios', 'action'));
    }

    public function form_anexo_contribuyentes()
    {
        $page_title = 'Formulario para agregar Anexos Contribuyentes';
        $page_description = 'Formulario para crear un registro en el anexo de contribuyentes.';
        $usuarios = User::where('estado', '1')->get();

		$action = __FUNCTION__;

        return view('julie_conta.anexos.contribuyentesForm', compact('page_title', 'page_description', 'usuarios', 'action'));
    }

    public function form_anexo_contribuyentes_edit($id)
    {
        $page_title = 'Formulario para editar Anexo Contribuyentes';
        $page_description = 'Formulario para Editar un registro en el anexo de contribuyentes.';
        $contribuyente = AnexoContribuyente::where("id", "=", $id)->get();
        $usuarios = User::where('estado', '1')->get();

		$action = __FUNCTION__;

        return view('julie_conta.anexos.contribuyentesForm', compact('page_title', 'page_description', 'contribuyente', 'usuarios', 'action'));
    }

    public function form_anexo_compras()
    {
        $page_title = 'Formulario para agregar Anexos Compras';
        $page_description = 'Formulario para crear un registro en el anexo de compras.';
        $usuarios = User::where('estado', '1')->get();
        $contribuyentes = Contribuyente::all();

        $action = __FUNCTION__;

        return view('julie_conta.anexos.comprasForm', compact('page_title', 'page_description', 'usuarios', 'contribuyentes', 'action'));
    }

    public function form_anexo_compras_edit($id)
    {
        $page_title = 'Formulario para editar Anexo Compras';
        $page_description = 'Formulario para editar un registro en el anexo de compras.';
        $anexoCompras = AnexoCompra::where("id", "=", $id)->get();
        $usuarios = User::where('estado', '1')->get();

        $action = __FUNCTION__;

        return view('julie_conta.anexos.comprasForm', compact('page_title', 'page_description', 'anexoCompras', 'usuarios', 'action'));
    }

    public function form_casilla_108()
    {
        $page_title = 'Formulario para agregar Ventas gravadas por cuenta de terceros domiciliados.';
        $page_description = 'Formulario para crear un registro de Ventas gravadas por cuenta de terceros domiciliados.';
        $usuarios = User::where('estado', '1')->get();

        $action = __FUNCTION__;

        return view('julie_conta.anexos.casilla108', compact('page_title', 'page_description', 'usuarios', 'action'));
    }

    public function form_casilla_108_edit($id)
    {
        $page_title = 'Formulario para editar Ventas gravadas por cuenta de terceros domiciliados.';
        $page_description = 'Formulario para editar un registro de Ventas gravadas por cuenta de terceros domiciliados.';
        $ventas = Casilla108::where("id", "=", $id)->get();
        $usuarios = User::where('estado', '1')->get();

        $action = __FUNCTION__;

        return view('julie_conta.anexos.casilla108', compact('page_title', 'page_description', 'ventas', 'usuarios', 'action'));
    }

    public function form_casilla_66()
    {
        $page_title = 'Formulario para agregar Compras a Sujetos Excluidos.';
        $page_description = 'Formulario para crear un registro de Compras a Sujetos Excluidos.';
        $usuarios = User::where('estado', '1')->get();

        $action = __FUNCTION__;

        return view('julie_conta.anexos.casilla66', compact('usuarios', 'page_title', 'page_description', 'action'));
    }

    public function form_casilla_66_edit($id)
    {
        $page_title = 'Formulario para editar Compras a Sujetos Excluidos.';
        $page_description = 'Formulario para editar un registro de Compras a Sujetos Excluidos.';
        $compras = Casilla66::where("id", "=", $id)->get();
        $usuarios = User::where('estado', '1')->get();

        $action = __FUNCTION__;

        return view('julie_conta.anexos.casilla66', compact('usuarios', 'page_title', 'page_description', 'compras', 'action'));
    }

    public function form_casilla_161()
    {
        $page_title = 'Formulario para agregar Anticipo a Cuenta de IVA 2% Efectuada al Declarante.';
        $page_description = 'Formulario para crear un registro de Anticipo a Cuenta de IVA 2% Efectuada al Declarante.';
        $usuarios = User::where('estado', '1')->get();

        $action = __FUNCTION__;

        return view('julie_conta.anexos.casilla161', compact('page_title', 'page_description', 'usuarios', 'action'));
    }

    public function form_casilla_161_edit($id)
    {
        $page_title = 'Formulario para editar Anticipo a Cuenta de IVA 2% Efectuada al Declarante.';
        $page_description = 'Formulario para editar un registro de Anticipo a Cuenta de IVA 2% Efectuada al Declarante.';
        $anticipos = Casilla161::where("id", "=", $id)->get();
        $usuarios = User::where('estado', '1')->get();

        $action = __FUNCTION__;

        return view('julie_conta.anexos.casilla161', compact('page_title', 'page_description', 'anticipos', 'usuarios', 'action'));
    }

    public function form_casilla_162()
    {
        $page_title = 'Formulario para agregar Retención de IVA 1% Efectuada al Declarante';
        $page_description = 'Formulario para crear un registro de Retención de IVA 1% Efectuada al Declarante';
        $usuarios = User::where('estado', '1')->get();

        $action = __FUNCTION__;

        return view('julie_conta.anexos.casilla162', compact('page_title', 'page_description', 'usuarios', 'action'));
    }

    public function form_casilla_162_edit($id)
    {
        $page_title = 'Formulario para editar Retención de IVA 1% Efectuada al Declarante';
        $page_description = 'Formulario para editar un registro de Retención de IVA 1% Efectuada al Declarante';
        $retenciones = Casilla162::where('id', '=', $id)->get();
        $usuarios = User::where('estado', '1')->get();

        $action = __FUNCTION__;

        return view('julie_conta.anexos.casilla162', compact('page_title', 'page_description', 'usuarios', 'retenciones', 'action'));
    }

    public function form_casilla_163()
    {
        $page_title = 'Formulario para agregar Percepción de IVA 1% Efectuada al Declarante.';
        $page_description = 'Formulario para crear un registro de Percepción de IVA 1% Efectuada al Declarante.';
        $usuarios = User::where('estado', '1')->get();

        $action = __FUNCTION__;

        return view('julie_conta.anexos.casilla163', compact('page_title', 'page_description', 'usuarios', 'action'));
    }

    public function form_casilla_163_edit($id)
    {
        $page_title = 'Formulario para editar Percepción de IVA 1% Efectuada al Declarante.';
        $page_description = 'Formulario para editar un registro de Percepción de IVA 1% Efectuada al Declarante.';
        $percepciones = Casilla163::where('id', '=', $id)->get();
        $usuarios = User::where('estado', '1')->get();

        $action = __FUNCTION__;

        return view('julie_conta.anexos.casilla163', compact('page_title', 'page_description', 'usuarios', 'percepciones', 'action'));
    }

    public function form_casilla_169()
    {
        $page_title = 'Formulario para agregar Percepción de IVA 1% Efectuada por Declarante.';
        $page_description = 'Formulario para crear un registro de Percepción de IVA 1% Efectuada por Declarante.';

        $action = __FUNCTION__;

        return view('julie_conta.anexos.casilla169', compact('page_title', 'page_description', 'action'));
    }

    public function form_casilla_169_edit($id)
    {
        $page_title = 'Formulario para editar Percepción de IVA 1% Efectuada por Declarante.';
        $page_description = 'Formulario para editar un registro de Percepción de IVA 1% Efectuada por Declarante.';
        $percepciones = Casilla169::where('id', '=', $id)->get();

        $action = __FUNCTION__;

        return view('julie_conta.anexos.casilla169', compact('page_title', 'page_description', 'percepciones', 'action'));
    }

    public function form_casilla_170()
    {
        $page_title = 'Formulario para agregar Retención 1% IVA a Terceros Domiciliados Efectuadas por el Declarante';
        $page_description = 'Formulario para crear un registro de Retención 1% IVA a Terceros Domiciliados Efectuadas por el Declarante';

        $action = __FUNCTION__;

        return view('julie_conta.anexos.casilla170', compact('page_title', 'page_description', 'action'));
    }

    public function form_casilla_170_edit($id)
    {
        $page_title = 'Formulario para editar Retención 1% IVA a Terceros Domiciliados Efectuadas por el Declarante';
        $page_description = 'Formulario para editar un registro de Retención 1% IVA a Terceros Domiciliados Efectuadas por el Declarante';
        $retenciones = Casilla170::where('id', '=', $id)->get();

        $action = __FUNCTION__;

        return view('julie_conta.anexos.casilla170', compact('page_title', 'page_description', 'retenciones', 'action'));
    }

    public function form_casilla_171()
    {
        $page_title = 'Formulario para agregar Anticipo a Cuenta de IVA 2% Efectuadas por el Declarante.';
        $page_description = 'Formulario para crear un registro de Anticipo a Cuenta de IVA 2% Efectuadas por el Declarante.';

        $action = __FUNCTION__;

        return view('julie_conta.anexos.casilla171', compact('page_title', 'page_description', 'action'));
    }

    public function form_casilla_171_edit($id)
    {
        $page_title = 'Formulario para editar Anticipo a Cuenta de IVA 2% Efectuadas por el Declarante.';
        $page_description = 'Formulario para editar un registro de Anticipo a Cuenta de IVA 2% Efectuadas por el Declarante.';
        $anticipos = Casilla171::where('id', '=', $id)->get();

        $action = __FUNCTION__;

        return view('julie_conta.anexos.casilla171', compact('page_title', 'page_description', 'anticipos', 'action'));
    }

    public function form_casilla_172()
    {
        $page_title = 'Formulario para agregar Retención 13% IVA a Terceros Domiciliados Efectuados por el Declarante.';
        $page_description = 'Formulario para crear un registro de Retención 13% IVA a Terceros Domiciliados Efectuados por el Declarante.';

        $action = __FUNCTION__;

        return view('julie_conta.anexos.casilla172', compact('page_title', 'page_description', 'action'));
    }

    public function form_casilla_172_edit($id)
    {
        $page_title = 'Formulario para editar Retención 13% IVA a Terceros Domiciliados Efectuados por el Declarante.';
        $page_description = 'Formulario para editar un registro de Retención 13% IVA a Terceros Domiciliados Efectuados por el Declarante.';
        $retenciones = Casilla172::where('id', '=', $id)->get();

        $action = __FUNCTION__;

        return view('julie_conta.anexos.casilla172', compact('page_title', 'page_description', 'retenciones', 'action'));
    }

    public function viewAnexoCompras()
    {
        $page_title = 'Anexo de compras.';
        $page_description = 'Todos los registros de anexo de compras.';
        $compras = DB::table('anexo_compras')
                        ->join('users', 'users.id', '=', 'anexo_compras.user_id')
                        ->select('users.*', 'anexo_compras.*')
                        ->where('users.estado', 1)->get();
        $usuarios = User::where('estado', 1)->get();

        $action = __FUNCTION__;

        return view('julie_conta.anexos.allAnexoCompras', compact('page_title', 'page_description', 'compras', 'usuarios', 'action'));
    }

    public function viewLibroCompras()
    {
        $page_title = 'Libro de compras.';
        $page_description = 'Genera los registros del libro de compras.';
        $usuarios = User::where('estado', 1)->get();

        $action = __FUNCTION__;

        return view('julie_conta.anexos.libroCompras', compact('page_title', 'page_description', 'usuarios', 'action'));
    }

    public function Login()
    {
        $page_title = 'Login.';
        $page_description = 'Login de acceso de usuarios.';

        $action = __FUNCTION__;

        return view('julie_conta.usuarios.login', compact('page_title', 'page_description', 'action'));
    }

    public function viewAnexoContribuyentes()
    {
        $page_title = 'Anexo de contribuyentes';
        $page_description = 'Todos los registros de anexo de contribuyentes.';
        $contribuyentes = DB::table('anexo_contribuyentes')
                        ->join('users', 'users.id', '=', 'anexo_contribuyentes.user_id')
                        ->select('users.*', 'anexo_contribuyentes.*')
                        ->where('users.estado', 1)->get();
        $usuarios = User::where('estado', 1)->get();

        $action = __FUNCTION__;

        return view('julie_conta.anexos.allAnexoContribuyentes', compact('page_title', 'page_description', 'contribuyentes', 'usuarios', 'action'));
    }

    public function viewLibroContribuyentes()
    {
        $page_title = 'Libro de ventas a contribuyentes';
        $page_description = 'Genera los registros del libro de ventas a contribuyentes.';
        $usuarios = User::where('estado', 1)->get();

        $action = __FUNCTION__;

        return view('julie_conta.anexos.libroVentasContribuyentes', compact('page_title', 'page_description', 'usuarios', 'action'));
    }

    public function viewLibroCF()
    {
        $page_title = 'Libro de ventas a consumidores';
        $page_description = 'Genera los registros del libro de ventas a consumidores.';
        $usuarios = User::where('estado', 1)->get();

        $action = __FUNCTION__;

        return view('julie_conta.anexos.libroVentasConsumidores', compact('page_title', 'page_description', 'usuarios', 'action'));
    }

    public function form_contribuyentes()
    {
        $page_title = 'Agregar Contribuyentes';
        $page_description = 'Formulario para agregar nuevos contribuyentes.';

        $action = __FUNCTION__;

        return view('julie_conta.contribuyentes.formContribuyentes', compact('page_title', 'page_description', 'action'));
    }

    public function form_contribuyentes_edit($id)
    {
        $page_title = 'Agregar Contribuyentes';
        $page_description = 'Formulario para agregar nuevos contribuyentes.';
        $contribuyentes = Contribuyente::where('id', $id)->get();

        $action = __FUNCTION__;

        return view('julie_conta.contribuyentes.formContribuyentes', compact('page_title', 'page_description', 'contribuyentes', 'action'));
    }

    public function viewContribuyentes()
    {
        $page_title = 'Contribuyentes';
        $page_description = 'Listado de los contribuyentes.';
        $contribuyentes = Contribuyente::all();

        $action = __FUNCTION__;

        return view('julie_conta.contribuyentes.allContribuyentes', compact('page_title', 'page_description', 'contribuyentes', 'action'));
    }

    public function viewCasilla108()
    {
        $page_title = 'Anexo Casilla 108';
        $page_description = 'Ventas Gravadas por Cuenta de Terceros Domiciliados.';
        $ventas = Casilla108::all();
        $usuarios = User::where('estado', 1)->get();

        $action = __FUNCTION__;

        return view('julie_conta.anexos.allCasilla108', compact('page_title', 'page_description', 'ventas', 'usuarios', 'action'));
    }

    public function inicio()
    {
        $page_title = 'Inicio';
        $page_description = 'Pagina de inicio del sistema';
        $logo = "images/logo.png";
        $logoText = "images/banner.png";
        $action = __FUNCTION__;

        return view('dashboard.inicio', compact('page_title', 'page_description','action','logo','logoText'));
    }

    public function viewCasilla66()
    {
        $page_title = 'Anexo Casilla 66';
        $page_description = 'Compras a Sujetos Excluídos';
        $compras = Casilla66::all();
        $usuarios = User::where('estado', 1)->get();

        $action = __FUNCTION__;

        return view('julie_conta.anexos.allCasilla66', compact('page_title', 'page_description', 'compras', 'usuarios', 'action'));
    }

    public function viewCasilla161()
    {
        $page_title = 'Anexo Casilla 161';
        $page_description = 'Anticipo a cuenta de IVA del 2% efectuada al declarante';
        $anticipos = Casilla161::all();
        $usuarios = User::where('estado', 1)->get();

        $action = __FUNCTION__;

        return view('julie_conta.anexos.allCasilla161', compact('page_title', 'page_description', 'anticipos', 'usuarios', 'action'));
    }

    public function viewCasilla162()
    {
        $page_title = 'Anexo Casilla 162';
        $page_description = 'Retención de IVA del 1% efectuada al declarante';
        $retenciones = Casilla162::all();
        $usuarios = User::where('estado', 1)->get();

        $action = __FUNCTION__;

        return view('julie_conta.anexos.allCasilla162', compact('page_title', 'page_description', 'retenciones', 'usuarios', 'action'));
    }

    public function viewCasilla163()
    {
        $page_title = 'Anexo Casilla 163';
        $page_description = 'Retención de IVA del 1% efectuada al declarante';
        $percepciones = Casilla163::all();
        $usuarios = User::where('estado', 1)->get();

        $action = __FUNCTION__;

        return view('julie_conta.anexos.allCasilla163', compact('page_title', 'page_description', 'percepciones', 'usuarios', 'action'));
    }

    public function viewCasilla169()
    {
        $page_title = 'Anexo Casilla 169';
        $page_description = 'Percepción del IVA del 1% efectuada por el declarante';
        $percepciones = Casilla169::all();
        $usuarios = User::where('estado', 1)->get();

        $action = __FUNCTION__;

        return view('julie_conta.anexos.allCasilla169', compact('page_title', 'page_description', 'percepciones', 'usuarios', 'action'));
    }

    public function viewCasilla170()
    {
        $page_title = 'Anexo Casilla 170';
        $page_description = 'Retención 1% IVA a terceros domniciliados efectuadas por el declarante';
        $retenciones = Casilla170::all();
        $usuarios = User::where('estado', 1)->get();

        $action = __FUNCTION__;

        return view('julie_conta.anexos.allCasilla163', compact('page_title', 'page_description', 'retenciones', 'usuarios', 'action'));
    }

    public function viewCasilla171()
    {
        $page_title = 'Anexo Casilla 171';
        $page_description = 'Anticipo a cuenta del 2% efectuada por el declarante';
        $anticipos = Casilla171::all();
        $usuarios = User::where('estado', 1)->get();

        $action = __FUNCTION__;

        return view('julie_conta.anexos.allCasilla163', compact('page_title', 'page_description', 'anticipos', 'usuarios', 'action'));
    }

    public function viewCasilla172()
    {
        $page_title = 'Anexo Casilla 172';
        $page_description = 'Retención 13% IVA a terceros domiciliados efectuadas por el declarante';
        $retenciones = Casilla172::all();
        $usuarios = User::where('estado', 1)->get();

        $action = __FUNCTION__;

        return view('julie_conta.anexos.allCasilla163', compact('page_title', 'page_description', 'retenciones', 'usuarios', 'action'));
    }


}
