<?php

use App\Http\Controllers\DocumentController;
use Illuminate\Support\Facades\Route;

Route::domain(env('SITE_APP_DOMAIN'))->group(function () {

    // Route::get('/test', function () {
    //         return view('site.test');
    //     })->name('test');
    // Route::get('/test', function () {
    //     $rooms = App\Models\Room::all();
        
    //     foreach($rooms as $room)
    //     {
    //         $room->generateSlug();
    //         $room->save();
    //     }
    // });
    Route::get('/what-is-co-living', [App\Http\Controllers\SiteController::class, 'whatiscoliving'])->name('whatiscoliving');
    Route::get('/about-us', [App\Http\Controllers\SiteController::class, 'aboutus'])->name('aboutus');
    Route::get('/room/{room:slug}', [App\Http\Controllers\SiteController::class, 'room'])->name('room_details');
    Route::get('/expats', [App\Http\Controllers\SiteController::class, 'expats'])->name('expats');
    Route::get('/coliving-for-students-interns', [App\Http\Controllers\SiteController::class, 'students'])->name('students');
    Route::get('/coliving-perks', [App\Http\Controllers\SiteController::class, 'perks'])->name('perks');
    Route::get('/landlords', [App\Http\Controllers\SiteController::class, 'landlords'])->name('landlords');
    
    Route::get('/{property:slug?}', [App\Http\Controllers\SiteController::class, 'index'])->name('site');
});


Route::get('/', function () {
    return redirect(route('home'));
});

Route::view('/licence', 'licence')->name('licence');

Route::get('/join/{email}', [App\Http\Controllers\InvitationController::class, 'accept'])->name('invitations.accept')->middleware('signed');


// Authenticated routes
Route::group(['middleware' => ['auth']], function () {
    
    Route::get('/dashboard', function () {
        return view('home');
    })->name('home');
    Route::get('/users', function () {
        return view('home');
    })->name('users');
    Route::get('/products', function () {
        return view('home');
    })->name('products');
    Route::get('/settings', function () {
        return view('settings');
    })->name('settings');

    Route::get('/whatsapp/{user}/show', [App\Http\Controllers\WhatsappMessageController::class, 'show'])->name('whatsapp.show');
    Route::get('/whatsapp/{user}/latest', [App\Http\Controllers\WhatsappMessageController::class, 'latest'])->name('whatsapp.latest');
    Route::get('/whatsapp/media', [App\Http\Controllers\WhatsappMessageController::class, 'load_media'])->name('media.show');

    
    Route::resource('users', App\Http\Controllers\UserController::class)->only(['index', 'store', 'edit', 'update', 'destroy']);
    Route::get('users/invite', [App\Http\Controllers\UserController::class, 'create'])->name('users.create');
    Route::get('invitations', [App\Http\Controllers\InvitationController::class, 'index'])->name('invitations.index');
    Route::post('invitations', [App\Http\Controllers\InvitationController::class, 'store'])->name('invitations.store');
    Route::put('invitations/{invitation}/cancel', [App\Http\Controllers\InvitationController::class, 'cancel'])->name('invitations.cancel');




    Route::resource('districts', App\Http\Controllers\DistrictController::class);
    Route::resource('properties', App\Http\Controllers\PropertyController::class);
    Route::post('properties/sort', [App\Http\Controllers\PropertyController::class, 'sort'])->name('properties.sort');

    Route::get('properties/{property}/rooms', [App\Http\Controllers\RoomController::class, 'index'])->name('rooms.index');
    Route::get('properties/{property}/rooms/new', [App\Http\Controllers\RoomController::class, 'create'])->name('rooms.create');
    Route::post('properties/{property}/rooms', [App\Http\Controllers\RoomController::class, 'store'])->name('rooms.store');
    Route::get('properties/{property}/rooms/{room}/edit', [App\Http\Controllers\RoomController::class, 'edit'])->name('rooms.edit');
    Route::put('properties/{property}/rooms/{room}', [App\Http\Controllers\RoomController::class, 'update'])->name('rooms.update');
    Route::delete('properties/{property}/rooms/{room}', [App\Http\Controllers\RoomController::class, 'destroy'])->name('rooms.delete');

    Route::get('openai', [App\Http\Controllers\OpenaiController::class, 'index'])->name('openai.index');
    Route::get('openai/inquiry', [App\Http\Controllers\OpenaiController::class, 'inquiry'])->name('openai.inquiry');
    // Route::get('test', [App\Http\Controllers\PdfController::class, 'test']);
    Route::get('tenancy_agreement/{room_id}', [App\Http\Controllers\PdfController::class, 'tenancy_agreement']);

    Route::resource('roles', App\Http\Controllers\RoleController::class);
    Route::get('roles/{role}/permissions', [App\Http\Controllers\RoleController::class, 'permissions'])->name('roles.permissions');
    Route::put('roles/{role}/permissions', [App\Http\Controllers\RoleController::class, 'sync_permissions'])->name('roles.permissions.sync');
    // Route::resource('permissions', App\Http\Controllers\PermissionController::class);

    Route::prefix('documents')->group(function () {
        Route::get('/', [App\Http\Controllers\DocumentController::class, 'index'])->name('documents.index');
        Route::get('{document}/pdf', [App\Http\Controllers\DocumentController::class, 'pdf'])->name('documents.pdf');
        Route::get('create', [App\Http\Controllers\DocumentController::class, 'create'])->name('documents.create');
        Route::post('/', [App\Http\Controllers\DocumentController::class, 'store'])->name('documents.store');
        Route::get('{document}/edit', [App\Http\Controllers\DocumentController::class, 'edit'])->name('documents.edit');
        Route::put('{document}/edit', [App\Http\Controllers\DocumentController::class, 'update'])->name('documents.update');
    });

    Route::get('audits', [App\Http\Controllers\AuditController::class, 'index'])->name('audits.index');
    Route::get('audits/{model}/{id}', [App\Http\Controllers\AuditController::class, 'show'])->name('audits.show');


    Route::prefix('help')->group(function () {
        Route::view('/properties/map_url', 'help.properties.map_url')->name('help.properties.map_url');
    });

    
});