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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/submitreview', 'ReviewController@submitreview')->name('submitreview');
Route::get('/reviewposting/{id}', 'ReviewController@reviewposting')->name('reviewposting');
Route::get('/postreview/{id}', 'ReviewController@postreview')->name('postreview');
Route::post('/sendreviewrequest','ReviewController@create')->name('sendreviewrequest')->middleware('auth');
Route::get('/reviewrequestssent', 'ReviewController@reviewrequestssent')->name('reviewrequestssent')->middleware('auth');
Route::get('/reviewsgiven', 'ReviewController@reviewsgiven')->name('reviewsgiven')->middleware('auth');
Route::get('/profile', 'HomeController@userprofile')->name('profile')->middleware('auth');
Route::get('/managereviewform', 'ReviewController@managereviewform')->name('managereviewform')->middleware('auth');
Route::post('/submitreviewformbuildblocks', 'ReviewController@submitreviewformbuildblocks')->name('submitreviewformbuildblocks')->middleware('auth');

Route::namespace("Admin")->prefix('admin')->group(function(){
	Route::get('/', 'HomeController@index')->name('admin.home');
	Route::get('/adminhome', 'HomeController@index')->name('admin.home');
    Route::get('/createuser', 'UserManagementController@createuser')->name('admin.createuser');
    Route::post('/adduser', 'UserManagementController@store')->name('admin.register');
    Route::get('/viewusers', 'UserManagementController@index')->name('admin.show');
    Route::get('/userdestroy/{id}', 'UserManagementController@destroy')->name('admin.userdestroy');
    
    
    Route::post('/userEdit', 'UserManagementController@loadUserEdit')->name('admin.userEdit');
    
    Route::post('/edituser', 'UserManagementController@update')->name('admin.edituser');
    
    
    
    Route::get('/departments', 'UserManagementController@departments')->name('admin.departments');
     Route::post('/adddepartment', 'UserManagementController@storeDepartment')->name('admin.storeDepartment');
     Route::get('/departmentdestroy/{id}', 'UserManagementController@destroydepartment')->name('admin.departmentdestroy');
     
     
     
     Route::get('/groups', 'UserManagementController@groups')->name('admin.groups');
     Route::post('/addgroup', 'UserManagementController@storeGroup')->name('admin.storeGroup');
     Route::get('/groupdestroy/{id}', 'UserManagementController@destroygroup')->name('admin.groupdestroy');
     Route::post('/groupEdit', 'UserManagementController@loadgroupEdit')->name('admin.groupEdit');
     Route::post('/editgroup', 'UserManagementController@updategroup')->name('admin.editgroup');
     
     
     
     Route::get('/casting', 'ItemactionsController@index')->name('admin.casting');
     
     Route::get('/castingoutput', 'ItemactionsController@castingoutput')->name('admin.castingoutput');
     
     
     
     
     Route::post('/addcasting', 'ItemactionsController@store')->name('admin.storeCasting');
     Route::get('/castingdestroy/{id}', 'ItemactionsController@destroy')->name('admin.castingdestroy');
     Route::post('/castingEdit', 'ItemactionsController@loadCastingEdit')->name('admin.castingEdit');
     Route::post('/editcasting', 'ItemactionsController@update')->name('admin.editcasting');
     
     
     
     Route::post('/addcastingoutput', 'ItemactionsController@storecastingoutput')->name('admin.storeCastingoutput');
     Route::get('/castingoutputdestroy/{id}', 'ItemactionsController@destroycastingoutput')->name('admin.castingoutputdestroy');
     Route::post('/castingoutputEdit', 'ItemactionsController@loadCastingOutputEdit')->name('admin.castingoutputEdit');
     Route::post('/editcastingoutput', 'ItemactionsController@updatecastingoutput')->name('admin.editcastingoutput');
     
     
     
     
     Route::post('/addtransfercasting', 'ItemactionsController@storetransfercasting')->name('admin.addtransfercasting');
    Route::post('/viewtransfercasting', 'ItemactionsController@viewtransfercasting')->name('admin.viewtransfercasting');
    
    Route::get('/transferreportcasting', 'ItemactionsController@transferreportcasting')->name('admin.transferreportcasting');
    
    
     
     
     
     
    Route::get('/reviewrequestssent', 'ReviewManagementController@reviewrequestssent')->name('admin.reviewrequestssent');
    
    Route::get('/items', 'ItemsController@index')->name('admin.items');
    Route::get('/itemgroups', 'ItemsController@itemgroups')->name('admin.itemgroups');
    Route::get('/itemdestroy/{id}', 'ItemsController@destroy')->name('admin.itemdestroy');
    Route::get('/itemgroupdestroy/{id}', 'ItemsController@destroygroup')->name('admin.itemgroupdestroy');
    
    Route::post('/additem', 'ItemsController@store')->name('admin.storeItem');
    
    Route::post('/additemgroup', 'ItemsController@storeItemGroup')->name('admin.storeItemGroup');
    
    Route::post('/itemEdit', 'ItemsController@loadItemEdit')->name('admin.itemEdit');
    
    Route::post('/edititem', 'ItemsController@update')->name('admin.edititem');
    
    Route::post('/itemgroupEdit', 'ItemsController@loadItemgroupEdit')->name('admin.itemgroupEdit');
    
    Route::post('/edititemgroup', 'ItemsController@updateitemgroup')->name('admin.edititemgroup');
    
    
    Route::post('/itemRelation', 'ItemsController@itemRelation')->name('admin.itemRelation');
    
    Route::get('/itemgrouprelation', 'ItemsController@itemgrouprelation')->name('admin.itemgrouprelation');
    
     Route::post('/relationshipEdit', 'ItemsController@relationshipEdit')->name('admin.relationshipEdit');
    
    
    
    
    Route::get('/rawmaterialinward', 'RawmaterialController@rawmaterialinward')->name('admin.rawmaterialinward');
    Route::get('/addrawmaterialinward', 'RawmaterialController@addrawmaterialinward')->name('admin.addrawmaterialinward');
    
    Route::post('/addrminward', 'RawmaterialController@storerminward')->name('admin.addrminward');
    
    Route::post('/rminwardEdit', 'RawmaterialController@loadRminwardEdit')->name('admin.rminwardEdit');
    
    Route::post('/editrminward', 'RawmaterialController@update')->name('admin.editrminward');
    Route::get('/rmdestroy/{id}', 'RawmaterialController@destroy')->name('admin.rmdestroy');
    
    
    Route::post('/addtransfer', 'RawmaterialController@storetransfer')->name('admin.addtransfer');
    Route::post('/viewtransfer', 'RawmaterialController@viewtransfer')->name('admin.viewtransfer');
    
    Route::get('/transferreport', 'RawmaterialController@transferreport')->name('admin.transferreport');
    
    
    
    
    Route::get('/rawmaterialstock', 'RawmaterialController@rawmaterialstock')->name('admin.rawmaterialstock');
    
    
    
    
    Route::post('/departmentEdit', 'UserManagementController@loaddepartmentEdit')->name('admin.departmentEdit');
    
    Route::post('/editdepartment', 'UserManagementController@updatedepartment')->name('admin.editdepartment');
    
    
    Route::get('/vendors', 'UserManagementController@vendors')->name('admin.vendors');
     Route::post('/addvendor', 'UserManagementController@storeVendor')->name('admin.storeVendor');
     Route::get('/vendordestroy/{id}', 'UserManagementController@destroyvendor')->name('admin.vendordestroy');
     Route::post('/vendorEdit', 'UserManagementController@loadvendorEdit')->name('admin.vendorEdit');
    
    Route::post('/editvendor', 'UserManagementController@updatevendor')->name('admin.editvendor');
    
     
    
    
    Route::get('/reviewsgiven', 'ReviewManagementController@reviewsgiven')->name('admin.reviewsgiven');
	Route::namespace('Auth')->group(function(){
		Route::get('/login', 'LoginController@showLoginForm')->name('admin.login');
		Route::post('/login', 'LoginController@login');
		Route::post('logout', 'LoginController@logout')->name('admin.logout');
	});
});
