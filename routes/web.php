<?php

Auth::routes();
Route::group(['prefix' => 'api-admin','namespace' => 'Admin'], function() {
    Route::get('/login','AdminAuthController@getLogin')->name('admin.login');
    Route::post('/login','AdminAuthController@postLogin');
    Route::get('logout','AdminAuthController@getLogout')->name('post.logout.admin');
});
//Fixx lai login admin: 'middleware'=>'CheckLoginAdmin'
Route::group(['prefix' => 'api-admin','namespace' => 'Admin','middleware'=>'CheckLoginAdmin'], function() {
//    Route::get('/', function () {
//        return view('admin.index');
//    });
    Route::get('/','AdminController@index')->name('api-admin.index');
    Route::group(['prefix'=>'brand'],function (){
        Route::get('/','AdminBrandController@index')->name('admin.index.brand');
        Route::get('/create','AdminBrandController@create')->name('admin.create.brand');
        Route::post('/create','AdminBrandController@store');
        Route::get('/update/{id}','AdminBrandController@edit')->name('admin.update.brand');
        Route::post('/update/{id}','AdminBrandController@update');
        Route::get('/{action}/{id}','AdminBrandController@delete')->name('admin.delete.brand');
    });
    Route::group(['prefix'=>'product'],function (){
        Route::get('/','AdminProductController@index')->name('admin.index.product');
        Route::get('/create','AdminProductController@create')->name('admin.create.product');
        Route::post('/create','AdminProductController@store');
        Route::get('/update/{id}','AdminProductController@edit')->name('admin.update.product');
        Route::post('/update/{id}','AdminProductController@update');
        Route::get('/{action}/{id}','AdminProductController@delete')->name('admin.action.product');
    });

    Route::group(['prefix'=>'typeProduct'],function (){
        Route::get('/','AdminTypeProductController@index')->name('admin.index.typeProduct');
        Route::get('/create','AdminTypeProductController@create')->name('admin.create.typeProduct');
        Route::post('/create','AdminTypeProductController@store');
        Route::get('/update/{id}','AdminTypeProductController@edit')->name('admin.update.typeProduct');
        Route::post('/update/{id}','AdminTypeProductController@update');
        Route::get('/{action}/{id}','AdminTypeProductController@delete')->name('admin.delete.typeProduct');
    });


//    Quan ly don hang
    Route::group(['prefix'=>'transaction'],function (){
        Route::get('/','AdminTransactionController@index')->name('admin.index.transaction');
        Route::get('/view/{id}','AdminTransactionController@viewDetail')->name('admin.view.transaction');
        Route::get('/{action}/{id}','AdminTransactionController@delete')->name('admin.delete.transaction');

    });

    //Quan ly user
    Route::group(['prefix'=>'user'],function (){
        Route::get('/','AdminUserController@index')->name('admin.index.user');
        Route::get('/update/{id}','AdminUserController@edit')->name('admin.update.user');
        Route::post('/update/{id}','AdminUserController@update');
        Route::get('/{action}/{id}','AdminUserController@delete')->name('admin.delete.user');

    });
//    Lay danh gia
    Route::group(['prefix'=>'comment'],function (){
        Route::get('/','AdminCommentController@index')->name('admin.index.comment');
        Route::get('/{action}/{id}','AdminCommentController@delete')->name('admin.delete.comment');
    });
});

Route::group(['namespace'=>'Auth'],function (){
    Route::get('dang-ky','RegisterController@getRegister')->name('get.register');
    Route::post('dang-ky','RegisterController@postRegister')->name('post.register');

    Route::get('dang-nhap','LoginController@getLogin')->name('get.login');
    Route::post('dang-nhap','LoginController@postLogin')->name('post.login');
    Route::get('dang-xuat','LoginController@getLogout')->name('post.logout.user');

});
Route::group(['namespace'=>'Frontend'],function (){
   Route::get('/','HomeController@index')->name('get.home');
   Route::get('brand/{slug}-{id}','HomeController@getListProduct')->name('get.list.product');
   Route::get('typeproduct/{slug}-{brid}-{id}','HomeController@getListProductType')->name('get.list.product.type');
   Route::get('typeproducttt/{slug}-{id}','HomeController@getListProductTypePro')->name('get.list.product.typePro');
//    Route::get('/','typeProductController@getTypeProduct')->name('get.type.Product');
    Route::get('san-pham/{slug}-{id}', 'StoreDetailController@getDetailStore')->name('get.detail.store');
//    Route::get('store/get_by_product_type', 'typeProductController@getStoreByTypeId')->name('get.list.store_by_id');
    Route::get('san-pham', 'StoreDetailController@getStoreSearch')->name('get.list.store_search');
    Route::get('san-pham/error-search', 'StoreDetailController@getStoreSearch')->name('get.error.store_search');
    Route::get('/search', 'StoreDetailController@search');

//    Gio hang
    Route::group(['prefix'=>'shopping'],function (){
        Route::get('/add/{id}','ShoppingCartController@addProduct')->name('add.shopping.cart');
        Route::get('/danh-sach','ShoppingCartController@getListShoppingCart')->name('get.list.shopping.cart');
        Route::get('/update/{id}&{decrease}','ShoppingCartController@updateShoppingCart')->name('decrease.shopping.cart');
        Route::get('/update={id}&{increment}','ShoppingCartController@updateShoppingCart')->name('increment.shopping.cart');
        Route::get('/delete/{id}','ShoppingCartController@deleteShoppingCart')->name('delete.shopping.cart');
    });
// thanh toán
    Route::group(['prefix' => 'giohang', 'middleware' =>'CheckLoginUser'], function() {
        Route::get('/thanh-toan', 'ShoppingCartController@getFormPay')->name('get.form.pay');
        Route::post('/thanh-toan', 'ShoppingCartController@saveInfoPayShoppingCart');
    });
//    Danh gia
    Route::group(['prefix' => 'comment', 'middleware' =>'CheckLoginUser'], function() {
        Route::post('/danh-gia/{id}', 'RatingController@saveRatingStore')->name('get.comment.store');
    });
//    Search
//    Route::group(['prefix' => 'search'], function() {
////        Route::get('/', 'LiveSearchController@index')->name('get.search');
//        Route::get('/search', 'LiveSearchController@search');
//
//    });
});





Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
