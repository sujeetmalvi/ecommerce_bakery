<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RazorpayController;


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

/***********************************************************************************************************/
/* Start Website Routes */
    // Route::get('/', function () {
    //     return view('website/index');
    // });
    Route::get('/', [UserController::class, 'index']);

    Route::get('/checkout', function() {
        return view('website/checkout');
    });
    Route::get('/contact', function() {
        return view('website/contact');
    });
    Route::get('/testimonials', function() {
        return view('website/testimonials');
    });
    Route::get('/cart', function() {
        return view('website/cart');
    });
    // Route::get('/product-details', function() {
    //     return view('website/product-details');
    // });
    Route::get('/product-details', [UserController::class, 'productDetails']);
    Route::get('/register', function() {
        return view('website/register');
    });
    Route::get('/login', function() {
        return view('website/login');
    });
    Route::post('/add-item-in-cart', [UserController::class, 'itemAddToCart']);
    Route::post('/remove-item-from-cart', [UserController::class, 'itemRemoveFromCart']);
    Route::post('/razorpay-payment',[RazorpayController::class, 'store']);
    Route::post('/add-user', [UserController::class, 'addUser']);
    Route::get('/payment', function() {
        return view('website/razorpay-payment');
    });
    Route::post('/increase-decrease-qty', [UserController::class, 'increaseDecreaseQty']);

/* End Website Routes */
/***********************************************************************************************************/


Route::get('/admin', function () {
    return view('admin/login');
});

Route::match (['get', 'post'], '/login', [LoginController::class, 'index'])->name('login');

Route::middleware('auth')->group(function () {
    Route::get('/logout', [LoginController::class, 'logout']);
    Route::get(
        '/dashboard',
        function () {
            return view('admin/dashboard');
        }
    )->name('dashboard');
    Route::get(
        '/dashboard2',
        function () {
            return view('admin/dashboard2');
        }
    )->name('dashboard');
    Route::get(
        '/dashboard3',
        function () {
            return view('admin/dashboard3');
        }
    )->name('dashboard');
    Route::get(
        '/form',
        function () {
            return view('admin/form');
        }
    )->name('form');
    Route::get(
        '/form_advanced',
        function () {
            return view('admin/form_advanced');
        }
    )->name('form_advanced');
    Route::get(
        '/form_validation',
        function () {
            return view('admin/form_validation');
        }
    )->name('form_validation');

    Route::get(
        '/form_wizards',
        function () {
            return view('admin/form_wizards');
        }
    )->name('form_wizards');

    Route::get(
        '/form_upload',
        function () {
            return view('admin/form_upload');
        }
    )->name('form_upload');

    Route::get(
        '/form_buttons',
        function () {
            return view('admin/form_buttons');
        }
    )->name('form_buttons');

    Route::get(
        '/general_elements',
        function () {
            return view('admin/general_elements');
        }
    )->name('general_elements');

    Route::get(
        '/media_gallery',
        function () {
            return view('admin/media_gallery');
        }
    )->name('media_gallery');

    Route::get(
        '/typography',
        function () {
            return view('admin/typography');
        }
    )->name('typography');

    Route::get(
        '/icons',
        function () {
            return view('admin/icons');
        }
    )->name('icons');

    Route::get(
        '/glyphicons',
        function () {
            return view('admin/glyphicons');
        }
    )->name('glyphicons');

    Route::get(
        '/widgets',
        function () {
            return view('admin/widgets');
        }
    )->name('widgets');

    Route::get(
        '/invoice',
        function () {
            return view('admin/invoice');
        }
    )->name('invoice');

    Route::get(
        '/inbox',
        function () {
            return view('admin/inbox');
        }
    )->name('inbox');

    Route::get(
        '/calendar',
        function () {
            return view('admin/calendar');
        }
    )->name('calendar');

    Route::get(
        '/tables',
        function () {
            return view('admin/tables');
        }
    )->name('tables');

    Route::get(
        '/tables_dynamic',
        function () {
            return view('admin/tables_dynamic');
        }
    )->name('tables_dynamic');

    Route::get(
        '/chartjs',
        function () {
            return view('admin/chartjs');
        }
    )->name('chartjs');

    Route::get(
        '/chartjs2',
        function () {
            return view('admin/chartjs2');
        }
    )->name('chartjs2');

    Route::get(
        '/morisjs',
        function () {
            return view('admin/morisjs');
        }
    )->name('morisjs');

    Route::get(
        '/echarts',
        function () {
            return view('admin/echarts');
        }
    )->name('echarts');

    Route::get(
        '/other_charts',
        function () {
            return view('admin/other_charts');
        }
    )->name('other_charts');
    Route::get(
        '/fixed_sidebar',
        function () {
            return view('admin/fixed_sidebar');
        }
    )->name('fixed_sidebar');

    Route::get(
        '/fixed_footer',
        function () {
            return view('admin/fixed_footer');
        }
    )->name('fixed_footer');

    Route::get(
        '/e_commerce',
        function () {
            return view('admin/e_commerce');
        }
    )->name('e_commerce');

    Route::get(
        '/projects',
        function () {
            return view('admin/projects');
        }
    )->name('projects');


    Route::get(
        '/project_detail',
        function () {
            return view('admin/project_detail');
        }
    )->name('project_detail');

    Route::get(
        '/contacts',
        function () {
            return view('admin/contacts');
        }
    )->name('contacts');

    Route::get(
        '/page_403',
        function () {
            return view('admin/page_403');
        }
    )->name('page_403');

    Route::get(
        '/page_404',
        function () {
            return view('admin/page_404');
        }
    )->name('page_404');

    Route::get(
        '/page_500',
        function () {
            return view('admin/page_500');
        }
    )->name('page_500');

    Route::get(
        '/plain_page',
        function () {
            return view('admin/plain_page');
        }
    )->name('plain_page');

    Route::get(
        '/pricing_tables',
        function () {
            return view('admin/pricing_tables');
        }
    )->name('pricing_tables');

    Route::get(
        '/level2',
        function () {
            return view('admin/level2');
        }
    )->name('level2');



    Route::get('/profile', [UserController::class, 'profile'])->name('profile');

});