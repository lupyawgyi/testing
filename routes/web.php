<?php

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

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
Auth::routes(['register' => false, 'request' => false, 'reset' => false]);

Route::view('/', 'login.login')->middleware('checkLogin');
Route::post('/','Auth\LoginController@login');
Route::get('/logout', 'Auth\LoginController@logout');
Route::redirect('register','/');

Route::get('/pass',function (){
    return bcrypt('123');
});

Route::get('/home', 'HomeController@index');

Route::view('/users/password/{id}/change', 'backend.users.password.change')->middleware('auth');
Route::post('/users/password/{id}/change', 'Admin\UserController@change')->middleware('auth');



Route::group(array('prefix' => 'backend', 'namespace' => 'Admin'), function () {

    Route::get('/users/index', 'UserController@index')->middleware('user_index')->name('user');
    Route::get('/user/ssd', 'UserController@pull')->middleware('user_index');
    Route::get('/users/create', 'UserController@create')->middleware('user_create');
    Route::post('/users/create', 'UserController@store')->middleware('user_create');
    Route::get('/users/{id}/show', 'UserController@show')->middleware('user_index');
    Route::get('/users/{id}/edit', 'UserController@edit')->middleware('user_edit');
    Route::post('/users/{id}/edit', 'UserController@update')->middleware('user_edit');
    Route::get('/users/{id}/delete', 'UserController@destroy')->middleware('user_delete');
    Route::get('/users/{id}/soft', 'UserController@soft')->middleware('user_ban');
    Route::get('/users/{id}/restore', 'UserController@restore')->middleware('user_ban');
//    Route::view('/users/password/{id}/change', 'backend/users/password/change');
//    Route::post('/users/password/{id}/change', 'UserController@change');

    Route::get('/roles/index', 'RoleController@index')->middleware('role_index')->name('role');
    Route::get('/role/ssd', 'RoleController@pull')->middleware('role_index');
    Route::get('/roles/create', 'RoleController@create')->middleware('role_create');
    Route::post('/roles/create', 'RoleController@store')->middleware('role_create');
    Route::get('/roles/{id}/show', 'RoleController@show')->middleware('role_index');
    Route::get('/roles/{id}/edit', 'RoleController@edit')->middleware('role_edit');
    Route::post('/roles/{id}/edit', 'RoleController@update')->middleware('role_edit');
    Route::get('/roles/{id}/delete', 'RoleController@destroy')->middleware('role_delete');
    Route::get('/roles/{id}/soft', 'RoleController@soft')->middleware('role_ban');
    Route::get('/roles/{id}/restore', 'RoleController@restore')->middleware('role_ban');

    Route::get('/permissions/index', 'PermissionController@index')->middleware('permission_index')->name('permissions');
    Route::get('/permissions/ssd', 'PermissionController@pull')->middleware('permission_index');
    Route::get('/permissions/create', 'PermissionController@create')->middleware('permission_create');
    Route::post('/permissions/create', 'PermissionController@store')->middleware('permission_create');
    Route::get('/permissions/{id}/show', 'PermissionController@show')->middleware('permission_index');
    Route::get('/permissions/{id}/edit', 'PermissionController@edit')->middleware('permission_edit');
    Route::post('/permissions/{id}/edit', 'PermissionController@update')->middleware('permission_edit');
    Route::get('/permissions/{id}/delete', 'PermissionController@destroy')->middleware('permission_delete');

    Route::get('/regions/index', 'RegionController@index')->middleware('region_index')->name('region');
    Route::get('/regions/ssd', 'RegionController@pull')->middleware('region_index');
    Route::get('/regions/create', 'RegionController@create')->middleware('region_create');
    Route::post('/regions/create', 'RegionController@store')->middleware('region_create');
    Route::get('/regions/{id}/show', 'RegionController@show')->middleware('region_index');
    Route::get('/regions/{id}/edit', 'RegionController@edit')->middleware('region_edit');
    Route::post('/regions/{id}/edit', 'RegionController@update')->middleware('region_edit');
    Route::get('/regions/{id}/delete', 'RegionController@destroy')->middleware('region_delete');

    Route::get('/branches/index', 'BranchController@index')->middleware('branch_index')->name('branches');
    Route::get('/branches/ssd', 'BranchController@pull')->middleware('branch_index');
    Route::get('/branches/create', 'BranchController@create')->middleware('branch_create');
    Route::post('/branches/create', 'BranchController@store')->middleware('branch_create');
    Route::get('/branches/{id}/show', 'BranchController@show')->middleware('branch_index');
    Route::get('/branches/{id}/edit', 'BranchController@edit')->middleware('branch_edit');
    Route::post('/branches/{id}/edit', 'BranchController@update')->middleware('branch_edit');
    Route::get('/branches/{id}/delete', 'BranchController@destroy')->middleware('branch_delete');

//    Route::get('/errors/index', 'ErrorController@index')->name('errors');
//    Route::get('/errors/ssd', 'ErrorController@pull');
//    Route::get('/errors/create', 'ErrorController@create');
//    Route::post('/errors/create', 'ErrorController@store');
//    Route::get('/errors/{id}/show', 'ErrorController@show');
//    Route::get('/errors/{id}/edit', 'ErrorController@edit');
//    Route::post('/errors/{id}/edit', 'ErrorController@update');
//    Route::get('/errors/{id}/delete', 'ErrorController@destroy');
});

Route::group(array('prefix' => 'request', 'namespace' => 'Request'), function () {

    Route::get('/GeneralRequest/all/index', 'GeneralRequestController@index')->middleware('ticket_index')->name('allrequest');
    Route::get('/GeneralRequest/all/ssd', 'GeneralRequestController@pull')->middleware('ticket_index');

    Route::get('/GeneralRequest/all/reopen/create', 'GeneralRequestController@reopenRequest')->middleware('ticket_create')->name('reopen_request');
    Route::get('/GeneralRequest/all/reverse/create', 'GeneralRequestController@reverseRequest')->middleware('ticket_create')->name('reverse_request');
    Route::get('/GeneralRequest/all/undo/create', 'GeneralRequestController@undoRequest')->middleware('ticket_create')->name('undo_request');

    Route::post('/GeneralRequest/all/reopen/create', 'GeneralRequestController@reopenStore')->middleware('ticket_create')->name('reopen');
    Route::post('/GeneralRequest/all/reverse/create', 'GeneralRequestController@reverseStore')->middleware('ticket_create')->name('reverse');
    Route::post('/GeneralRequest/all/undo/create', 'GeneralRequestController@undoStore')->middleware('ticket_create')->name('undo');

    Route::get('/GeneralRequest/all/{id}/reopen/show', 'GeneralRequestController@reopenView')->middleware('ticket_index');
    Route::get('/GeneralRequest/all/{id}/reverse/show', 'GeneralRequestController@reverseView')->middleware('ticket_index');
    Route::get('/GeneralRequest/all/{id}/undo/show', 'GeneralRequestController@undoView')->middleware('ticket_index');



    Route::post('/GeneralRequest/all/{id}/reject', 'GeneralRequestController@reject')->middleware('ticket_index');


});

Route::post('/request/GeneralRequest/{id}/comment', 'Comment\GeneralCommentController@store')->middleware('auth');

Route::post('/request/GeneralRequest/{id}/BM', 'Approve\BMgeneralApproveController@approve')->middleware('Ticket_Approve_BM');
Route::post('/request/GeneralRequest/{id}/ACC', 'Approve\ACCgeneralApproveController@approve')->middleware('Ticket_Approve_ACC');
Route::post('/request/GeneralRequest/{id}/SP', 'Approve\SPgeneralApproveController@process')->middleware('Ticket_Approve_SP');
Route::post('/request/GeneralRequest/{id}/IT', 'Approve\ITgeneralApproveController@final')->middleware('Ticket_Approve_IT');



Route::view('/musoni/search/index','musoni/index')->middleware('auth')->name('musoni.search');
Route::post('/musoni/search/index','musoni\MusoniController@Collection')->name('loan')->middleware('auth');

Route::view('/musoni/clientDetail/index','/musoni/clientDetail/index')->middleware('auth')->name('search.client');
Route::post('/musoni/clientDetail/index','musoni\MusoniController@Client')->middleware('auth');
Route::get('/linkid','musoni\MusoniController@link')->name('linkid')->middleware('auth');



Route::view('/error','testing.index');

Route::get('/data',function (){
    Http::withBasicAuth('myomin.tun', 'B@rL@rKw@r')->post('https://demo.sing.musoniservices.com:8443/api/v1/datatables/cct_CollectionOfficer/370164?tenantIdentifier=haymancapital',
         [
        "dateFormat" => "yyyy-MM-dd",
        "Collection_Offi1" => "Testing",
        "Assigned_Manager2"=> "Test",
        "Assigned_Date3" => "2021-04-08",
        "locale" => "en_GB",
        "submittedon_date" => "2021-04-08",
        "submittedon_userid" => "691"
]

    )->json();
});

//Route::get('expect/import/expect-detail','Import\ImportFileController@ImportForm')->name('expect-detail');
//Route::post('expect/import/expect-detail','Import\ImportFileController@Import')->name('expect-import');

//Route::get('/musoni/expect/index','musoni\ExpectDetailReportController@index');
//Route::get('/musoni/expect/ssd','musoni\ExpectDetailReportController@pull');


Route::view('musoni/import/savingtransaction','musoni/savingtransaction/import')->name('saving-daily')->middleware('file_import');
Route::post('musoni/import/savingtransaction','Import\ImportFileController@savingdaily')->name('savingImport')->middleware('file_import');

Route::view('musoni/import/dailydisburse','musoni/disburse/import')->name('disburse-daily')->middleware('file_import');
Route::post('musoni/import/dailydisburse','Import\ImportFileController@disbursedaily')->name('disburseImport')->middleware('file_import');


Route::view('musoni/import/dailyrepayment','musoni/repayment/import')->name('repayment-detail')->middleware('file_import');
Route::post('musoni/import/dailyrepayment','Import\ImportFileController@repaymentdaily')->name('repaymentImport')->middleware('file_import');

Route::view('musoni/import/expectdetail','musoni/expect/import')->name('expect-detail')->middleware('file_import');
Route::post('musoni/import/expectdetail','Import\ImportFileController@expectdetail')->name('expectImport')->middleware('file_import');

Route::view('musoni/import/outstanding','musoni/outstanding/import')->name('outstanding')->middleware('file_import');
Route::post('musoni/import/outstanding','Import\ImportFileController@outstanding')->middleware('file_import');

Route::view('musoni/import/dataexportschedule','musoni/dataexportschedule/import')->name('exportschedule')->middleware('file_import');
Route::post('musoni/import/dataexportschedule','Import\ImportFileController@dataschedule')->middleware('file_import');

Route::view('musoni/import/portfolio','musoni/portfolio/import')->middleware('file_import')->name('portfolio');
Route::post('musoni/import/portfolio','Import\ImportFileController@portfolio')->middleware('file_import')->name('portfolio_input');

Route::get('/musoni/portfolio/index','musoni\PortfolioController@index')->middleware('portfolio_index')->name('portfolio.index');
Route::get('musoni/portfolio/{id}/show','musoni\PortfolioController@show')->middleware('portfolio_index');
Route::get('/musoni/portfolio/ssd','musoni\PortfolioController@pull')->middleware('portfolio_index');

Route::get('musoni/portfolio/detail/{name}/ontime','musoni\OutstandingController@ontimeshow')->middleware('portfolio_index');
Route::post('musoni/portfolio/detail/{name}/ontime','musoni\OutstandingController@OntimeExport')->middleware('portfolio_index');

Route::get('musoni/portfolio/detail/{name}/one','musoni\OutstandingController@oneshow')->middleware('portfolio_index');
Route::post('musoni/portfolio/detail/{name}/one','musoni\OutstandingController@OneExport')->middleware('portfolio_index');

Route::get('musoni/portfolio/detail/{name}/three','musoni\OutstandingController@threeshow')->middleware('portfolio_index');
Route::post('musoni/portfolio/detail/{name}/three','musoni\OutstandingController@ThreeExport')->middleware('portfolio_index');

Route::get('musoni/portfolio/detail/{name}/six','musoni\OutstandingController@sixshow')->middleware('portfolio_index');
Route::post('musoni/portfolio/detail/{name}/six','musoni\OutstandingController@SixExport')->middleware('portfolio_index');

Route::get('musoni/portfolio/detail/{name}/nine','musoni\OutstandingController@nineshow')->middleware('portfolio_index');
Route::post('musoni/portfolio/detail/{name}/nine','musoni\OutstandingController@NineExport')->middleware('portfolio_index');

Route::get('musoni/portfolio/detail/{name}/over','musoni\OutstandingController@overshow')->middleware('portfolio_index');
Route::post('musoni/portfolio/detail/{name}/over','musoni\OutstandingController@OverExport')->middleware('portfolio_index');

Route::get('musoni/collection/oneThirty/index','musoni\CollectionController@oneThirty')->name('onetothirty.index')->middleware('collection_onethirty_index');
Route::get('oneThirty/ssd','musoni\CollectionController@onethirtypull')->middleware('collection_onethirty_index');

Route::get('musoni/collection/oneThirty/{id}/show','musoni\CollectionController@onethirtyview')->middleware('collection_onethirty_index');
Route::get('collectionofficer/{id}/pull','musoni\CollectionController@conamepull')->middleware('collection_onethirty_index');
Route::post('collection/officer/{id}/assign','musoni\CollectionController@CreateAssign')->middleware('collection_createAssign_btn');
Route::post('collection/officer/{id}/collect','musoni\CollectionController@collection')->middleware('collection_createCollection_btn');
Route::post('collection/officer/{id}/comment','musoni\CollectionController@comment')->middleware('collection_createComment_btn');



Route::get('/musoni/collection/index','musoni\CollectionController@index')->name('collection.index');
Route::get('/collection/ssd', 'musoni\CollectionController@pull');

Route::get('musoni/collection/ontime/{id}/show','musoni\CollectionController@ontimeview')->middleware('collection_onethirty_index');
Route::get('collectionofficer/{id}/pull','musoni\CollectionController@conamepull')->middleware('collection_onethirty_index');
Route::post('collection/officer/{id}/assign','musoni\CollectionController@CreateAssign')->middleware('collection_createAssign_btn');
Route::post('collection/officer/{id}/collect','musoni\CollectionController@collection')->middleware('collection_createCollection_btn');
Route::post('collection/officer/{id}/comment','musoni\CollectionController@comment')->middleware('collection_createComment_btn');

Route::get('musoni/dailyConfirm/index','musoni\DailyConfirmController@index')->name('daily_confirm_index');
Route::post('musoni/dailyConfirm/index','musoni\DashboardController@store')->name('confirm_daily');

Route::get('musoni/dashboard/pull','musoni\DashboardController@pull');
//Route::get('/home','musoni\DashboardController@index');

Route::get('group','Import\ImportFileController@outstandingview');

//Route::get('age/',function (){
//    $data = \App\Outstanding::query()->whereBetween(\Carbon\Carbon::parse('dob')->diff(\Carbon\Carbon::now())->format('%y'),'20','30');
//   echo $data;
//});




//Route::get('/musoni/outstanding/index','musoni\OutstandingController@index')->name('outstanding.index');
//Route::get('musoni/portfolio/{id}/show','musoni\PortfolioController@show');
//Route::get('/musoni/portfolio/ssd','musoni\PortfolioController@pull');


//Route::view('show','musoni/portfolio/show')->name('portfolio');








