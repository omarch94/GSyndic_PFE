<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ImmeubleController;
use App\Http\Controllers\CoproprieteController;
use App\Http\Controllers\ReclamationController;
use App\Http\Controllers\ResolutionController;
use App\Http\Controllers\FactureController;
use App\Http\Controllers\PaimentController;
use App\Http\Controllers\ReunionController;
use App\Http\Controllers\ChargeController;
use App\Http\Controllers\MeetingController;
use App\Http\Controllers\PDFController;

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

Auth::routes();

Route::get('/', function () {
    return \Illuminate\Support\Facades\Redirect::route('login');
});

Route::middleware(['auth'])->group(function(){
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
    Route::get('/profile', [App\Http\Controllers\HomeController::class, 'profile'])->name('profile');
    Route::get('/reset_password', [App\Http\Controllers\HomeController::class, 'resetPassword'])->name('reset_password');
    Route::post('/reset_password', [App\Http\Controllers\HomeController::class, 'resetPasswordPost'])->name('reset_password_post');
    Route::get('logout', [App\Http\Controllers\HomeController::class, 'logout'])->name('logout');

    Route::prefix('utilisateurs')->name('utilisateurs.')->group(function(){
        Route::get('/', [UserController::class, 'index'])->name('index');
        Route::get('/create', [UserController::class,'create'])->name('create');
        Route::post('/', [UserController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [UserController::class, 'edit'])->name('edit');
        Route::put('/{id}', [UserController::class, 'update'])->name('update');
        Route::get('/{id}/afficher', [UserController::class, 'show'])->name('show');
        Route::delete('/{id}', [UserController::class, 'destroy'])->name('destroy');
        Route::post('/modifier_statut', [UserController::class, 'modifierStatut'])->name('modifier_statut');
    });

    Route::prefix('roles')->name('roles.')->group(function(){
        Route::get('/', [RoleController::class, 'index'])->name('index');
        Route::get('/create', [RoleController::class,'create'])->name('create');
        Route::post('/', [RoleController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [RoleController::class, 'edit'])->name('edit');
        Route::put('/{id}', [RoleController::class, 'update'])->name('update');
        Route::get('/{id}/afficher', [RoleController::class, 'show'])->name('show');
        Route::delete('/{id}', [RoleController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('permissions')->name('permissions.')->group(function(){
        Route::get('/', [PermissionController::class, 'index'])->name('index');
        Route::get('/create', [PermissionController::class,'create'])->name('create');
        Route::post('/', [PermissionController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [PermissionController::class, 'edit'])->name('edit');
        Route::put('/{id}', [PermissionController::class, 'update'])->name('update');
        Route::get('/{id}/afficher', [PermissionController::class, 'show'])->name('show');
        Route::delete('/{id}', [PermissionController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('immeubles')->name('immeubles.')->group(function(){
        Route::get('/', [ImmeubleController::class, 'index'])->name('index');
        Route::get('/create', [ImmeubleController::class,'create'])->name('create');
        Route::post('/', [ImmeubleController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [ImmeubleController::class, 'edit'])->name('edit');
        Route::put('/{id}', [ImmeubleController::class, 'update'])->name('update');
        Route::get('/{id}/afficher', [ImmeubleController::class, 'show'])->name('show');
        Route::delete('/{id}', [ImmeubleController::class, 'destroy'])->name('destroy');
        Route::get('/get-immeubles', [ImmeubleController::class, 'getImmeubles'])->name('immeubles');
        Route::get('immeubles-export', [ImmeubleController::class,'export'])->name('export');
        Route::post('immeubles-import',[ImmeubleController::class, 'import'])->name('import');   
     });

    Route::prefix('coproprietes')->name('coproprietes.')->group(function(){
        Route::get('/', [CoproprieteController::class, 'index'])->name('index');
        Route::get('/create', [CoproprieteController::class,'create'])->name('create');
        Route::post('/', [CoproprieteController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [CoproprieteController::class, 'edit'])->name('edit');
        Route::put('/{id}', [CoproprieteController::class, 'update'])->name('update');
        Route::get('/{id}/afficher', [CoproprieteController::class, 'show'])->name('show');
        Route::delete('/{id}', [CoproprieteController::class, 'destroy'])->name('destroy');
        Route::get('/get-charges', [CoproprieteController::class, 'getCharges'])->name('charges');
    });

    Route::prefix('charges')->name('charges.')->group(function(){
        Route::get('/', [ChargeController::class, 'index'])->name('index');
        Route::get('/create', [ChargeController::class,'create'])->name('create');
        Route::post('/', [ChargeController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [ChargeController::class, 'edit'])->name('edit');
        Route::put('/{id}', [ChargeController::class, 'update'])->name('update');
        Route::get('/{id}/afficher', [ChargeController::class, 'show'])->name('show');
        Route::delete('/{id}', [ChargeController::class, 'destroy'])->name('destroy');
        Route::post('/modifier_statut', [ChargeController::class, 'modifierStatut'])->name('modifier_statut');
    });

    Route::prefix('reclamations')->name('reclamations.')->group(function(){
        Route::get('/', [ReclamationController::class, 'index'])->name('index');
        Route::get('/create', [ReclamationController::class,'create'])->name('create');
        Route::post('/', [ReclamationController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [ReclamationController::class, 'edit'])->name('edit');
        Route::put('/{id}', [ReclamationController::class, 'update'])->name('update');
        Route::get('/{id}/afficher', [ReclamationController::class, 'show'])->name('show');
        Route::delete('/{id}', [ReclamationController::class, 'destroy'])->name('destroy');
        Route::post('/modifier_statut', [ReclamationController::class, 'modifierStatut'])->name('modifier_statut');
    });

    Route::prefix('resolutions')->name('resolutions.')->group(function(){
        Route::get('/', [ResolutionController::class, 'index'])->name('index');
        Route::get('/create', [ResolutionController::class,'create'])->name('create');
        Route::post('/', [ResolutionController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [ResolutionController::class, 'edit'])->name('edit');
        Route::put('/{id}', [ResolutionController::class, 'update'])->name('update');
        Route::get('/{id}/afficher', [ResolutionController::class, 'show'])->name('show');
        Route::delete('/{id}', [ResolutionController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('paiments')->name('paiments.')->group(function(){
        Route::get('/', [PaimentController::class, 'index'])->name('index');
        Route::get('/create', [PaimentController::class,'create'])->name('create');
        Route::post('/', [PaimentController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [PaimentController::class, 'edit'])->name('edit');
        Route::put('/{id}', [PaimentController::class, 'update'])->name('update');
        Route::get('/{id}/afficher', [PaimentController::class, 'show'])->name('show');
        Route::delete('/{id}', [PaimentController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('factures')->name('factures.')->group(function(){
        Route::get('/', [FactureController::class, 'index'])->name('index');
        Route::get('/create', [FactureController::class,'create'])->name('create');
        Route::post('/', [FactureController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [FactureController::class, 'edit'])->name('edit');
        Route::put('/{id}', [FactureController::class, 'update'])->name('update');
        Route::get('/{id}/afficher', [FactureController::class, 'show'])->name('show');
        Route::delete('/{id}', [FactureController::class, 'destroy'])->name('destroy');
        Route::post('/modifier_etat_facture', [FactureController::class, 'modifierEtatFacture'])->name('modifier_etat_acture');
        Route::get('generate-pdf', [FactureController::class, 'generatePDF']);

    });

    Route::prefix('reunions')->name('reunions.')->group(function(){
        Route::get('/', [ReunionController::class, 'index'])->name('index');
        Route::get('/create', [ReunionController::class,'create'])->name('create');
   
    Route::get("/createMeeting", [MeetingController::class, 'createMeeting'])->name("createMeeting");

        Route::post('/', [ReunionController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [ReunionController::class, 'edit'])->name('edit');
        Route::put('/{id}', [ReunionController::class, 'update'])->name('update');
        Route::get('/{id}/afficher', [ReunionController::class, 'show'])->name('show');
        Route::delete('/{id}', [ReunionController::class, 'destroy'])->name('destroy');
        Route::post('/ajouter_proces_verbal', [ReunionController::class, 'uploadProcesVerbal'])->name('upload_proces_verbal');
        Route::get('/proces_verbal/{id}', [ReunionController::class, 'afficherProcesVerbal'])->name('afficher_proces_verbal');
        Route::get('generate-pdf/', [ReunionController::class, 'generatePDF']);
 
    });

    Route::prefix('paiment')->name('paiment.')->group(function(){
        Route::get('/', [PaimentController::class, 'index'])->name('index');
        Route::get('/create', [PaimentController::class,'create'])->name('create');
        Route::post('/', [PaimentController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [PaimentController::class, 'edit'])->name('edit');
        Route::put('/{id}', [PaimentController::class, 'update'])->name('update');
        Route::get('/{id}/afficher', [PaimentController::class, 'show'])->name('show');
        Route::delete('/{id}', [PaimentController::class, 'destroy'])->name('destroy');
    });

//Meeting video chat

    // Route::post("/validateMeeting", [MeetingController::class, 'validateMeeting'])->name("validateMeeting");
    
    Route::get("/meeting/{meetingId}", function($meetingId) {
    
        $METERED_DOMAIN = env('METERED_DOMAIN');
        return view('reunions.meeting', [
            'METERED_DOMAIN' => $METERED_DOMAIN,
            'MEETING_ID' => $meetingId
        ]);
    });
});
