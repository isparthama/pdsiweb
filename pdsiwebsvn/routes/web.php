<?php

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
Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('config:clear');
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('config:cache');
    return 'DONE'; //Return anything
});
Route::get('/','Home@index');


Route::post('/showmodal','Home@showformmodal');

Route::post('/validate','Auth\LoginController@login');
Route::post('/validateapi','Auth\LoginController@apilogin');

Route::post('/signup','Auth\RegisterController@register')->name('signup');
Route::post('/validate-admin','Useradmin@ceklogin');
Route::view('/login', 'front-end.formlogin');

// group by admin 
Route::middleware('auth.admin','auth.role:admin')->group(function() {

    Route::prefix('admin-user')->group(function () {
        Route::get('/','Home@adminuser');
        Route::get('/under-construction','Home@underconstruct');
        
        //serah terima
        Route::get('/serah-terima-list/{id}','Serahterima@index');
        Route::get('/proses-review-list/{id}','Serahterima@review');
        Route::get('/proses-review-approve/{id}','Serahterima@showapprovereview');
        Route::post('/proses-review-store-approve','Serahterima@saveapprovereview');
        Route::post('/proses-review-open','Serahterima@openstatus');
        
        //email
        Route::get('/send-mail-list','NotifikasiEmail@index');
        Route::get('/send-mail/{id}','NotifikasiEmail@sendEmail');
        
        
        //site
        Route::get('/site-list','Site@index');
        Route::get('/site-create','Site@create');
        Route::get('/site-edit/{id}','Site@edit');
        Route::get('/site-delete/{id}','Site@destroy');
        Route::post('/site-store','Site@store');
        Route::post('/site-update','Site@update');
        Route::post('/site-ajax','Site@ajaxs');
        
        //tools
        Route::get('/tools-list','Tools@index');
        Route::get('/tools-create','Tools@create');
        Route::get('/tools-edit/{id}','Tools@edit');
        Route::get('/tools-delete/{id}','Tools@destroy');
        Route::post('/tools-store','Tools@store');
        Route::post('/tools-update','Tools@update');
        
        //mesin
        Route::get('/mesin-list','Mesin@index');
        Route::get('/mesin-create','Mesin@create');
        Route::get('/mesin-edit/{id}','Mesin@edit');
        Route::get('/mesin-delete/{id}','Mesin@destroy');
        Route::post('/mesin-store','Mesin@store');
        Route::post('/mesin-update','Mesin@update');
        
        
        //material
        Route::get('/material-list','Material@index');
        Route::get('/material-create','Material@create');
        Route::get('/material-edit/{id}','Material@edit');
        Route::get('/material-delete/{id}','Material@destroy');
        Route::post('/material-store','Material@store');
        Route::post('/material-update','Material@update');
        
        //personil
        Route::get('/personil-list','Personil@index');
        Route::get('/personil-create','Personil@create');
        Route::get('/personil-edit/{id}','Personil@edit');
        Route::get('/personil-delete/{id}','Personil@destroy');
        Route::post('/personil-store','Personil@store');
        Route::post('/personil-update','Personil@update');
        
        //masterpersonil
        Route::get('/masterpersonil-list','Masterpersonil@index');
        Route::get('/masterpersonil-create','Masterpersonil@create');
        Route::get('/masterpersonil-edit/{id}','Masterpersonil@edit');
        Route::get('/masterpersonil-delete/{id}','Masterpersonil@destroy');
        Route::post('/masterpersonil-store','Masterpersonil@store');
        Route::post('/masterpersonil-update','Masterpersonil@update');
        
        
        
        
        
        
        
        
        
        
        
        Route::get('/edit-serah-terima/{id}','Serahterima@edit');
        Route::get('/look-serah-terima/{id}','Serahterima@details');
        Route::get('/delete-serah-terima/{id}','Serahterima@destroy');
        Route::get('/approve-serah-terima/{id}','Serahterima@approve');
        Route::post('/serah-terima/storeapprove','Serahterima@storeapprove');
        Route::get('/serah-terima/create','Serahterima@create');
        Route::get('/serah-terima/print-pdf/{id}','Serahterima@printpdf');
        
        Route::post('/serah-terima/store','Serahterima@store');
        Route::post('/serah-terima/update','Serahterima@update');
        
        //routing
        Route::get('/routing-slip-no/{id}','Routingslip@index');
        Route::get('/routing-slip-no-list/{id}','Routingslip@listrouting');
        
        Route::post('/saverouting','Routingslip@saverouting');
        
        //inspeksi
        Route::get('/inspeksi-list/{id}','Inspeksi@index');
        Route::get('/inspeksi-create','Inspeksi@create');
        Route::post('/inspeksi-material','Inspeksi@showmaterial');
        Route::post('/detail-material','Inspeksi@showmaterialdetail');
        Route::post('/inspeksi-store','Inspeksi@store');
        Route::post('/inspeksi-store-approve','Inspeksi@storeapprove');
        
        Route::post('/inspeksi-update','Inspeksi@update');
        Route::post('/save-material','Inspeksi@savematerial');
        Route::post('/delete-material','Inspeksi@deletematerial');
        Route::get('/look-inspeksi/{id}','Inspeksi@detailserahterima');
        Route::get('/look-review/{id}','Inspeksi@detailserahterima2');
        
        Route::get('/look-inspeksi-preview/{id}','Inspeksi@details');
        
        
        
        
        Route::get('/detail-serah-terima/{id}','Inspeksi@showserahterima');
        Route::get('/edit-inspeksi/{id}','Inspeksi@edit');
        Route::get('/delete-inspeksi/{id}','Inspeksi@destroy');
        Route::get('/approve-inspeksi/{id}','Inspeksi@showapprove');
        
        //produksi
        Route::get('/produksi-list/{id}','Produksi@index');
        Route::get('/produksi-create','Produksi@create');
        Route::post('/produksi-material','Produksi@showmaterial');
        Route::post('/produksi-store','Produksi@store');
        Route::post('/produksi-store-approve','Produksi@storeapprove');
        
        Route::post('/produksi-update','Produksi@update');
        Route::post('/save-material-produksi','Produksi@savematerial');
        Route::post('/delete-material-produksi','Produksi@deletematerial');
        Route::get('/look-produksi/{id}','Produksi@details');
        
        
        Route::get('/detail-serah-terima-produksi/{id}','Produksi@showserahterima');
        Route::get('/edit-produksi/{id}','Produksi@edit');
        Route::get('/delete-produksi/{id}','Produksi@destroy');
        Route::get('/approve-produksi/{id}','Produksi@showapprove');
        
        //procurement
        Route::get('/procurement-list/{id}','Procurement@index');
        Route::get('/approve-procurement/{id}','Procurement@showapprove');
        Route::get('/edit-procurement/{id}','Procurement@edit');
        
        Route::post('/procurement-store-approve','Procurement@storeapprove');
        Route::post('/procurement-store','Procurement@store');
        
        //MDR
        Route::get('/mdr-list/{id}','Manufaktur@index');
        Route::get('/show-mdr/{id}','Manufaktur@showform');
        Route::get('/zip-mdr/{id}','Manufaktur@downloadzip');
        Route::get('/zip-mdr-detail/{id}/{id2}','Manufaktur@downloadzipdetail');
        
        Route::get('/mdr-print-pdf/{id}','Manufaktur@printpdf');
        Route::get('/mdr-approve/{id}','Manufaktur@showapprove');
        Route::post('/mdr-store-approve','Manufaktur@saveapprove');
        
        
        //Route::get('/approve-procurement/{id}','Procurement@showapprove');
        //Route::post('/procurement-store-approve','Procurement@storeapprove');
        
        
        
        //realisasi
        Route::get('/realisasi-list/{id}','Realisasi@index');
        Route::get('/realisasi-create','Realisasi@create');
        Route::post('/realisasi-material','Realisasi@showmaterial');
        Route::post('/realisasi-store','Realisasi@store');
        Route::post('/realisasi-store-approve','Realisasi@storeapprove');
        
        Route::post('/realisasi-update','Realisasi@update');
        Route::post('/save-material-realisasi','Realisasi@savematerial');
        Route::post('/delete-material-realisasi','Realisasi@deletematerial');
        Route::get('/look-realisasi/{id}','realisasi@details');
        
        
        Route::get('/detail-serah-terima-realisasi/{id}','Realisasi@showserahterima');
        Route::get('/edit-realisasi/{id}','Realisasi@edit');
        Route::get('/pdf-realisasi/{id}','Realisasi@printpdf');
        
        Route::get('/delete-realisasi/{id}','Realisasi@destroy');
        Route::get('/approve-realisasi/{id}','Realisasi@showapprove');
        
        //inspeksitest
        Route::get('/inspeksitest-list/{id}','Inspeksitest@index');
        Route::get('/inspeksitest-create','Inspeksitest@create');
        Route::post('/inspeksitest-material','Inspeksitest@showmaterial');
        Route::post('/inspeksitest-store','Inspeksitest@store');
        Route::post('/inspeksitest-store-approve','Inspeksitest@storeapprove');
        
        Route::post('/inspeksitest-update','Inspeksitest@update');
        Route::post('/save-material-inspeksitest','Inspeksitest@savematerial');
        Route::post('/delete-material-inspeksitest','Inspeksitest@deletematerial');
        Route::get('/look-inspeksitest/{id}','inspeksitest@details');
        
        
	Route::get('/detail-serah-terima-inspeksitest/{id}','Inspeksitest@showserahterima');
	Route::get('/detail-inspeksitest/{id}','Inspeksitest@detail');
        Route::get('/edit-inspeksitest/{id}','Inspeksitest@edit');
        Route::get('/delete-inspeksitest/{id}','Inspeksitest@destroy');
        Route::get('/approve-inspeksitest/{id}','Inspeksitest@showapprove');
        
        //pengerjaanulang
        Route::get('/pengerjaanulang-list/{id}','PengerjaanUlang@index');
        Route::get('/pengerjaanulang-create','PengerjaanUlang@create');
        Route::post('/pengerjaanulang-material','PengerjaanUlang@showmaterial');
        Route::post('/pengerjaanulang-store','PengerjaanUlang@store');
        Route::post('/pengerjaanulang-store-approve','PengerjaanUlang@storeapprove');
        
        Route::post('/pengerjaanulang-update','PengerjaanUlang@update');
        Route::post('/save-material-pengerjaanulang','PengerjaanUlang@savematerial');
        Route::post('/delete-material-pengerjaanulang','PengerjaanUlang@deletematerial');
        Route::get('/look-pengerjaanulang/{id}','PengerjaanUlang@details');
        
        
        Route::get('/detail-serah-terima-pengerjaanulang/{id}','PengerjaanUlang@showserahterima');
        Route::get('/edit-pengerjaanulang/{id}','PengerjaanUlang@edit');
        Route::get('/delete-pengerjaanulang/{id}','PengerjaanUlang@destroy');
        Route::get('/approve-pengerjaanulang/{id}','PengerjaanUlang@showapprove');
        
        //finishing
        Route::get('/finishing-list/{id}','Finishing@index');
        Route::get('/finishing-edit/{id}','Finishing@edit');
        Route::get('/finishing-approve/{id}','Finishing@showapprove');
        Route::get('/finishing-pdf/{id}','Finishing@printpdf');
        
        Route::post('/finishing-store','Finishing@store');
        Route::post('/finishing-store-approve','Finishing@storeapprove');
        
        
        //serah terima keluar
        Route::get('/serahterimakeluar-list/{id}','Serahterimakeluar@index');
        Route::get('/serahterimakeluar-edit/{id}','Serahterimakeluar@edit');
        Route::get('/serahterimakeluar-pdf/{id}','Serahterimakeluar@printpdf');
        
        Route::get('/serahterimakeluar-approve/{id}','Serahterimakeluar@approve');
        
        Route::post('/serahterimakeluar-store','Serahterimakeluar@update');
        Route::post('/serahterimakeluar-store-approve','Serahterimakeluar@storeapprove');
        
        //menu
        Route::get('/master-menu/','MasterMenu@index');
        
        //jabatan
        Route::get('/jabatan-list','Jabatan@index');
        Route::get('/jabatan-create','Jabatan@create');
        Route::post('/jabatan-material','Jabatan@showmaterial');
        //Route::post('/detail-material','Jabatan@showmaterialdetail');
        Route::post('/jabatan-store','Jabatan@store');
        Route::post('/jabatanrole-store','Jabatan@storerole');
        
        Route::post('/jabatan-store-approve','Jabatan@storeapprove');
        
        Route::post('/jabatan-update','Jabatan@update');
        //Route::post('/save-material','Jabatan@savematerial');
        //Route::post('/delete-material','Jabatan@deletematerial');
        Route::get('/look-jabatan/{id}','Jabatan@details');
        
        
        //Route::get('/detail-serah-terima/{id}','Jabatan@showserahterima');
        Route::get('/edit-jabatan/{id}','Jabatan@edit');
        Route::get('/delete-jabatan/{id}','Jabatan@destroy');
        Route::get('/approve-jabatan/{id}','Jabatan@showapprove');
        Route::get('/role-jabatan/{id}','Jabatan@showrole');
        
        
        
        // Petugas Management
        Route::get('/petugas-management','Admin\PetugasManagementController@search')->name('petugas-management.index');
        Route::get('/petugas-management/edit/{id}','Admin\PetugasManagementController@edit');
        Route::post('/petugas-management/assign','Admin\PetugasManagementController@assign');
        Route::get('/petugas-management/tambah','Admin\PetugasManagementController@add');
        // Route::post('/petugas-management/store','Admin\PetugasManagementController@store')->name('petugas-management.store');
        Route::post('/petugas-management/update','Admin\PetugasManagementController@update')->name('petugas-management.update');
        Route::post('/petugas-management/registrasi','Admin\PetugasManagementController@registrasi')->name('petugas-management.registrasi');

        // config role
        Route::get('/config-role','Admin\ConfigRoleController@search')->name('role.index');
        Route::get('/config-role/edit/{id}','Admin\ConfigRoleController@edit');
        Route::get('/config-role/tambah-role','Admin\ConfigRoleController@tambah');
        Route::post('/config-role/store-role','Admin\ConfigRoleController@storerole')->name('role.store');
        Route::post('/config-role/update-role','Admin\ConfigRoleController@updaterole')->name('role.update');
        Route::post('/config-role/delete','Admin\ConfigRoleController@delete')->name('role.delete');

        
        //output
        Route::get('/output','Admin\OutputController@index')->name('output.index');
        Route::get('/output/create','Admin\OutputController@create')->name('output.create');
        Route::get('/output/edit/{id}','Admin\OutputController@edit')->name('output.edit');
        Route::post('output/save',array('as' => 'output.save','uses' => 'Admin\OutputController@save'));
        Route::post('output/update/{id}',array('as' => 'output.update','uses' => 'Admin\OutputController@update'));
        Route::post('output/delete-image',array('as' => 'output.deleteImage','uses' => 'Admin\OutputController@deleteImage'));
    });

    Route::get('/logout','Home@logout');
});


Route::get('/home', 'HomeController@index')->name('home');
Route::get('storage/{filename}', function ($filename)
{
    return Image::make(storage_path('public/' . $filename))->response();
});
