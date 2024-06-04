<?php

use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\IssuedController;
use App\Http\Controllers\NotificationController;

use App\Http\Controllers\SuppliesController;
use App\Http\Controllers\AssetController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//SUPPLIES
//MAIN TABLE
Route::resource('/displaysupplies', 'SuppliesController');
Route::get('supplies-view', 'SuppliesController@displaysupplies');
Route::get('/supplies/issued-summary', 'SuppliesController@displayIssuedSummary')->name('supplies.issued_summary');

//No. Auto-generations
Route::get('/generate-iar-no', [SuppliesController::class, 'generateIARNo']);
Route::get('/generate-stock-no', [SuppliesController::class, 'generateStockNo']);
Route::get('/generate-item-no', [SuppliesController::class, 'generateItemNo']);
Route::get('/generate-pr-no', [SuppliesController::class, 'generatePrNo']);

Route::get('/generate-item-no', [AssetController::class, 'generateItemNo']);
Route::get('/generate-class-id', [AssetController::class, 'generateClassId']);
Route::get('/generate-asset-iar-no', [AssetController::class, 'generateAssetIARNo']);
Route::get('/generate-property-no', [AssetController::class, 'generatePropertyNo']);
Route::get('/generate-par-no', [AssetController::class, 'generateParNo']);
Route::get('/generate-prs-no', [AssetController::class, 'generatePrsNo']);
Route::get('/generate-ics-no/{unit_cost}', 'AssetController@generateICSNo');


//ISSUED TABLE
Route::get('issued-supplies-view', 'SuppliesController@displayissued');
//Route::get('issued-supplies-view', 'SuppliesController@displayissued');
Route::get('/searchissued', 'SuppliesController@issuedsearch');
Route::get('/addissued', 'SuppliesController@addissued');
Route::post('/storenewissued', 'SuppliesController@storenewissued');
Route::get('/deleteissued/{stock_no}', 'SuppliesController@deleteissued');
Route::get('/edit-issued/{stock_no}', 'SuppliesController@editissued');
Route::put('/update-issued/{stock_no}', 'SuppliesController@updateissued');

//DELIVERED TABLE
Route::get('delivered-supplies-view', 'SuppliesController@displaydelivered');
Route::get('/searchdelivered', 'SuppliesController@deliveredsearch');
Route::get('/adddelivered', 'SuppliesController@adddelivered');
Route::post('/storenewdelivered', 'SuppliesController@storenewdelivered');
Route::get('/deletedelivered/{stock_no}', 'SuppliesController@deletedelivered');
Route::get('/edit-delivered/{stock_no}', 'SuppliesController@editdelivered');
Route::put('/update-delivered/{stock_no}', 'SuppliesController@updatedelivered');

//FORMS
Route::get('supply-forms-and-reports-generation', 'SuppliesController@forms');
Route::get('/getItemDetails', 'ItemController@getItemDetails');

//DEPARTMENT
Route::get('/plm-departments', 'SuppliesController@displaydepartment');
Route::get('/adddepartment', 'SuppliesController@adddepartment');
Route::post('/storedepartment', 'SuppliesController@storedepartment');
Route::get('/deletedepartment/{id}', 'SuppliesController@deletedepartment');
Route::get('/searchdept', 'SuppliesController@departmentsearch');

//================================================================================================================================================================//
//ASSETS
//SUPPLIERS
Route::get('suppliers-view', 'SupplierController@displaySuppliers');
Route::get('/addsupplier', 'SupplierController@addSupplier');
Route::post('/storesupplier', 'SupplierController@storeSupplier');
Route::get('/deletesupplier/{id}', 'SupplierController@deleteSupplier');
//MAIN TABLE
Route::resource('/displayasset', 'AssetController');
Route::get('asset-view', 'AssetController@displayasset');
Route::get('/addasset', 'AssetController@addasset');
Route::post('/storeasset', 'AssetController@storenewasset');
Route::get('/editasset/{pr_no}', 'AssetController@editasset');
Route::put('/updateasset/{pr_no}', 'AssetController@updateasset');
Route::get('/deleteasset/{pr_no}', 'AssetController@deleteasset');
Route::get('/searchasset', 'AssetController@search');

//PURCHASE ORDER
Route::get('purchase-order-view', 'AssetController@displaypurchaseorder');
Route::get('/makepurchaseorder', 'AssetController@makePurchaseOrder');
Route::post('/storepurchaseorder', 'AssetController@storePurchaseOrder');
Route::get('/get-description/{itemNo}', 'AssetController@getDescription');
Route::get('/delete-purchase-order/{id}', 'AssetController@deletePurchaseOrder');

//DELIVERY TABLE
Route::get('delivery-view', 'AssetController@displaydelivery');
Route::post('/storenewdelivery', 'AssetController@storenew_delivered_asset');
Route::get('/deletedelivery/{id}', 'AssetController@deletedeliveredasset');

//ISSUANCE TABLE
Route::get('issuance-view', 'AssetController@displayissuance');
Route::post('/istorenewissuance', 'AssetController@storenew_issued_asset');
Route::get('/deleteissuance/{id}', 'AssetController@delete_issued_asset');

//ASSET TRANSFER
Route::get('/asset-transfer-view', 'AssetController@displayassettransfer');
Route::post('/makenewtransfer', 'AssetController@makenewassettransfer');

//DEPARTMENT
Route::get('/asset-plm-departments', 'AssetController@assetdisplaydepartment');
Route::get('/asset-adddepartment', 'AssetController@assetadddepartment');
Route::post('/asset-storedepartment', 'AssetController@assetstoredepartment');
Route::get('/asset-deletedepartment/{id}', 'AssetController@assetdeletedepartment');
Route::get('/assets-searchdept', 'AssetController@assetdepartmentsearch');

//ASSET FORMS
Route::get('asset-forms-and-reports-generation', 'AssetController@assetforms');
Route::get('/assets-pdf', 'AssetController@downloadAssets');
Route::get('/assetpdf-view', 'AssetController@assetPDF');

//================================================================================================================================================================//
//LOGIN ROUTES
Route::get('/Supply-login', 'PagesController@index');
Route::get('/Asset-login', 'PagesController@assetindex');
Route::get('/register', [AuthController::class, 'register'])->name('register');  
Route::post('/register', [AuthController::class, 'registerPost'])->name('register'); 
Route::get('/login/{portal}', [AuthController::class, 'login'])->name('login');
Route::post('/login/{portal}', [AuthController::class, 'loginPost'])->name('login.post');
Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/mainpage', function () {
    return view('mainpage');
});
Route::get('/', function () {
    return view('mainpage');
});

//USER PROFILE
Route::get('/user-profile', 'SuppliesController@displayprofile');

Route::get('/supplies/unit', 'SuppliesController@getUnit');
Route::get('/supplies/unit/ris', 'SuppliesController@getUnit1');

//PDF
Route::get('/pdf-view', 'SuppliesController@displayPDF');
Route::get('/supplies-pdf', 'SuppliesController@downloadPDF');

Route::post('/generatePDF', 'SuppliesController@generatePDF')->name('generatePDF');
Route::post('/generatePDF1', 'SuppliesController@generatePDF1')->name('generatePDF1');
Route::post('/generatePDF2', 'SuppliesController@generatePDF2')->name('generatePDF2');

//FORMS PAGES
Route::get('/purchase-request-form', 'SuppliesController@PRForm');
Route::get('/requisition-issue-form', 'SuppliesController@RISForm');
Route::get('/inspection-acceptance-report', 'SuppliesController@IARForm');

//ARCHIVE
//SUPPLIES
//Route::get('/supplies/archive/{stock_no}/recover', 'SuppliesController@recover')->name('pages.supplies.recover');
//Route::delete('/supplies/archive/{stock_no}/forceDelete', 'SuppliesController@forceDelete')->name('pages.supplies.forceDelete');
//Route::get('/supplies/archive', 'SuppliesController@archive')->name('pages.supplies.archive');

Route::get('/assets/archive/{item_no}/recover', 'AssetController@recover')->name('pages.assets.recover');
Route::delete('/assets/archive/{item_no}/forceDelete', 'AssetController@forceDelete')->name('pages.assets.forceDelete');
Route::get('/assets/archive', 'AssetController@archive')->name('pages.assets.archive');

//ISSUED
Route::get('/issued/archive/{stock_no}/recover', 'SuppliesController@recoverIssued')->name('pages.issued.recover');
Route::delete('/issued/archive/{stock_no}/forceDelete', 'SuppliesController@forceDeleteIssued')->name('pages.issued.forceDelete');
Route::get('/issued/archive', 'SuppliesController@archiveIssued')->name('pages.issued.archive');

//DELIVERED
Route::get('/delivered/archive/{stock_no}/recover', 'SuppliesController@recoverDelivered')->name('pages.delivered.recover');
Route::delete('/delivered/archive/{stock_no}/forceDelete', 'SuppliesController@forceDeleteDelivered')->name('pages.delivered.forceDelete');
Route::get('/delivered/archive', 'SuppliesController@archiveDelivered')->name('pages.delivered.archive');

//ASSET
//PURCHASE ORDER
Route::get('/purchase-order/archive/{id}/recover', 'AssetController@po_recover')->name('pages.purchase_order.recover');
Route::delete('/purchase-order/archive/{id}/forceDelete', 'AssetController@po_forceDelete')->name('pages.purchase_order.forceDelete');
Route::get('/purchase-order/archive', 'AssetController@po_archive')->name('pages.purchase_order.archive');

//DELIVERY
Route::get('/delivery/archive/{id}/recover', 'AssetController@del_recover')->name('pages.delivery.recover');
Route::delete('/delivery/archive/{id}/forceDelete', 'AssetController@del_forceDelete')->name('pages.delivery.forceDelete');
Route::get('/delivery/archive', 'AssetController@del_archive')->name('pages.delivery.archive');

//ISSUANCE
Route::get('/issuance/archive/{id}/recover', 'AssetController@iss_recover')->name('pages.issuance.recover');
Route::delete('/issuance/archive/{id}/forceDelete', 'AssetController@iss_forceDelete')->name('pages.issuance.forceDelete');
Route::get('/issuance/archive', 'AssetController@iss_archive')->name('pages.issuance.archive');


Route::get('/generate-barcode', 'SuppliesController@generateBarcode');




